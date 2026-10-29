<x-layout :title="$laboratorium->judul">
    <div class="bg-white p-4 shadow-sm rounded">
        <h3>{{ $laboratorium->judul }}</h3>
        <dl class="row mt-3">
            <dt class="col-sm-3">ISBN</dt><dd class="col-sm-9">{{ $laboratorium->isbn }}</dd>
            <dt class="col-sm-3">Penulis</dt><dd class="col-sm-9">{{ $laboratorium->penulis }}</dd>
            <dt class="col-sm-3">Penerbit</dt><dd class="col-sm-9">{{ $laboratorium->penerbit }}</dd>
            <dt class="col-sm-3">Tahun Terbit</dt><dd class="col-sm-9">{{ $laboratorium->tahun_terbit }}</dd>
            <dt class="col-sm-3">Kategori</dt><dd class="col-sm-9">{{ $laboratorium->kategori->nama_kategori }}</dd>
            <dt class="col-sm-3">Stok</dt><dd class="col-sm-9">{{ $laboratorium->stok }}</dd>
            <dt class="col-sm-3">Sinopsis</dt><dd class="col-sm-9">{{ $laboratorium->sinopsis ?: '-' }}</dd>
        </dl>
        <a href="{{ route('laboratorium.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </div>
</x-layout>