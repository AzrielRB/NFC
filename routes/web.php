<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Route Publik
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

/*
|--------------------------------------------------------------------------
| Route Terproteksi (Auth Required)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Kelola Menu (CRUD)
    Route::resource('menu', MenuController::class)->except(['show']);

    // Kelola Cabang (CRUD)
    Route::resource('cabang', CabangController::class)->except(['show']);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Temporary Route to test Cloudinary env variables
Route::get('/test-cloudinary', function () {
    return [
        'cloud_name' => env('CLOUDINARY_CLOUD_NAME', 'not found'),
        'api_key' => env('CLOUDINARY_API_KEY') ? 'configured' : 'empty',
        'api_secret' => env('CLOUDINARY_API_SECRET') ? 'configured' : 'empty',
    ];
});
