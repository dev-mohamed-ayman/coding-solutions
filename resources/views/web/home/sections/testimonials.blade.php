<div class="mt-20 mb-10 flex flex-col items-center text-center reveal stagger-1">
    <span class="inline-flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-primary/70 font-bold mb-4">
        <span class="w-2 h-2 rounded-full bg-primary/50 animate-pulse"></span>
        {{ site_t('testimonials.kicker') }}
    </span>
    <h2 class="font-headline text-4xl md:text-5xl font-bold text-white mb-4">
        {{ site_t('testimonials.title_what') }} <span class="text-gradient">{{ site_t('testimonials.title_clients') }}</span>
    </h2>
    <p class="text-on-surface-variant max-w-2xl text-base leading-relaxed">
        {{ site_t('testimonials.intro') }}
    </p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10" id="testimonials-grid">
    @php
        $testimonialCards = cms_blocks('home', 'testimonials.cards');
        $gradients = [
            'from-blue-500/20 to-purple-500/20',
            'from-emerald-500/20 to-cyan-500/20',
            'from-amber-500/20 to-rose-500/20',
        ];
    @endphp

    @if (count($testimonialCards) === 0)
        @php
            $testimonialCards = [
                ['quote' => site_t('testimonials.t1_quote'), 'name' => site_t('testimonials.t1_name'), 'role' => site_t('testimonials.t1_role')],
                ['quote' => site_t('testimonials.t2_quote'), 'name' => site_t('testimonials.t2_name'), 'role' => site_t('testimonials.t2_role')],
                ['quote' => site_t('testimonials.t3_quote'), 'name' => site_t('testimonials.t3_name'), 'role' => site_t('testimonials.t3_role')],
            ];
        @endphp
    @endif

    @foreach ($testimonialCards as $index => $testimonial)
        @php
            $gradientClass = $gradients[$index % count($gradients)];
            $name = $testimonial['name'] ?? 'Unknown';
            $initials = strtoupper(substr($name, 0, 2));
            
            $imageUrl = '';
            if (!empty($testimonial['image_path'])) {
                $imageUrl = Storage::url($testimonial['image_path']);
            }
        @endphp
        <div class="glass-panel glass-panel-hover card-shine rounded-2xl p-8 relative overflow-hidden group reveal stagger-{{ 2 + ($index % 3) }} border border-white/[0.03]">
            <span class="material-symbols-outlined absolute -top-4 -right-4 text-9xl text-white/[0.02] transform -scale-x-100 group-hover:scale-110 transition-transform duration-700 pointer-events-none">format_quote</span>

            <div class="flex gap-1 mb-6 relative z-10">
                <span class="material-symbols-outlined text-amber-400 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                <span class="material-symbols-outlined text-amber-400 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                <span class="material-symbols-outlined text-amber-400 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                <span class="material-symbols-outlined text-amber-400 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                <span class="material-symbols-outlined text-amber-400 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
            </div>

            <p class="text-on-surface-variant text-sm sm:text-base leading-relaxed mb-8 relative z-10 italic">
                "{{ $testimonial['quote'] ?? '' }}"
            </p>

            <div class="flex items-center gap-4 relative z-10 pt-5 border-t border-white/[0.06]">
                @if($imageUrl)
                    <img src="{{ $imageUrl }}" alt="{{ $name }}" class="w-11 h-11 rounded-full object-cover border border-white/10 shrink-0 shadow-inner">
                @else
                    <div class="w-11 h-11 rounded-full bg-gradient-to-br {{ $gradientClass }} border border-white/10 flex items-center justify-center shrink-0 shadow-inner">
                        <span class="text-white font-bold text-sm tracking-wider">{{ $initials }}</span>
                    </div>
                @endif
                <div>
                    <h4 class="font-headline font-bold text-white text-sm sm:text-base">{{ $name }}</h4>
                    <p class="text-[10px] sm:text-xs text-primary/80 uppercase tracking-wider mt-0.5 font-bold">{{ $testimonial['role'] ?? '' }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
