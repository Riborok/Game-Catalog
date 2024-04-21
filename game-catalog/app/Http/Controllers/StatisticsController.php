<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Link;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
    public function showStatistics()
    {
        $user = Auth::user();
        $users = User::retrieveCached()->pluck('name', 'id')->toArray();

        $activities = Activity::orderBy('user_id')->get();
        $links = Link::all();

        return VisitedPages::view('statistics', [
            'user' => $user,
            'users' => $users,
            'activities' => $activities,
            'links' => $links,
        ]);
    }
}
