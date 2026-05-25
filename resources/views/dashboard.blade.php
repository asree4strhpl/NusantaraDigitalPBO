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

    <!-- Header -->
    <div class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    Dashboard Pengguna
                </h2>

                <p class="text-sm text-gray-500">
                    Selamat datang di Nusantara Digital
                </p>
            </div>

            <a href="{{ url('/') }}"
               class="text-sm text-amber-600 hover:text-amber-700 font-medium flex items-center gap-2">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Beranda
            </a>

        </div>
    </div>

    <!-- Content -->
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome Card -->
            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
                <div class="p-6 flex items-center justify-between flex-wrap gap-4">

                    <div>
                        <h3 class="text-2xl font-bold text-slate-800">
                            Selamat Datang, {{ Auth::user()->name }} 👋
                        </h3>

                        <p class="text-sm text-gray-500 mt-2">
                            Anda berhasil login ke sistem pariwisata digital.
                        </p>
                    </div>

                    <span class="inline-flex items-center px-4 py-2 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        <span class="h-2 w-2 rounded-full bg-green-400 mr-2"></span>
                        Online
                    </span>

                </div>
            </div>

            <!-- Main Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Left -->
                <div class="md:col-span-2 space-y-6">

                    <!-- Menu Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <!-- Eksplorasi -->
                        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start gap-4">

                            <div class="p-3 rounded-lg bg-amber-50 text-amber-600">
                                <i class="bi bi-compass text-2xl"></i>
                            </div>

                            <div>
                                <h4 class="font-semibold text-gray-800">
                                    Eksplorasi Wisata
                                </h4>

                                <p class="text-xs text-gray-500 mt-1 mb-3">
                                    Jelajahi destinasi wisata terbaik Indonesia.
                                </p>

                                <a href="{{ url('/kategori') }}"
                                   class="text-xs font-medium text-amber-600 hover:underline inline-flex items-center gap-1">

                                    Buka Eksplorasi
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>

                        </div>

                        <!-- Cuaca -->
                        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start gap-4">

                            <div class="p-3 rounded-lg bg-blue-50 text-blue-600">
                                <i class="bi bi-cloud-sun text-2xl"></i>
                            </div>

                            <div>
                                <h4 class="font-semibold text-gray-800">
                                    Pantau Cuaca
                                </h4>

                                <p class="text-xs text-gray-500 mt-1 mb-3">
                                    Lihat perkiraan cuaca destinasi wisata.
                                </p>

                                <a href="#"
                                   class="text-xs font-medium text-blue-600 hover:underline inline-flex items-center gap-1">

                                    Cek Cuaca
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>

                        </div>

                    </div>

                    <!-- Management -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">

    <h4 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
        <i class="bi bi-sliders text-amber-600"></i>
        Manajemen Pariwisata
    </h4>

    <div class="flex flex-row gap-3 flex-wrap">

        <!-- Destinasi -->
        <a href="#"
           class="flex-1 min-w-[180px] p-4 rounded-lg border border-gray-100 hover:bg-amber-50 transition text-center group">

            <i class="bi bi-geo-alt text-lg text-gray-600 group-hover:text-amber-600 block mb-2"></i>

            <span class="text-sm font-medium text-gray-700">
                Destinasi
            </span>
        </a>

        <!-- Hotel -->
        <a href="#"
           class="flex-1 min-w-[180px] p-4 rounded-lg border border-gray-100 hover:bg-amber-50 transition text-center group">

            <i class="bi bi-building text-lg text-gray-600 group-hover:text-amber-600 block mb-2"></i>

            <span class="text-sm font-medium text-gray-700">
                Hotel
            </span>
        </a>

        <!-- Event -->
        <a href="#"
           class="flex-1 min-w-[180px] p-4 rounded-lg border border-gray-100 hover:bg-amber-50 transition text-center group">

            <i class="bi bi-calendar-event text-lg text-gray-600 group-hover:text-amber-600 block mb-2"></i>

            <span class="text-sm font-medium text-gray-700">
                Event
            </span>
        </a>

    </div>
</div>

                <!-- Right -->
                <div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">

                        <h4 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <i class="bi bi-person-gear text-amber-600"></i>
                            Pengaturan Akun
                        </h4>

                        <div class="space-y-3">

                            <a href="{{ route('profile.edit') }}"
                               class="w-full flex items-center justify-between p-3 rounded-lg bg-gray-50 hover:bg-amber-50 transition group">

                                <div class="flex items-center gap-3">
                                    <i class="bi bi-person"></i>

                                    <span class="text-sm font-medium">
                                        Edit Profil
                                    </span>
                                </div>

                                <i class="bi bi-chevron-right"></i>
                            </a>

                            <a href="{{ route('profile.edit') }}"
                               class="w-full flex items-center justify-between p-3 rounded-lg bg-gray-50 hover:bg-amber-50 transition group">

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
                                        class="w-full flex items-center justify-between p-3 rounded-lg bg-red-50 hover:bg-red-100 transition group">

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