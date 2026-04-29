@extends('web.layouts.app')

@section('title', ($translations['title'] ?? 'Project') . ' - ' . config('app.name'))

@section('content')
    <div class="mt-6 mb-12">
    <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-2 text-primary hover:text-primary-light transition-colors font-bold text-sm uppercase tracking-widest">
        <span class="material-symbols-outlined text-lg rtl:rotate-180">arrow_back</span>
        {{ site_t('common.back_to_projects') ?? 'Back to Projects' }}
    </a>
</div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Main Content --}}
        <div class="lg:col-span-2 space-y-8">
            <div class="glass-panel rounded-3xl overflow-hidden border border-white/5 shadow-2xl">
                @php
                    $imageUrl = '';
                    if (!empty($project->image_path)) {
                        $imageUrl = Storage::url($project->image_path);
                    } elseif (!empty($project->payload['image_url'])) {
                        $imageUrl = $project->payload['image_url'];
                    }
                @endphp
                <img src="{{ $imageUrl }}" alt="{{ $translations['alt'] ?? $translations['title'] ?? '' }}"
                    class="w-full aspect-video object-cover">
            </div>

            <div class="space-y-6">
                <h1 class="font-headline text-4xl md:text-5xl font-bold text-white">
                    <span class="text-gradient">{{ $translations['title'] }}</span>
                </h1>

                <div class="flex flex-wrap gap-3">
                    <span
                        class="px-4 py-1.5 bg-primary/20 text-primary rounded-full text-xs font-bold uppercase tracking-widest border border-primary/20 backdrop-blur-md">
                        {{ $translations['tag'] ?? '' }}
                    </span>
                </div>

                <div
                    class="prose prose-invert max-w-none prose-p:text-on-surface-variant prose-p:text-lg prose-p:leading-relaxed">
                    <p class="text-xl text-white font-medium mb-8">
                        {{ $translations['body'] }}
                    </p>

                    @if(!empty($translations['content']))
                        <div class="mt-8 text-on-surface-variant">
                            {!! nl2br(e($translations['content'])) !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            <div class="glass-panel p-8 rounded-3xl border border-white/5 lg:sticky lg:top-32">
                <h2 class="font-headline text-xl font-bold text-white mb-6 flex items-center gap-2">
                    <span class="w-1.5 h-6 bg-primary rounded-full"></span>
                    {{ site_t('projects.details_title') ?? 'Project Info' }}
                </h2>

                <div class="space-y-8">
                    {{-- Technologies --}}
                    <div>
                        <h3 class="text-xs uppercase tracking-[0.2em] text-slate-500 font-bold mb-4">
                            {{ site_t('projects.technologies') ?? 'Technologies' }}
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach (($project->payload['tech'] ?? []) as $tech)
                                <span
                                    class="px-3 py-1.5 bg-white/5 text-slate-300 rounded-xl text-xs font-bold border border-white/5 hover:bg-white/10 transition-colors">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    {{-- Links --}}
                    @if(!empty($project->payload['demo_url']))
                        <div class="pt-6 border-t border-white/5">
                            <a href="{{ $project->payload['demo_url'] }}" target="_blank" rel="noopener noreferrer"
                                class="w-full inline-flex items-center justify-center gap-3 px-8 py-4 hero-gradient text-white rounded-2xl font-bold text-sm tracking-wide uppercase shadow-lg shadow-primary/25 hover:scale-[1.02] transition-transform duration-300">
                                {{ site_t('projects.visit_demo') ?? 'Visit Live Demo' }}
                                <span class="material-symbols-outlined text-xl">open_in_new</span>
                            </a>
                        </div>
                    @endif

                    <div class="pt-6 border-t border-white/5">
                        <a href="{{ route('contact.index') }}"
                            class="w-full inline-flex items-center justify-center gap-3 px-8 py-4 bg-white/5 text-white rounded-2xl font-bold text-sm tracking-wide uppercase border border-white/10 hover:bg-white/10 transition-colors">
                            {{ site_t('projects.start_similar') ?? 'Start Similar Project' }}
                            <span class="material-symbols-outlined text-xl">mail</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
