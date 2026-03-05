<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\ProductController; // ADMIN
use App\Http\Controllers\Frontend\ProductController as FrontProduct; // PUBLIC
use App\Http\Controllers\Frontend\MyAssetController;

/*
|--------------------------------------------------------------------------
| 🌍 PUBLIC AREA (Guest & User)
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// Public Products (TANPA LOGIN)
Route::get('/products', [FrontProduct::class, 'index'])
    ->name('products.index');

Route::get('/products/{product}', [FrontProduct::class, 'show'])
    ->name('products.show');


/*
|--------------------------------------------------------------------------
| 👤 USER AREA (LOGIN REQUIRED)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Rute: Koleksi Aset Digital User
    Route::get('/my-assets', [MyAssetController::class, 'index'])
        ->name('my.assets');

    // Rute: Proses Pembelian (Simulasi)
    Route::post('/buy/{product}', [MyAssetController::class, 'buy'])
        ->name('products.buy');

    // Rute Download Aman (Hanya untuk yang sudah beli)
    Route::get('/download/{product}', [MyAssetController::class, 'download'])
        ->name('products.download');

    // Redirect cerdas untuk rute bawaan /dashboard
    Route::get('/dashboard', function () {
        if (auth()->user()->usertype === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('my.assets');
    })->name('dashboard');

    // Profil User
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| 🛡 ADMIN AREA (ADMIN ONLY)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware(['auth', 'role:admin']) 
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        // Resource Route untuk CRUD Produk (Termasuk Upload File)
        Route::resource('products', ProductController::class)
            ->names('admin.products');
    });

require __DIR__.'/auth.php';