@extends('layouts.admin')

@section('title', 'Edit Destinasi')

@section('content')

<div class="admin-main-content">

    {{-- HEADER --}}
    <div class="mb-4">

        <h1 class="welcome-title mb-1">
            Edit Destinasi
        </h1>

        <p class="welcome-subtitle">
            Perbarui informasi destinasi wisata
        </p>

    </div>

    <div class="form-card-premium">

        <form action="{{ route('admin.destinasi.update', $destinasi->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row g-4">

                {{-- NAMA WISATA --}}
                <div class="col-md-6">

                    <label class="premium-label">
                        Nama Wisata
                    </label>

                    <input type="text"
                           name="nama_wisata"
                           class="form-control premium-input"
                           value="{{ old('nama_wisata', $destinasi->nama_wisata) }}">

                    @error('nama_wisata')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                {{-- KATEGORI --}}
                <div class="col-md-6">

                    <label class="premium-label">
                        Kategori Wisata
                    </label>

                    <select name="kategori_wisata_id"
                            class="form-select premium-input">

                        <option disabled value="">
                            -- Pilih Kategori --
                        </option>

                        @foreach ($kategoris as $kategori)

                            <option value="{{ $kategori->kategori_wisata_id }}"
                                {{ $destinasi->kategori_wisata_id == $kategori->kategori_wisata_id ? 'selected' : '' }}>

                                {{ $kategori->nama_kategori }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- LOKASI --}}
                <div class="col-md-6">

                    <label class="premium-label">
                        Lokasi
                    </label>

                    <input type="text"
                           name="lokasi"
                           class="form-control premium-input"
                           value="{{ old('lokasi', $destinasi->lokasi) }}">

                </div>

                {{-- HARGA --}}
                <div class="col-md-3">

                    <label class="premium-label">
                        Harga Tiket
                    </label>

                    <input type="number"
                           name="harga_tiket"
                           class="form-control premium-input"
                           value="{{ old('harga_tiket', $destinasi->harga_tiket) }}">

                </div>

                {{-- RATING --}}
                <div class="col-md-3">

                    <label class="premium-label">
                        Rating
                    </label>

                    <input type="text"
                           name="rating"
                           class="form-control premium-input"
                           value="{{ old('rating', $destinasi->rating) }}">

                </div>

                {{-- DESKRIPSI --}}
                <div class="col-12">

                    <label class="premium-label">
                        Deskripsi
                    </label>

                    <textarea name="deskripsi"
                              rows="6"
                              class="form-control premium-input">{{ old('deskripsi', $destinasi->deskripsi) }}</textarea>

                </div>

                {{-- GAMBAR --}}
                <div class="col-12">

                    <label class="premium-label">
                        Upload Gambar Baru
                    </label>

                    <input type="file"
                           name="gambar"
                           class="form-control premium-input">

                    @if($destinasi->gambar)

                        <div class="mt-4">

                            <p class="mb-2 fw-semibold">
                                Gambar Saat Ini
                            </p>

                            <img src="{{ asset('storage/' . $destinasi->gambar) }}"
                                 class="preview-img-admin">

                        </div>

                    @endif

                </div>

            </div>

            {{-- BUTTON --}}
            <div class="mt-5 d-flex gap-3">

                <button type="submit"
                        class="btn btn-premium-save">

                    <i class="bi bi-check-circle me-2"></i>
                    Update Destinasi

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