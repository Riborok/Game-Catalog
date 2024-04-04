<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class HomeController extends Controller{
    public function showHome() {
        $features = Feature::retrieveCached();
        return TrackingController::view('home', ['features' => $features]);
    }
}
