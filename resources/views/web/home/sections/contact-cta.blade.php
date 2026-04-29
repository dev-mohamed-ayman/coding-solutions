<section class="py-16 md:py-24" id="contact-cta">
    <div class="glass-panel rounded-[2.5rem] p-8 md:p-16 relative overflow-hidden reveal">
        <div class="absolute inset-0 bg-linear-to-br from-primary/10 via-transparent to-transparent"></div>
        
        <div class="relative z-10 flex flex-col items-center text-center max-w-3xl mx-auto">
            <span class="inline-flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-primary/70 font-bold mb-6">
                {{ site_t('cta.kicker') }}
            </span>
            <h2 class="font-headline text-3xl md:text-5xl lg:text-6xl font-bold text-white mb-8 leading-tight">
                {{ site_t('cta.title_ready') }} <span class="text-gradient">{{ site_t('cta.title_project') }}</span>
            </h2>
            <p class="text-on-surface-variant text-base md:text-lg mb-10 leading-relaxed">
                {{ site_t('cta.body') }}
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 w-full sm:w-auto">
                <a href="{{ route('contact.index') }}" 
                   class="w-full sm:w-auto px-10 py-4 hero-gradient text-white rounded-2xl font-bold text-sm tracking-widest uppercase shadow-xl shadow-primary/20 hover:scale-[1.02] transition-transform duration-300">
                    {{ site_t('cta.btn_contact') }}
                </a>
                <a href="{{ route('projects.index') }}" 
                   class="w-full sm:w-auto px-10 py-4 bg-white/5 text-white rounded-2xl font-bold text-sm tracking-widest uppercase border border-white/10 hover:bg-white/10 transition-colors">
                    {{ site_t('cta.btn_portfolio') }}
                </a>
            </div>
        </div>
    </div>
</section>
