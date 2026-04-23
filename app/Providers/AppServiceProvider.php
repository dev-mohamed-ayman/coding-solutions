<?php

namespace App\Providers;

use App\Models\Language;
use App\Services\SiteTranslationService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(SiteTranslationService::class, fn () => new SiteTranslationService);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('web.layouts.app', function (\Illuminate\View\View $view): void {
            if (! Schema::hasTable('languages')) {
                $view->with([
                    'activeLanguages' => collect(),
                    'htmlDir' => 'ltr',
                ]);

                return;
            }

            $activeLanguages = Language::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get();

            $current = Language::query()->where('code', app()->getLocale())->first();

            $view->with([
                'activeLanguages' => $activeLanguages,
                'htmlDir' => $current?->direction ?? 'ltr',
            ]);
        });
    }
}
