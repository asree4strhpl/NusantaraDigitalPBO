<?php
// app/Models/KategoriWisata.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriWisata extends Model
{
    use HasFactory;
    protected $primaryKey = 'kategori_wisata_id';
    protected $table = 'kategori_wisata';
    protected $fillable = ['nama_kategori', 'slug'];

    // OOP: Satu kategori memiliki banyak destinasi
    public function destinasis(): HasMany
    {
        return $this->hasMany(Destinasi::class, 'kategori_wisata_id');
    }
}