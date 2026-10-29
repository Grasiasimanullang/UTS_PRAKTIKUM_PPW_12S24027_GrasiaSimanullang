<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use App\Models\Peminjaman;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with('laboratorium')->latest()->paginate(10);
        $laboratorium = Laboratorium::orderBy('judul')->get();

        return view('peminjaman.index', compact('peminjamans', 'bukus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'laboratorium_id' => 'required|exists:laboratorium,id',
            'nim_peminjam'    => 'required|string|max:5',
            'nama_peminjam'   => 'required|string|min:2',
        ]);
        $nim = strtoupper(trim($validated['nim_peminjam']));

        try {
            DB::transaction(function () use ($validated, $nim) {
                // Kunci baris laboratorium agar request lain mengantre
                $Laboratorium = Laboratorium::where('id', $validated['laboratorium_id'])
                    ->lockForUpdate()
                    ->firstOrFail();

                if ($laboratorium->stok < 1) {
                    throw new \RuntimeException("Stok laboratorium \"{$laboratorium->ruangan}\" habis, peminjaman ditolak!");
                }

                $masihPinjam = Peminjaman::where('laboratorium_id', $laboratorium->id)
                    ->where('nim_peminjam', $nim)
                    ->where('status', 'dipinjam')
                    ->exists();

                if ($masihPinjam) {
                    throw new \RuntimeException("NIM {$nim} masih memakai laboratorium ini dan belum selesai!");
                }

                $laboratorium->decrement('stok');

                $laboratorium->peminjamans()->create([
                    'kode_pinjam'         => 'PJM-' . now()->format('ymd') . '-' . strtoupper(Str::random(4)),
                    'nim_peminjam'        => $nim,
                    'nama_peminjam'       => $validated['nama_peminjam'],
                    'tanggal_pinjam'      => now()->toDateString(),
                    'tanggal_jatuh_tempo' => now()->addDays(7)->toDateString(),
                    'status'              => 'dipinjam',
                ]);
            }, 3);

            return back()->with('success', 'Peminjaman berhasil dicatat secara atomik!');
        } catch (\RuntimeException $e) {
            return back()->withInput()->with('error', $e->getMessage());
        } catch (QueryException $e) {
            Log::error('[DB EXCEPTION] Peminjaman: ' . $e->getMessage());

            return back()->withInput()->with('error', 'Terjadi kesalahan database saat memproses peminjaman.');
        }
    }

    public function kembalikan(int $id)
    {
        try {
            DB::transaction(function () use ($id) {
                $pinjam = Peminjaman::where('id', $id)->lockForUpdate()->firstOrFail();

                if ($pinjam->status === 'dikembalikan') {
                    throw new \RuntimeException('Laboratorium ini sudah dikembalikan sebelumnya!');
                }

                $laboratorium = Laboratorium::where('id', $pinjam->laboratorium_id)->lockForUpdate()->firstOrFail();

                $pinjam->update([
                    'status'          => 'dikembalikan',
                    'tanggal_kembali' => now()->toDateString(),
                ]);

                $laboratorium->increment('stok');
            }, 3);

            return back()->with('success', 'laboratorium selesai digunakan, stok bertambah.');
        } catch (\RuntimeException $e) {
            return back()->with('error', $e->getMessage());
        } catch (QueryException $e) {
            Log::error('[DB EXCEPTION] Pengembalian: ' . $e->getMessage());

            return back()->with('error', 'Terjadi kesalahan database saat memproses pengembalian.');
        }
    }
}