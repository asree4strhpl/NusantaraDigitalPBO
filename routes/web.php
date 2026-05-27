<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EksplorasiController;
use App\Http\Controllers\Admin\DestinasiController;
use App\Models\Destinasi;
use App\Models\KategoriWisata;
/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', function () {

    $query = Destinasi::query();

    // SEARCH NAMA / LOKASI
    if (request('search')) {

        $search = request('search');

        $query->where(function ($q) use ($search) {

            $q->where('nama_wisata', 'like', "%{$search}%")
              ->orWhere('lokasi', 'like', "%{$search}%");

        });
    }

    // FILTER KATEGORI
    if (request('kategori')) {

        $query->where(
            'kategori_wisata_id',
            request('kategori')
        );
    }

    $destinasis = $query->latest()->paginate(6);

    // AMBIL SEMUA KATEGORI
    $kategoris = KategoriWisata::all();

    return view('welcome', compact(
        'destinasis',
        'kategoris'
    ));

})->name('destinasi.index');

// Halaman kategori
Route::get('/kategori', function () {
    return view('destinasi.kategori');
});


// Halaman eksplorasi
Route::get('/eksplorasi', [EksplorasiController::class, 'index'])
    ->name('destinasi.index');


// Detail destinasi
Route::get('/destinasi/{slug}', function ($slug) {

    $destinasi = Destinasi::where('slug', $slug)
                    ->firstOrFail();

    $related = Destinasi::where('id', '!=', $destinasi->id)
                    ->latest()
                    ->take(3)
                    ->get();

    return view('destinasi.detail', compact(
        'destinasi',
        'related'
    ));

})->name('destinasi.detail');


/*
|--------------------------------------------------------------------------
| DASHBOARD USER
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', function () {

            $totalDestinasi = Destinasi::count();

            return view('admin.dashboard', compact('totalDestinasi'));

        })->name('dashboard');

        Route::resource('destinasi', DestinasiController::class);
});


require __DIR__.'/auth.php';