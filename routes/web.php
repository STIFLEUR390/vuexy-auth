<?php

use App\Http\Controllers\Admin\Permission\PermissionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\Role\RoleController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Artisan;
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
})->name('welcome');

Route::get('artisan', function () {
    Artisan::call('storage:link');
    Artisan::call('migrate');
    Artisan::call('db:seed');
    echo "Artisan done";
});

Route::mailPreview(); // to preview email
// to change language
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

Route::prefix('admin')->middleware(['auth', 'verified'])->controller(ProfileController::class)->group(function () {
    Route::get('/dashboard', 'index'::class)->name('dashboard');

    // Account mamagement
    Route::prefix('account')->group(function () {
        Route::get('/profile', 'profile')->name('profile')->middleware(['permission:update profile']);
        Route::put('/profile', 'updateProfile')->name('profile.update')->middleware(['permission:update profile']);
        Route::get('/update-password', 'updatePasswordView')->name('profile.password')->middleware(['permission:update profile']);
        Route::put('/update-password', 'updatePassword')->name('profile.password.update')->middleware(['permission:update profile']);
        Route::get('/2fa', 'twoFactorAuthentication')->name('profile.f2A');
        Route::get('/delete-account', 'deleteAccountView')->name('profile.delete.account')->middleware(['permission:delete account', 'password.confirm']);
        Route::delete('/profile/delete', 'deleteAcccount')->name('profile.account.delete')->middleware(['permission:delete account']);
    });

    //Role and permission
    Route::resources([
        'roles' => RoleController::class,
        'permissions' => PermissionController::class,
    ], ['except' => 'show']);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permission.roleRemove');
});
