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
    <!-- Service 1 -->
    <div
        class="glass-panel glass-panel-hover card-shine rounded-2xl p-6 md:p-8 group border border-white/[0.03] reveal stagger-2 flex flex-col items-center text-center md:items-start md:text-left">
        <div
            class="w-14 h-14 rounded-2xl bg-primary/10 flex items-center justify-center text-primary mb-6 group-hover:scale-110 group-hover:bg-primary group-hover:text-white transition-all duration-500 shadow-lg shadow-primary/5">
            <span class="material-symbols-outlined text-3xl">web</span>
        </div>
        <h3 class="text-xl font-bold text-white mb-4 group-hover:text-primary transition-colors">
            {{ site_t('services.s1_title') }}</h3>
        <p class="text-on-surface-variant text-sm leading-relaxed mb-6">{{ site_t('services.s1_body') }}</p>
        <ul class="space-y-3 mb-8 text-left w-full md:w-auto">
            <li class="flex items-center gap-3 text-xs text-slate-400">
                <span class="material-symbols-outlined text-primary text-sm">check_circle</span>
                {{ site_t('services.s1_f1') }}
            </li>
            <li class="flex items-center gap-3 text-xs text-slate-400">
                <span class="material-symbols-outlined text-primary text-sm">check_circle</span>
                {{ site_t('services.s1_f2') }}
            </li>
            <li class="flex items-center gap-3 text-xs text-slate-400">
                <span class="material-symbols-outlined text-primary text-sm">check_circle</span>
                {{ site_t('services.s1_f3') }}
            </li>
        </ul>
    </div>

    <!-- Service 2 -->
    <div
        class="glass-panel glass-panel-hover card-shine rounded-2xl p-6 md:p-8 group border border-white/[0.03] reveal stagger-3 flex flex-col items-center text-center md:items-start md:text-left">
        <div
            class="w-14 h-14 rounded-xl bg-purple-500/10 flex items-center justify-center mb-6 icon-glow border border-purple-500/10">
            <span class="material-symbols-outlined text-purple-400 text-3xl">shopping_cart</span>
        </div>
        <h3 class="font-headline text-xl font-bold text-white mb-3 flex items-center gap-2">
            {{ site_t('services_section.svc2_title') }}
            <span class="material-symbols-outlined text-primary/40 text-lg arrow-reveal">arrow_outward</span>
        </h3>
        <p class="text-on-surface-variant text-sm leading-relaxed">
            {{ site_t('services_section.svc2_body') }}
        </p>
    </div>

    <!-- Service 3 -->
    <div
        class="glass-panel glass-panel-hover card-shine rounded-2xl p-6 md:p-8 group border border-white/[0.03] reveal stagger-4 flex flex-col items-center text-center md:items-start md:text-left">
        <div
            class="w-14 h-14 rounded-xl bg-emerald-500/10 flex items-center justify-center mb-6 icon-glow border border-emerald-500/10">
            <span class="material-symbols-outlined text-emerald-400 text-3xl">smartphone</span>
        </div>
        <h3 class="font-headline text-xl font-bold text-white mb-3 flex items-center gap-2">
            {{ site_t('services_section.svc3_title') }}
            <span class="material-symbols-outlined text-primary/40 text-lg arrow-reveal">arrow_outward</span>
        </h3>
        <p class="text-on-surface-variant text-sm leading-relaxed">
            {{ site_t('services_section.svc3_body') }}
        </p>
    </div>

    <!-- Service 4 -->
    <div
        class="glass-panel glass-panel-hover card-shine rounded-2xl p-6 md:p-8 group border border-white/[0.03] reveal stagger-5 flex flex-col items-center text-center md:items-start md:text-left">
        <div
            class="w-14 h-14 rounded-xl bg-rose-500/10 flex items-center justify-center mb-6 icon-glow border border-rose-500/10">
            <span class="material-symbols-outlined text-rose-400 text-3xl">campaign</span>
        </div>
        <h3 class="font-headline text-xl font-bold text-white mb-3 flex items-center gap-2">
            {{ site_t('services_section.svc4_title') }}
            <span class="material-symbols-outlined text-primary/40 text-lg arrow-reveal">arrow_outward</span>
        </h3>
        <p class="text-on-surface-variant text-sm leading-relaxed">
            {{ site_t('services_section.svc4_body') }}
        </p>
    </div>

    <!-- Service 5 -->
    <div
        class="glass-panel glass-panel-hover card-shine rounded-2xl p-6 md:p-8 group border border-white/[0.03] reveal stagger-6 flex flex-col items-center text-center md:items-start md:text-left">
        <div
            class="w-14 h-14 rounded-xl bg-amber-500/10 flex items-center justify-center mb-6 icon-glow border border-amber-500/10">
            <span class="material-symbols-outlined text-amber-400 text-3xl">brush</span>
        </div>
        <h3 class="font-headline text-xl font-bold text-white mb-3 flex items-center gap-2">
            {{ site_t('services_section.svc5_title') }}
            <span class="material-symbols-outlined text-primary/40 text-lg arrow-reveal">arrow_outward</span>
        </h3>
        <p class="text-on-surface-variant text-sm leading-relaxed">
            {{ site_t('services_section.svc5_body') }}
        </p>
    </div>

    <!-- Service 6 -->
    <div
        class="glass-panel glass-panel-hover card-shine rounded-2xl p-6 md:p-8 group border border-white/[0.03] reveal stagger-7 flex flex-col items-center text-center md:items-start md:text-left">
        <div
            class="w-14 h-14 rounded-xl bg-cyan-500/10 flex items-center justify-center mb-6 icon-glow border border-cyan-500/10">
            <span class="material-symbols-outlined text-cyan-400 text-3xl">cloud</span>
        </div>
        <h3 class="font-headline text-xl font-bold text-white mb-3 flex items-center gap-2">
            {{ site_t('services_section.svc6_title') }}
            <span class="material-symbols-outlined text-primary/40 text-lg arrow-reveal">arrow_outward</span>
        </h3>
        <p class="text-on-surface-variant text-sm leading-relaxed">
            {{ site_t('services_section.svc6_body') }}
        </p>
    </div>
</div>