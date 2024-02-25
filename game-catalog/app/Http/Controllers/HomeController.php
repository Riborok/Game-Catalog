<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $features = Feature::all();
        return view('home', ['features' => $features]);
    }
}
