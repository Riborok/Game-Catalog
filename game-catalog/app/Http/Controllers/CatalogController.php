<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Utils\Translate;

class CatalogController extends Controller {
    public function showCatalog() {
        $games = Game::retrieveCached();
        Translate::translateFieldsDefault($games, ['title', 'description']);
        return VisitedPages::view('catalog', ['games' => $games]);
    }
}
