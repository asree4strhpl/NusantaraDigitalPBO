<?php

use Illuminate\Support\Facades\Route;
use App\Models\Destinasi;

Route::get('/test', function () {

    return 'API jalan';

});
Route::get('/destinasi', function () {

    return response()->json([
        'success' => true,
        'message' => 'Data destinasi berhasil diambil',
        'data' => Destinasi::all()
    ]);

});

Route::get('/destinasi/{slug}', function ($slug) {

    $destinasi = Destinasi::where('slug', $slug)
                    ->firstOrFail();

    return response()->json([
        'success' => true,
        'data' => $destinasi
    ]);

});