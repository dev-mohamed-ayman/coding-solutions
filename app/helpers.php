<?php

use App\Services\SiteTranslationService;

if (! function_exists('site_t')) {
    function site_t(string $key, ?string $default = null): string
    {
        return app(SiteTranslationService::class)->get($key, $default);
    }
}

if (! function_exists('site_t_line')) {
    function site_t_line(string $key, array $replace = [], ?string $default = null): string
    {
        return app(SiteTranslationService::class)->line($key, $replace, $default);
    }
}
