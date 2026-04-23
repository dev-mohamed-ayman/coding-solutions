<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\ContentBlock;
use App\Models\ContentPage;
use App\Models\ContentSection;
use App\Models\ContentTranslation;
use App\Models\Language;
use App\Services\ContentService;
use App\Services\SiteTranslationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContentController
{
    public function index(): View
    {
        $pages = ContentPage::query()
            ->withCount(['sections', 'blocks'])
            ->orderBy('name')
            ->get();

        return view('dashboard.content.index', compact('pages'));
    }

    public function edit(ContentPage $page, Request $request): View
    {
        $languages = Language::query()->where('is_active', true)->orderBy('sort_order')->orderBy('name')->get();
        $language = $languages->firstWhere('id', (int) $request->query('language_id')) ?? $languages->first();
        $search = trim((string) $request->query('q', ''));

        $sections = ContentSection::query()
            ->where('content_page_id', $page->id)
            ->orderBy('sort_order')
            ->get();

        $sectionValues = [];
        if ($language) {
            $sectionValues = ContentTranslation::query()
                ->where('language_id', $language->id)
                ->whereIn('content_section_id', $sections->pluck('id'))
                ->pluck('value', 'field')
                ->all();
        }

        if ($search !== '') {
            $sections = $sections->filter(function (ContentSection $section) use ($search) {
                $fields = collect($section->schema['fields'] ?? []);

                return str_contains(strtolower($section->title), strtolower($search))
                    || $fields->contains(fn ($field) => str_contains(strtolower((string) $field), strtolower($search)));
            })->values();
        }

        $blocks = ContentBlock::query()
            ->where('content_page_id', $page->id)
            ->with(['translations' => fn ($query) => $query->when($language, fn ($q) => $q->where('language_id', $language->id))])
            ->orderBy('zone')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('zone');

        return view('dashboard.content.edit', [
            'page' => $page,
            'languages' => $languages,
            'language' => $language,
            'sections' => $sections,
            'sectionValues' => $sectionValues,
            'blocks' => $blocks,
            'search' => $search,
        ]);
    }

    public function updateSection(ContentPage $page, ContentSection $section, Request $request): RedirectResponse
    {
        abort_unless($section->content_page_id === $page->id, 404);

        $data = $request->validate([
            'language_id' => ['required', 'exists:languages,id'],
            'fields' => ['required', 'array'],
            'fields.*' => ['nullable', 'string'],
        ]);

        $language = Language::query()->findOrFail((int) $data['language_id']);
        foreach ($data['fields'] as $field => $value) {
            if (! in_array($field, $section->schema['fields'] ?? [], true)) {
                continue;
            }

            ContentTranslation::query()->updateOrCreate(
                [
                    'language_id' => $language->id,
                    'content_section_id' => $section->id,
                    'content_block_id' => null,
                    'field' => (string) $field,
                ],
                ['value' => $value]
            );

            SiteTranslationService::forgetLocale($language->code);
        }

        ContentService::forgetPage($page->slug);

        return redirect()
            ->route('dashboard.content.edit', ['page' => $page->slug, 'language_id' => $language->id])
            ->with('status', "Section '{$section->title}' saved.");
    }

    public function storeBlock(ContentPage $page, Request $request): RedirectResponse
    {
        $data = $request->validate([
            'zone' => ['required', 'string', 'max:120'],
            'type' => ['required', 'string', 'max:120'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'payload.image_url' => ['nullable', 'url'],
            'payload.cta_url' => ['nullable', 'url'],
            'payload.tech' => ['nullable', 'string'],
            'language_id' => ['required', 'exists:languages,id'],
            'fields' => ['nullable', 'array'],
            'fields.*' => ['nullable', 'string'],
        ]);

        $block = ContentBlock::query()->create([
            'content_page_id' => $page->id,
            'zone' => $data['zone'],
            'type' => $data['type'],
            'sort_order' => $data['sort_order'] ?? 0,
            'payload' => [
                'image_url' => $data['payload']['image_url'] ?? null,
                'cta_url' => $data['payload']['cta_url'] ?? null,
                'tech' => array_values(array_filter(array_map('trim', explode(',', (string) ($data['payload']['tech'] ?? ''))))),
            ],
            'is_active' => true,
        ]);

        $language = Language::query()->findOrFail((int) $data['language_id']);
        foreach (($data['fields'] ?? []) as $field => $value) {
            ContentTranslation::query()->create([
                'language_id' => $language->id,
                'content_section_id' => null,
                'content_block_id' => $block->id,
                'field' => (string) $field,
                'value' => $value,
            ]);
        }

        ContentService::forgetPage($page->slug);

        return redirect()->route('dashboard.content.edit', ['page' => $page->slug, 'language_id' => $language->id])
            ->with('status', 'Block added.');
    }

    public function updateBlock(ContentPage $page, ContentBlock $block, Request $request): RedirectResponse
    {
        abort_unless($block->content_page_id === $page->id, 404);

        $data = $request->validate([
            'zone' => ['required', 'string', 'max:120'],
            'type' => ['required', 'string', 'max:120'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'payload.image_url' => ['nullable', 'url'],
            'payload.cta_url' => ['nullable', 'url'],
            'payload.tech' => ['nullable', 'string'],
            'language_id' => ['required', 'exists:languages,id'],
            'fields' => ['nullable', 'array'],
            'fields.*' => ['nullable', 'string'],
        ]);

        $block->update([
            'zone' => $data['zone'],
            'type' => $data['type'],
            'sort_order' => $data['sort_order'] ?? $block->sort_order,
            'is_active' => (bool) ($data['is_active'] ?? false),
            'payload' => [
                'image_url' => $data['payload']['image_url'] ?? null,
                'cta_url' => $data['payload']['cta_url'] ?? null,
                'tech' => array_values(array_filter(array_map('trim', explode(',', (string) ($data['payload']['tech'] ?? ''))))),
            ],
        ]);

        $language = Language::query()->findOrFail((int) $data['language_id']);
        foreach (($data['fields'] ?? []) as $field => $value) {
            ContentTranslation::query()->updateOrCreate(
                [
                    'language_id' => $language->id,
                    'content_section_id' => null,
                    'content_block_id' => $block->id,
                    'field' => (string) $field,
                ],
                ['value' => $value]
            );
        }

        ContentService::forgetPage($page->slug);

        return redirect()->route('dashboard.content.edit', ['page' => $page->slug, 'language_id' => $language->id])
            ->with('status', 'Block updated.');
    }

    public function destroyBlock(ContentPage $page, ContentBlock $block, Request $request): RedirectResponse
    {
        abort_unless($block->content_page_id === $page->id, 404);

        $languageId = (int) $request->query('language_id', 0);
        $block->delete();
        ContentService::forgetPage($page->slug);

        return redirect()->route('dashboard.content.edit', ['page' => $page->slug, 'language_id' => $languageId])
            ->with('status', 'Block deleted.');
    }
}
