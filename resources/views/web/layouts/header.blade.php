@php
    $localeRedirect = request()->path() === '' ? '/' : '/' . request()->path();
@endphp
<header class="fixed top-0 w-full z-50 header-glass" id="header">
    <div class="flex justify-between items-center px-8 py-5 max-w-7xl mx-auto gap-4">
        <a href="{{ route('home') }}" class="flex items-center shrink-0">
            <img src="logo.png" alt="Coding Solutions" class="h-9 w-auto brightness-0 invert" />
        </a>
        <nav class="hidden md:flex gap-6 lg:gap-8 items-center">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }} text-slate-400 font-medium font-headline tracking-tight text-sm hover:text-blue-300 transition-colors"
                href="{{ route('home') }}">{{ site_t('nav.home') ?? 'Home' }}</a>
            <a class="nav-link text-slate-400 font-medium font-headline tracking-tight text-sm hover:text-blue-300 transition-colors"
                href="{{ request()->routeIs('home') ? '#services' : route('home') . '#services' }}">{{ site_t('nav.services') }}</a>
            <a class="nav-link {{ request()->routeIs('projects.*') ? 'active text-blue-400' : '' }} text-slate-400 font-medium font-headline tracking-tight text-sm hover:text-blue-300 transition-colors"
                href="{{ route('projects.index') }}">{{ site_t('nav.portfolio') }}</a>
            <a class="nav-link text-slate-400 font-medium font-headline tracking-tight text-sm hover:text-blue-300 transition-colors"
                href="{{ request()->routeIs('home') ? '#stats' : route('home') . '#stats' }}">{{ site_t('nav.about') }}</a>
            <a class="nav-link {{ request()->routeIs('contact.index') ? 'active text-blue-400' : '' }} text-slate-400 font-medium font-headline tracking-tight text-sm hover:text-blue-300 transition-colors"
                href="{{ route('contact.index') }}">{{ site_t('nav.contact') }}</a>
            @if (isset($activeLanguages) && $activeLanguages->count() > 1)
                @php
                    $currentLang = $activeLanguages->firstWhere('code', app()->getLocale()) ?? $activeLanguages->first();
                @endphp
                <div class="relative" data-lang-dropdown>
                    <button type="button"
                        class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-2 text-xs font-semibold text-slate-200 hover:bg-white/10 transition"
                        aria-haspopup="menu" aria-expanded="false" data-lang-dropdown-trigger>
                        <span
                            class="text-slate-300">{{ $currentLang?->native_name ?? strtoupper(app()->getLocale()) }}</span>
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div class="hidden absolute right-0 mt-2 w-52 rounded-2xl border border-white/10 bg-[#070716]/90 backdrop-blur-xl shadow-xl shadow-black/30 overflow-hidden"
                        role="menu" aria-label="Language" data-lang-dropdown-menu>
                        @foreach ($activeLanguages as $lang)
                            <a role="menuitem"
                                href="{{ route('locale.switch', ['code' => $lang->code, 'redirect' => $localeRedirect]) }}"
                                class="flex items-center justify-between px-4 py-3 text-sm font-semibold transition-colors {{ $lang->code === app()->getLocale() ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                                <span>{{ $lang->native_name }}</span>
                                @if ($lang->code === app()->getLocale())
                                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
            <a href="{{ request()->routeIs('home') ? '#contact' : route('home') . '#contact' }}"
                class="cta-btn ms-1 lg:ms-4 px-7 py-2.5 hero-gradient text-white rounded-full font-bold text-sm tracking-tight inline-block">
                {{ site_t('nav.cta') }}
            </a>
        </nav>
        <!-- Mobile Menu Button -->
        <button class="md:hidden text-white shrink-0 relative z-50 p-2" id="mobileMenuBtn" type="button"
            aria-label="Toggle menu">
            <span class="material-symbols-outlined text-3xl" id="menuIcon">menu</span>
        </button>
    </div>

    <!-- Mobile Menu Overlay -->
    <div id="mobileMenu"
        class="fixed inset-0 bg-slate-950/98 backdrop-blur-2xl z-40 hidden flex-col transition-all duration-500 ease-in-out opacity-0 translate-x-full">
        <div class="absolute inset-0 bg-grid opacity-20"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-primary/10 via-transparent to-primary/5 pointer-events-none">
        </div>

        <div class="flex flex-col h-full pt-32 px-10 pb-12 relative z-10 overflow-y-auto">
            <nav class="flex flex-col gap-8 mb-auto">
                <a class="mobile-nav-link group flex items-center justify-between text-4xl font-headline font-bold {{ request()->routeIs('home') ? 'text-primary' : 'text-white' }}"
                    href="{{ route('home') }}">
                    <span>{{ site_t('nav.home') ?? 'Home' }}</span>
                    <span
                        class="material-symbols-outlined opacity-0 -translate-x-4 group-hover:opacity-100 group-hover:translate-x-0 transition-all text-primary">arrow_forward</span>
                </a>
                <a class="mobile-nav-link group flex items-center justify-between text-4xl font-headline font-bold text-white"
                    href="{{ request()->routeIs('home') ? '#services' : route('home') . '#services' }}">
                    <span>{{ site_t('nav.services') }}</span>
                    <span
                        class="material-symbols-outlined opacity-0 -translate-x-4 group-hover:opacity-100 group-hover:translate-x-0 transition-all text-primary">arrow_forward</span>
                </a>
                <a class="mobile-nav-link group flex items-center justify-between text-4xl font-headline font-bold {{ request()->routeIs('projects.*') ? 'text-primary' : 'text-white' }}"
                    href="{{ route('projects.index') }}">
                    <span>{{ site_t('nav.portfolio') }}</span>
                    <span
                        class="material-symbols-outlined opacity-0 -translate-x-4 group-hover:opacity-100 group-hover:translate-x-0 transition-all text-primary">arrow_forward</span>
                </a>
                <a class="mobile-nav-link group flex items-center justify-between text-4xl font-headline font-bold text-white"
                    href="{{ request()->routeIs('home') ? '#stats' : route('home') . '#stats' }}">
                    <span>{{ site_t('nav.about') }}</span>
                    <span
                        class="material-symbols-outlined opacity-0 -translate-x-4 group-hover:opacity-100 group-hover:translate-x-0 transition-all text-primary">arrow_forward</span>
                </a>
                <a class="mobile-nav-link group flex items-center justify-between text-4xl font-headline font-bold {{ request()->routeIs('contact.index') ? 'text-primary' : 'text-white' }}"
                    href="{{ route('contact.index') }}">
                    <span>{{ site_t('nav.contact') }}</span>
                    <span
                        class="material-symbols-outlined opacity-0 -translate-x-4 group-hover:opacity-100 group-hover:translate-x-0 transition-all text-primary">arrow_forward</span>
                </a>
            </nav>

            @if (isset($activeLanguages) && $activeLanguages->count() > 1)
                <div class="mt-12 border-t border-white/10 pt-8">
                    <p class="text-xs uppercase tracking-[0.2em] text-slate-500 font-bold mb-6 flex items-center gap-2">
                        <span class="w-8 h-px bg-white/10"></span>
                        {{ site_t('common.language') ?? 'Language' }}
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach ($activeLanguages as $lang)
                            <a href="{{ route('locale.switch', ['code' => $lang->code, 'redirect' => $localeRedirect]) }}"
                                class="flex items-center justify-center px-4 py-4 rounded-2xl border {{ $lang->code === app()->getLocale() ? 'bg-primary/20 border-primary/30 text-primary shadow-lg shadow-primary/10' : 'bg-white/5 border-white/10 text-white/70 hover:bg-white/10' }} font-bold text-sm transition-all duration-300">
                                {{ $lang->native_name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="mt-10">
                <a href="{{ route('contact.index') }}"
                    class="w-full flex items-center justify-center px-8 py-5 hero-gradient text-white rounded-2xl font-bold text-xl tracking-tight shadow-2xl shadow-primary/30 active:scale-[0.98] transition-transform">
                    {{ site_t('nav.cta') }}
                    <span class="material-symbols-outlined ms-2">arrow_forward</span>
                </a>
            </div>
        </div>
    </div>
</header>