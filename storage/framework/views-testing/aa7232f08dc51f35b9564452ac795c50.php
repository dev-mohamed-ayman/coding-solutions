<div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-6 gap-5" id="services">

    <div
        class="md:col-span-4 lg:col-span-4 glass-panel glass-panel-hover card-shine rounded-2xl p-10 md:p-14 flex flex-col justify-center relative overflow-hidden reveal stagger-1">
        <div class="absolute -top-32 -right-32 w-80 h-80 bg-primary/8 rounded-full blur-[100px]"></div>
        <div
            class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-primary/10 to-transparent">
        </div>

        <span class="inline-flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-primary/70 font-bold mb-6">
            <span class="w-2 h-2 rounded-full bg-primary/50 animate-pulse"></span>
            <?php echo e(site_t('services_bento.kicker')); ?>

        </span>

        <h1
            class="font-headline text-4xl sm:text-5xl md:text-7xl font-bold tracking-tighter text-white mb-6 leading-[0.95]">
            <?php echo e(site_t('services_bento.title_line1')); ?> <br />
            <span class="text-gradient"><?php echo e(site_t('services_bento.title_gradient')); ?></span>
        </h1>
        <p class="text-on-surface-variant text-base md:text-lg max-w-xl font-light leading-relaxed mb-8">
            <?php echo e(site_t('services_bento.body')); ?>

        </p>
        <div class="flex gap-4 flex-wrap">
            <button type="button"
                class="cta-btn px-8 py-3 hero-gradient text-white rounded-xl font-bold text-sm tracking-tight inline-flex items-center gap-2">
                <?php echo e(site_t('services_bento.cta_primary')); ?>

                <span class="material-symbols-outlined text-lg">arrow_forward</span>
            </button>
            <button type="button"
                class="px-8 py-3 bg-white/5 hover:bg-white/10 text-white rounded-xl font-semibold text-sm tracking-tight transition-all duration-300 border border-white/10 hover:border-white/20 inline-flex items-center gap-2">
                <?php echo e(site_t('services_bento.cta_secondary')); ?>

                <span class="material-symbols-outlined text-lg">north_east</span>
            </button>
        </div>
    </div>

    <div
        class="md:col-span-2 lg:col-span-2 glass-panel rounded-2xl overflow-hidden relative min-h-[320px] reveal stagger-2 group">
        <img class="absolute inset-0 w-full h-full object-cover grayscale-[70%] group-hover:grayscale-0 transition-all duration-1000 opacity-50 group-hover:opacity-70 scale-105 group-hover:scale-100"
            alt="Close-up of clean computer code on a dark monitor with neon blue and purple ambient lighting"
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuC0dFsuGHbcIntBVusMCXgkQ8484gwsSMhMSvcXXkAAdxTpO2uqrBAEiH9Vzx7-2C9IC6cFi6sg0WcZgOIm2k3J6scmzLgISV4lYR3KEd3-vXcdixAr5M3rnpSwci0G0O7hsTo1q1FPFwlabNFVqtsi9lpKTDmnsvJZItRiMWWGqdPajMyDI9igXCBYGc6UNEPwCqEGp4OB_H8WRLDrM_CwK0NFzl6JHkazH1J7ssmq0Uajs2HibvdTLcxMxp6n_2mSWZyDeqbj38I" />
        <div class="absolute inset-0 bg-gradient-to-t from-[#050510] via-transparent to-transparent"></div>
        <div class="absolute bottom-8 left-8 right-8">
            <span class="text-xs uppercase tracking-[0.3em] text-primary/70 font-bold mb-3 block"><?php echo e(site_t('services_bento.system_kicker')); ?></span>
            <div class="flex items-center gap-3">
                <div class="w-2.5 h-2.5 bg-green-500 rounded-full pulse-dot"></div>
                <span class="font-headline font-bold text-xl text-white"><?php echo e(site_t('services_bento.system_status')); ?></span>
            </div>
            <div class="mt-3 flex items-center gap-2 text-xs text-slate-500">
                <span class="material-symbols-outlined text-sm">schedule</span>
                <span id="uptimeCounter"><?php echo e(site_t('services_bento.uptime')); ?></span>
            </div>
        </div>
    </div>

    <div
        class="md:col-span-2 lg:col-span-2 glass-panel glass-panel-hover card-shine rounded-2xl p-8 group border border-white/[0.03] reveal stagger-3">
        <div
            class="w-12 h-12 rounded-xl bg-blue-500/10 flex items-center justify-center mb-6 icon-glow border border-blue-500/10">
            <span class="material-symbols-outlined text-blue-400">web</span>
        </div>
        <h3 class="font-headline text-xl font-bold text-white mb-3 flex items-center gap-2">
            <?php echo e(site_t('services_bento.card_web_title')); ?>

            <span class="material-symbols-outlined text-primary/40 text-lg arrow-reveal">arrow_outward</span>
        </h3>
        <p class="text-on-surface-variant text-sm leading-relaxed">
            <?php echo e(site_t('services_bento.card_web_body')); ?>

        </p>
    </div>

    <div
        class="md:col-span-2 lg:col-span-2 glass-panel glass-panel-hover card-shine rounded-2xl p-8 group border border-white/[0.03] reveal stagger-4">
        <div
            class="w-12 h-12 rounded-xl bg-violet-500/10 flex items-center justify-center mb-6 icon-glow border border-violet-500/10">
            <span class="material-symbols-outlined text-violet-400">smartphone</span>
        </div>
        <h3 class="font-headline text-xl font-bold text-white mb-3 flex items-center gap-2">
            <?php echo e(site_t('services_bento.card_app_title')); ?>

            <span class="material-symbols-outlined text-primary/40 text-lg arrow-reveal">arrow_outward</span>
        </h3>
        <p class="text-on-surface-variant text-sm leading-relaxed">
            <?php echo e(site_t('services_bento.card_app_body')); ?>

        </p>
    </div>

    <div
        class="md:col-span-2 lg:col-span-2 glass-panel glass-panel-hover card-shine rounded-2xl p-8 group border border-white/[0.03] reveal stagger-5">
        <div
            class="w-12 h-12 rounded-xl bg-emerald-500/10 flex items-center justify-center mb-6 icon-glow border border-emerald-500/10">
            <span class="material-symbols-outlined text-emerald-400"
                style="font-variation-settings: 'FILL' 1">psychology</span>
        </div>
        <h3 class="font-headline text-xl font-bold text-white mb-3 flex items-center gap-2">
            <?php echo e(site_t('services_bento.card_ai_title')); ?>

            <span class="material-symbols-outlined text-primary/40 text-lg arrow-reveal">arrow_outward</span>
        </h3>
        <p class="text-on-surface-variant text-sm leading-relaxed">
            <?php echo e(site_t('services_bento.card_ai_body')); ?>

        </p>
    </div>
</div>
<?php /**PATH C:\Users\Mohamed Ayman\Herd\Coding solutions\codiing-solutions\resources\views/web/home/sections/services-bento.blade.php ENDPATH**/ ?>