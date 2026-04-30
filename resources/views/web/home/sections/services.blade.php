<div class="mt-16 md:mt-24 mb-10 md:mb-12 flex flex-col items-center text-center reveal">
    <span class="inline-flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-primary/70 font-bold mb-4">
        <span class="w-2 h-2 rounded-full bg-primary/50 animate-pulse"></span>
        {{ site_t('services.kicker') }}
    </span>
    <h2 class="font-headline text-3xl md:text-5xl font-bold text-white mb-6">
        <span class="text-gradient">{{ site_t('services.title') }}</span>
    </h2>
    <p class="text-on-surface-variant max-w-2xl text-base md:text-lg leading-relaxed">
        {{ site_t('services.intro') }}
    </p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-12" id="services-grid">
    @foreach (cms_blocks('home', 'services.items') as $idx => $svc)
        <div
            class="glass-panel glass-panel-hover card-shine rounded-2xl p-6 md:p-8 group border border-white/[0.03] reveal stagger-{{ $idx + 2 }} flex flex-col items-center text-center md:items-start md:text-left">
            <div
                class="w-14 h-14 rounded-xl bg-{{ $svc['payload']['color'] === 'primary' ? 'primary/10' : $svc['payload']['color'] . '-500/10' }} flex items-center justify-center mb-6 icon-glow border border-{{ $svc['payload']['color'] === 'primary' ? 'primary/10' : $svc['payload']['color'] . '-500/10' }}">
                <span
                    class="material-symbols-outlined text-{{ $svc['payload']['color'] === 'primary' ? 'primary' : $svc['payload']['color'] . '-400' }} text-3xl">{{ $svc['payload']['icon'] ?? 'web' }}</span>
            </div>
            <h3 class="font-headline text-xl font-bold text-white mb-3 flex items-center gap-2">
                {{ $svc['title'] }}
                <span class="material-symbols-outlined text-primary/40 text-lg arrow-reveal">arrow_outward</span>
            </h3>
            <p class="text-on-surface-variant text-sm leading-relaxed">
                {{ $svc['body'] }}
            </p>
        </div>
    @endforeach
</div>