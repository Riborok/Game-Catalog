<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function changeLanguage($locale): \Illuminate\Http\RedirectResponse
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
