<?php

use App\Http\Controllers\Dashboard\ContentController;
use App\Http\Controllers\Dashboard\LanguageController;
use App\Http\Controllers\Dashboard\SiteTranslationController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LocaleSwitchController;
use App\Http\Middleware\SetSiteLocale;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->middleware(SetSiteLocale::class)
    ->name('home');

Route::get('/locale/{code}', [LocaleSwitchController::class, 'switch'])
    ->name('locale.switch');

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/login', fn () => view('dashboard.auth.login'))->name('login');
    Route::get('/', fn () => view('dashboard.index'))->name('index');

    Route::resource('languages', LanguageController::class)->except(['show']);

    Route::get('/translations', [SiteTranslationController::class, 'index'])->name('translations.index');
    Route::post('/translations', [SiteTranslationController::class, 'update'])->name('translations.update');
    Route::post('/translations/keys', [SiteTranslationController::class, 'storeKey'])->name('translations.store-key');

    Route::get('/content', [ContentController::class, 'index'])->name('content.index');
    Route::get('/content/{page:slug}', [ContentController::class, 'edit'])->name('content.edit');
    Route::put('/content/{page:slug}/sections/{section}', [ContentController::class, 'updateSection'])->name('content.sections.update');
    Route::post('/content/{page:slug}/blocks', [ContentController::class, 'storeBlock'])->name('content.blocks.store');
    Route::put('/content/{page:slug}/blocks/{block}', [ContentController::class, 'updateBlock'])->name('content.blocks.update');
    Route::delete('/content/{page:slug}/blocks/{block}', [ContentController::class, 'destroyBlock'])->name('content.blocks.destroy');
});
