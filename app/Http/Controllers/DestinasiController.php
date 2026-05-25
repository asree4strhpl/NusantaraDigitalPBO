<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Http\Requests\DestinasiRequest;
use Illuminate\Http\Request;

class DestinasiController extends Controller {

    // READ - Tampilkan semua destinasi
    public function index() {
        $destinasi = Destinasi::latest()->paginate(12);
        return view('destinasi.index', compact('destinasi'));
    }

    // CREATE - Tampilkan form tambah
    public function create() {
        return view('destinasi.create');
    }

    // STORE - Simpan data baru
    public function store(DestinasiRequest $request) {
        $data = $request->validated();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('destinasi', 'public');
        }
        Destinasi::create($data);
        return redirect()->route('destinasi.index')
            ->with('success', 'Destinasi berhasil ditambahkan!');
    }

    // UPDATE - Perbarui data
    public function update(DestinasiRequest $request, Destinasi $destinasi) {
        $destinasi->update($request->validated());
        return redirect()->route('destinasi.index')
            ->with('success', 'Data diperbarui!');
    }

    // DELETE - Hapus data
    public function destroy(Destinasi $destinasi) {
        $destinasi->delete();
        return redirect()->route('destinasi.index')
            ->with('success', 'Destinasi dihapus!');
    }
}