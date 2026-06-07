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

// Temporary Route to update admin credentials in production
Route::get('/update-admin', function () {
    try {
        $admin = \App\Models\User::where('email', 'admin@nfc.com')->first();
        if ($admin) {
            $admin->update([
                'email' => 'nurulfriedchicken06@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('cagaralam10'),
            ]);
            return 'Admin credentials updated successfully! Email is now nurulfriedchicken06@gmail.com';
        }
        return 'Admin with email admin@nfc.com not found. Maybe already updated?';
    } catch (\Exception $e) {
        return 'Failed to update admin: ' . $e->getMessage();
    }
});
