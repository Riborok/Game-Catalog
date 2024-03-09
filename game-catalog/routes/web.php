<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\AdminController@home')->name('home');

Route::get('/catalog', 'App\Http\Controllers\AdminController@catalog')->name('catalog');

Route::get('/login', 'App\Http\Controllers\CheckAuthController@showLogin')->name('login');

Route::get('/register', 'App\Http\Controllers\CheckAuthController@showRegister')->name('register');

Route::get('/profile', 'App\Http\Controllers\CheckAuthController@showProfile')->name('profile');

Route::post('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

Route::post('/profile/register', 'App\Http\Controllers\RegisterController@submit')->name('profile.register');

Route::post('/profile/login', 'App\Http\Controllers\LoginController@submit')->name('profile.login');
