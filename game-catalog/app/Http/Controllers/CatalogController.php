<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class CatalogController extends Controller {
    public function showCatalog() {
        $games = Game::retrieveCached();
        return TrackingController::view('catalog', ['games' => $games]);
    }
}
