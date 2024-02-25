<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/catalog', function () {
    return view('catalog');
})->name('catalog');

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect()->route('profile');
    } else {
        return view('login');
    }
})->name('login');

Route::get('/register', function () {
    if (Auth::check()) {
        return redirect()->route('profile');
    } else {
        return view('register');
    }
})->name('register');

Route::get('/profile', function () {
    if (Auth::check()) {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    } else {
        return redirect()->route('login');
    }
})->name('profile');

Route::post('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

Route::post('/profile/register', 'App\Http\Controllers\RegisterController@submit')->name('profile.register');

Route::post('/profile/login', 'App\Http\Controllers\LoginController@submit')->name('profile.login');
