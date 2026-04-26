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

class ProjectController
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

        $projects = ContentBlock::query()
            ->where('zone', 'projects.cards')
            ->where('content_page_id', $this->getHomePageId())
            ->with(['translations' => fn ($q) => $q->where('language_id', $language->id ?? 0)])
            ->orderBy('sort_order')
            ->get();

        return view('dashboard.projects.index', compact('projects', 'languages', 'language'));
    }

    public function create(): View
    {
        $languages = Language::query()->where('is_active', true)->orderBy('sort_order')->get();
        return view('dashboard.projects.create', compact('languages'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'image' => ['nullable', 'image', 'max:2048'],
            'tech' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'translations' => ['required', 'array'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        $block = ContentBlock::create([
            'content_page_id' => $this->getHomePageId(),
            'zone' => 'projects.cards',
            'type' => 'project_card',
            'image_path' => $imagePath,
            'is_active' => $request->boolean('is_active', true),
            'sort_order' => $data['sort_order'] ?? 0,
            'payload' => [
                'tech' => array_values(array_filter(array_map('trim', explode(',', (string) ($data['tech'] ?? ''))))),
            ],
        ]);

        $this->syncTranslations($block, $data['translations']);
        ContentService::forgetPage('home');

        return redirect()->route('dashboard.projects.index')->with('status', 'Project created successfully.');
    }

    public function edit(ContentBlock $project): View
    {
        abort_unless($project->zone === 'projects.cards', 404);
        
        $languages = Language::query()->where('is_active', true)->orderBy('sort_order')->get();
        
        $translations = [];
        foreach ($languages as $lang) {
            $translations[$lang->id] = $project->translations()->where('language_id', $lang->id)->pluck('value', 'field')->all();
        }

        return view('dashboard.projects.edit', compact('project', 'languages', 'translations'));
    }

    public function update(Request $request, ContentBlock $project): RedirectResponse
    {
        abort_unless($project->zone === 'projects.cards', 404);

        $data = $request->validate([
            'image' => ['nullable', 'image', 'max:2048'],
            'tech' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'translations' => ['required', 'array'],
        ]);

        $imagePath = $project->image_path;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        $project->update([
            'image_path' => $imagePath,
            'is_active' => $request->boolean('is_active', true),
            'sort_order' => $data['sort_order'] ?? $project->sort_order,
            'payload' => [
                'tech' => array_values(array_filter(array_map('trim', explode(',', (string) ($data['tech'] ?? ''))))),
            ],
        ]);

        $this->syncTranslations($project, $data['translations']);
        ContentService::forgetPage('home');

        return redirect()->route('dashboard.projects.index')->with('status', 'Project updated successfully.');
    }

    public function destroy(ContentBlock $project): RedirectResponse
    {
        abort_unless($project->zone === 'projects.cards', 404);

        if ($project->image_path) {
            Storage::disk('public')->delete($project->image_path);
        }
        
        $project->delete();
        ContentService::forgetPage('home');

        return redirect()->route('dashboard.projects.index')->with('status', 'Project deleted.');
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
