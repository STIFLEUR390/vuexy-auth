<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
Route::prefix('admin')->middleware(['auth'])->controller(ProfileController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/profile', 'profile')->name('profile')->middleware(['permission:update profile']);
});
/*
Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/confirm-password', function () {
    return view('auth.confirm-password');
});

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
});

Route::get('/reset-password', function () {
    return view('auth.reset-password');
});

Route::get('/two-factor-challenge', function () {
    return view('auth.two-factor-challenge');
});

Route::get('/verify-email', function () {
    return view('auth.verify-email');
});
*/

