<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Manrope', system-ui, sans-serif;
        }
    </style>
</head>

<body
    class="flex h-screen overflow-hidden bg-zinc-100 text-zinc-900 antialiased selection:bg-indigo-100 selection:text-indigo-900">

    <aside class="z-20 hidden h-full w-60 shrink-0 flex-col border-r border-zinc-200/80 bg-white md:flex">
        <div class="flex h-14 items-center gap-2.5 border-b border-zinc-100 px-5">
            <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-zinc-900 text-white">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </span>
            <span class="text-base font-semibold tracking-tight">Nexus<span class="text-indigo-600">Dash</span></span>
        </div>

        <nav class="flex-1 space-y-0.5 overflow-y-auto px-3 py-4">
            <p class="mb-2 px-3 text-[11px] font-semibold uppercase tracking-wider text-zinc-400">Menu</p>

            <a href="#"
                class="flex items-center gap-3 rounded-xl bg-zinc-100 px-3 py-2.5 text-sm font-medium text-zinc-900">
                <svg class="h-5 w-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                Dashboard
            </a>

            <a href="#"
                class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-zinc-600 transition-colors hover:bg-zinc-50 hover:text-zinc-900">
                <svg class="h-5 w-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Users
            </a>

            <a href="#"
                class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-zinc-600 transition-colors hover:bg-zinc-50 hover:text-zinc-900">
                <svg class="h-5 w-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                Analytics
            </a>

            @php
                $unreadMessagesCount = \App\Models\ContactMessage::where('is_read', false)->count();
            @endphp
            <a href="{{ route('dashboard.contact-messages.index') }}"
                class="flex items-center justify-between gap-3 rounded-xl px-3 py-2.5 text-sm font-medium {{ request()->routeIs('dashboard.contact-messages.*') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }} transition-colors">
                <span class="flex items-center gap-3">
                    <svg class="h-5 w-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Messages
                </span>
                @if($unreadMessagesCount > 0)
                    <span
                        class="rounded-full bg-indigo-100 px-2 py-0.5 text-[11px] font-semibold text-indigo-700">{{ $unreadMessagesCount }}</span>
                @endif
            </a>

            <p class="mb-2 mt-6 px-3 text-[11px] font-semibold uppercase tracking-wider text-zinc-400">Site Settings</p>

            <a href="{{ route('dashboard.languages.index') }}"
                class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium {{ request()->routeIs('dashboard.languages.*') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }} transition-colors">
                <svg class="h-5 w-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                </svg>
                Languages
            </a>

            <p class="mb-2 mt-6 px-3 text-[11px] font-semibold uppercase tracking-wider text-zinc-400">Website Content
            </p>

            <div class="space-y-1">
                <a href="{{ route('dashboard.website.edit', 'hero') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium {{ request()->is('dashboard/website/hero') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }} transition-colors">
                    Hero Section
                </a>
                <a href="{{ route('dashboard.website.edit', 'services') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium {{ request()->is('dashboard/website/services') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }} transition-colors">
                    Services
                </a>
                <a href="{{ route('dashboard.website.edit', 'why-us') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium {{ request()->is('dashboard/website/why-us') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }} transition-colors">
                    Why Choose Us
                </a>
                <a href="{{ route('dashboard.website.edit', 'technologies') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium {{ request()->is('dashboard/website/technologies') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }} transition-colors">
                    Technologies
                </a>
                <a href="{{ route('dashboard.projects.index') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium {{ request()->routeIs('dashboard.projects.*') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }} transition-colors">
                    Projects
                </a>
                <a href="{{ route('dashboard.testimonials.index') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium {{ request()->routeIs('dashboard.testimonials.*') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }} transition-colors">
                    Testimonials
                </a>
                <a href="{{ route('dashboard.website.edit', 'stats') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium {{ request()->is('dashboard/website/stats') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }} transition-colors">
                    Stats
                </a>
                <a href="{{ route('dashboard.website.edit', 'contact') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium {{ request()->is('dashboard/website/contact') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }} transition-colors">
                    Contact & Socials
                </a>
                <a href="{{ route('dashboard.website.edit', 'about') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium {{ request()->is('dashboard/website/about') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }} transition-colors">
                    About Page
                </a>
                <a href="{{ route('dashboard.website.edit', 'process') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium {{ request()->is('dashboard/website/process') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }} transition-colors">
                    Our Process
                </a>
                <a href="{{ route('dashboard.website.edit', 'header') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium {{ request()->is('dashboard/website/header') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }} transition-colors">
                    Header & Nav
                </a>
                <a href="{{ route('dashboard.website.edit', 'footer') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium {{ request()->is('dashboard/website/footer') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }} transition-colors">
                    Footer
                </a>
            </div>

            <p class="mb-2 mt-6 px-3 text-[11px] font-semibold uppercase tracking-wider text-zinc-400">Settings</p>

            <a href="#"
                class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-zinc-600 transition-colors hover:bg-zinc-50 hover:text-zinc-900">
                <svg class="h-5 w-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                General
            </a>
        </nav>

        <div class="border-t border-zinc-100 p-3">
            <div class="flex items-center gap-3 rounded-xl bg-zinc-50 px-2 py-2">
                <img src="https://ui-avatars.com/api/?name=Admin+User&background=6366f1&color=fff" alt=""
                    class="h-9 w-9 rounded-full ring-2 ring-white">
                <div class="min-w-0 flex-1">
                    <p class="truncate text-sm font-medium text-zinc-900">{{ auth()->user()->name }}</p>
                    <p class="truncate text-xs text-zinc-500">{{ auth()->user()->email }}</p>
                </div>
                <form action="{{ route('dashboard.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="rounded-lg p-1.5 text-zinc-400 transition-colors hover:bg-white hover:text-red-500"
                        aria-label="Sign out">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <div class="flex min-w-0 flex-1 flex-col">
        <header
            class="sticky top-0 z-10 flex h-14 shrink-0 items-center justify-between gap-4 border-b border-zinc-200/80 bg-white/95 px-4 backdrop-blur-md sm:px-6">
            <div class="flex min-w-0 flex-1 items-center gap-3">
                <button type="button"
                    class="rounded-lg p-2 text-zinc-500 hover:bg-zinc-100 hover:text-zinc-800 md:hidden"
                    aria-label="Open menu">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="relative hidden max-w-xs flex-1 sm:block sm:max-w-sm">
                    <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-zinc-400">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input type="search"
                        class="w-full rounded-xl border border-zinc-200 bg-zinc-50/80 py-2 pl-9 pr-3 text-sm text-zinc-900 placeholder:text-zinc-400 focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20"
                        placeholder="Search…">
                </div>
            </div>

            <div class="flex items-center gap-1 sm:gap-2">
                <button type="button"
                    class="relative rounded-xl p-2 text-zinc-500 transition-colors hover:bg-zinc-100 hover:text-zinc-800">
                    <span class="absolute right-1.5 top-1.5 h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>
                <button type="button" class="flex items-center gap-2 rounded-xl py-1 pl-1 pr-2 hover:bg-zinc-100">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=6366f1&color=fff"
                        alt="" class="h-8 w-8 rounded-full ring-2 ring-zinc-100">
                    <span class="hidden text-sm font-medium text-zinc-700 sm:block">{{ auth()->user()->name }}</span>
                    <svg class="hidden h-4 w-4 text-zinc-400 sm:block" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto overflow-x-hidden p-4 sm:p-6 lg:p-8">
            <div class="mx-auto w-full max-w-6xl">
                @yield('content')
            </div>
        </main>
    </div>

</body>

</html>