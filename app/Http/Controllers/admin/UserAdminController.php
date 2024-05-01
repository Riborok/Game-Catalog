<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\handler\VisitedPages;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserAdminController extends Controller
{
    public function showUserAdministration()
    {
        $user = Auth::user();
        $users = User::retrieveCached();
        return VisitedPages::view('pages.admin.user-administration', ['user' => $user, 'users' => $users]);
    }

    public function delete($id)
    {
        User::clearCached();
        $user = User::find($id);
        if (!$user) {
            return back()->with('error', trans('session.not-found', ['name' => trans('name.user')]));
        }

        if ($user->id === Auth::id()) {
            Auth::logout();
        }

        if ($user->delete()) {
            return back()->with('success', trans('session.deleted', ['name' => $user->name]));
        } else {
            return back()->with('error', trans('session.not-deleted', ['name' => $user->name]));
        }
    }

    public function changeStatus($id)
    {
        User::clearCached();
        $user = User::find($id);
        if (!$user) {
            return back()->with('error', trans('session.not-found', ['name' => trans('name.user')]));
        }

        $user->admin = !$user->admin;
        if ($user->save()) {
            return back()->with('success', trans('session.status-changed', [
                'name' => $user->name,
                'status' => trans_choice('user-status.' . ($user->admin ? 'admin' : 'user'), 2)
            ]));
        } else {
            return back()->with('error', trans('session.status-not-changed', ['name' => $user->name]));
        }
    }
}
