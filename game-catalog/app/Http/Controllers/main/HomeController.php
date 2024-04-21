<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Http\Controllers\handler\VisitedPages;
use App\Models\Feature;
use App\Utils\Translate;

class HomeController extends Controller{
    public function showHome() {
        $features = Feature::retrieveCached();
        Translate::translateFieldsDefault($features, ['title', 'text']);
        return VisitedPages::view('pages.home', ['features' => $features]);
    }
}
