<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Utils\Translate;
use Illuminate\Http\Request;

class HomeController extends Controller{
    public function showHome() {
        $features = Feature::retrieveCached();
        Translate::translateFields($features, ['title', 'text']);
        return VisitedPages::view('home', ['features' => $features]);
    }
}
