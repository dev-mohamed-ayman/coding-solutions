@extends('dashboard.layouts.app')

@section('title', 'Edit Content')

@section('content')
    <div class="mb-6 flex flex-wrap items-end justify-between gap-3">
        <div>
            <a href="{{ route('dashboard.content.index') }}" class="text-sm text-indigo-600 hover:text-indigo-500">← Content Hub</a>
            <h1 class="mt-1 text-2xl font-semibold tracking-tight text-zinc-900">{{ $page->name }}</h1>
            <p class="text-sm text-zinc-500">Edit sections and blocks for this page.</p>
        </div>
    </div>

    @if (session('status'))
        <div class="mb-4 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">{{ session('status') }}</div>
    @endif

    <form method="get" class="mb-6 flex flex-wrap items-end gap-3">
        <div>
            <label for="language_id" class="mb-1 block text-xs font-medium uppercase tracking-wide text-zinc-500">Language</label>
            <select id="language_id" name="language_id" onchange="this.form.submit()"
                class="rounded-xl border border-zinc-200 bg-white px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                @foreach ($languages as $lang)
                    <option value="{{ $lang->id }}" @selected($language && $lang->id === $language->id)>
                        {{ $lang->native_name }} ({{ $lang->code }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="flex-1 min-w-[220px]">
            <label for="q" class="mb-1 block text-xs font-medium uppercase tracking-wide text-zinc-500">Search keys</label>
            <input id="q" name="q" value="{{ $search }}"
                class="w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20"
                placeholder="projects, nav, contact...">
        </div>
        <button class="rounded-xl border border-zinc-200 bg-white px-4 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-50" type="submit">
            Filter
        </button>
    </form>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
        <div class="space-y-5 xl:col-span-2">
            @foreach ($sections as $section)
                @php
                    $fields = $section->schema['fields'] ?? [];
                @endphp
                <div class="rounded-2xl border border-zinc-200/80 bg-white p-5 shadow-sm">
                    <h2 class="text-sm font-semibold uppercase tracking-wide text-zinc-500">{{ $section->title }}</h2>
                    <p class="mt-1 font-mono text-xs text-zinc-400">{{ $section->section_key }}</p>
                    <form action="{{ route('dashboard.content.sections.update', ['page' => $page->slug, 'section' => $section->id]) }}" method="post" class="mt-4 space-y-3">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="language_id" value="{{ $language?->id }}">
                        @foreach ($fields as $field)
                            <div>
                                <label class="mb-1 block font-mono text-xs text-zinc-500">{{ $field }}</label>
                                <textarea name="fields[{{ $field }}]" rows="2"
                                    class="w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">{{ old('fields.'.$field, $sectionValues[$field] ?? '') }}</textarea>
                            </div>
                        @endforeach
                        <div class="pt-2">
                            <button type="submit" class="rounded-xl bg-zinc-900 px-4 py-2 text-sm font-semibold text-white hover:bg-zinc-800">
                                Save {{ $section->title }}
                            </button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="space-y-5">
            <div class="rounded-2xl border border-zinc-200/80 bg-white p-5 shadow-sm">
                <h2 class="text-sm font-semibold text-zinc-900">Add block</h2>
                <p class="mt-1 text-xs text-zinc-500">Use blocks for repeatable content areas.</p>
                <form action="{{ route('dashboard.content.blocks.store', ['page' => $page->slug]) }}" method="post" class="mt-4 space-y-3">
                    @csrf
                    <input type="hidden" name="language_id" value="{{ $language?->id }}">
                    <input name="zone" required class="w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm" placeholder="zone (e.g. projects.cards)">
                    <input name="type" required class="w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm" placeholder="type (e.g. project_card)">
                    <input name="sort_order" type="number" min="0" class="w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm" placeholder="Sort order">
                    <input name="fields[title]" class="w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm" placeholder="Title">
                    <textarea name="fields[body]" rows="2" class="w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm" placeholder="Body"></textarea>
                    <input name="fields[tag]" class="w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm" placeholder="Tag">
                    <input name="payload[image_url]" class="w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm" placeholder="Image URL">
                    <input name="payload[tech]" class="w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm" placeholder="Tech list comma separated">
                    <button type="submit" class="w-full rounded-xl bg-zinc-900 px-4 py-2 text-sm font-semibold text-white hover:bg-zinc-800">Add block</button>
                </form>
            </div>

            @foreach ($blocks as $zone => $zoneBlocks)
                <div class="rounded-2xl border border-zinc-200/80 bg-white p-5 shadow-sm">
                    <h3 class="text-sm font-semibold text-zinc-900">{{ $zone }}</h3>
                    <div class="mt-3 space-y-3">
                        @foreach ($zoneBlocks as $block)
                            <details class="rounded-xl border border-zinc-200 p-3">
                                <summary class="cursor-pointer text-sm font-medium text-zinc-700">
                                    #{{ $block->sort_order }} {{ $block->type }}
                                </summary>
                                <form action="{{ route('dashboard.content.blocks.update', ['page' => $page->slug, 'block' => $block->id]) }}" method="post" class="mt-3 space-y-2">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="language_id" value="{{ $language?->id }}">
                                    <input name="zone" value="{{ $block->zone }}" class="w-full rounded-lg border border-zinc-200 px-2 py-1.5 text-xs">
                                    <input name="type" value="{{ $block->type }}" class="w-full rounded-lg border border-zinc-200 px-2 py-1.5 text-xs">
                                    <input name="sort_order" type="number" value="{{ $block->sort_order }}" class="w-full rounded-lg border border-zinc-200 px-2 py-1.5 text-xs">
                                    <input name="fields[title]" value="{{ $block->translations->firstWhere('field', 'title')?->value }}" class="w-full rounded-lg border border-zinc-200 px-2 py-1.5 text-xs" placeholder="Title">
                                    <textarea name="fields[body]" rows="2" class="w-full rounded-lg border border-zinc-200 px-2 py-1.5 text-xs" placeholder="Body">{{ $block->translations->firstWhere('field', 'body')?->value }}</textarea>
                                    <input name="fields[tag]" value="{{ $block->translations->firstWhere('field', 'tag')?->value }}" class="w-full rounded-lg border border-zinc-200 px-2 py-1.5 text-xs" placeholder="Tag">
                                    <input name="payload[image_url]" value="{{ $block->payload['image_url'] ?? '' }}" class="w-full rounded-lg border border-zinc-200 px-2 py-1.5 text-xs" placeholder="Image URL">
                                    <input name="payload[tech]" value="{{ implode(', ', $block->payload['tech'] ?? []) }}" class="w-full rounded-lg border border-zinc-200 px-2 py-1.5 text-xs" placeholder="Tech list">
                                    <label class="inline-flex items-center gap-2 text-xs text-zinc-600">
                                        <input type="checkbox" name="is_active" value="1" class="rounded border-zinc-300" @checked($block->is_active)>
                                        Active
                                    </label>
                                    <div class="flex items-center gap-2">
                                        <button type="submit" class="rounded-lg bg-zinc-900 px-3 py-1.5 text-xs font-semibold text-white">Update</button>
                                        <a class="rounded-lg border border-zinc-200 px-3 py-1.5 text-xs text-zinc-700" target="_blank"
                                            href="{{ route('home') }}">Preview</a>
                                    </div>
                                </form>
                                <form action="{{ route('dashboard.content.blocks.destroy', ['page' => $page->slug, 'block' => $block->id, 'language_id' => $language?->id]) }}" method="post" class="mt-2" onsubmit="return confirm('Delete this block?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-medium text-rose-600 hover:text-rose-500">Delete block</button>
                                </form>
                            </details>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
