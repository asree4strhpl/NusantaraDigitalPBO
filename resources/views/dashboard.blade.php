<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengguna</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-gray-100">

    <!-- Main Content -->
<div class="py-8 px-4">

    <div class="max-w-7xl mx-auto">

        <!-- Welcome -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 mb-6">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <div>

                    <h2 class="text-3xl font-bold text-slate-800">
                        Selamat Datang,
                        {{ Auth::user()->name }} 👋
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Nikmati pengalaman eksplorasi wisata digital modern.
                    </p>

                </div>

                <div>
                <a href="{{ route('destinasi.index') }}"
                class="class=flex items-center gap-2 bg-gray-400 text-green-700 px-4 py-2 rounded-full text-sm font-medium w-fit">

                    <i class="bi bi-house-door"></i>

                    Kembali ke Beranda

                </a>

        </div>

        <!-- GRID -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- LEFT -->
            <div class="lg:col-span-2 space-y-6">

                <!-- MENU -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <!-- CARD -->
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-5 hover:shadow-lg transition">

                        <div class="flex items-start gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-amber-100 flex items-center justify-center text-amber-600">

                                <i class="bi bi-compass text-2xl"></i>

                            </div>

                            <div>

                                <h4 class="font-bold text-gray-800">
                                    Eksplorasi Wisata
                                </h4>

                                <p class="text-sm text-gray-500 mt-1 mb-3">
                                    Jelajahi destinasi wisata terbaik Indonesia.
                                </p>

                                <a href="{{ url('/kategori') }}"
                                   class="text-sm text-amber-600 font-semibold hover:underline">
                                    <i class="bi bi-compass me-1"></i>
                                    Buka Eksplorasi →
                                </a>

                            </div>

                        </div>

                    </div>

                    <!-- CARD -->
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-5 hover:shadow-lg transition">

                        <div class="flex items-start gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600">

                                <i class="bi bi-cloud-sun text-2xl"></i>

                            </div>

                            <div>

                                <h4 class="font-bold text-gray-800">
                                    Pantau Cuaca
                                </h4>

                                <p class="text-sm text-gray-500 mt-1 mb-3">
                                    Lihat kondisi cuaca destinasi realtime.
                                </p>

                                <a href="#"
                                   class="text-sm text-blue-600 font-semibold hover:underline">

                                    Cek Cuaca →

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- FAVORITES -->
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6">

                    <div class="flex items-center justify-between mb-6">

                        <div>

                            <h3 class="text-2xl font-bold text-gray-800">
                                Destinasi Favorit
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Tempat wisata yang kamu simpan.
                            </p>

                        </div>

                        <i class="bi bi-star-fill text-warning text-2xl"></i>

                    </div>

                    <div class="flex flex-row gap-4 flex-wrap">

                    @foreach ($favorites as $favorite)

                        <div class="bg-white rounded-4xl shadow-sm overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300"
                            style="width: 260px;">

                            {{-- GAMBAR --}}
                            <div style="height: 170px; overflow: hidden;">

                                <img src="{{ asset('storage/' . $favorite->destinasi->gambar) }}"
                                    class="w-100 h-100 object-fit-cover"
                                    alt="{{ $favorite->destinasi->nama_wisata }}">

                            </div>

                            {{-- CONTENT --}}
                            <div class="p-3">

                                <div class="flex items-center justify-between mb-2">

                                    <span class="text-xs px-2 py-1 rounded-pill bg-warning-subtle text-warning fw-semibold">
                                        Favorit
                                    </span>

                                    <i class="bi bi-star-fill text-warning"></i>

                                </div>

                                <h5 class="fw-bold text-dark mb-1"
                                    style="
                                        font-size: 1rem;
                                        line-height: 1.4;
                                    ">

                                    {{ $favorite->destinasi->nama_wisata }}

                                </h5>

                                <p class="text-muted mb-3"
                                style="font-size: 0.85rem;">

                                    <i class="bi bi-geo-alt-fill me-1"></i>

                                    {{ $favorite->destinasi->lokasi }}

                                </p>

                                <a href="{{ route('destinasi.detail', $favorite->destinasi->slug) }}"
                                class="btn btn-dark w-100 rounded-pill">

                                    Lihat Destinasi

                                </a>

                            </div>

                        </div>

                    @endforeach

                </div>

                </div>

            </div>

            <!-- RIGHT -->
            <div>

                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 sticky top-5">

                    <h4 class="font-bold text-gray-800 mb-5 flex items-center gap-2">

                        <i class="bi bi-person-circle text-amber-600"></i>

                        Pengaturan Akun

                    </h4>

                    <div class="space-y-3">

                        <a href="{{ route('profile.edit') }}"
                           class="flex items-center justify-between bg-gray-50 hover:bg-amber-50 transition p-4 rounded-2xl">

                            <div class="flex items-center gap-3">

                                <i class="bi bi-person"></i>

                                <span class="text-sm font-medium">
                                    Edit Profil
                                </span>

                            </div>

                            <i class="bi bi-chevron-right"></i>

                        </a>

                        <a href="{{ route('profile.edit') }}"
                           class="flex items-center justify-between bg-gray-50 hover:bg-amber-50 transition p-4 rounded-2xl">

                            <div class="flex items-center gap-3">

                                <i class="bi bi-key"></i>

                                <span class="text-sm font-medium">
                                    Ubah Password
                                </span>

                            </div>

                            <i class="bi bi-chevron-right"></i>

                        </a>

                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <button type="submit"
                                    class="w-full flex items-center justify-between bg-red-50 hover:bg-red-100 transition p-4 rounded-2xl">

                                <div class="flex items-center gap-3">

                                    <i class="bi bi-box-arrow-right text-red-600"></i>

                                    <span class="text-sm font-medium text-red-600">
                                        Logout
                                    </span>

                                </div>

                                <i class="bi bi-chevron-right text-red-600"></i>

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>