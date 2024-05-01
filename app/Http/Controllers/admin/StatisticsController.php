<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\handler\VisitedPages;
use App\Models\Activity;
use App\Models\Link;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
    public function showStatistics()
    {
        $user = Auth::user();
        $users = User::retrieveCached()->pluck('name', 'id')->toArray();

        $activities = Activity::orderBy('user_id')->get();
        $links = Link::orderByDesc('clicks')->get();

        return VisitedPages::view('pages.admin.statistics', [
            'user' => $user,
            'users' => $users,
            'activities' => $activities,
            'links' => $links,
        ]);
    }
}
