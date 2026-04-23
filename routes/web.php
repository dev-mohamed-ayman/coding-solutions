<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('web.home');
});


Route::get('/dashboard/login', function () {
    return view('dashboard.auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});
