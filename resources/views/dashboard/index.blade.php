@extends('dashboard.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-zinc-900">Overview</h1>
            <p class="mt-1 text-sm text-zinc-500">Summary of activity and key metrics.</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <button type="button" class="rounded-xl border border-zinc-200 bg-white px-4 py-2 text-sm font-medium text-zinc-700 shadow-sm transition hover:bg-zinc-50">
                Export
            </button>
            <button type="button" class="inline-flex items-center gap-2 rounded-xl bg-zinc-900 px-4 py-2 text-sm font-semibold text-white shadow-md shadow-zinc-900/10 transition hover:bg-zinc-800">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                New project
            </button>
        </div>
    </div>

    <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-2xl border border-zinc-200/80 bg-white p-5 shadow-sm">
            <div class="flex items-start justify-between">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </span>
                <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-xs font-medium text-emerald-700">+12%</span>
            </div>
            <p class="mt-4 text-2xl font-semibold tabular-nums text-zinc-900">8,492</p>
            <p class="text-sm text-zinc-500">Total users</p>
        </div>

        <div class="rounded-2xl border border-zinc-200/80 bg-white p-5 shadow-sm">
            <div class="flex items-start justify-between">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-50 text-sky-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                </span>
                <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-xs font-medium text-emerald-700">+8.5%</span>
            </div>
            <p class="mt-4 text-2xl font-semibold tabular-nums text-zinc-900">$45.2K</p>
            <p class="text-sm text-zinc-500">Revenue</p>
        </div>

        <div class="rounded-2xl border border-zinc-200/80 bg-white p-5 shadow-sm">
            <div class="flex items-start justify-between">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </span>
                <span class="rounded-full bg-rose-50 px-2 py-0.5 text-xs font-medium text-rose-700">−2.4%</span>
            </div>
            <p class="mt-4 text-2xl font-semibold tabular-nums text-zinc-900">1,240</p>
            <p class="text-sm text-zinc-500">Active projects</p>
        </div>

        <div class="rounded-2xl border border-zinc-200/80 bg-white p-5 shadow-sm">
            <div class="flex items-start justify-between">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-50 text-violet-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </span>
                <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-xs font-medium text-emerald-700">+24%</span>
            </div>
            <p class="mt-4 text-2xl font-semibold tabular-nums text-zinc-900">85%</p>
            <p class="text-sm text-zinc-500">Tasks done</p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="overflow-hidden rounded-2xl border border-zinc-200/80 bg-white shadow-sm lg:col-span-2">
            <div class="flex items-center justify-between border-b border-zinc-100 px-5 py-4">
                <h2 class="text-sm font-semibold text-zinc-900">Recent activity</h2>
                <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">View all</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b border-zinc-100 bg-zinc-50/80 text-xs font-medium uppercase tracking-wide text-zinc-500">
                            <th class="whitespace-nowrap px-5 py-3">Project</th>
                            <th class="whitespace-nowrap px-5 py-3">Client</th>
                            <th class="whitespace-nowrap px-5 py-3">Status</th>
                            <th class="whitespace-nowrap px-5 py-3">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100 text-zinc-700">
                        <tr class="transition-colors hover:bg-zinc-50/80">
                            <td class="whitespace-nowrap px-5 py-3.5">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-indigo-100 text-xs font-semibold text-indigo-700">WD</span>
                                    <span class="font-medium text-zinc-900">Web Dashboard</span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-5 py-3.5">Acme Corp</td>
                            <td class="whitespace-nowrap px-5 py-3.5">
                                <span class="rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-medium text-emerald-800">Done</span>
                            </td>
                            <td class="whitespace-nowrap px-5 py-3.5 text-zinc-500">Oct 24, 2023</td>
                        </tr>
                        <tr class="transition-colors hover:bg-zinc-50/80">
                            <td class="whitespace-nowrap px-5 py-3.5">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-sky-100 text-xs font-semibold text-sky-700">MA</span>
                                    <span class="font-medium text-zinc-900">Mobile App UI</span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-5 py-3.5">Globex Inc</td>
                            <td class="whitespace-nowrap px-5 py-3.5">
                                <span class="rounded-full bg-amber-50 px-2.5 py-0.5 text-xs font-medium text-amber-800">Active</span>
                            </td>
                            <td class="whitespace-nowrap px-5 py-3.5 text-zinc-500">Oct 22, 2023</td>
                        </tr>
                        <tr class="transition-colors hover:bg-zinc-50/80">
                            <td class="whitespace-nowrap px-5 py-3.5">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-violet-100 text-xs font-semibold text-violet-700">LP</span>
                                    <span class="font-medium text-zinc-900">Landing Page</span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-5 py-3.5">Stark Ind.</td>
                            <td class="whitespace-nowrap px-5 py-3.5">
                                <span class="rounded-full bg-zinc-100 px-2.5 py-0.5 text-xs font-medium text-zinc-700">Pending</span>
                            </td>
                            <td class="whitespace-nowrap px-5 py-3.5 text-zinc-500">Oct 20, 2023</td>
                        </tr>
                        <tr class="transition-colors hover:bg-zinc-50/80">
                            <td class="whitespace-nowrap px-5 py-3.5">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-rose-100 text-xs font-semibold text-rose-700">SA</span>
                                    <span class="font-medium text-zinc-900">SaaS Platform</span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-5 py-3.5">Initech</td>
                            <td class="whitespace-nowrap px-5 py-3.5">
                                <span class="rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-medium text-emerald-800">Done</span>
                            </td>
                            <td class="whitespace-nowrap px-5 py-3.5 text-zinc-500">Oct 18, 2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="rounded-2xl border border-zinc-200/80 bg-white p-5 shadow-sm">
            <h2 class="text-sm font-semibold text-zinc-900">Team</h2>
            <p class="mt-0.5 text-xs text-zinc-500">Top completion rates</p>
            <ul class="mt-5 space-y-4">
                <li class="flex items-center justify-between gap-3">
                    <div class="flex min-w-0 items-center gap-3">
                        <img src="https://ui-avatars.com/api/?name=Sarah+Connor&background=e4e4e7&color=18181b" alt="" class="h-10 w-10 rounded-full">
                        <div class="min-w-0">
                            <p class="truncate text-sm font-medium text-zinc-900">Sarah Connor</p>
                            <p class="truncate text-xs text-zinc-500">Lead designer</p>
                        </div>
                    </div>
                    <span class="shrink-0 text-sm font-semibold tabular-nums text-zinc-900">98%</span>
                </li>
                <li class="flex items-center justify-between gap-3">
                    <div class="flex min-w-0 items-center gap-3">
                        <img src="https://ui-avatars.com/api/?name=John+Doe&background=e4e4e7&color=18181b" alt="" class="h-10 w-10 rounded-full">
                        <div class="min-w-0">
                            <p class="truncate text-sm font-medium text-zinc-900">John Doe</p>
                            <p class="truncate text-xs text-zinc-500">Frontend</p>
                        </div>
                    </div>
                    <span class="shrink-0 text-sm font-semibold tabular-nums text-zinc-900">92%</span>
                </li>
                <li class="flex items-center justify-between gap-3">
                    <div class="flex min-w-0 items-center gap-3">
                        <img src="https://ui-avatars.com/api/?name=Jane+Smith&background=e4e4e7&color=18181b" alt="" class="h-10 w-10 rounded-full">
                        <div class="min-w-0">
                            <p class="truncate text-sm font-medium text-zinc-900">Jane Smith</p>
                            <p class="truncate text-xs text-zinc-500">PM</p>
                        </div>
                    </div>
                    <span class="shrink-0 text-sm font-semibold tabular-nums text-zinc-900">88%</span>
                </li>
            </ul>
            <button type="button" class="mt-6 w-full rounded-xl border border-zinc-200 py-2.5 text-sm font-medium text-zinc-700 transition hover:bg-zinc-50">
                Full team
            </button>
        </div>
    </div>
@endsection
