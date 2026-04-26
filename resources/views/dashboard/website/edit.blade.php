@extends('dashboard.layouts.app')

@section('title', $section['title'])

@section('content')
    <div class="mb-6 flex flex-wrap items-end justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-zinc-900">{{ $section['title'] }}</h1>
            <p class="mt-1 text-sm text-zinc-500">Edit the text content for this section of the website.</p>
        </div>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">{{ session('status') }}</div>
    @endif

    <form method="get" class="mb-6 flex flex-wrap items-end gap-3">
        <div>
            <label for="language_id" class="mb-1 block text-xs font-medium uppercase tracking-wide text-zinc-500">Language</label>
            <div class="flex rounded-xl bg-zinc-100 p-1">
                @foreach ($languages as $lang)
                    <a href="{{ request()->fullUrlWithQuery(['language_id' => $lang->id]) }}" 
                       class="flex items-center justify-center rounded-lg px-4 py-1.5 text-sm font-medium transition-colors {{ $language->id === $lang->id ? 'bg-white text-indigo-700 shadow-sm ring-1 ring-zinc-900/5' : 'text-zinc-500 hover:text-zinc-900' }}">
                        {{ $lang->native_name }}
                    </a>
                @endforeach
            </div>
        </div>
    </form>

    <form action="{{ route('dashboard.website.update', ['section' => $sectionKey]) }}" method="post" class="space-y-6">
        @csrf
        <input type="hidden" name="language_id" value="{{ $language->id }}">

        <div class="rounded-2xl border border-zinc-200/80 bg-white shadow-sm overflow-hidden">
            <div class="border-b border-zinc-100 bg-zinc-50/50 px-5 py-4">
                <h2 class="text-sm font-semibold text-zinc-900">Translation Fields</h2>
            </div>
            <div class="p-5 space-y-4">
                @foreach ($section['keys'] as $key => $label)
                    <div>
                        <label for="t-{{ md5($key) }}" class="mb-1 block text-sm font-medium text-zinc-700">{{ $label }}</label>
                        <p class="mb-2 font-mono text-[10px] text-zinc-400">{{ $key }}</p>
                        @if (str_contains(strtolower($label), 'body') || str_contains(strtolower($label), 'description') || str_contains(strtolower($label), 'intro'))
                            <textarea id="t-{{ md5($key) }}" name="translations[{{ $key }}]" rows="3"
                                class="block w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20"
                                >{{ old('translations.'.$key, $currentMap[$key] ?? '') }}</textarea>
                        @else
                            <input type="text" id="t-{{ md5($key) }}" name="translations[{{ $key }}]" 
                                value="{{ old('translations.'.$key, $currentMap[$key] ?? '') }}"
                                class="block w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="bg-zinc-50/50 px-5 py-4 flex justify-end border-t border-zinc-100">
                <button type="submit" class="rounded-xl bg-zinc-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-zinc-800 transition-colors shadow-sm">
                    Save Changes
                </button>
            </div>
        </div>
    </form>
@endsection
