@extends('layouts.admin')

@section('content')

<div class="container">

    <h1 class="mb-4">Kelola Destinasi</h1>

    {{-- BUTTON TAMBAH --}}
    <a href="{{ route('admin.destinasi.create') }}"
       class="btn btn-primary mb-4">
        Tambah Destinasi
    </a>

    {{-- SEARCH --}}
    <form method="GET"
          action="{{ route('admin.destinasi.index') }}"
          class="mb-4">

        <div class="row">

            <div class="col-md-10">
                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Cari destinasi..."
                       value="{{ request('search') }}">
            </div>

            <div class="col-md-2">
                <button class="btn btn-dark w-100">
                    Cari
                </button>
            </div>

        </div>
    </form>

    {{-- TABLE --}}
    <table class="table table-bordered align-middle">

        <thead>
            <tr>
                <th>Nama</th>
                <th>Gambar</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Rating</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @foreach($destinasi as $item)

            <tr>

                <td>{{ $item->nama_wisata }}</td>

                <td>
                    <img src="{{ asset('storage/' . $item->gambar) }}"
                         width="120">
                </td>

                <td>{{ $item->kategoriWisata->nama_kategori ?? 'N/A' }}</td>

                <td>{{ $item->lokasi }}</td>

                <td>{{ $item->rating }}</td>

                <td>

                    <a href="{{ route('admin.destinasi.edit', $item->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.destinasi.destroy', $item->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus?')">

                            Hapus

                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $destinasi->links() }}
    </div>

</div>

@endsection