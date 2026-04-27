<?php

use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\LanguageController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\TestimonialController;
use App\Http\Controllers\Dashboard\WebsiteController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LocaleSwitchController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Middleware\SetSiteLocale;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->middleware(SetSiteLocale::class)
    ->name('home');

Route::get('/locale/{code}', [LocaleSwitchController::class, 'switch'])
    ->name('locale.switch');

Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact.index');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/', fn () => view('dashboard.index'))->name('index');

        Route::resource('languages', LanguageController::class)->except(['show']);

        Route::get('/website/{section}', [WebsiteController::class, 'edit'])->name('website.edit');
        Route::post('/website/{section}', [WebsiteController::class, 'update'])->name('website.update');

        Route::resource('projects', ProjectController::class)->except(['show']);

        Route::resource('testimonials', TestimonialController::class)->except(['show']);

        Route::resource('contact-messages', \App\Http\Controllers\Dashboard\ContactMessageController::class)->only(['index', 'show', 'destroy']);
    });

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
