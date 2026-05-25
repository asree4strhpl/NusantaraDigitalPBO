<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nusantara Digital - Premium Travel Experience')</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,600;1,400&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/premium-travel.css') }}">
</head>
<body>

    <!-- Loading Screen Animasi -->
    <div id="loader" class="loader-container">
        <div class="spinner-premium"></div>
    </div>

    <!-- Navbar Transparan Modern -->
    <nav class="navbar navbar-expand-lg fixed-top premium-navbar" style="background: rgba(13, 27, 42, 0.9); backdrop-filter: blur(10px); padding: 15px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">
    <div class="container">
        <a class="navbar-brand premium-logo" href="{{ url('/') }}" style="color: #fff; font-family: 'Playfair Display', serif; font-weight: 600; text-decoration: none; font-size: 1.5rem;">
            Nusantara<span style="font-family: 'Inter', sans-serif; font-weight: 300; color: #e0a96d;">Digital</span>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" style="border-color: rgba(255,255,255,0.5); background-color: rgba(255,255,255,0.1);">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto d-flex align-items-center" style="list-style: none; margin: 0; padding: 0; gap: 20px; flex-direction: row;">
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}" style="color: #fff; text-decoration: none; font-size: 0.9rem;">Home</a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="{{ url('/kategori') }}" style="color: rgba(255,255,255,0.7); text-decoration: none; font-size: 0.9rem;">Destinasi</a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link" href="#" style="color: rgba(255,255,255,0.7); text-decoration: none; font-size: 0.9rem;">Eksplorasi</a>
    </li>
    <li class="nav-item">
        <a class="btn" href="{{ url('/dashboard') }}" style="background: transparent; border: 1px solid #e0a96d; color: #e0a96d; padding: 6px 20px; border-radius: 50px; font-size: 0.85rem; text-decoration: none; transition: all 0.3s;">Dashboard</a>
    </li>
        </ul>
        </div>
    </div>
</nav>

    <!-- Konten Utama -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Aesthetic -->
    <footer class="premium-footer" style="background-color: #0d1b2a; color: #ffffff; padding: 80px 0 30px 0; margin-top: 80px;">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-5 col-md-12">
                <a class="footer-logo mb-3 d-inline-block" href="#" style="color: #ffffff; text-decoration: none; font-family: 'Playfair Display', serif; font-size: 1.5rem; font-weight: 600;">Nusantara<span style="font-family: 'Inter', sans-serif; color: #e0a96d; font-weight: 300;">Digital</span></a>
                
                <p class="text-balance text-small" style="color: #ffffff !important; opacity: 0.9; font-size: 0.85rem; line-height: 1.6;">
                    Membawa keindahan destinasi premium Indonesia langsung ke jemari Anda. Jelajahi surga tersembunyi dengan kenyamanan digital terbaik.
                </p>
            </div>
            <div class="col-lg-3 col-md-6 ms-auto">
                <h5 style="color: #e0a96d; font-size: 1rem; font-weight: 500; margin-bottom: 20px;">Navigasi</h5>
                <ul class="list-unstyled footer-links" style="list-style: none; padding: 0;">
                    <li class="mb-2"><a href="#" style="color: rgba(255,255,255,0.7); text-decoration: none; font-size: 0.88rem;">Kategori Wisata</a></li>
                    <li class="mb-2"><a href="#" style="color: rgba(255,255,255,0.7); text-decoration: none; font-size: 0.88rem;">Destinasi Populer</a></li>
                    <li class="mb-2"><a href="#" style="color: rgba(255,255,255,0.7); text-decoration: none; font-size: 0.88rem;">Artikel Perjalanan</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 style="color: #e0a96d; font-size: 1rem; font-weight: 500; margin-bottom: 20px;">Kontak</h5>
                <ul class="list-unstyled footer-contact" style="list-style: none; padding: 0; color: rgba(255,255,255,0.7); font-size: 0.88rem;">
                    <li class="mb-2"><i class="bi bi-geo-alt me-2"></i> Jakarta, Indonesia</li>
                    <li class="mb-2"><i class="bi bi-envelope me-2"></i> hello@nusantaradigital.com</li>
                </ul>
            </div>
        </div>
        <hr class="footer-divider" style="border-color: rgba(255,255,255,0.15); margin: 40px 0 20px 0;">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0 text-small" style="color: #ffffff !important; opacity: 0.8; font-size: 0.85rem;">
                    &copy; 2026 Nusantara Digital. All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end social-icons">
                <a href="#" style="color: rgba(255,255,255,0.7); margin-left: 20px; font-size: 1.1rem;"><i class="bi bi-instagram"></i></a>
                <a href="#" style="color: rgba(255,255,255,0.7); margin-left: 20px; font-size: 1.1rem;"><i class="bi bi-youtube"></i></a>
                <a href="#" style="color: rgba(255,255,255,0.7); margin-left: 20px; font-size: 1.1rem;"><i class="bi bi-tiktok"></i></a>
            </div>
        </div>
    </div>
</footer>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Animation & Interaction JS -->
    <script src="{{ asset('js/premium-travel.js') }}"></script>
    @yield('scripts')
</body>
</html>