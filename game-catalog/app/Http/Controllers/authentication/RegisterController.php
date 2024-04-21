<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function submit(RegisterRequest $registerRequest)
    {
        User::clearCached();
        $user = new User();

        $user->name = $registerRequest->name;
        $user->email = $registerRequest->email;
        $user->password = Hash::make($registerRequest->password);
        $user->save();
        Auth::login($user, $registerRequest->filled('remember'));
        return redirect()->route('profile');
    }
}
