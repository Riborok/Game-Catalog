<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\PageController@home')->name('home');

Route::get('/catalog', 'App\Http\Controllers\PageController@catalog')->name('catalog');

Route::get('/login', 'App\Http\Controllers\CheckAuthController@showLogin')->name('login');

Route::get('/register', 'App\Http\Controllers\CheckAuthController@showRegister')->name('register');

Route::get('/profile', 'App\Http\Controllers\CheckAuthController@showProfile')->name('profile');

Route::get('/calendar', 'App\Http\Controllers\CalendarController@showTodaysCalendar')
    ->name('todays-calendar');

Route::get('/calendar/{year}/{month}', 'App\Http\Controllers\CalendarController@showCalendar')
    ->where(['year' => '-?[0-9]+', 'month' => '-?[0-9]+'])->name('calendar');

Route::post('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

Route::post('/profile/register', 'App\Http\Controllers\RegisterController@submit')->name('profile.register');

Route::post('/profile/login', 'App\Http\Controllers\LoginController@submit')->name('profile.login');

Route::middleware('App\Http\Middleware\AdminMiddleware')->prefix('admin')->group(function () {
    Route::get('/users', 'App\Http\Controllers\UserAdminController@userAdministration')->name('user-administration');
    Route::delete('/users/delete/{id}', 'App\Http\Controllers\UserAdminController@deleteUser')->name('user-administration.delete');
    Route::post('/users/change-status/{id}', 'App\Http\Controllers\UserAdminController@changeStatus')->name('user-administration.change.status');

    Route::get('/dates', 'App\Http\Controllers\DateAdminController@dateAdministration')->name('date-administration');
    Route::delete('/date-administration/delete/{id}', 'App\Http\Controllers\DateAdminController@deleteDate')->name('date-administration.delete');
    Route::put('/dates/update/{id}', 'App\Http\Controllers\DateAdminController@updateDate')->name('date-administration.update');
    Route::post('/dates/add', 'App\Http\Controllers\DateAdminController@addDate')->name('date-administration.add');
});
