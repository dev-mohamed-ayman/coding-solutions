<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\ContentBlock;
use App\Models\ContentPage;
use App\Models\ContentTranslation;
use App\Models\Language;
use App\Services\ContentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TestimonialController
{
    private function getHomePageId(): int
    {
        return ContentPage::query()->firstOrCreate(
            ['slug' => 'home'],
            ['name' => 'Homepage', 'is_active' => true]
        )->id;
    }

    public function index(Request $request): View
    {
        $languages = Language::query()->where('is_active', true)->orderBy('sort_order')->orderBy('name')->get();
        $languageId = (int) $request->query('language_id', $languages->first()?->id ?? 0);
        $language = Language::query()->find($languageId) ?? $languages->first();

        $testimonials = ContentBlock::query()
            ->where('zone', 'testimonials.cards')
            ->where('content_page_id', $this->getHomePageId())
            ->with(['translations' => fn ($q) => $q->where('language_id', $language->id ?? 0)])
            ->orderBy('sort_order')
            ->get();

        return view('dashboard.testimonials.index', compact('testimonials', 'languages', 'language'));
    }

    public function create(): View
    {
        $languages = Language::query()->where('is_active', true)->orderBy('sort_order')->get();
        return view('dashboard.testimonials.create', compact('languages'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'image' => ['nullable', 'image', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'translations' => ['required', 'array'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimonials', 'public');
        }

        $block = ContentBlock::create([
            'content_page_id' => $this->getHomePageId(),
            'zone' => 'testimonials.cards',
            'type' => 'testimonial_card',
            'image_path' => $imagePath,
            'is_active' => $request->boolean('is_active', true),
            'sort_order' => $data['sort_order'] ?? 0,
            'payload' => [],
        ]);

        $this->syncTranslations($block, $data['translations']);
        ContentService::forgetPage('home');

        return redirect()->route('dashboard.testimonials.index')->with('status', 'Testimonial added successfully.');
    }

    public function edit(ContentBlock $testimonial): View
    {
        abort_unless($testimonial->zone === 'testimonials.cards', 404);
        
        $languages = Language::query()->where('is_active', true)->orderBy('sort_order')->get();
        
        $translations = [];
        foreach ($languages as $lang) {
            $translations[$lang->id] = $testimonial->translations()->where('language_id', $lang->id)->pluck('value', 'field')->all();
        }

        return view('dashboard.testimonials.edit', compact('testimonial', 'languages', 'translations'));
    }

    public function update(Request $request, ContentBlock $testimonial): RedirectResponse
    {
        abort_unless($testimonial->zone === 'testimonials.cards', 404);

        $data = $request->validate([
            'image' => ['nullable', 'image', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'translations' => ['required', 'array'],
        ]);

        $imagePath = $testimonial->image_path;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->update([
            'image_path' => $imagePath,
            'is_active' => $request->boolean('is_active', true),
            'sort_order' => $data['sort_order'] ?? $testimonial->sort_order,
        ]);

        $this->syncTranslations($testimonial, $data['translations']);
        ContentService::forgetPage('home');

        return redirect()->route('dashboard.testimonials.index')->with('status', 'Testimonial updated successfully.');
    }

    public function destroy(ContentBlock $testimonial): RedirectResponse
    {
        abort_unless($testimonial->zone === 'testimonials.cards', 404);

        if ($testimonial->image_path) {
            Storage::disk('public')->delete($testimonial->image_path);
        }
        
        $testimonial->delete();
        ContentService::forgetPage('home');

        return redirect()->route('dashboard.testimonials.index')->with('status', 'Testimonial deleted.');
    }

    private function syncTranslations(ContentBlock $block, array $translationsData): void
    {
        foreach ($translationsData as $langId => $fields) {
            foreach ($fields as $field => $value) {
                if (is_null($value)) continue;

                ContentTranslation::query()->updateOrCreate(
                    [
                        'language_id' => $langId,
                        'content_block_id' => $block->id,
                        'content_section_id' => null,
                        'field' => $field,
                    ],
                    ['value' => $value]
                );
            }
        }
    }
}
