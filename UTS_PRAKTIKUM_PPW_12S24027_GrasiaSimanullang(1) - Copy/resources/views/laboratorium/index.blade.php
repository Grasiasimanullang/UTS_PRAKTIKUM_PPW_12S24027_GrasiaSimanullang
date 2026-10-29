<x-layout title="Daftar laboratorium">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Daftar laboratorium</h3>
        <a href="{{ route('laboratorium.create') }}" class="btn btn-del">+ Tambah laboratorium</a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card shadow-sm h-100"><div class="card-body">
                <div class="text-muted small">Total Judul laboratorium</div>
                <div class="fs-3 fw-bold">{{ $stats['total_judul'] }}</div>
            </div></div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm h-100"><div class="card-body">
                <div class="text-muted small">Total Stok Tersedia</div>
                <div class="fs-3 fw-bold">{{ $stats['total_stok'] }}</div>
            </div></div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm h-100"><div class="card-body">
                <div class="text-muted small">Sedang Dipinjam</div>
                <div class="fs-3 fw-bold">{{ $stats['sedang_dipinjam'] }}</div>
            </div></div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm h-100"><div class="card-body">
                <div class="text-muted small">Total Dikembalikan</div>
                <div class="fs-3 fw-bold">{{ $stats['dikembalikan'] }}</div>
            </div></div>
        </div>
    </div>

    <form method="GET" action="{{ route('laboratorium.index') }}" class="row g-2 mb-3">
        <div class="col-md-5">
            <input type="text" name="search" value="{{ request('search') }}"
                   class="form-control" placeholder="Cari judul / penulis / ISBN...">
        </div>
        <div class="col-md-4">
            <select name="kategori_id" class="form-select">
                <option value="">Semua Kategori</option>
                @foreach($kategoris as $k)
                    <option value="{{ $k->id }}" @selected(request('kategori_id') == $k->id)>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 d-flex gap-2">
            <button class="btn btn-del">Cari</button>
            <a href="{{ route('buku.index') }}" class="btn btn-outline-secondary">Reset</a>
        </div>
    </form>

    @if(session('last_search'))
        <p class="text-muted small">Pencarian terakhir Anda (sesi):
            <a href="{{ route('buku.index', ['search' => session('last_search')]) }}">{{ session('last_search') }}</a>
        </p>
    @endif

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped align-middle mb-0">
                <thead>
                    <tr>
                        <th>ISBN</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Riwayat Pinjam</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($laboratorium as $laboratorium)
                        <tr>
                            <td>{{ $laboratorium->isbn }}</td>
                            <td>{{ $laboratorium->judul }}</td>
                            <td>{{ $laboratorium->penulis }}</td>
                            <td>{{ $laboratorium->kategori->nama_kategori }}</td>
                            <td>
                                @if($laboratorium->stok < 1)
                                    <span class="badge text-bg-danger">0</span>
                                @else
                                    {{ $laboratorium->stok }}
                                @endif
                            </td>
                            <td>{{ $laboratorium->peminjamans_count }}x</td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('laboratorium.show', $laboratorium) }}" class="btn btn-sm btn-outline-secondary">Detail</a>
                                    <a href="{{ route('laboratorium.edit', $laboratorium) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form action="{{ route('laboratorium.destroy', $laboratorium) }}" method="POST"
                                          onsubmit="return confirm('Yakin hapus laboratorium ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                Tidak ada laboratorium yang cocok dengan pencarian Anda.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $bukus->links() }}</div>
</x-layout>