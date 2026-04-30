<div class="my-16 gradient-divider"></div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 my-16" id="stats">
    @foreach (cms_blocks('home', 'stats.items') as $idx => $stat)
        <div
            class="stat-item reveal stagger-{{ $idx + 1 }} p-8 glass-panel glass-panel-hover card-shine rounded-2xl flex flex-col items-center justify-center text-center">
            <div class="stat-value counter-value text-4xl md:text-5xl font-extrabold mb-2"
                data-target="{{ $stat['payload']['target'] ?? '0' }}" data-suffix="{{ $stat['payload']['suffix'] ?? '' }}">
                0{{ $stat['payload']['suffix'] ?? '' }}</div>
            <div class="text-slate-400 text-xs md:text-sm font-bold uppercase tracking-[0.2em]">{{ $stat['title'] }}</div>
        </div>
    @endforeach
</div>
<div class="gradient-divider"></div>