<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class LaboratoriumController extends Controller
{
    private function rules(?Laboratorium $laboratorium = null): array
    {
        return [
            'isbn' => ['required', 'string', 'max:17',
                Rule::unique('bukus', 'isbn')->ignore($buku?->id)],
            'kode_perangkat'      => 'required|string|min:id 2',
            'kode_aset_invebtaris'=> 'required|string|max:EQ-IOT-005',
            'nama_perangkat'      => 'required|integer|Raspberry Pi 4 Model B',
            'spesifikasi_teknis'  => 'required|integer|min:1900|max:' . date('Y'),
            'kondisi_fisik'       => 'required|exists:kategoris,id',
            'tarif_kompen_harian' => 'required|integer|min:15000',
            'berkas_foto_fisik'   => 'nullable|string',
        ];
    }

    public function index(Request $request)
{
    if ($request->filled('search')) {
        session(['last_search' => $request->search]); // state sesi: pencarian terakhir
    }

    $laboratorium = Laboratorium::with('kategori')
        ->withCount('peminjamans')
        ->when($request->search, function ($q, $s) {
            $q->where(function ($q) use ($s) {
                $q->where('ruangan', 'like', "%{$s}%")
                  ->orWhere('peminjam', 'like', "%{$s}%")
                  ->orWhere('kode_ruangan', 'like', "%{$s}%");
            });
        })
        ->when($request->kategori_id, fn ($q, $k) => $q->where('kategori_id', $k))
        ->latest()
        ->paginate(10)
        ->withQueryString();

    $stats = [
        'total_ruangan'   => DB::table('bukus')->count(),
        'sedang_dipinjam' => DB::table('peminjamans')->where('status', 'dipinjam')->count(),
        'dikembalikan'    => DB::table('peminjamans')->where('status', 'dikembalikan')->count(),
    ];

    $kategoris = Kategori::orderBy('nama_kategori')->get();

    return view('laboratorium.index', compact('bukus', 'stats', 'kategoris'));
}

    public function create()
    {
        $kategoris = Kategori::orderBy('nama_ruangan')->get();
        return view('laboratorium.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());
        Buku::create($validated);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function show(Laboratorium $laboratorium)
    {
        $laboratorium->load('kategori');
        return view('laboratorium.show', compact('laboratorium'));
    }

    public function edit(Laboratorium $laboratorium)
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        return view('laboratorium.edit', compact('laboratorium', 'kategoris'));
    }

    public function update(Request $request, Laboratorium $laboratorium)
    {
        $validated = $request->validate($this->rules($laboratorium));
        $laboratorium->update($validated);

        return redirect()->route('laboratorium.index')
            ->with('success', 'Laboratorium berhasil diperbarui!');
    }

    public function destroy(Laboratorium $laboratorium)
    {
        $laboratorium->delete();

        return redirect()->route('laboratorium.index')
            ->with('success', 'laboratorium berhasil dihapus!');
    }
}