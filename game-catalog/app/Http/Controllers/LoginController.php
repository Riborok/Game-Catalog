<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function submit(LoginRequest $loginRequest)
    {
        $credentials = $loginRequest->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => trans('error.email-not-found'),
            ])->withInput();
        }

        if (!Auth::attempt($credentials, $loginRequest->filled('remember'))) {
            return back()->withErrors([
                'password' => trans('error.incorrect-password'),
            ])->withInput();
        }

        return redirect()->route('profile');
    }
}
