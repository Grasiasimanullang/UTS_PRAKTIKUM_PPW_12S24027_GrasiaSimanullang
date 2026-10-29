<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">ISBN</label>
        <input type="text" name="isbn" class="form-control" value="{{ old('isbn', $laboratorium->isbn ?? '') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul', $laboratorium->judul ?? '') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Penulis</label>
        <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $laboratorium->penulis ?? '') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Penerbit</label>
        <input type="text" name="penerbit" class="form-control" value="{{ old('penerbit', $laboratorium->penerbit ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Tahun Terbit</label>
        <input type="number" name="tahun_terbit" class="form-control" value="{{ old('tahun_terbit', $laboratorium->tahun_terbit ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Kategori</label>
        <select name="kategori_id" class="form-select">
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategoris as $k)
                <option value="{{ $k->id }}" @selected(old('kategori_id', $buku->kategori_id ?? '') == $k->id)>
                    {{ $k->nama_kategori }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label">Stok</label>
        <input type="number" name="stok" class="form-control" value="{{ old('stok', $laboratorium->stok ?? 0) }}">
    </div>
    <div class="col-12">
        <label class="form-label">Sinopsis</label>
        <textarea name="sinopsis" rows="4" class="form-control">{{ old('sinopsis', $buku->sinopsis ?? '') }}</textarea>
    </div>
</div>
<div class="mt-4">
    <button type="submit" class="btn btn-del">Simpan</button>
    <a href="{{ route('laboratorium.index') }}" class="btn btn-outline-secondary">Batal</a>
</div>