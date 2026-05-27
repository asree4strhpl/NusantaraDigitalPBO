<?php

// app/Models/Destinasi.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Destinasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_wisata', 
        'slug', 
        'gambar', 
        'lokasi', 
        'harga_tiket', 
        'rating', 
        'deskripsi',
        'kategori_wisata_id', 
    ];

    // Aturan Nomor 8: Destinasi belongsTo KategoriWisata
    public function kategoriWisata(): BelongsTo
{
    return $this->belongsTo(
        KategoriWisata::class,
        'kategori_wisata_id',
        'kategori_wisata_id'
    );
}
}