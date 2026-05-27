<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destinasi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\KategoriWisata;

class DestinasiController extends Controller
{
     public function index(Request $request)
    {
         $query = Destinasi::query();

    if ($request->search) {
        $query->where('nama_wisata', 'like', '%' . $request->search . '%');
    }
    if ($request->lokasi) {
            $query->where('lokasi', $request->lokasi);
    }
    $destinasi = $query->latest()->paginate(5);

    return view('admin.destinasi.index', compact('destinasi'));
    }
       
public function create()
{
    $kategoris = KategoriWisata::all();

    return view('admin.destinasi.create', compact('kategoris'));
}

public function store(Request $request)
{
    $request->validate([
        'nama_wisata' => 'required',
        'lokasi' => 'required',
        'harga_tiket' => 'required',
        'deskripsi' => 'required',
        'gambar' => 'required|image|mimes:jpg,jpeg,png',
        'kategori_wisata_id' => 'nullable|exists:kategori_wisata,kategori_wisata_id',
    ]);

    $gambar = $request->file('gambar')->store('destinasi', 'public');

    Destinasi::create([
        'nama_wisata' => $request->nama_wisata,
        'slug' => Str::slug($request->nama_wisata),
        'lokasi' => $request->lokasi,
        'harga_tiket' => $request->harga_tiket,
        'deskripsi' => $request->deskripsi,
        'gambar' => $gambar,
        'rating' => 5,
        'kategori_wisata_id' => $request->kategori_wisata_id,
    ]);

    return redirect()->route('admin.destinasi.index')
        ->with('success', 'Destinasi berhasil ditambahkan');
}
    public function edit($id)
{
    $destinasi = Destinasi::findOrFail($id);

    $kategoris = KategoriWisata::all();

    return view('admin.destinasi.edit', compact('destinasi', 'kategoris'));
}

    public function update(Request $request, $id)
    {
        $request->validate([
    'nama_wisata' => 'required',
    'lokasi' => 'required',
    'harga_tiket' => 'required|numeric',
    'rating' => 'required',
    'deskripsi' => 'required',

    'kategori_wisata_id' => 'nullable|exists:kategori_wisata,kategori_wisata_id',

    'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
]);
        $destinasi = Destinasi::findOrFail($id);
        // cek apakah upload gambar baru
    if ($request->hasFile('gambar')) {

        // hapus gambar lama kalau ada
        if ($destinasi->gambar) {

            Storage::disk('public')->delete($destinasi->gambar);
        }

        // upload gambar baru
        $gambar = $request->file('gambar')
                           ->store('destinasi', 'public');

    } else {

        // kalau tidak upload gambar baru
        // pakai gambar lama
        $gambar = $destinasi->gambar;
    }
        $destinasi->update([
    'nama_wisata' => $request->nama_wisata,
    'slug' => Str::slug($request->nama_wisata),
    'lokasi' => $request->lokasi,
    'harga_tiket' => $request->harga_tiket,
    'rating' => $request->rating,
    'deskripsi' => $request->deskripsi,

    'kategori_wisata_id' => $request->kategori_wisata_id,

    'gambar' => $gambar,
]);

    return redirect()->route('admin.destinasi.index')
        ->with('success', 'Destinasi berhasil diupdate');
}

    public function destroy($id)
    {
        $destinasi = Destinasi::findOrFail($id);

        $destinasi->delete();

        return redirect()->route('admin.destinasi.index')
            ->with('success', 'Destinasi berhasil dihapus');
    }
}