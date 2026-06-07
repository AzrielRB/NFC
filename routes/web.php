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
        'api_key' => env('CLOUDINARY_API_KEY', 'empty'),
        'api_secret' => env('CLOUDINARY_API_SECRET') ? 'configured' : 'empty',
    ];
});

// Temporary Route to test mock Cloudinary upload
Route::get('/test-upload', function () {
    try {
        $cloudName = env('CLOUDINARY_CLOUD_NAME');
        $apiKey = env('CLOUDINARY_API_KEY');
        $apiSecret = env('CLOUDINARY_API_SECRET');

        $timestamp = time();
        $params = [
            'timestamp' => $timestamp,
        ];
        ksort($params);
        $queryString = http_build_query($params);
        $signature = sha1($queryString . $apiSecret);

        // 1x1 transparent pixel GIF
        $pixel = base64_decode('R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7');

        $response = \Illuminate\Support\Facades\Http::attach(
            'file', 
            $pixel, 
            'test.gif'
        )->post("https://api.cloudinary.com/v1_1/{$cloudName}/image/upload", [
            'api_key' => $apiKey,
            'timestamp' => $timestamp,
            'signature' => $signature,
        ]);

        return [
            'status' => $response->status(),
            'body' => $response->json() ?? $response->body(),
        ];
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});
