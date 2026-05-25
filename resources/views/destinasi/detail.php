@extends('layouts.travel')

@section('title', 'Detail Destinasi - Raja Ampat Premium Experience')

@section('content')
<!-- Hero Detail Banner Immersive -->
<section class="detail-hero" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1600&q=80');">
    <div class="container detail-hero-content">
        <span class="badge-category mb-3">Destinasi Utama</span>
        <h1 class="display-4 font-playfair text-white mb-2">Raja Ampat: Pesona Surga Karang Dunia</h1>
        <div class="d-flex flex-wrap align-items-center text-white-50 text-small">
            <span class="me-3"><i class="bi bi-geo-alt me-1 text-white"></i> Kabupaten Raja Ampat, Papua Barat</span>
            <span class="me-3"><i class="bi bi-star-fill me-1 text-warning"></i> 4.9 (240 Ulasan)</span>
            <span><i class="bi bi-eye me-1"></i> 14,200 Dilihat</span>
        </div>
    </div>
</section>

<!-- Konten Detail Artikel -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Kolom Utama -->
            <div class="col-lg-8">
                <article class="premium-article">
                    <h3 class="mb-4 font-playfair">Keajaiban Biodiversitas Laut Paling Kaya di Bumi</h3>
                    <p>Kepulauan Raja Ampat merupakan rangkaian empat gugusan pulau yang berdekatan dan berlokasi di barat bagian Semenanjung Kepala Burung (Vogelkoop) Pulau Papua. Secara administrasi, gugusan ini berada di bawah Kabupaten Raja Ampat, Provinsi Papua Barat.</p>
                    
                    <p>Bagi para pecinta menyelam, Raja Ampat adalah salah satu destinasi impian tertinggi. Perairan di sini dikenal sebagai salah satu pusat keanekaragaman hayati laut terkaya di seluruh dunia. Terumbu karangnya yang masih sangat alami membuat ekosistem laut berputar sempurna.</p>
                    
                    <!-- Foto Showcase Tambahan -->
                    <div class="my-4 row g-3">
                        <div class="col-6">
                            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 shadow-sm" alt="Aesthetic view">
                        </div>
                        <div class="col-6">
                            <img src="https://images.unsplash.com/photo-1602002418082-a4443e081dd1?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 shadow-sm" alt="Aesthetic view">
                        </div>
                    </div>

                    <h4 class="mt-5 mb-3 font-playfair">Aktivitas Utama</h4>
                    <ul>
                        <li><strong>Diving & Snorkeling:</strong> Menyaksikan ribuan spesies ikan dan terumbu karang hidup secara langsung.</li>
                        <li><strong>Trekking Pulau Padar:</strong> Mendaki bukit karst ikonik untuk melihat pemandangan teluk secara penuh.</li>
                        <li><strong>Fotografi Lanskap:</strong> Mengabadikan perpaduan gradasi air laut hijau toska hingga biru tua.</li>
                    </ul>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sticky-sidebar">
                    <div class="card-premium p-4 shadow-sm glass-effect">
                        <h4 class="font-playfair mb-3">Informasi Perjalanan</h4>
                        <hr class="my-3">
                        <div class="d-flex justify-content-between mb-2 text-small">
                            <span class="text-muted">Waktu Terbaik</span>
                            <span class="fw-semibold text-dark">Oktober - April</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2 text-small">
                            <span class="text-muted">Aksesibilitas</span>
                            <span class="fw-semibold text-dark">Kapal Feri dari Sorong</span>
                        </div>
                        <div class="d-flex justify-content-between mb-4 text-small">
                            <span class="text-muted">Biaya Konservasi</span>
                            <span class="fw-semibold text-dark">Rp 500,000+</span>
                        </div>
                        <button class="btn btn-premium-action w-100 py-2">Eksplor Paket Wisata</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection