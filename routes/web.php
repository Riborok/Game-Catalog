<?php

use App\Http\Controllers\admin\CatalogAdminController;
use App\Http\Controllers\admin\DateAdminController;
use App\Http\Controllers\admin\EmailController;
use App\Http\Controllers\admin\HomeAdminController;
use App\Http\Controllers\admin\StatisticsController;
use App\Http\Controllers\admin\UserAdminController;
use App\Http\Controllers\authentication\AuthController;
use App\Http\Controllers\authentication\ForgotPasswordController;
use App\Http\Controllers\authentication\LoginController;
use App\Http\Controllers\authentication\RegisterController;
use App\Http\Controllers\authentication\ResetPasswordController;
use App\Http\Controllers\handler\LanguageController;
use App\Http\Controllers\handler\LinkClickController;
use App\Http\Controllers\handler\VisitedPages;
use App\Http\Controllers\main\CalendarController;
use App\Http\Controllers\main\CatalogController;
use App\Http\Controllers\main\HomeController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/lang/{lang}', LanguageController::class . '@changeLanguage')->name('change-language');

Route::get('/', HomeController::class . '@showHome')->name('home');
Route::get('/catalog', CatalogController::class . '@showCatalog')->name('catalog');

Route::get('/visited-pages', VisitedPages::class . '@showVisitedPages')->name('visited-pages');

Route::get('/calendar', CalendarController::class . '@showTodaysCalendar')->name('todays-calendar');
Route::get('/calendar/{year}/{month}', CalendarController::class . '@showCalendar')
    ->where(['year' => '-?[0-9]+', 'month' => '-?[0-9]+'])->name('calendar');

Route::get('/login', AuthController::class . '@showLogin')->name('login');
Route::get('/register', AuthController::class . '@showRegister')->name('register');
Route::get('/profile', AuthController::class . '@showProfile')->name('profile');

Route::post('/login', LoginController::class . '@submit')->name('login.request');
Route::post('/register', RegisterController::class . '@submit')->name('register.request');
Route::post('/logout', LoginController::class . '@logout')->name('logout.request');

Route::get('/trackLink', LinkClickController::class . '@handle')->name('redirect');

Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', ForgotPasswordController::class . '@showForgotPassword')->name('forgot.password');
    Route::post('/forgot-password', ForgotPasswordController::class . '@submit')->name('forgot.password.request');
    Route::get('/reset-password', ResetPasswordController::class . '@showResetPassword')->name('password.reset');
    Route::post('/reset-password', ResetPasswordController::class . '@submit')->name('password.reset.request');
});

Route::middleware(AdminMiddleware::class)->prefix('admin')->group(function () {
    Route::get('/users', UserAdminController::class . '@showUserAdministration')->name('user-administration');
    Route::delete('/users/delete/{id}', UserAdminController::class . '@delete')->name('user-administration.delete');
    Route::post('/users/change-status/{id}', UserAdminController::class . '@changeStatus')->name('user-administration.change.status');

    Route::get('/dates', DateAdminController::class . '@showDateAdministration')->name('date-administration');
    Route::delete('/dates/delete/{id}', DateAdminController::class . '@delete')->name('date-administration.delete');
    Route::put('/dates/update/{id}', DateAdminController::class . '@update')->name('date-administration.update');
    Route::post('/dates/add', DateAdminController::class . '@add')->name('date-administration.add');

    Route::get('/feature', HomeAdminController::class . '@showHomeAdministration')->name('home-administration');
    Route::delete('/feature/delete/{id}', HomeAdminController::class . '@delete')->name('home-administration.delete');
    Route::put('/feature/update/{id}', HomeAdminController::class . '@update')->name('home-administration.update');
    Route::post('/feature/add', HomeAdminController::class . '@add')->name('home-administration.add');

    Route::get('/game', CatalogAdminController::class . '@showCatalogAdministration')->name('catalog-administration');
    Route::delete('/game/delete/{id}', CatalogAdminController::class . '@delete')->name('catalog-administration.delete');
    Route::put('/game/update/{id}', CatalogAdminController::class . '@update')->name('catalog-administration.update');
    Route::post('/game/add', CatalogAdminController::class . '@add')->name('catalog-administration.add');

    Route::get('/send-email', EmailController::class . '@showEmailSender')->name('email-administration');
    Route::post('/send-email', EmailController::class . '@send')->name('email-administration.request');

    Route::get('/statistics', StatisticsController::class . '@showStatistics')->name('statistics');
});
