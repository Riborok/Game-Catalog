<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('profile');
        } else {
            return VisitedPages::view('login');
        }
    }

    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('profile');
        } else {
            return VisitedPages::view('register');
        }
    }

    public function showProfile()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return VisitedPages::view('profile', ['user' => $user]);
        } else {
            return redirect()->route('login');
        }
    }
}
