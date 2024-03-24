<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    public function userAdministration() {
        $user = Auth::user();
        $users = User::retrieveCached();
        return view('user-administration', ['user' => $user, 'users' => $users]);
    }

    public function deleteUser($id) {
        User::clearCached();
        $user = User::find($id);
        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        if ($user->id === Auth::id()) {
            Auth::logout();
        }

        $user->delete();
        return back()->with('success', 'User deleted successfully.');
    }

    public function changeStatus($id) {
        User::clearCached();
        $user = User::find($id);
        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        $user->admin = !$user->admin;
        $user->save();
        return back()->with('success', 'User made ' . ($user->admin ? 'admin' : 'user') . ' successfully.');
    }
}
