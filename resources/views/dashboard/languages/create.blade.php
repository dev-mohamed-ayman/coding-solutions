@extends('dashboard.layouts.app')

@section('title', 'Add language')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-semibold tracking-tight text-zinc-900">Add language</h1>
        <p class="mt-1 text-sm text-zinc-500">Use a short code like <code class="rounded bg-zinc-100 px-1">en</code> or <code class="rounded bg-zinc-100 px-1">ar</code>.</p>
    </div>

    <div class="max-w-xl rounded-2xl border border-zinc-200/80 bg-white p-8 shadow-sm">
        <form action="{{ route('dashboard.languages.store') }}" method="post" class="space-y-5">
            @csrf
            <div>
                <label for="code" class="mb-1.5 block text-sm font-medium text-zinc-700">Code</label>
                <input id="code" name="code" value="{{ old('code') }}" required
                    class="block w-full rounded-xl border border-zinc-200 px-4 py-2.5 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 @error('code') border-rose-300 @enderror">
                @error('code')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="name" class="mb-1.5 block text-sm font-medium text-zinc-700">English name</label>
                <input id="name" name="name" value="{{ old('name') }}" required
                    class="block w-full rounded-xl border border-zinc-200 px-4 py-2.5 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                @error('name')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="native_name" class="mb-1.5 block text-sm font-medium text-zinc-700">Native name</label>
                <input id="native_name" name="native_name" value="{{ old('native_name') }}" required
                    class="block w-full rounded-xl border border-zinc-200 px-4 py-2.5 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                @error('native_name')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="direction" class="mb-1.5 block text-sm font-medium text-zinc-700">Text direction</label>
                <select id="direction" name="direction"
                    class="block w-full rounded-xl border border-zinc-200 px-4 py-2.5 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                    <option value="ltr" @selected(old('direction', 'ltr') === 'ltr')>LTR</option>
                    <option value="rtl" @selected(old('direction') === 'rtl')>RTL</option>
                </select>
            </div>
            <div>
                <label for="sort_order" class="mb-1.5 block text-sm font-medium text-zinc-700">Sort order</label>
                <input id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', 0) }}"
                    class="block w-full rounded-xl border border-zinc-200 px-4 py-2.5 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
            </div>
            <div class="flex items-center gap-2">
                <input id="is_active" name="is_active" type="checkbox" value="1" class="rounded border-zinc-300 text-indigo-600 focus:ring-indigo-500/30" @checked(old('is_active', true))>
                <label for="is_active" class="text-sm text-zinc-700">Active on site</label>
            </div>
            <div class="flex items-center gap-2">
                <input id="is_default" name="is_default" type="checkbox" value="1" class="rounded border-zinc-300 text-indigo-600 focus:ring-indigo-500/30" @checked(old('is_default'))>
                <label for="is_default" class="text-sm text-zinc-700">Default language</label>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="rounded-xl bg-zinc-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-zinc-800">Save</button>
                <a href="{{ route('dashboard.languages.index') }}" class="rounded-xl border border-zinc-200 px-4 py-2.5 text-sm font-medium text-zinc-700 hover:bg-zinc-50">Cancel</a>
            </div>
        </form>
    </div>
@endsection
