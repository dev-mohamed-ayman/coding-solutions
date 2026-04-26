@extends('web.layouts.app')

@section('content')
<div class="relative overflow-hidden pt-32 pb-20">
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto text-center reveal">
            <span class="inline-flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-primary/70 font-bold mb-4">
                {{ site_t('nav.contact') }}
            </span>
            <h1 class="font-headline text-5xl md:text-7xl font-bold text-white mb-6">
                {{ site_t('contact.title_line') }} <span class="text-gradient">{{ site_t('contact.title_gradient') }}</span>
            </h1>
            <p class="text-on-surface-variant text-lg leading-relaxed mb-12">
                {{ site_t('contact.intro') }}
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mt-16">
            <!-- Contact Info -->
            <div class="space-y-6 reveal stagger-1">
                <div class="glass-panel p-8 rounded-2xl border border-white/5 flex items-start gap-6">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center shrink-0 border border-primary/20">
                        <span class="material-symbols-outlined text-primary">mail</span>
                    </div>
                    <div>
                        <h3 class="text-white font-bold mb-1">Email Us</h3>
                        <p class="text-on-surface-variant text-sm">support@codingsolutions.com</p>
                    </div>
                </div>

                <div class="glass-panel p-8 rounded-2xl border border-white/5 flex items-start gap-6">
                    <div class="w-12 h-12 rounded-xl bg-blue-500/10 flex items-center justify-center shrink-0 border border-blue-500/20">
                        <span class="material-symbols-outlined text-blue-400">call</span>
                    </div>
                    <div>
                        <h3 class="text-white font-bold mb-1">Call Us</h3>
                        <p class="text-on-surface-variant text-sm">+20 123 456 7890</p>
                    </div>
                </div>

                <div class="glass-panel p-8 rounded-2xl border border-white/5 flex items-start gap-6">
                    <div class="w-12 h-12 rounded-xl bg-emerald-500/10 flex items-center justify-center shrink-0 border border-emerald-500/20">
                        <span class="material-symbols-outlined text-emerald-400">chat</span>
                    </div>
                    <div>
                        <h3 class="text-white font-bold mb-1">WhatsApp</h3>
                        <a href="#" class="text-primary hover:underline text-sm font-bold flex items-center gap-1">
                            {{ site_t('contact.cta_primary') }}
                            <span class="material-symbols-outlined text-xs">open_in_new</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Form (Mockup) -->
            <div class="glass-panel p-10 rounded-3xl border border-white/5 reveal stagger-2">
                <form action="#" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-xs uppercase tracking-widest text-slate-400 font-bold ml-1">Name</label>
                            <input type="text" placeholder="John Doe" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-primary/50 focus:ring-0 outline-hidden transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs uppercase tracking-widest text-slate-400 font-bold ml-1">Email</label>
                            <input type="email" placeholder="john@example.com" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-primary/50 focus:ring-0 outline-hidden transition-all">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs uppercase tracking-widest text-slate-400 font-bold ml-1">Project Details</label>
                        <textarea rows="4" placeholder="Tell us about your project..." class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-primary/50 focus:ring-0 outline-hidden transition-all"></textarea>
                    </div>
                    <button type="submit" class="w-full py-4 hero-gradient text-white rounded-xl font-bold uppercase tracking-widest hover:opacity-90 transition-opacity">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
