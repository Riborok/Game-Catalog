<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showForgotPassword()
    {
        return TrackingController::view('forgot-password');
    }

    public function submit(ForgotPasswordRequest $request) {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', trans($status));
        }

        return back()->withErrors(['email' => trans($status)])->withInput();
    }
}
