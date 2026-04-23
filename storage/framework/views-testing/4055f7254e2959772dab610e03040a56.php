<div class="mt-20 mb-10 flex flex-col items-center text-center reveal stagger-1">
    <span class="inline-flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-primary/70 font-bold mb-4">
        <?php echo e(site_t('services_section.kicker')); ?>

    </span>
    <h2 class="font-headline text-4xl md:text-5xl font-bold text-white mb-4">
        <?php if(trim(site_t('services_section.title_our')) !== ''): ?>
            <?php echo e(site_t('services_section.title_our')); ?>

        <?php endif; ?>
        <span class="text-gradient"><?php echo e(site_t('services_section.title_services')); ?></span>
    </h2>
    <p class="text-on-surface-variant max-w-2xl text-base leading-relaxed">
        <?php echo e(site_t('services_section.intro')); ?>

    </p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12" id="services-grid">
    <!-- Service 1 -->
    <div class="glass-panel glass-panel-hover card-shine rounded-2xl p-8 group border border-white/[0.03] reveal stagger-2">
        <div class="w-14 h-14 rounded-xl bg-blue-500/10 flex items-center justify-center mb-6 icon-glow border border-blue-500/10">
            <span class="material-symbols-outlined text-blue-400 text-3xl">language</span>
        </div>
        <h3 class="font-headline text-xl font-bold text-white mb-3 flex items-center gap-2">
            <?php echo e(site_t('services_section.svc1_title')); ?>

            <span class="material-symbols-outlined text-primary/40 text-lg arrow-reveal">arrow_outward</span>
        </h3>
        <p class="text-on-surface-variant text-sm leading-relaxed">
            <?php echo e(site_t('services_section.svc1_body')); ?>

        </p>
    </div>

    <!-- Service 2 -->
    <div class="glass-panel glass-panel-hover card-shine rounded-2xl p-8 group border border-white/[0.03] reveal stagger-3">
        <div class="w-14 h-14 rounded-xl bg-purple-500/10 flex items-center justify-center mb-6 icon-glow border border-purple-500/10">
            <span class="material-symbols-outlined text-purple-400 text-3xl">shopping_cart</span>
        </div>
        <h3 class="font-headline text-xl font-bold text-white mb-3 flex items-center gap-2">
            <?php echo e(site_t('services_section.svc2_title')); ?>

            <span class="material-symbols-outlined text-primary/40 text-lg arrow-reveal">arrow_outward</span>
        </h3>
        <p class="text-on-surface-variant text-sm leading-relaxed">
            <?php echo e(site_t('services_section.svc2_body')); ?>

        </p>
    </div>

    <!-- Service 3 -->
    <div class="glass-panel glass-panel-hover card-shine rounded-2xl p-8 group border border-white/[0.03] reveal stagger-4">
        <div class="w-14 h-14 rounded-xl bg-emerald-500/10 flex items-center justify-center mb-6 icon-glow border border-emerald-500/10">
            <span class="material-symbols-outlined text-emerald-400 text-3xl">smartphone</span>
        </div>
        <h3 class="font-headline text-xl font-bold text-white mb-3 flex items-center gap-2">
            <?php echo e(site_t('services_section.svc3_title')); ?>

            <span class="material-symbols-outlined text-primary/40 text-lg arrow-reveal">arrow_outward</span>
        </h3>
        <p class="text-on-surface-variant text-sm leading-relaxed">
            <?php echo e(site_t('services_section.svc3_body')); ?>

        </p>
    </div>

    <!-- Service 4 -->
    <div class="glass-panel glass-panel-hover card-shine rounded-2xl p-8 group border border-white/[0.03] reveal stagger-5">
        <div class="w-14 h-14 rounded-xl bg-rose-500/10 flex items-center justify-center mb-6 icon-glow border border-rose-500/10">
            <span class="material-symbols-outlined text-rose-400 text-3xl">campaign</span>
        </div>
        <h3 class="font-headline text-xl font-bold text-white mb-3 flex items-center gap-2">
            <?php echo e(site_t('services_section.svc4_title')); ?>

            <span class="material-symbols-outlined text-primary/40 text-lg arrow-reveal">arrow_outward</span>
        </h3>
        <p class="text-on-surface-variant text-sm leading-relaxed">
            <?php echo e(site_t('services_section.svc4_body')); ?>

        </p>
    </div>

    <!-- Service 5 -->
    <div class="glass-panel glass-panel-hover card-shine rounded-2xl p-8 group border border-white/[0.03] reveal stagger-6">
        <div class="w-14 h-14 rounded-xl bg-amber-500/10 flex items-center justify-center mb-6 icon-glow border border-amber-500/10">
            <span class="material-symbols-outlined text-amber-400 text-3xl">brush</span>
        </div>
        <h3 class="font-headline text-xl font-bold text-white mb-3 flex items-center gap-2">
            <?php echo e(site_t('services_section.svc5_title')); ?>

            <span class="material-symbols-outlined text-primary/40 text-lg arrow-reveal">arrow_outward</span>
        </h3>
        <p class="text-on-surface-variant text-sm leading-relaxed">
            <?php echo e(site_t('services_section.svc5_body')); ?>

        </p>
    </div>

    <!-- Service 6 -->
    <div class="glass-panel glass-panel-hover card-shine rounded-2xl p-8 group border border-white/[0.03] reveal stagger-7">
        <div class="w-14 h-14 rounded-xl bg-cyan-500/10 flex items-center justify-center mb-6 icon-glow border border-cyan-500/10">
            <span class="material-symbols-outlined text-cyan-400 text-3xl">cloud</span>
        </div>
        <h3 class="font-headline text-xl font-bold text-white mb-3 flex items-center gap-2">
            <?php echo e(site_t('services_section.svc6_title')); ?>

            <span class="material-symbols-outlined text-primary/40 text-lg arrow-reveal">arrow_outward</span>
        </h3>
        <p class="text-on-surface-variant text-sm leading-relaxed">
            <?php echo e(site_t('services_section.svc6_body')); ?>

        </p>
    </div>
</div>
<?php /**PATH C:\Users\Mohamed Ayman\Herd\Coding solutions\codiing-solutions\resources\views/web/home/sections/services.blade.php ENDPATH**/ ?>