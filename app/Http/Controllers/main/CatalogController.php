<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Http\Controllers\handler\VisitedPages;
use App\Models\Game;
use App\Utils\Translate;

class CatalogController extends Controller {
    public function showCatalog() {
        $games = Game::retrieveCached();
        Translate::translateFieldsDefault($games, ['title', 'description']);
        return VisitedPages::view('pages.catalog', ['games' => $games]);
    }
}
