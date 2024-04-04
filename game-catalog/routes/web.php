<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DateAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UserAdminController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class . '@showHome')->name('home');
Route::get('/catalog', CatalogController::class . '@showCatalog')->name('catalog');

Route::get('/visited-pages', TrackingController::class . '@showVisitedPages')->name('visited-pages');

Route::get('/calendar', CalendarController::class . '@showTodaysCalendar')->name('todays-calendar');
Route::get('/calendar/{year}/{month}', CalendarController::class . '@showCalendar')
    ->where(['year' => '-?[0-9]+', 'month' => '-?[0-9]+'])->name('calendar');

Route::get('/login', AuthController::class . '@showLogin')->name('login');
Route::get('/register', AuthController::class . '@showRegister')->name('register');
Route::get('/profile', AuthController::class . '@showProfile')->name('profile');

Route::post('/profile/register', RegisterController::class . '@submit')->name('profile.register');
Route::post('/profile/login', LoginController::class . '@submit')->name('profile.login');
Route::post('/logout', LoginController::class . '@logout')->name('logout');

Route::middleware(AdminMiddleware::class)->prefix('admin')->group(function () {
    Route::get('/users', UserAdminController::class . '@userAdministration')->name('user-administration');
    Route::delete('/users/delete/{id}', UserAdminController::class . '@deleteUser')->name('user-administration.delete');
    Route::post('/users/change-status/{id}', UserAdminController::class . '@changeStatus')->name('user-administration.change.status');

    Route::get('/dates', DateAdminController::class . '@dateAdministration')->name('date-administration');
    Route::delete('/date-administration/delete/{id}', DateAdminController::class . '@deleteDate')->name('date-administration.delete');
    Route::put('/dates/update/{id}', DateAdminController::class . '@updateDate')->name('date-administration.update');
    Route::post('/dates/add', DateAdminController::class . '@addDate')->name('date-administration.add');
});
