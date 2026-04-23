@extends('dashboard.layouts.app')

@section('title', 'Site translations')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-semibold tracking-tight text-zinc-900">Site copy</h1>
        <p class="mt-1 text-sm text-zinc-500">Strings shown on the public homepage. Cache refreshes when you save.</p>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">{{ session('status') }}</div>
    @endif

    @if (! $language)
        <p class="text-zinc-500">Add an active language first.</p>
    @else
        <form method="get" action="{{ route('dashboard.translations.index') }}" class="mb-6 flex flex-wrap items-end gap-3">
            <div>
                <label for="language_id" class="mb-1 block text-xs font-medium uppercase tracking-wide text-zinc-500">Language</label>
                <select id="language_id" name="language_id" onchange="this.form.submit()"
                    class="rounded-xl border border-zinc-200 bg-white px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                    @foreach ($languages as $lang)
                        <option value="{{ $lang->id }}" @selected($lang->id === $language->id)>{{ $lang->native_name }} ({{ $lang->code }})</option>
                    @endforeach
                </select>
            </div>
        </form>

        <form action="{{ route('dashboard.translations.update') }}" method="post" class="space-y-8">
            @csrf
            <input type="hidden" name="language_id" value="{{ $language->id }}">

            <div class="rounded-2xl border border-zinc-200/80 bg-white p-6 shadow-sm">
                <h2 class="mb-4 text-sm font-semibold text-zinc-900">Translation keys</h2>
                <div class="max-h-[70vh] space-y-4 overflow-y-auto pr-2">
                    @foreach ($keys as $key)
                        <div>
                            <label for="t-{{ md5($key) }}" class="mb-1 block font-mono text-xs text-zinc-500">{{ $key }}</label>
                            <textarea id="t-{{ md5($key) }}" name="translations[{{ $key }}]" rows="2"
                                class="block w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">{{ old('translations.'.$key, $currentMap[$key] ?? '') }}</textarea>
                        </div>
                    @endforeach
                </div>
                <div class="mt-6 flex justify-end border-t border-zinc-100 pt-6">
                    <button type="submit" class="rounded-xl bg-zinc-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-zinc-800">Save changes</button>
                </div>
            </div>
        </form>

        <div class="mt-8 rounded-2xl border border-dashed border-zinc-300 bg-zinc-50/50 p-6">
            <h2 class="mb-3 text-sm font-semibold text-zinc-900">Add custom key</h2>
            <p class="mb-4 text-xs text-zinc-500">Use dot notation, e.g. <code class="rounded bg-white px-1">hero.new_title</code>. Then use <code class="rounded bg-white px-1">site_t('hero.new_title')</code> in a Blade file.</p>
            <form action="{{ route('dashboard.translations.store-key') }}" method="post" class="flex flex-col gap-3 sm:flex-row sm:items-end">
                @csrf
                <input type="hidden" name="language_id" value="{{ $language->id }}">
                <div class="flex-1">
                    <label class="mb-1 block text-xs font-medium text-zinc-500">Key</label>
                    <input name="key" required pattern="[a-zA-Z0-9._\-]+"
                        class="w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm" placeholder="section.key_name">
                </div>
                <div class="flex-[2]">
                    <label class="mb-1 block text-xs font-medium text-zinc-500">Value</label>
                    <input name="value" class="w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm" placeholder="Optional initial text">
                </div>
                <button type="submit" class="rounded-xl border border-zinc-200 bg-white px-4 py-2 text-sm font-medium text-zinc-800 hover:bg-zinc-50">Add</button>
            </form>
        </div>
    @endif
@endsection
