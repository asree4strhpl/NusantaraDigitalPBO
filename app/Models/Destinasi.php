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
        'kategori_wisata_id', 
        'nama_wisata', 
        'slug', 
        'gambar', 
        'lokasi', 
        'harga_tiket', 
        'rating', 
        'deskripsi'
    ];

    // Aturan Nomor 8: Destinasi belongsTo KategoriWisata
    public function kategoriWisata(): BelongsTo
    {
        return $this->belongsTo(KategoriWisata::class, 'kategori_wisata_id');
    }
}