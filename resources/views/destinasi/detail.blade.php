@extends('layouts.app')

@section('title', $destinasi->nama_wisata)

@section('content')

<link rel="stylesheet" href="{{ asset('css/detail.css') }}">

<section class="detail-hero">

    <div class="hero-overlay"></div>

    <img src="{{ asset('storage/' . $destinasi->gambar) }}"
         alt="{{ $destinasi->nama_wisata }}"
         class="hero-image">

    <div class="hero-content container">

        <span class="badge-category mb-3">
            {{ $destinasi->kategoriWisata->nama_kategori ?? 'Wisata Indonesia' }}
        </span>

        <h1 class="hero-title">
            {{ $destinasi->nama_wisata }}
        </h1>

        <div class="hero-meta">

            <span>
                <i class="bi bi-geo-alt-fill"></i>
                {{ $destinasi->lokasi }}
            </span>

            <span>
                <i class="bi bi-star-fill text-warning"></i>
                {{ $destinasi->rating }}/5
            </span>

            <span>
                <i class="bi bi-ticket-perforated-fill"></i>
                Rp {{ number_format($destinasi->harga_tiket, 0, ',', '.') }}
            </span>

        </div>

    </div>

</section>

<section class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="detail-card">

                <h3 class="mb-4">
                    Tentang Destinasi
                </h3>

                <p class="detail-description">
                    {{ $destinasi->deskripsi }}
                </p>

            </div>

        </div>

    </div>

</section>

@endsection