<?php

namespace App\Http\Controllers\Web;

use App\Models\ContentBlock;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController
{
    public function index(Request $request): View
    {
        $locale = app()->getLocale();
        $language = Language::where('code', $locale)->first() ?? Language::where('is_active', true)->first();

        $query = ContentBlock::query()
            ->where('zone', 'projects.cards')
            ->where('is_active', true)
            ->with(['translations' => fn ($q) => $q->where('language_id', $language->id)]);

        if ($request->filled('tech')) {
            $query->whereJsonContains('payload->tech', $request->tech);
        }

        $projects = $query->orderBy('sort_order')->get();

        // Get all unique technologies for filter
        $allTechs = ContentBlock::where('zone', 'projects.cards')
            ->where('is_active', true)
            ->get()
            ->pluck('payload.tech')
            ->flatten()
            ->unique()
            ->filter()
            ->values();

        return view('web.projects.index', compact('projects', 'allTechs', 'language'));
    }

    public function show(ContentBlock $project): View
    {
        abort_unless($project->zone === 'projects.cards' && $project->is_active, 404);

        $locale = app()->getLocale();
        $language = Language::where('code', $locale)->first() ?? Language::where('is_active', true)->first();

        $project->load(['translations' => fn ($q) => $q->where('language_id', $language->id)]);
        
        $translations = $project->translations->pluck('value', 'field');

        return view('web.projects.show', compact('project', 'translations', 'language'));
    }
}
