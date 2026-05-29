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

    <span>
        <i class="bi bi-thermometer-half"></i>
        Suhu:
        {{ $weather['main']['temp'] ?? '-' }}°C
    </span>

    <span>
        <i class="bi bi-cloud-fill"></i>
        Cuaca:
        {{ $weather['weather'][0]['description'] ?? '-' }}
    </span>

    <!-- //favorite button -->
        @auth

        <form action="{{ route('favorite.toggle', $destinasi->id) }}"
            method="POST">

            @csrf

            <button type="submit" class="btn p-0 border-0">

                @if (
                    $destinasi->favorites
                        ->where('user_id', auth()->id())
                        ->count()
                )

                    <i class="bi bi-star-fill text-warning fs-2"></i>

                @else

                    <i class="bi bi-star text-white fs-2"></i>

                @endif

            </button>

        </form>

@endauth
    
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

            <section class="mt-5">

    <h3>Review Pengunjung</h3>

    @auth

    <form action="{{ route('review.store', $destinasi->id) }}"
          method="POST"
          class="mb-4">

        @csrf

        <div class="mb-3">
            <label>Rating</label>

            <select name="rating" class="form-control">
                <option value="5">5 ⭐</option>
                <option value="4">4 ⭐</option>
                <option value="3">3 ⭐</option>
                <option value="2">2 ⭐</option>
                <option value="1">1 ⭐</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Komentar</label>

            <textarea name="komentar"
                      class="form-control"></textarea>
        </div>

        <button type="submit"
                class="btn btn-dark">
            Kirim Review
        </button>

    </form>

    @endauth

    {{-- LIST REVIEW --}}
    @foreach ($destinasi->reviews as $review)

        <div class="border rounded p-3 mb-3">

            <div class="d-flex justify-content-between">

                <strong>
                    {{ $review->user->name }}
                </strong>

                <span>
                    {{ $review->rating }} ⭐
                </span>

            </div>

            <p class="mb-0 mt-2">
                {{ $review->komentar }}
            </p>

        </div>

    @endforeach

</section>

        </div>

    </div>

</section>

@endsection