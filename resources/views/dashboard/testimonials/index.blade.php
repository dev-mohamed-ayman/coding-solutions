@extends('dashboard.layouts.app')

@section('title', 'Testimonials')

@section('content')
    <div class="mb-6 flex flex-wrap items-end justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-zinc-900">Testimonials</h1>
            <p class="mt-1 text-sm text-zinc-500">Manage client testimonials displayed on the homepage.</p>
        </div>
        <a href="{{ route('dashboard.testimonials.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-zinc-900 px-4 py-2 text-sm font-semibold text-white shadow-md shadow-zinc-900/10 transition hover:bg-zinc-800">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add Testimonial
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

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($testimonials as $testimonial)
            <div class="rounded-2xl border border-zinc-200/80 bg-white shadow-sm overflow-hidden flex flex-col">
                <div class="p-5 flex-1 space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="text-xs font-semibold text-zinc-400">Order: {{ $testimonial->sort_order }}</div>
                        @if($testimonial->is_active)
                            <span class="rounded-full bg-emerald-50 px-2.5 py-0.5 text-[10px] font-bold uppercase tracking-wider text-emerald-700">Active</span>
                        @else
                            <span class="rounded-full bg-zinc-100 px-2.5 py-0.5 text-[10px] font-bold uppercase tracking-wider text-zinc-600">Hidden</span>
                        @endif
                    </div>
                    <blockquote class="text-sm italic text-zinc-600 border-l-2 border-indigo-200 pl-3">
                        "{{ $testimonial->translations->firstWhere('field', 'quote')?->value ?: 'No quote provided' }}"
                    </blockquote>
                    <div class="flex items-center gap-3 pt-2">
                        @if ($testimonial->image_path)
                            <img src="{{ Storage::url($testimonial->image_path) }}" alt="Avatar" class="h-10 w-10 rounded-full object-cover ring-2 ring-white">
                        @else
                            <div class="h-10 w-10 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-500 font-bold text-sm">
                                {{ substr($testimonial->translations->firstWhere('field', 'name')?->value ?: 'U', 0, 1) }}
                            </div>
                        @endif
                        <div>
                            <div class="text-sm font-bold text-zinc-900">{{ $testimonial->translations->firstWhere('field', 'name')?->value ?: 'Unknown Name' }}</div>
                            <div class="text-xs text-zinc-500">{{ $testimonial->translations->firstWhere('field', 'role')?->value ?: 'Unknown Role' }}</div>
                        </div>
                    </div>
                </div>
                <div class="bg-zinc-50/80 px-5 py-3 border-t border-zinc-100 flex items-center justify-end gap-3">
                    <a href="{{ route('dashboard.testimonials.edit', $testimonial) }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">Edit</a>
                    <form action="{{ route('dashboard.testimonials.destroy', $testimonial) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-rose-600 hover:text-rose-900 text-sm font-medium">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full rounded-2xl border border-zinc-200 border-dashed bg-zinc-50 py-12 text-center">
                <svg class="mx-auto h-12 w-12 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                <h3 class="mt-2 text-sm font-semibold text-zinc-900">No testimonials</h3>
                <p class="mt-1 text-sm text-zinc-500">Get started by creating a new testimonial.</p>
                <div class="mt-6">
                    <a href="{{ route('dashboard.testimonials.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Add Testimonial
                    </a>
                </div>
            </div>
        @endforelse
    </div>
@endsection
