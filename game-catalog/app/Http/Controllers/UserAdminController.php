<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserAdminController extends Controller
{
    public function showUserAdministration()
    {
        $user = Auth::user();
        $users = User::retrieveCached();
        return VisitedPages::view('user-administration', ['user' => $user, 'users' => $users]);
    }

    public function deleteUser($id)
    {
        User::clearCached();
        $user = User::find($id);
        if (!$user) {
            return back()->with('error', trans('session.user-not-found'));
        }

        if ($user->id === Auth::id()) {
            Auth::logout();
        }

        if ($user->delete()) {
            return back()->with('success', trans('session.user-deleted'));
        } else {
            return back()->with('error', trans('session.user-not-deleted'));
        }
    }

    public function changeStatus($id)
    {
        User::clearCached();
        $user = User::find($id);
        if (!$user) {
            return back()->with('error', trans('session.user-not-found'));
        }

        $user->admin = !$user->admin;
        $user->save();

        if ($user->save()) {
            return back()->with('success', trans('session.user-status-changed', [
                'name' => $user->name,
                'status' => trans_choice('user-status.' . ($user->admin ? 'admin' : 'user'), 2)
            ]));
        } else {
            return back()->with('error', trans('session.user-status-not-changed'));
        }
    }
}
