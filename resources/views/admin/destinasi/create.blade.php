@extends('layouts.admin')

@section('title', 'Tambah Destinasi')

@section('content')

<div class="admin-main-content">

    {{-- HEADER --}}
    <div class="mb-4">

        <h1 class="welcome-title mb-1">
            Tambah Destinasi
        </h1>

        <p class="welcome-subtitle">
            Tambahkan destinasi wisata baru ke platform
        </p>

    </div>

    <div class="form-card-premium">

        <form action="{{ route('admin.destinasi.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row g-4">

                {{-- NAMA --}}
                <div class="col-md-6">

                    <label class="premium-label">
                        Nama Wisata
                    </label>

                    <input type="text"
                           name="nama_wisata"
                           class="form-control premium-input"
                           value="{{ old('nama_wisata') }}">

                    @error('nama_wisata')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                {{-- LOKASI --}}
                <div class="col-md-6">

                    <label class="premium-label">
                        Lokasi
                    </label>

                    <input type="text"
                           name="lokasi"
                           class="form-control premium-input"
                           value="{{ old('lokasi') }}">

                </div>

                {{-- HARGA --}}
                <div class="col-md-4">

                    <label class="premium-label">
                        Harga Tiket
                    </label>

                    <input type="number"
                           name="harga_tiket"
                           class="form-control premium-input">

                </div>

                {{-- RATING --}}
                <div class="col-md-4">

                    <label class="premium-label">
                        Rating
                    </label>

                    <input type="text"
                           name="rating"
                           class="form-control premium-input">

                </div>

                {{-- KATEGORI --}}
                <div class="col-md-4">

                    <label class="premium-label">
                        Kategori
                    </label>

                    <select name="kategori_wisata_id"
                            class="form-select premium-input">

                        <option value="">
                            Pilih Kategori
                        </option>

                        @foreach ($kategoris as $kategori)

                            <option value="{{ $kategori->kategori_wisata_id }}">

                                {{ $kategori->nama_kategori }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- DESKRIPSI --}}
                <div class="col-12">

                    <label class="premium-label">
                        Deskripsi
                    </label>

                    <textarea name="deskripsi"
                              rows="6"
                              class="form-control premium-input"></textarea>

                </div>

                {{-- GAMBAR --}}
                <div class="col-12">

                    <label class="premium-label">
                        Upload Gambar
                    </label>

                    <input type="file"
                           name="gambar"
                           class="form-control premium-input">

                </div>

            </div>

            {{-- BUTTON --}}
            <div class="mt-5 d-flex gap-3">

                <button type="submit"
                        class="btn btn-premium-save">

                    <i class="bi bi-check-circle me-2"></i>
                    Simpan Destinasi

                </button>

                <a href="{{ route('admin.destinasi.index') }}"
                   class="btn btn-premium-cancel">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection