<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Language;
use App\Models\SiteTranslation;
use App\Services\SiteTranslationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteTranslationController
{
    public function index(Request $request): View
    {
        $languages = Language::query()->where('is_active', true)->orderBy('sort_order')->orderBy('name')->get();
        $languageId = (int) $request->query('language_id', $languages->first()?->id ?? 0);
        $language = Language::query()->find($languageId) ?? $languages->first();

        $defaultLanguage = Language::defaultLanguage();
        $defaultKeys = $defaultLanguage
            ? SiteTranslation::query()->where('language_id', $defaultLanguage->id)->pluck('key')->all()
            : [];

        $currentMap = $language
            ? SiteTranslation::query()->where('language_id', $language->id)->pluck('value', 'key')->all()
            : [];

        $keys = array_values(array_unique([...$defaultKeys, ...array_keys($currentMap)]));
        sort($keys);

        return view('dashboard.translations.index', [
            'languages' => $languages,
            'language' => $language,
            'keys' => $keys,
            'currentMap' => $currentMap,
            'defaultLanguage' => $defaultLanguage,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'language_id' => ['required', 'exists:languages,id'],
            'translations' => ['nullable', 'array'],
            'translations.*' => ['nullable', 'string'],
        ]);

        $language = Language::query()->findOrFail($data['language_id']);
        $translations = $data['translations'] ?? [];

        foreach ($translations as $key => $value) {
            if (! is_string($key) || $key === '') {
                continue;
            }
            SiteTranslation::query()->updateOrCreate(
                ['language_id' => $language->id, 'key' => $key],
                ['value' => $value]
            );
        }

        SiteTranslationService::forgetLocale($language->code);

        return redirect()
            ->route('dashboard.translations.index', ['language_id' => $language->id])
            ->with('status', 'Translations saved.');
    }

    public function storeKey(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'language_id' => ['required', 'exists:languages,id'],
            'key' => ['required', 'string', 'max:190', 'regex:/^[a-z0-9._-]+$/i'],
            'value' => ['nullable', 'string'],
        ]);

        $language = Language::query()->findOrFail($data['language_id']);

        SiteTranslation::query()->updateOrCreate(
            ['language_id' => $language->id, 'key' => $data['key']],
            ['value' => $data['value'] ?? '']
        );

        SiteTranslationService::forgetLocale($language->code);

        return redirect()
            ->route('dashboard.translations.index', ['language_id' => $language->id])
            ->with('status', 'Translation key added.');
    }
}
