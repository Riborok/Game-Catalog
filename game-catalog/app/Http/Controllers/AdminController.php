<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Game;

class AdminController extends Controller
{
    public function home()
    {
        $features = Feature::all();
        return view('home', ['features' => $features]);
    }
    public function catalog()
    {
        $games = Game::all();
        return view('catalog', ['games' => $games]);
    }
}
