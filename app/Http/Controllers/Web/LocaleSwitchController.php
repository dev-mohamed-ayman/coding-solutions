<?php

namespace App\Http\Controllers\Web;

use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleSwitchController
{
    public function switch(Request $request, string $code): RedirectResponse
    {
        Language::query()->where('code', $code)->where('is_active', true)->firstOrFail();

        session(['site_locale' => $code]);

        $redirect = $request->string('redirect')->toString();
        if ($redirect !== '' && str_starts_with($redirect, '/') && ! str_starts_with($redirect, '//')) {
            return redirect()->to($redirect);
        }

        return redirect()->route('home');
    }
}
