<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Language;
use App\Services\SiteTranslationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class LanguageController
{
    public function index(): View
    {
        $languages = Language::query()->orderBy('sort_order')->orderBy('name')->get();

        return view('dashboard.languages.index', compact('languages'));
    }

    public function create(): View
    {
        return view('dashboard.languages.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedLanguage($request);
        if ($data['is_default']) {
            Language::query()->update(['is_default' => false]);
        }
        Language::query()->create($data);
        SiteTranslationService::flushAll();

        return redirect()->route('dashboard.languages.index')->with('status', 'Language created.');
    }

    public function edit(Language $language): View
    {
        return view('dashboard.languages.edit', compact('language'));
    }

    public function update(Request $request, Language $language): RedirectResponse
    {
        $previousCode = $language->code;
        $data = $this->validatedLanguage($request, $language->id);
        if ($data['is_default']) {
            Language::query()->whereKeyNot($language->id)->update(['is_default' => false]);
        }
        $language->update($data);
        if ($previousCode !== $language->code) {
            SiteTranslationService::forgetLocale($previousCode);
        }
        SiteTranslationService::flushAll();

        return redirect()->route('dashboard.languages.index')->with('status', 'Language updated.');
    }

    public function destroy(Language $language): RedirectResponse
    {
        if ($language->is_default) {
            return redirect()->route('dashboard.languages.index')->with('error', 'Set another language as default before deleting.');
        }
        $code = $language->code;
        $language->delete();
        SiteTranslationService::forgetLocale($code);
        SiteTranslationService::flushAll();

        return redirect()->route('dashboard.languages.index')->with('status', 'Language removed.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedLanguage(Request $request, ?int $ignoreId = null): array
    {
        $data = $request->validate([
            'code' => [
                'required',
                'string',
                'max:16',
                'regex:/^[a-z]{2}(-[a-z0-9]{2,8})?$/i',
                Rule::unique('languages', 'code')->ignore($ignoreId),
            ],
            'name' => ['required', 'string', 'max:120'],
            'native_name' => ['required', 'string', 'max:120'],
            'direction' => ['required', Rule::in(['ltr', 'rtl'])],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:65535'],
        ]);
        $data['is_active'] = $request->boolean('is_active');
        $data['is_default'] = $request->boolean('is_default');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
