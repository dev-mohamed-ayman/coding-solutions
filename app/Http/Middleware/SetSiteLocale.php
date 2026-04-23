<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\Response;

class SetSiteLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! Schema::hasTable('languages')) {
            return $next($request);
        }

        $defaultCode = Language::defaultCode();

        if ($request->has('lang')) {
            $candidate = (string) $request->query('lang');
            if (Language::query()->where('code', $candidate)->where('is_active', true)->exists()) {
                session(['site_locale' => $candidate]);
            }
        }

        $sessionLocale = session('site_locale');
        $locale = $defaultCode;

        if (
            is_string($sessionLocale)
            && Language::query()->where('code', $sessionLocale)->where('is_active', true)->exists()
        ) {
            $locale = $sessionLocale;
        }

        App::setLocale($locale);

        return $next($request);
    }
}
