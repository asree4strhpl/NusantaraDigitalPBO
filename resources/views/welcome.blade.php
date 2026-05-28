@extends('layouts.app')

@section('title', 'Eksplorasi Surga Indonesia - Nusantara Digital')

@section('content')
<!-- Hero Section Fullscreen -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content container text-center text-white">
        <h1 class="hero-title">Temukan Surga <br><span class="italic-text">Tersembunyi</span> Nusantara</h1>
        <p class="hero-tagline col-lg-6 mx-auto">Rasakan petualangan sinematik di destinasi paling eksklusif dan menakjubkan di Indonesia.</p>

        <!-- Search Wisata & Filter Glassmorphism -->
<!-- Search Wisata & Filter Glassmorphism -->
<div class="search-container col-lg-8 mx-auto mt-4">
    <form action="{{ route('destinasi.index') }}"
          method="GET"
          class="mb-1 mt-1 mx-1">

        <div class="row g-2 align-items-center">

            <!-- Input Search -->
            <div class="col-md-6">
                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Cari destinasi..."
                       value="{{ request('search') }}">
            </div>

            <!-- Select Kategori -->
            <div class="col-md-4">
                <select class="form-select" name="kategori">

                    <option value="">
                        Semua Kategori
                    </option>

                    @foreach ($kategoris as $kategori)

                        <option value="{{ $kategori->kategori_wisata_id }}"
                            {{ request('kategori') == $kategori->kategori_wisata_id ? 'selected' : '' }}>

                            {{ $kategori->nama_kategori }}

                        </option>

                    @endforeach

                </select>
            </div>

            <!-- Tombol -->
            <div class="col-md-2">
                <button type="submit"
                        class="btn btn-premium-action w-100">
                    Cari
                </button>
            </div>

        </div>
    </form>
</div>
</section>

<!-- Section Kategori Wisata -->
<section class="py-5 bg-light-premium">
    <div class="container">
        <div class="section-header text-center mb-5">
            <span class="sub-title">Kategori</span>
            <h2 class="section-title">Pilih Gaya Petualanganmu</h2>
        </div>

        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 35px; width: 100%;">

            <a href="{{ url('/kategori') }}" class="category-card-premium text-center" style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 24px 15px; background: #fff; border-radius: 16px; text-decoration: none; box-shadow: 0 4px 20px rgba(0,0,0,0.02); min-height: 140px;">
                <i class="bi bi-compass" style="font-size: 2rem; margin-bottom: 10px; color: #e0a96d;"></i>
                <h5 style="font-size: 0.95rem; font-weight: 500; margin: 0; color: #0d1b2a;">Petualangan</h5>
            </a>

            <a href="{{ url('/kategori') }}" class="category-card-premium text-center" style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 24px 15px; background: #fff; border-radius: 16px; text-decoration: none; box-shadow: 0 4px 20px rgba(0,0,0,0.02); min-height: 140px;">
                <i class="bi bi-tsunami" style="font-size: 2rem; margin-bottom: 10px; color: #e0a96d;"></i>
                <h5 style="font-size: 0.95rem; font-weight: 500; margin: 0; color: #0d1b2a;">Pantai & Laut</h5>
            </a>

            <a href="{{ url('/kategori') }}" class="category-card-premium text-center" style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 24px 15px; background: #fff; border-radius: 16px; text-decoration: none; box-shadow: 0 4px 20px rgba(0,0,0,0.02); min-height: 140px;">
                <i class="bi bi-tree" style="font-size: 2rem; margin-bottom: 10px; color: #e0a96d;"></i>
                <h5 style="font-size: 0.95rem; font-weight: 500; margin: 0; color: #0d1b2a;">Alam Liar</h5>
            </a>

            <a href="{{ url('/kategori') }}" class="category-card-premium text-center" style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 24px 15px; background: #fff; border-radius: 16px; text-decoration: none; box-shadow: 0 4px 20px rgba(0,0,0,0.02); min-height: 140px;">
                <i class="bi bi-bank" style="font-size: 2rem; margin-bottom: 10px; color: #e0a96d;"></i>
                <h5 style="font-size: 0.95rem; font-weight: 500; margin: 0; color: #0d1b2a;">Budaya</h5>
            </a>

        </div>
    </div>
</section>

<!-- Horizontal Scrolling Gallery Footing Wisata -->
<section class="py-5 overflow-hidden">
    <div class="container mb-4">
        <div class="d-flex justify-content-between align-items-end">
            <div>
                <span class="sub-title">Footage Visual</span>
                <h2 class="section-title mb-0">Kilasan Sinematik</h2>
            </div>
            <div class="text-muted text-small d-none d-md-block">
                <i class="bi bi-arrow-left-right me-1"></i> Geser horizontal untuk melihat
            </div>
        </div>
    </div>

    <!-- Wrapper Horizontal Scroll -->
    <div class="horizontal-scroll-container px-3">
        <div class="horizontal-scroll-track">
            <div class="scroll-item-premium">
                <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=600&q=80" alt="Bali">
                <div class="item-caption">Bali Premium Villa</div>
            </div>
            <div class="scroll-item-premium">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=600&q=80" alt="Lombok">
                <div class="item-caption">Gili Islands Air</div>
            </div>
            <div class="scroll-item-premium">
                <img src="https://rricoid-assets.obs.ap-southeast-4.myhuaweicloud.com/berita/Bukittinggi/f/1744081238879-Pulau-Padar-Labuan-Bajo-berwarna-Hijau/roqhzcb24vss8bw.webp" alt="Komodo">
                <div class="item-caption">Pulau Padar Scenic</div>
            </div>
            <div class="scroll-item-premium">
                <img src="https://images.unsplash.com/photo-1602002418082-a4443e081dd1?auto=format&fit=crop&w=600&q=80" alt="Raja Ampat">
                <div class="item-caption">Raja Ampat Resort</div>
            </div>
            <div class="scroll-item-premium">
                <img src="https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=600&q=80" alt="Bromo">
                <div class="item-caption">Gunung Bromo Sunrise</div>
            </div>
            <div class="scroll-item-premium">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=600&q=80" alt="Wisata">
                <div class="item-caption">Darmawisata BatBat Jaya KDI</div>
            </div>
        </div>
    </div>
</section>

<!-- Section Wisata Populer dengan Card Hover Effect -->
<section class="py-5 bg-light-premium">
    <div class="container">
        <div class="section-header mb-5">
            <span class="sub-title">Rekomendasi</span>
            <h2 class="section-title">Destinasi Populer Pilihan</h2>
        </div>  

        <div class="row g-4">
            @if ($destinasis->count() == 0)

                <div class="text-center py-5">
                <h4>Tidak ada destinasi ditemukan</h4>
                </div>

            @endif

            @foreach ($destinasis as $destinasi)

             
                <div class="col-lg-4 col-md-6">
                    <div class="card-premium">

                        <div class="card-premium-img">

                            {{-- GAMBAR --}}
                            <img src="{{ asset('storage/' . $destinasi->gambar) }}"
                                 alt="{{ $destinasi->nama_wisata }}">

                            <span class="badge-category">
                                {{ $destinasi->kategoriWisata->nama_kategori ?? 'Wisata' }}
                            </span>
                        </div>

                        <div class="card-premium-body">

                            <div class="d-flex justify-content-between align-items-center mb-2">

                                {{-- LOKASI --}}
                                <span class="location">
                                    <i class="bi bi-geo-alt me-1"></i>
                                    {{ $destinasi->lokasi }}
                                </span>

                                {{-- RATING --}}
                                <div class="rating">
                                    <i class="bi bi-star-fill me-1 text-warning"></i>
                                    {{ $destinasi->rating }}
                                </div>

                            </div>

                            {{-- NAMA --}}
                            <h4 class="destination-title">
                                <a href="{{ route('destinasi.detail', $destinasi->slug) }}">
                                          {{ $destinasi->nama_wisata }}
                                 </a>
                            </h4>

                            {{-- DESKRIPSI --}}
                            <p class="destination-excerpt">
                                {{ Str::limit($destinasi->deskripsi, 100) }}
                            </p>

                        </div>
                    </div>
                </div>
            @endforeach

        <div class="mt-5 d-flex justify-content-center">
    {{ $destinasis->withQueryString()->links() }}
</div>

        </div>
    </div>
</section>
@endsection