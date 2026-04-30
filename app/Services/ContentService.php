<?php

namespace App\Services;

use App\Models\ContentBlock;
use App\Models\ContentPage;
use App\Models\ContentSection;
use App\Models\ContentTranslation;
use App\Models\Language;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class ContentService
{
    public static function pageCacheKey(string $pageSlug, string $locale): string
    {
        return "cms.page.{$pageSlug}.{$locale}";
    }

    public static function forgetPage(string $pageSlug): void
    {
        foreach (Language::query()->pluck('code') as $code) {
            Cache::forget(self::pageCacheKey($pageSlug, $code));
        }
    }

    public static function forgetAll(): void
    {
        if (! Schema::hasTable('content_pages')) {
            return;
        }

        foreach (ContentPage::query()->pluck('slug') as $slug) {
            self::forgetPage($slug);
        }
    }

    public function get(string $key, ?string $default = null, ?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();

        // In the new system, site_t already handles site translations.
        // If we want ContentService to handle section-specific keys, we can look them up here.
        // However, the migration moved everything to SiteTranslation.

        return $default ?? $key;
    }

    /**
     * @return array{page: ContentPage, sections: Collection<int, ContentSection>, blocksByZone: Collection<string, Collection<int, array<string, mixed>>>}|null
     */
    public function pageData(string $pageSlug, ?string $locale = null): ?array
    {
        if (! Schema::hasTable('content_pages')) {
            return null;
        }

        $page = ContentPage::query()
            ->where('slug', $pageSlug)
            ->where('is_active', true)
            ->with(['sections', 'blocks' => fn ($q) => $q->where('is_active', true)->orderBy('sort_order')])
            ->first();

        if (! $page) {
            return null;
        }

        $resolvedLocale = $locale ?? app()->getLocale();

        $blocksByZone = $page->blocks
            ->groupBy('zone')
            ->map(fn (Collection $blocks) => $blocks->map(fn (ContentBlock $block) => $this->hydrateBlock($block, $resolvedLocale)));

        return [
            'page' => $page,
            'sections' => $page->sections,
            'blocksByZone' => $blocksByZone,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function hydrateBlock(ContentBlock $block, string $locale): array
    {
        $payload = $block->payload ?? [];

        $translated = [];
        foreach (['title', 'subtitle', 'body', 'cta_label', 'tag', 'alt'] as $field) {
            $translated[$field] = $block->getTranslation($field, $locale, true) ?? '';
        }

        return [
            'id' => $block->id,
            'slug' => $block->slug,
            'image_path' => $block->image_path,
            'zone' => $block->zone,
            'type' => $block->type,
            'sort_order' => $block->sort_order,
            'payload' => $payload,
            ...$translated,
        ];
    }
}
