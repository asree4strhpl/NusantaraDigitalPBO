@extends('layouts.admin')

@section('title', 'Kelola Destinasi')

@section('content')

<div class="admin-main-content">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="welcome-title mb-1">
            Kelola Destinasi
        </h1>

        <p class="welcome-subtitle">
            Manage seluruh destinasi wisata Nusantara Digital
        </p>
    </div>

    <!-- Group Tombol -->
    <div class="d-flex gap-2">

        <a href="{{ route('admin.dashboard') }}"
           class="btn btn-premium-add">
            <i class="bi bi-arrow-left me-2"></i>
            Kembali ke panel admin
        </a>

        <a href="{{ route('admin.destinasi.create') }}"
           class="btn btn-premium-add">
            <i class="bi bi-plus-circle me-2"></i>
            Tambah Destinasi
        </a>

    </div>

</div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert alert-success premium-alert">
            {{ session('success') }}
        </div>

    @endif

    {{-- SEARCH --}}
    <div class="table-card-premium mb-4">

        <form method="GET">

            <div class="row g-3 align-items-center">

                <div class="col-md-10">

                    <input type="text"
                           name="search"
                           class="form-control premium-search"
                           placeholder="Cari destinasi..."
                           value="{{ request('search') }}">

                </div>

                <div class="col-md-2">

                    <button class="btn btn-premium-search w-100">
                        Cari
                    </button>

                </div>

            </div>

        </form>

    </div>

    {{-- TABLE --}}
    <div class="table-card-premium">

        <div class="table-responsive">

            <table class="table admin-custom-table align-middle">

                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Wisata</th>
                        <th>Lokasi</th>
                        <th>Kategori</th>
                        <th>Rating</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($destinasi as $item)

                    <tr>

                        {{-- GAMBAR --}}
                        <td>

                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                 class="table-img">

                        </td>

                        {{-- NAMA --}}
                        <td class="fw-semibold text-navy">
                            {{ $item->nama_wisata }}
                        </td>

                        {{-- LOKASI --}}
                        <td>
                            {{ $item->lokasi }}
                        </td>

                        {{-- KATEGORI --}}
                        <td>

                            <span class="status-badge success">

                                {{ $item->kategoriWisata->nama_kategori ?? 'Tidak Ada' }}

                            </span>

                        </td>

                        {{-- RATING --}}
                        <td>

                            <div class="rating-badge">
                                <i class="bi bi-star-fill text-warning"></i>

                                {{ $item->rating }}
                            </div>

                        </td>

                        {{-- AKSI --}}
                        <td>

                            <div class="d-flex gap-2">

                                <a href="{{ route('admin.destinasi.edit', $item->id) }}"
                                   class="btn btn-action-edit">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                <form action="{{ route('admin.destinasi.destroy', $item->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-action-delete">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center py-5">

                            <h5 class="mb-2">
                                Destinasi tidak ditemukan
                            </h5>

                            <p class="text-muted mb-0">
                                Coba kata kunci lain
                            </p>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        {{-- PAGINATION --}}
        <div class="mt-4">
            {{ $destinasi->withQueryString()->links() }}
        </div>

    </div>

</div>

@endsection