<?php

namespace App\Services;

use App\Models\Language;
use App\Models\SiteTranslation;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class SiteTranslationService
{
    public static function cacheKey(string $locale): string
    {
        return 'site_translations.'.$locale;
    }

    public static function forgetLocale(string $locale): void
    {
        Cache::forget(self::cacheKey($locale));
    }

    public static function flushAll(): void
    {
        foreach (Language::query()->pluck('code') as $code) {
            self::forgetLocale($code);
        }
    }

    public function get(string $key, ?string $default = null): string
    {
        if (Schema::hasTable('content_translations')) {
            $contentValue = app(ContentService::class)->get($key, null);
            if ($contentValue !== $key) {
                return $contentValue;
            }
        }

        $locale = app()->getLocale();
        $map = $this->mapForLocale($locale);

        if (array_key_exists($key, $map) && $map[$key] !== null && $map[$key] !== '') {
            return (string) $map[$key];
        }

        $fallbackCode = Language::defaultCode();
        if ($fallbackCode !== $locale) {
            $fallback = $this->mapForLocale($fallbackCode);
            if (array_key_exists($key, $fallback) && $fallback[$key] !== null && $fallback[$key] !== '') {
                return (string) $fallback[$key];
            }
        }

        return $default ?? $key;
    }

    public function line(string $key, array $replace = [], ?string $default = null): string
    {
        $line = $this->get($key, $default);
        foreach ($replace as $search => $value) {
            $line = str_replace(
                [':'.$search, ':'.strtoupper($search), ':'.ucfirst($search)],
                [$value, $value, $value],
                $line
            );
        }

        return $line;
    }

    /**
     * @return array<string, string|null>
     */
    protected function mapForLocale(string $code): array
    {
        if (! Schema::hasTable('languages')) {
            return [];
        }

        return Cache::rememberForever(self::cacheKey($code), function () use ($code) {
            $language = Language::query()->where('code', $code)->first();
            if (! $language) {
                return [];
            }

            return SiteTranslation::query()
                ->where('language_id', $language->id)
                ->pluck('value', 'key')
                ->all();
        });
    }
}
