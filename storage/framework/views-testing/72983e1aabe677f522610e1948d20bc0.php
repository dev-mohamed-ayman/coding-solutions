<div class="mt-20 mb-10 flex flex-col items-center text-center reveal stagger-1">
    <span class="inline-flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-primary/70 font-bold mb-4">
        <span class="w-2 h-2 rounded-full bg-primary/50 animate-pulse"></span>
        <?php echo e(site_t('projects.kicker')); ?>

    </span>
    <h2 class="font-headline text-4xl md:text-5xl font-bold text-white mb-4">
        <?php if(trim(site_t('projects.title_featured')) !== ''): ?>
            <?php echo e(site_t('projects.title_featured')); ?>

        <?php endif; ?>
        <span class="text-gradient"><?php echo e(site_t('projects.title_projects')); ?></span>
    </h2>
    <p class="text-on-surface-variant max-w-2xl text-base leading-relaxed">
        <?php echo e(site_t('projects.intro')); ?>

    </p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5 mt-10" id="projects-grid">
    <?php
        $projectCards = cms_blocks('home', 'projects.cards');
    ?>

    <?php if(count($projectCards) === 0): ?>
        <?php
            $projectCards = [
                ['title' => site_t('projects.p1_title'), 'body' => site_t('projects.p1_body'), 'alt' => site_t('projects.p1_alt'), 'tag' => 'CRM', 'payload' => ['image_url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'tech' => ['Laravel', 'Vue.js', 'Tailwind']]],
                ['title' => site_t('projects.p2_title'), 'body' => site_t('projects.p2_body'), 'alt' => site_t('projects.p2_alt'), 'tag' => 'E-Commerce', 'payload' => ['image_url' => 'https://images.unsplash.com/photo-1661956602116-aa6865609028?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'tech' => ['Next.js', 'Stripe', 'React']]],
                ['title' => site_t('projects.p3_title'), 'body' => site_t('projects.p3_body'), 'alt' => site_t('projects.p3_alt'), 'tag' => 'SaaS', 'payload' => ['image_url' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'tech' => ['Python', 'Django', 'PostgreSQL']]],
            ];
        ?>
    <?php endif; ?>

    <?php $__currentLoopData = $projectCards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <article
            class="glass-panel glass-panel-hover card-shine rounded-2xl overflow-hidden group reveal stagger-2 flex flex-col border border-white/3 min-h-0">
            <div class="relative aspect-5/3 max-h-44 sm:max-h-50 overflow-hidden shrink-0">
                <img src="<?php echo e($card['payload']['image_url'] ?? ''); ?>"
                    alt="<?php echo e($card['alt'] ?? $card['title']); ?>"
                    class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-[1.04]">
                <div class="absolute inset-0 bg-linear-to-t from-[#050510]/95 via-[#050510]/20 to-transparent"></div>
                <div class="absolute bottom-3 left-3 right-3 z-10 flex items-end justify-between gap-2">
                    <span
                        class="px-2.5 py-1 bg-primary/15 text-primary/95 rounded-full text-[10px] font-bold uppercase tracking-[0.2em] border border-primary/20 backdrop-blur-md"><?php echo e($card['tag']); ?></span>
                    <span
                        class="material-symbols-outlined text-primary/70 text-lg arrow-reveal shrink-0">arrow_outward</span>
                </div>
            </div>
            <div class="p-5 flex flex-col flex-1 min-h-0 relative z-10">
                <h3 class="font-headline text-lg font-bold text-white mb-1.5 group-hover:text-primary transition-colors duration-300">
                    <?php echo e($card['title']); ?>

                </h3>
                <p class="text-on-surface-variant text-xs sm:text-sm leading-relaxed line-clamp-2 mb-4 flex-1">
                    <?php echo e($card['body']); ?>

                </p>
                <div class="flex flex-wrap gap-1.5 pt-1 border-t border-white/6">
                    <?php $__currentLoopData = ($card['payload']['tech'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="tech-tag px-2.5 py-1 bg-white/5 text-slate-400 rounded-full text-[10px] font-bold uppercase tracking-widest border border-white/5"><?php echo e($tech); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </article>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="mt-12 flex justify-center reveal stagger-5">
    <a href="#"
        class="cta-btn px-8 py-3.5 hero-gradient text-white rounded-xl font-bold text-sm tracking-wide uppercase inline-flex items-center gap-2 shadow-lg shadow-primary/20">
        <?php echo e(site_t('projects.view_all')); ?>

        <span class="material-symbols-outlined text-xl">arrow_right_alt</span>
    </a>
</div>
<?php /**PATH C:\Users\Mohamed Ayman\Herd\Coding solutions\codiing-solutions\resources\views/web/home/sections/projects.blade.php ENDPATH**/ ?>