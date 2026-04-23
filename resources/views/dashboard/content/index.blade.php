@extends('dashboard.layouts.app')

@section('title', 'Content Hub')

@section('content')
    <div class="mb-8 flex flex-col gap-2">
        <h1 class="text-2xl font-semibold tracking-tight text-zinc-900">Content Hub</h1>
        <p class="text-sm text-zinc-500">Manage all public-page content in one organized place.</p>
    </div>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        @foreach ($pages as $page)
            <a href="{{ route('dashboard.content.edit', $page->slug) }}"
                class="rounded-2xl border border-zinc-200/80 bg-white p-5 shadow-sm transition hover:border-indigo-200 hover:shadow">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <h2 class="text-lg font-semibold text-zinc-900">{{ $page->name }}</h2>
                        <p class="mt-1 font-mono text-xs text-zinc-500">{{ $page->slug }}</p>
                    </div>
                    <span class="rounded-full bg-zinc-100 px-2.5 py-1 text-xs font-medium text-zinc-700">
                        {{ $page->is_active ? 'Active' : 'Disabled' }}
                    </span>
                </div>
                <div class="mt-4 flex items-center gap-4 text-xs text-zinc-500">
                    <span>{{ $page->sections_count }} sections</span>
                    <span>{{ $page->blocks_count }} blocks</span>
                </div>
            </a>
        @endforeach
    </div>
@endsection
