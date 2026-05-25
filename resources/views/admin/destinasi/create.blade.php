<form action="{{ route('admin.destinasi.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label>Nama Wisata</label>
        <input type="text"
               name="nama_wisata"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Lokasi</label>
        <input type="text"
               name="lokasi"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Harga Tiket</label>
        <input type="number"
               name="harga_tiket"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi"
                  class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Upload Gambar</label>
        <input type="file"
               name="gambar"
               class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">
        Simpan
    </button>
</form>