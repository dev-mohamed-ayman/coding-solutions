@extends('dashboard.layouts.app')

@section('title', 'Languages')

@section('content')
    <div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-zinc-900">Languages</h1>
            <p class="mt-1 text-sm text-zinc-500">Enable locales for the public site and set the default.</p>
        </div>
        <a href="{{ route('dashboard.languages.create') }}"
            class="inline-flex items-center justify-center rounded-xl bg-zinc-900 px-4 py-2.5 text-sm font-semibold text-white shadow-md hover:bg-zinc-800">
            Add language
        </a>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">{{ session('status') }}</div>
    @endif
    @if (session('error'))
        <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800">{{ session('error') }}</div>
    @endif

    <div class="overflow-hidden rounded-2xl border border-zinc-200/80 bg-white shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="border-b border-zinc-100 bg-zinc-50/80 text-xs font-medium uppercase tracking-wide text-zinc-500">
                <tr>
                    <th class="px-5 py-3">Code</th>
                    <th class="px-5 py-3">Name</th>
                    <th class="px-5 py-3">Native</th>
                    <th class="px-5 py-3">Dir</th>
                    <th class="px-5 py-3">Status</th>
                    <th class="px-5 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-100">
                @forelse ($languages as $language)
                    <tr class="hover:bg-zinc-50/80">
                        <td class="px-5 py-3.5 font-mono text-xs font-semibold text-zinc-900">{{ $language->code }}</td>
                        <td class="px-5 py-3.5 text-zinc-700">{{ $language->name }}</td>
                        <td class="px-5 py-3.5 text-zinc-700">{{ $language->native_name }}</td>
                        <td class="px-5 py-3.5 uppercase text-zinc-500">{{ $language->direction }}</td>
                        <td class="px-5 py-3.5">
                            @if ($language->is_default)
                                <span class="rounded-full bg-indigo-100 px-2 py-0.5 text-xs font-medium text-indigo-800">Default</span>
                            @endif
                            @if (! $language->is_active)
                                <span class="ml-1 rounded-full bg-zinc-200 px-2 py-0.5 text-xs font-medium text-zinc-700">Off</span>
                            @elseif (! $language->is_default)
                                <span class="ml-1 rounded-full bg-emerald-50 px-2 py-0.5 text-xs font-medium text-emerald-800">Active</span>
                            @endif
                        </td>
                        <td class="px-5 py-3.5 text-right">
                            <a href="{{ route('dashboard.languages.edit', $language) }}" class="font-medium text-indigo-600 hover:text-indigo-500">Edit</a>
                            <form action="{{ route('dashboard.languages.destroy', $language) }}" method="post" class="ml-3 inline" onsubmit="return confirm('Delete this language and all its translations?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-rose-600 hover:text-rose-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-5 py-10 text-center text-zinc-500">No languages yet. Run migrations and seeders, or add one.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
