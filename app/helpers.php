<?php

use App\Services\ContentService;
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

if (! function_exists('cms_blocks')) {
    /**
     * @return array<int, array<string, mixed>>
     */
    function cms_blocks(string $pageSlug, string $zone): array
    {
        $data = app(ContentService::class)->pageData($pageSlug);
        if (! $data) {
            return [];
        }

        return $data['blocksByZone']->get($zone, collect())->values()->all();
    }
}
