@extends('dashboard.layouts.app')

@section('title', 'Projects')

@section('content')
    <div class="mb-6 flex flex-wrap items-end justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-zinc-900">Projects</h1>
            <p class="mt-1 text-sm text-zinc-500">Manage the projects displayed on the homepage.</p>
        </div>
        <a href="{{ route('dashboard.projects.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-zinc-900 px-4 py-2 text-sm font-semibold text-white shadow-md shadow-zinc-900/10 transition hover:bg-zinc-800">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add Project
        </a>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">{{ session('status') }}</div>
    @endif

    <div class="mb-6">
        <div class="flex rounded-xl bg-zinc-100 p-1 w-max">
            @foreach ($languages as $lang)
                <a href="{{ request()->fullUrlWithQuery(['language_id' => $lang->id]) }}" 
                   class="flex items-center justify-center rounded-lg px-4 py-1.5 text-sm font-medium transition-colors {{ $language->id === $lang->id ? 'bg-white text-indigo-700 shadow-sm ring-1 ring-zinc-900/5' : 'text-zinc-500 hover:text-zinc-900' }}">
                    {{ $lang->native_name }}
                </a>
            @endforeach
        </div>
    </div>

    <div class="rounded-2xl border border-zinc-200/80 bg-white shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-zinc-100 bg-zinc-50/80 text-xs font-medium uppercase tracking-wide text-zinc-500">
                        <th class="px-5 py-3 w-16">Sort</th>
                        <th class="px-5 py-3 w-20">Image</th>
                        <th class="px-5 py-3">Project Title</th>
                        <th class="px-5 py-3">Tech</th>
                        <th class="px-5 py-3 w-24">Status</th>
                        <th class="px-5 py-3 w-20 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100 text-zinc-700">
                    @forelse ($projects as $project)
                        <tr class="transition-colors hover:bg-zinc-50/80">
                            <td class="px-5 py-3.5">{{ $project->sort_order }}</td>
                            <td class="px-5 py-3.5">
                                @if ($project->image_path)
                                    <img src="{{ Storage::url($project->image_path) }}" alt="Project image" class="h-10 w-10 rounded-lg object-cover border border-zinc-200">
                                @elseif(isset($project->payload['image_url']))
                                    <img src="{{ $project->payload['image_url'] }}" alt="Project image" class="h-10 w-10 rounded-lg object-cover border border-zinc-200">
                                @else
                                    <div class="h-10 w-10 rounded-lg bg-zinc-100 border border-zinc-200 flex items-center justify-center">
                                        <svg class="h-5 w-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    </div>
                                @endif
                            </td>
                            <td class="px-5 py-3.5 font-medium text-zinc-900">
                                {{ $project->translations->firstWhere('field', 'title')?->value ?: 'No title' }}
                            </td>
                            <td class="px-5 py-3.5">
                                <div class="flex flex-wrap gap-1">
                                    @foreach($project->payload['tech'] ?? [] as $tech)
                                        <span class="rounded bg-zinc-100 px-1.5 py-0.5 text-[10px] font-medium text-zinc-600">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-5 py-3.5">
                                @if($project->is_active)
                                    <span class="rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-medium text-emerald-800">Active</span>
                                @else
                                    <span class="rounded-full bg-zinc-100 px-2.5 py-0.5 text-xs font-medium text-zinc-600">Hidden</span>
                                @endif
                            </td>
                            <td class="px-5 py-3.5 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('dashboard.projects.edit', $project) }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">Edit</a>
                                    <form action="{{ route('dashboard.projects.destroy', $project) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-rose-600 hover:text-rose-900 text-sm font-medium">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-8 text-center text-zinc-500">No projects found. Add one to get started.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
