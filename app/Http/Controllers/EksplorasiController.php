<?php
// app/Http/Controllers/EksplorasiController.php
namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\KategoriWisata;
use Illuminate\Http\Request;

class EksplorasiController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil data filter & search dari request browser
        $search = $request->input('search');
        $categorySlug = $request->input('kategori');

        // 2. Ambil semua kategori untuk dipasang di tombol filter view
        $categories = KategoriWisata::all();

        // 3. Query dasar mengambil destinasi beserta relasi kategorinya (Eager Loading)
        $destinasiQuery = Destinasi::with('kategoriWisata');

        // Fitur Nomor 2: Jika user mengisi search bar
        if ($search) {
            $destinasiQuery->where('nama_wisata', 'like', '%' . $search . '%');
        }

        // Fitur Nomor 3 & 4: Jika user memilih kategori tertentu
        if ($categorySlug) {
            $destinasiQuery->whereHas('kategoriWisata', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            });
        }

        // Ambil data hasil filter/pencarian
        $destinasis = $destinasiQuery->latest()->get();

        // Kirim data ke View eksplorasi
        return view('destinasi.index', compact('destinasis', 'categories', 'search', 'categorySlug'));
    }
}