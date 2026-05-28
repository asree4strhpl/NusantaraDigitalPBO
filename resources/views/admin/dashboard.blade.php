@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="admin-wrapper">
        <div class="admin-sidebar">
            <div class="sidebar-brand">
                <h4 class="brand-title">NusantaraDigital</h4>
                <span class="brand-subtitle text-ellipsis">Control Panel</span>
            </div>
            
            <ul class="nav flex-column sidebar-menu">
                <li class="nav-item">
                    <a href="#" class="menu-link active text-white">
                        <i class="bi bi-speedometer2 text-white"></i> Ringkasan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/destinasi') }}" class="menu-link">
                        <i class="bi bi-map"></i> Kelola Destinasi
                    </a>
                <li class="nav-item mt-auto pt-5">
                    <a href="{{ url('/') }}" class="menu-link exit-link">
                        <i class="bi bi-box-arrow-left"></i> Keluar Ke Web
                    </a>
                </li>
            </ul>
        </div>

        <div class="admin-main-content">
            <header class="admin-header">
                <div>
                    <h1 class="welcome-title">Selamat Datang, Admin</h1>
                    <p class="welcome-subtitle">Kelola informasi publik pariwisata digital Anda di sini.</p>
                </div>
                <div class="admin-profile-pill">
                    <i class="bi bi-person-circle text-amber"></i>
                    <span>Asri</span>
                </div>
            </header>

            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="stat-card-premium">
                        <div>
                            <span class="stat-label">Total Destinasi</span>
                            <h2 class="stat-number">{{ $totalDestinasi }}</h2>
                        </div>
                        <div class="stat-icon-wrapper bg-blue-light text-blue">
                            <i class="bi bi-map"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card-premium">
                        <div>
                            <span class="stat-label">Kategori Aktif</span>
                            <h2 class="stat-number">{{ $totalKategori }}</h2>
                        </div>
                        <div class="stat-icon-wrapper bg-green-light text-green">
                            <i class="bi bi-tags"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card-premium">
                        <div>
                            <span class="stat-label">Total Tayangan</span>
                            <h2 class="stat-number">48.9K</h2>
                        </div>
                        <div class="stat-icon-wrapper bg-amber-light text-amber">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-card-premium">
                <div class="card-header-clean">
                    <h5 class="table-card-title">Destinasi Terpopuler Saat Ini</h5>
                    <span class="badge bg-amber-light text-amber border border-amber-soft px-3 py-2 rounded-pill">Real-time Data</span>
                </div>
                <div class="table-responsive">
                    <table class="table admin-custom-table align-middle">
                        <thead>
                            <tr>
                                <th>Nama Destinasi</th>
                                <th>Lokasi</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($destinasiTerbaru as $item)

                            <tr>

                                <td class="fw-semibold text-navy">
                                    {{ $item->nama_wisata }}
                                </td>

                                <td class="text-muted">
                                    {{ $item->lokasi }}
                                </td>

                                <td>
                                    <div class="rating-badge">
                                        <i class="bi bi-star-fill text-warning"></i>

                                        <span>{{ $item->rating }}</span>
                                    </div>
                                </td>

                                <td>
                                    <span class="status-badge success">
                                        Published
                                    </span>
                                </td>

                                <td class="text-end">

                                    <a href="{{ route('admin.destinasi.edit', $item->id) }}"
                                    class="btn btn-action-edit">

                                        <i class="bi bi-pencil-square me-1"></i>
                                        Edit

                                    </a>

                                </td>

                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection