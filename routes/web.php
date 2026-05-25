<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EksplorasiController;
use App\Http\Controllers\Admin\DestinasiController;
use App\Models\Destinasi;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// Halaman Kategori (Mengarah ke folder destinasi file kategori.blade.php)
Route::get('/kategori', function () {
    return view('destinasi.kategori'); 
});

// Halaman Detail (Mengarah ke folder destinasi file detail.blade.php)
Route::get('/detail', function () {
    return view('destinasi.detail');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {

    return view('admin_custom');

})->middleware(['auth'])->name('admin.dashboard');


// Halaman utama Eksplorasi Wisata (Pencarian & Filter terpusat di sini)
Route::get('/eksplorasi', [EksplorasiController::class, 'index'])->name('destinasi.index');

// Rute dinamis untuk halaman detail saat card diklik
Route::get('/destinasi/{slug}', function($slug) {
    $destinasi = \App\Models\Destinasi::where('slug', $slug)->firstOrFail();
    
    // Mengarahkan ke file detail dinamis (sesuai struktur file kamu)
    return view('destinasi.detail', compact('destinasi'));
})->name('destinasi.detail');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('destinasi', DestinasiController::class);

});

Route::get('/', function () {

    $totalDestinasi = Destinasi::count();

    return view('admin.dashboard', compact('totalDestinasi'));

})->name('dashboard');