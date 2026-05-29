<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Review;
use App\Models\Favorite;

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

    // relasi ke kategori
    public function kategoriWisata(): BelongsTo
    {
        return $this->belongsTo(
            KategoriWisata::class,
            'kategori_wisata_id',
            'kategori_wisata_id'
        );
    }

    // relasi ke review
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
{
    return $this->hasMany(Favorite::class);
}
}

