@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Destinasi</h1>

    <form action="{{ route('admin.destinasi.update', $destinasi->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <input type="text"
           name="nama_wisata"
           value="{{ $destinasi->nama_wisata }}">

    <input type="text"
           name="lokasi"
           value="{{ $destinasi->lokasi }}">

    <input type="number"
           name="harga_tiket"
           value="{{ $destinasi->harga_tiket }}">

    <input type="text"
           name="rating"
           value="{{ $destinasi->rating }}">

    <textarea name="deskripsi">{{ $destinasi->deskripsi }}</textarea>

    <input type="file" name="gambar">

    @if($destinasi->gambar)
        <img src="{{ asset('storage/' . $destinasi->gambar) }}"
             width="120">
    @endif

    <button type="submit">
        Update
    </button>
</form>
</div>
@endsection