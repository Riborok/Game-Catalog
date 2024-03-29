<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Game;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function home()
    {
        $features = Feature::retrieveCached();
        return TrackingController::trackPages('home', ['features' => $features]);
    }

    public function catalog()
    {
        $games = Game::retrieveCached();
        return TrackingController::trackPages('catalog', ['games' => $games]);
    }
}
