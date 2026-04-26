@extends('dashboard.layouts.app')

@section('title', 'Add Project')

@section('content')
    <div class="mb-6">
        <a href="{{ route('dashboard.projects.index') }}" class="text-sm text-indigo-600 hover:text-indigo-500">← Back to Projects</a>
        <h1 class="mt-1 text-2xl font-semibold tracking-tight text-zinc-900">Add Project</h1>
    </div>

    @if ($errors->any())
        <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.projects.store') }}" method="post" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                @foreach ($languages as $index => $lang)
                    <div class="rounded-2xl border border-zinc-200/80 bg-white shadow-sm overflow-hidden">
                        <div class="border-b border-zinc-100 bg-zinc-50/50 px-5 py-3">
                            <h2 class="text-sm font-semibold text-zinc-900 flex items-center gap-2">
                                <span class="uppercase text-xs font-bold text-zinc-500">{{ $lang->code }}</span>
                                {{ $lang->name }} Translations
                            </h2>
                        </div>
                        <div class="p-5 space-y-4">
                            <div>
                                <label class="mb-1 block text-sm font-medium text-zinc-700">Project Title</label>
                                <input type="text" name="translations[{{ $lang->id }}][title]" required
                                    value="{{ old('translations.'.$lang->id.'.title') }}"
                                    class="block w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                            </div>
                            <div>
                                <label class="mb-1 block text-sm font-medium text-zinc-700">Description</label>
                                <textarea name="translations[{{ $lang->id }}][body]" rows="3" required
                                    class="block w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20"
                                    >{{ old('translations.'.$lang->id.'.body') }}</textarea>
                            </div>
                            <div>
                                <label class="mb-1 block text-sm font-medium text-zinc-700">Image Alt Text</label>
                                <input type="text" name="translations[{{ $lang->id }}][alt]"
                                    value="{{ old('translations.'.$lang->id.'.alt') }}"
                                    class="block w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                            </div>
                            <div>
                                <label class="mb-1 block text-sm font-medium text-zinc-700">Tag (e.g. E-Commerce)</label>
                                <input type="text" name="translations[{{ $lang->id }}][tag]"
                                    value="{{ old('translations.'.$lang->id.'.tag') }}"
                                    class="block w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="space-y-6">
                <div class="rounded-2xl border border-zinc-200/80 bg-white shadow-sm overflow-hidden">
                    <div class="border-b border-zinc-100 bg-zinc-50/50 px-5 py-3">
                        <h2 class="text-sm font-semibold text-zinc-900">Project Details</h2>
                    </div>
                    <div class="p-5 space-y-4">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-zinc-700">Project Image</label>
                            <input type="file" name="image" accept="image/*"
                                class="block w-full text-sm text-zinc-500 file:mr-4 file:rounded-full file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100">
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium text-zinc-700">Technologies</label>
                            <input type="text" name="tech" value="{{ old('tech') }}" placeholder="Laravel, Vue.js, Tailwind"
                                class="block w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                            <p class="mt-1 text-xs text-zinc-500">Comma separated list</p>
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium text-zinc-700">Sort Order</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                                class="block w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                        </div>
                        <div class="pt-2">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" class="rounded border-zinc-300 text-indigo-600 focus:ring-indigo-500" checked>
                                <span class="text-sm font-medium text-zinc-700">Active (Visible on website)</span>
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full rounded-xl bg-zinc-900 px-5 py-3 text-sm font-semibold text-white hover:bg-zinc-800 transition-colors shadow-sm">
                    Create Project
                </button>
            </div>
        </div>
    </form>
@endsection
