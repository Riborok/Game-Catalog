<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('profile');
        } else {
            return TrackingController::trackPages('login');
        }
    }

    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('profile');
        } else {
            return TrackingController::trackPages('register');
        }
    }

    public function showProfile()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return TrackingController::trackPages('profile', ['user' => $user]);
        } else {
            return redirect()->route('login');
        }
    }
}
