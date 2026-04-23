<?php

namespace App\Http\Controllers\Web;

use Illuminate\View\View;

class HomeController
{
    public function index(): View
    {
        return view('web.home');
    }
}
