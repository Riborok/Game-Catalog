<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use App\Http\Controllers\handler\VisitedPages;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('profile');
        } else {
            return VisitedPages::view('pages.login');
        }
    }

    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('profile');
        } else {
            return VisitedPages::view('pages.register');
        }
    }

    public function showProfile()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return VisitedPages::view('pages.profile', ['user' => $user]);
        } else {
            return redirect()->route('login');
        }
    }
}
