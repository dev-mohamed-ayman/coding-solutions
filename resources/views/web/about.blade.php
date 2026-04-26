@extends('web.layouts.app')

@section('content')
<div class="relative overflow-hidden pt-32 pb-20">
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto text-center reveal">
            <span class="inline-flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-primary/70 font-bold mb-4">
                {{ site_t('about.kicker') }}
            </span>
            <h1 class="font-headline text-5xl md:text-7xl font-bold text-white mb-6">
                {{ site_t('about.title') }} <span class="text-gradient">{{ site_t('about.title_gradient') }}</span>
            </h1>
            <p class="text-on-surface-variant text-lg md:text-xl leading-relaxed mb-12">
                {{ site_t('about.intro') }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mt-20">
            <!-- Who We Are -->
            <div class="glass-panel p-10 rounded-3xl border border-white/5 reveal stagger-1">
                <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-sm">groups</span>
                    </span>
                    {{ site_t('about.who_we_are_title') }}
                </h2>
                <p class="text-on-surface-variant leading-relaxed">
                    {{ site_t('about.who_we_are_body') }}
                </p>
            </div>

            <!-- What We Do -->
            <div class="glass-panel p-10 rounded-3xl border border-white/5 reveal stagger-2">
                <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-blue-500/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-blue-400 text-sm">terminal</span>
                    </span>
                    {{ site_t('about.what_we_do_title') }}
                </h2>
                <p class="text-on-surface-variant leading-relaxed">
                    {{ site_t('about.what_we_do_body') }}
                </p>
            </div>
        </div>

        <div class="mt-20 glass-panel p-10 md:p-16 rounded-3xl border border-white/5 reveal stagger-3">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-white mb-6">{{ site_t('about.how_we_work_title') }}</h2>
                    <p class="text-on-surface-variant leading-relaxed mb-8">
                        {{ site_t('about.how_we_work_body') }}
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
                            <span class="text-white font-medium">{{ site_t('about.why_us_item1') }}</span>
                        </div>
                        <div class="flex items-start gap-4">
                            <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
                            <span class="text-white font-medium">{{ site_t('about.why_us_item2') }}</span>
                        </div>
                        <div class="flex items-start gap-4">
                            <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
                            <span class="text-white font-medium">{{ site_t('about.why_us_item3') }}</span>
                        </div>
                        <div class="flex items-start gap-4">
                            <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
                            <span class="text-white font-medium">{{ site_t('about.why_us_item4') }}</span>
                        </div>
                    </div>
                </div>
                <div class="relative aspect-video rounded-2xl overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="Team Work" class="w-full h-full object-cover grayscale opacity-50 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-700">
                    <div class="absolute inset-0 bg-primary/10 mix-blend-overlay"></div>
                </div>
            </div>
        </div>

        <div class="mt-20 text-center reveal stagger-4">
            <div class="glass-panel p-12 rounded-3xl border border-white/5 inline-block max-w-3xl">
                <h2 class="text-3xl font-bold text-white mb-4">{{ site_t('about.cta_title') }}</h2>
                <p class="text-on-surface-variant mb-8">{{ site_t('about.cta_body') }}</p>
                <a href="{{ route('web.contact') }}" class="cta-btn px-10 py-4 hero-gradient text-white rounded-xl font-bold uppercase tracking-wide inline-flex items-center gap-2">
                    {{ site_t('nav.contact') }}
                    <span class="material-symbols-outlined">arrow_forward</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
