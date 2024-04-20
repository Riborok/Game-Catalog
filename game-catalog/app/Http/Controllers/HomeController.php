<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Utils\Translate;

class HomeController extends Controller{
    public function showHome() {
        $features = Feature::retrieveCached();
        Translate::translateFieldsDefault($features, ['title', 'text']);
        return VisitedPages::view('home', ['features' => $features]);
    }
}
