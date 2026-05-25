@extends('layouts.app')

@section('title', 'Jelajahi Kategori Destinasi - Nusantara Digital')

@section('content')
<section class="py-5 mt-5">
    <div class="container">
        <!-- Header Kategori -->
        <div class="text-center my-4">
            <span class="sub-title">Arsip Destinasi</span>
            <h1 class="display-5 font-playfair mb-3 text-dark">Eksplorasi Berdasarkan Kategori</h1>
            <p class="text-muted col-md-6 mx-auto">Saring destinasi wisata terbaik berdasarkan preferensi dan tema kenyamanan liburan Anda.</p>
        </div>

        <!-- Filter Komponen Tab / Button -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
            <button class="btn btn-filter-premium active">Semua Destinasi</button>
            <button class="btn btn-filter-premium">Pantai & Tropis</button>
            <button class="btn btn-filter-premium">Gunung & Trekking</button>
            <button class="btn btn-filter-premium">Situs Budaya</button>
            <button class="btn btn-filter-premium">Eko-Turisme</button>
        </div>

        <!-- Grid Hasil Filter Destinasi -->
        <div class="row g-4">
            <!-- Destinasi Item 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card-premium">
                    <div class="card-premium-img">
                        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80" alt="Pantai">
                        <span class="badge-category">Pantai & Tropis</span>
                    </div>
                    <div class="card-premium-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="location"><i class="bi bi-geo-alt me-1"></i> Lombok, NTB</span>
                            <div class="rating"><i class="bi bi-star-fill text-warning"></i> 4.8</div>
                        </div>
                        <h4 class="destination-title"><a href="{{ url('/detail') }}">Gili Trawangan</a></h4>
                    </div>
                </div>
            </div>
            <!-- Destinasi Item 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card-premium">
                    <div class="card-premium-img">
                        <img src="https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=800&q=80" alt="Gunung">
                        <span class="badge-category">Gunung & Trekking</span>
                    </div>
                    <div class="card-premium-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="location"><i class="bi bi-geo-alt me-1"></i> Lombok, NTB</span>
                            <div class="rating"><i class="bi bi-star-fill text-warning"></i> 4.9</div>
                        </div>
                        <h4 class="destination-title"><a href="{{ url('/detail') }}">Gunung Rinjani</a></h4>
                    </div>
                </div>
            </div>
            <!-- Destinasi Item 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card-premium">
                    <div class="card-premium-img">
                        <img src="https://images.unsplash.com/photo-1602002418082-a4443e081dd1?auto=format&fit=crop&w=800&q=80" alt="Candi">
                        <span class="badge-category">Situs Budaya</span>
                    </div>
                    <div class="card-premium-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="location"><i class="bi bi-geo-alt me-1"></i> Magelang, Jateng</span>
                            <div class="rating"><i class="bi bi-star-fill text-warning"></i> 4.9</div>
                        </div>
                        <h4 class="destination-title"><a href="{{ url('/detail') }}">Candi Borobudur</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection