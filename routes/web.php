<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PeminjamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// GRUP UNTUK SUBDOMAIN ADMIN (admin.perpustakaan.test)
Route::domain('admin.' . config('app.url_base'))->group(function () {
    
    // Saat orang membuka admin.perpustakaan.test, langsung arahkan ke halaman login Filament
    Route::get('/', function () {
        return redirect('/admin');
    });

    // Route Filament (/admin) akan otomatis ditangani oleh package-nya,
    // jadi kita tidak perlu menaruhnya di sini.
});


// GRUP UNTUK DOMAIN UTAMA (perpustakaan.test)
Route::domain(config('app.url_base'))->group(function () {
    
    // Halaman Selamat Datang
    Route::get('/', function () {
        return view('welcome');
    });

    // Halaman Dashboard Pengguna
    Route::get('/dashboard', [FrontendController::class, 'dashboard'])
        ->middleware(['auth', 'verified'])->name('dashboard');

    // Semua route lain untuk pengguna
    Route::middleware('auth')->group(function () {
        // Profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Katalog, Detail, Riwayat
        Route::get('/katalog', [FrontendController::class, 'katalog'])->name('katalog');
        Route::get('/buku/{buku}', [FrontendController::class, 'show'])->name('buku.show');
        Route::get('/riwayat', [FrontendController::class, 'riwayat'])->name('riwayat');

        // Aksi Peminjaman
        Route::post('/pinjam/{buku}', [PeminjamanController::class, 'store'])->name('pinjam.store');
    });

    // Route untuk otentikasi (login, register, dll) dari Laravel Breeze
    require __DIR__.'/auth.php';
});