<div class="mt-20 mb-10 flex flex-col items-center text-center reveal stagger-1">
    <span class="inline-flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-primary/70 font-bold mb-4">
        {{ site_t('process.kicker') }}
    </span>
    <h2 class="font-headline text-4xl md:text-5xl font-bold text-white mb-4">
        {{ site_t('process.title') }}
    </h2>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-12">
    <!-- Step 1 -->
    <div class="relative group reveal stagger-2">
        <div class="absolute -inset-1 bg-linear-to-r from-primary/20 to-blue-500/20 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
        <div class="relative glass-panel p-8 rounded-2xl border border-white/5 flex flex-col items-center text-center">
            <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xl mb-6 border border-primary/20">1</div>
            <h3 class="text-xl font-bold text-white mb-3">{{ site_t('process.step1_title') }}</h3>
            <p class="text-on-surface-variant text-sm">{{ site_t('process.step1_body') }}</p>
        </div>
        <div class="hidden lg:block absolute top-1/2 -right-4 w-8 h-[2px] bg-white/5 z-0"></div>
    </div>

    <!-- Step 2 -->
    <div class="relative group reveal stagger-3">
        <div class="absolute -inset-1 bg-linear-to-r from-blue-500/20 to-purple-500/20 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
        <div class="relative glass-panel p-8 rounded-2xl border border-white/5 flex flex-col items-center text-center">
            <div class="w-12 h-12 rounded-full bg-blue-500/10 flex items-center justify-center text-blue-400 font-bold text-xl mb-6 border border-blue-500/20">2</div>
            <h3 class="text-xl font-bold text-white mb-3">{{ site_t('process.step2_title') }}</h3>
            <p class="text-on-surface-variant text-sm">{{ site_t('process.step2_body') }}</p>
        </div>
        <div class="hidden lg:block absolute top-1/2 -right-4 w-8 h-[2px] bg-white/5 z-0"></div>
    </div>

    <!-- Step 3 -->
    <div class="relative group reveal stagger-4">
        <div class="absolute -inset-1 bg-linear-to-r from-purple-500/20 to-rose-500/20 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
        <div class="relative glass-panel p-8 rounded-2xl border border-white/5 flex flex-col items-center text-center">
            <div class="w-12 h-12 rounded-full bg-purple-500/10 flex items-center justify-center text-purple-400 font-bold text-xl mb-6 border border-purple-500/20">3</div>
            <h3 class="text-xl font-bold text-white mb-3">{{ site_t('process.step3_title') }}</h3>
            <p class="text-on-surface-variant text-sm">{{ site_t('process.step3_body') }}</p>
        </div>
        <div class="hidden lg:block absolute top-1/2 -right-4 w-8 h-[2px] bg-white/5 z-0"></div>
    </div>

    <!-- Step 4 -->
    <div class="relative group reveal stagger-5">
        <div class="absolute -inset-1 bg-linear-to-r from-rose-500/20 to-primary/20 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
        <div class="relative glass-panel p-8 rounded-2xl border border-white/5 flex flex-col items-center text-center">
            <div class="w-12 h-12 rounded-full bg-rose-500/10 flex items-center justify-center text-rose-400 font-bold text-xl mb-6 border border-rose-500/20">4</div>
            <h3 class="text-xl font-bold text-white mb-3">{{ site_t('process.step4_title') }}</h3>
            <p class="text-on-surface-variant text-sm">{{ site_t('process.step4_body') }}</p>
        </div>
    </div>
</div>
