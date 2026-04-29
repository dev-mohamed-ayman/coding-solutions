@extends('web.layouts.app')

@section('title', site_t('projects.title_projects') . ' - ' . config('app.name'))

@section('content')
    <div class="mt-10 mb-16 flex flex-col items-center text-center reveal">
        <span class="inline-flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-primary/70 font-bold mb-4">
            <span class="w-2 h-2 rounded-full bg-primary/50 animate-pulse"></span>
            {{ site_t('projects.kicker') }}
        </span>
        <h1 class="font-headline text-4xl md:text-5xl font-bold text-white mb-4">
            <span class="text-gradient">{{ site_t('projects.title_projects') }}</span>
        </h1>
        <p class="text-on-surface-variant max-w-2xl text-base leading-relaxed">
            {{ site_t('projects.intro') }}
        </p>
    </div>

    {{-- Simple Filter --}}
    @if(count($allTechs) > 0)
        <div class="mb-12 flex flex-wrap justify-center gap-3 reveal stagger-1">
            <a href="{{ route('projects.index') }}"
                class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest border transition-all duration-300 {{ !request('tech') ? 'bg-primary text-white border-primary shadow-lg shadow-primary/20' : 'bg-white/5 text-slate-400 border-white/5 hover:bg-white/10' }}">
                {{ site_t('common.all') ?? 'All' }}
            </a>
            @foreach($allTechs as $tech)
                <a href="{{ route('projects.index', ['tech' => $tech]) }}"
                    class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest border transition-all duration-300 {{ request('tech') === $tech ? 'bg-primary text-white border-primary shadow-lg shadow-primary/20' : 'bg-white/5 text-slate-400 border-white/5 hover:bg-white/10' }}">
                    {{ $tech }}
                </a>
            @endforeach
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6" id="projects-grid">
        @forelse ($projects as $project)
            @php
                $trans = $project->translations->pluck('value', 'field');
                $imageUrl = '';
                if (!empty($project->image_path)) {
                    $imageUrl = Storage::url($project->image_path);
                } elseif (!empty($project->payload['image_url'])) {
                    $imageUrl = $project->payload['image_url'];
                }
            @endphp
            <article
                class="glass-panel glass-panel-hover card-shine rounded-3xl overflow-hidden group reveal stagger-2 flex flex-col border border-white/3 min-h-0">
                <a href="{{ route('projects.show', $project) }}" class="block relative aspect-video overflow-hidden shrink-0">
                    <img src="{{ $imageUrl }}" alt="{{ $trans['alt'] ?? $trans['title'] ?? '' }}"
                        class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-[1.05]">
                    <div class="absolute inset-0 bg-linear-to-t from-[#050510]/95 via-[#050510]/20 to-transparent"></div>
                    <div class="absolute bottom-4 inset-inline-4 z-10 flex items-end justify-between gap-2">
                        <span class="px-3 py-1 bg-primary/20 text-primary rounded-full text-[10px] font-bold uppercase tracking-[0.2em] border border-primary/20 backdrop-blur-md">
                        {{ $trans['tag'] ?? '' }}
                    </span>
                    <span class="material-symbols-outlined text-primary/70 text-xl arrow-reveal shrink-0 rtl:rotate-180">arrow_forward</span>
                </div>
                </a>
                <div class="p-6 flex flex-col flex-1 min-h-0 relative z-10">
                    <h3
                        class="font-headline text-xl font-bold text-white mb-2 group-hover:text-primary transition-colors duration-300">
                        <a href="{{ route('projects.show', $project) }}">{{ $trans['title'] }}</a>
                    </h3>
                    <p class="text-on-surface-variant text-sm leading-relaxed line-clamp-3 mb-6 flex-1">
                        {{ $trans['body'] }}
                    </p>
                    <div class="flex flex-wrap gap-2 pt-4 border-t border-white/6">
                        @foreach (($project->payload['tech'] ?? []) as $tech)
                            <span
                                class="tech-tag px-3 py-1 bg-white/5 text-slate-400 rounded-full text-[10px] font-bold uppercase tracking-widest border border-white/5">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>
            </article>
        @empty
            <div class="col-span-full py-20 text-center">
                <p class="text-on-surface-variant text-lg">{{ site_t('projects.no_projects') ?? 'No projects found.' }}</p>
            </div>
        @endforelse
    </div>
@endsection