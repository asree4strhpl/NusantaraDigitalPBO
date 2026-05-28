<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EksplorasiController;
use App\Http\Controllers\Admin\DestinasiController;
use App\Models\Destinasi;
use App\Models\KategoriWisata;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Http;
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

    // related destinasi
    $related = Destinasi::where('id', '!=', $destinasi->id)
                    ->latest()
                    ->take(3)
                    ->get();

    // ambil cuaca realtime
    $response = $response = Http::withoutVerifying()->get(
        'https://api.openweathermap.org/data/2.5/weather',
        [
            'q' => $destinasi->lokasi,
            'appid' => env('OPENWEATHER_API_KEY'),
            'units' => 'metric',
            'lang' => 'id',
        ]
    );

    $weather = $response->json();

    return view('destinasi.detail', compact(
        'destinasi',
        'related',
        'weather'
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

            $totalKategori = KategoriWisata::count();

            $destinasiTerbaru = Destinasi::latest()
                                        ->take(5)
                                        ->get();

            return view('admin.dashboard', compact(
                'totalDestinasi',
                'totalKategori',
                'destinasiTerbaru'
            ));

        })->name('dashboard');

        Route::resource('destinasi', DestinasiController::class);
});
require __DIR__.'/auth.php';

Route::post('/review/{id}', [ReviewController::class, 'store'])
    ->middleware('auth')
    ->name('review.store');


// SOAPP //

Route::get('/soap/destinasi', function () {

    $destinasi = \App\Models\Destinasi::all();

    return response()->view(
        'soap.destinasi',
        compact('destinasi')
    )->header('Content-Type', 'text/xml');

});