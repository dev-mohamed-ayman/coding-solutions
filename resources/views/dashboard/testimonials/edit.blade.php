@extends('dashboard.layouts.app')

@section('title', 'Edit Testimonial')

@section('content')
    <div class="mb-6">
        <a href="{{ route('dashboard.testimonials.index') }}" class="text-sm text-indigo-600 hover:text-indigo-500">← Back to Testimonials</a>
        <h1 class="mt-1 text-2xl font-semibold tracking-tight text-zinc-900">Edit Testimonial</h1>
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

    <form action="{{ route('dashboard.testimonials.update', $testimonial) }}" method="post" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

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
                                <label class="mb-1 block text-sm font-medium text-zinc-700">Client Name</label>
                                <input type="text" name="translations[{{ $lang->id }}][name]" required
                                    value="{{ old('translations.'.$lang->id.'.name', $translations[$lang->id]['name'] ?? '') }}"
                                    class="block w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                            </div>
                            <div>
                                <label class="mb-1 block text-sm font-medium text-zinc-700">Client Role/Company</label>
                                <input type="text" name="translations[{{ $lang->id }}][role]" required
                                    value="{{ old('translations.'.$lang->id.'.role', $translations[$lang->id]['role'] ?? '') }}"
                                    class="block w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                            </div>
                            <div>
                                <label class="mb-1 block text-sm font-medium text-zinc-700">Testimonial Quote</label>
                                <textarea name="translations[{{ $lang->id }}][quote]" rows="4" required
                                    class="block w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20"
                                    >{{ old('translations.'.$lang->id.'.quote', $translations[$lang->id]['quote'] ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="space-y-6">
                <div class="rounded-2xl border border-zinc-200/80 bg-white shadow-sm overflow-hidden">
                    <div class="border-b border-zinc-100 bg-zinc-50/50 px-5 py-3">
                        <h2 class="text-sm font-semibold text-zinc-900">Details</h2>
                    </div>
                    <div class="p-5 space-y-4">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-zinc-700">Client Photo (Optional)</label>
                            @if ($testimonial->image_path)
                                <div class="mb-3">
                                    <img src="{{ Storage::url($testimonial->image_path) }}" alt="Current image" class="h-16 w-16 object-cover rounded-full border-2 border-white ring-1 ring-zinc-200">
                                </div>
                            @endif
                            <input type="file" name="image" accept="image/*"
                                class="block w-full text-sm text-zinc-500 file:mr-4 file:rounded-full file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100">
                            <p class="mt-1 text-xs text-zinc-500">Leave empty to keep current image</p>
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium text-zinc-700">Sort Order</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order) }}" min="0"
                                class="block w-full rounded-xl border border-zinc-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                        </div>
                        <div class="pt-2">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" class="rounded border-zinc-300 text-indigo-600 focus:ring-indigo-500" {{ $testimonial->is_active ? 'checked' : '' }}>
                                <span class="text-sm font-medium text-zinc-700">Active (Visible on website)</span>
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full rounded-xl bg-zinc-900 px-5 py-3 text-sm font-semibold text-white hover:bg-zinc-800 transition-colors shadow-sm">
                    Save Changes
                </button>
            </div>
        </div>
    </form>
@endsection
