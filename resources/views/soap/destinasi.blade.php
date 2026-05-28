<?xml version="1.0" encoding="UTF-8"?>

<destinasiList>

@foreach($destinasi as $item)

    <destinasi>
        <id>{{ $item->id }}</id>
        <nama>{{ $item->nama_wisata }}</nama>
        <lokasi>{{ $item->lokasi }}</lokasi>
        <rating>{{ $item->rating }}</rating>
    </destinasi>

@endforeach

</destinasiList>