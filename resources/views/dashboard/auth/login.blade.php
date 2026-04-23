<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in — Dashboard</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Manrope', system-ui, sans-serif; }
    </style>
</head>
<body class="min-h-screen antialiased text-zinc-900 bg-zinc-100 selection:bg-indigo-100 selection:text-indigo-900">

    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-12 sm:px-6">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-24 -right-24 h-96 w-96 rounded-full bg-indigo-200/40 blur-3xl"></div>
            <div class="absolute -bottom-32 -left-32 h-96 w-96 rounded-full bg-violet-200/35 blur-3xl"></div>
        </div>

        <div class="relative w-full max-w-md">
            <div class="mb-8 text-center">
                <div class="inline-flex items-center justify-center gap-2.5 mb-6">
                    <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-zinc-900 text-white shadow-lg shadow-zinc-900/15">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </span>
                    <span class="text-xl font-semibold tracking-tight text-zinc-900">NexusDash</span>
                </div>
                <h1 class="text-2xl font-semibold tracking-tight text-zinc-900">Welcome back</h1>
                <p class="mt-2 text-sm text-zinc-500">Sign in to continue to your workspace.</p>
            </div>

            <div class="rounded-2xl border border-zinc-200/80 bg-white/90 p-8 shadow-xl shadow-zinc-200/40 backdrop-blur-sm">
                <form action="#" method="POST" class="space-y-5">
                    <div>
                        <label for="email" class="mb-1.5 block text-sm font-medium text-zinc-700">Email</label>
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="block w-full rounded-xl border border-zinc-200 bg-zinc-50/50 px-4 py-3 text-zinc-900 placeholder:text-zinc-400 transition-colors focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20"
                            placeholder="you@company.com">
                    </div>

                    <div>
                        <div class="mb-1.5 flex items-center justify-between">
                            <label for="password" class="text-sm font-medium text-zinc-700">Password</label>
                            <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Forgot?</a>
                        </div>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="block w-full rounded-xl border border-zinc-200 bg-zinc-50/50 px-4 py-3 text-zinc-900 placeholder:text-zinc-400 transition-colors focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20"
                            placeholder="••••••••">
                    </div>

                    <div class="flex items-center gap-2">
                        <input id="remember-me" name="remember-me" type="checkbox"
                            class="h-4 w-4 rounded border-zinc-300 text-indigo-600 focus:ring-indigo-500/30">
                        <label for="remember-me" class="text-sm text-zinc-600">Stay signed in</label>
                    </div>

                    <button type="submit"
                        class="w-full rounded-xl bg-zinc-900 py-3 text-sm font-semibold text-white shadow-md shadow-zinc-900/10 transition hover:bg-zinc-800 focus:outline-none focus:ring-2 focus:ring-zinc-900 focus:ring-offset-2 active:scale-[0.99]">
                        Sign in
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-zinc-500">
                    No account?
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Create one</a>
                </p>
            </div>

            <p class="mt-8 text-center text-xs text-zinc-400">© {{ date('Y') }} NexusDash</p>
        </div>
    </div>

</body>
</html>
