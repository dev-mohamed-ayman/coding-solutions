<footer class="relative z-10 border-t border-white/5 bg-[#050510]/80 backdrop-blur-md">
    <div
        class="max-w-7xl mx-auto px-6 py-10 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-slate-500">
        <p class="font-headline">{{ site_t_line('footer.rights', ['year' => (string) date('Y')]) }}</p>
        <nav class="flex flex-wrap justify-center gap-6" aria-label="Footer">
            <a class="nav-link text-slate-400 hover:text-primary transition-colors" href="#services">{{ site_t('nav.services') }}</a>
            <a class="nav-link text-slate-400 hover:text-primary transition-colors" href="#portfolio">{{ site_t('nav.portfolio') }}</a>
            <a class="nav-link text-slate-400 hover:text-primary transition-colors" href="#stats">{{ site_t('nav.about') }}</a>
            <a class="nav-link text-slate-400 hover:text-primary transition-colors" href="{{ request()->routeIs('home') ? '#contact' : route('home').'#contact' }}">{{ site_t('nav.contact') }}</a>
        </nav>
    </div>
</footer>
