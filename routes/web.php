<?php

use App\Http\Controllers\Dashboard\LanguageController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\TestimonialController;
use App\Http\Controllers\Dashboard\WebsiteController;
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

    // New Website CMS Routes
    Route::get('/website/{section}', [WebsiteController::class, 'edit'])->name('website.edit');
    Route::post('/website/{section}', [WebsiteController::class, 'update'])->name('website.update');

    // Projects CRUD
    Route::resource('projects', ProjectController::class)->except(['show']);

    // Testimonials CRUD
    Route::resource('testimonials', TestimonialController::class)->except(['show']);
});
