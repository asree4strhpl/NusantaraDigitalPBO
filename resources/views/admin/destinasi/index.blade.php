@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Kelola Destinasi</h1>

    <a href="{{ route('admin.destinasi.create') }}">
        Tambah Destinasi
    </a>

    <table border="1" cellpadding="10">
        <tr>
            <th>Nama</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>

        @foreach($destinasi as $item)
        <tr>
            <td>{{ $item->nama }}</td>
                <td>
                    <img src="{{ asset('storage/' . $item->gambar) }}"
                    width="120">
                </td>
            </td>
            <td>
                <a href="{{ route('admin.destinasi.edit', $item->id) }}">
                    Edit
                </a>

                <form action="{{ route('admin.destinasi.destroy', $item->id) }}"
                      method="POST"
                      style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Hapus
                    </button>
                </form>

        </tr>
        @endforeach

    </table>
</div>
@endsection