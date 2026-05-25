@extends('layouts.travel')

@section('title', 'Eksplorasi Destinasi Nusantara')

@section('content')
<div class="container py-5" style="margin-top: 80px;">
    
    <div class="text-center mb-5">
        <h1 class="display-5 font-playfair fw-bold text-dark">Eksplorasi Gaya Petualanganmu</h1>
        <p class="text-muted">Temukan keindahan surga tersembunyi di seluruh penjuru Indonesia</p>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <form action="{{ route('destinasi.index') }}" method="GET" class="shadow-sm rounded-pill p-2 bg-white d-flex align-items-center border">
                @if($categorySlug)
                    <input type="hidden" name="kategori" value="{{ $categorySlug }}">
                @endif
                
                <i class="bi bi-search text-muted ms-3 me-2"></i>
                <input type="text" name="search" class="form-control border-0 bg-transparent focus-none" placeholder="Cari nama destinasi impianmu..." value="{{ $search }}">
                <button type="submit" class="btn btn-warning rounded-pill px-4 py-2 fw-medium text-dark ms-2">Cari</button>
            </form>
        </div>
    </div>

    <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
        <a href="{{ route('destinasi.index', request()->only('search')) }}" 
           class="btn rounded-pill px-4 py-2 fw-medium {{ !$categorySlug ? 'btn-dark text-white' : 'btn-outline-secondary' }}">
            Semua Destinasi
        </a>

        @foreach($categories as $cat)
            <a href="{{ route('destinasi.index', array_merge(request()->only('search'), ['kategori' => $cat->slug])) }}" 
               class="btn rounded-pill px-4 py-2 fw-medium {{ $categorySlug == $cat->slug ? 'btn-dark text-white' : 'btn-outline-secondary' }}">
                {{ $cat->nama_kategori }}
            </a>
        @endforeach
    </div>

    <div class="row g-4">
        @forelse($destinasis as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden position-relative card-hover" style="transition: transform 0.3s ease;">
                    
                    <span class="position-absolute top-0 start-0 bg-white text-dark text-xs fw-bold m-3 px-3 py-1.5 rounded-pill shadow-sm" style="z-index: 10;">
                        {{ $item->kategoriWisata->nama_kategori }}
                    </span>

                    <img src="{{ $item->gambar }}" class="card-img-top" alt="{{ $item->nama_wisata }}" style="height: 240px; object-fit: cover;">
                    
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2 text-small">
                            <span class="text-muted"><i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ $item->lokasi }}</span>
                            <span class="fw-semibold text-dark"><i class="bi bi-star-fill text-warning me-1"></i> {{ number_format($item->rating, 1) }}</span>
                        </div>

                        <h4 class="card-title font-playfair fw-bold mb-3">
                            <a href="{{ route('destinasi.detail', $item->slug) }}" class="text-decoration-none text-dark stretched-link">
                                {{ $item->nama_wisata }}
                            </a>
                        </h4>

                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                            <span class="text-muted text-xs">Harga Tiket</span>
                            <span class="fw-bold text-success" style="font-size: 1.1rem;">
                                {{ $item->harga_tiket == 0 ? 'Gratis' : 'Rp ' . number_format($item->harga_tiket, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-exclamation-circle text-muted display-3"></i>
                <h4 class="mt-3 text-secondary fw-medium">Destinasi wisata tidak ditemukan</h4>
                <p class="text-muted text-sm">Coba masukkan kata kunci lain atau pilih filter kategori yang berbeda.</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.125)!important;
    }
    .focus-none:focus {
        box-shadow: none !important;
    }
    .text-xs {
        font-size: 0.75rem;
    }
    .text-small {
        font-size: 0.875rem;
    }
</style>
@endsection