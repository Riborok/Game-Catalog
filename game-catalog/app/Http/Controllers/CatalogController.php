<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Utils\Translate;
use Illuminate\Http\Request;

class CatalogController extends Controller {
    public function showCatalog() {
        $games = Game::retrieveCached();
        Translate::translateFields($games, ['title', 'description']);
        return VisitedPages::view('catalog', ['games' => $games]);
    }
}
