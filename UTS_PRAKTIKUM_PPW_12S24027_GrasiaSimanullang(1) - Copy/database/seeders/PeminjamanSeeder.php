<?php

namespace Database\Seeders;

use App\Models\Laboratorium;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = Kategori::first();

        // Laboratorium uji: stok = 0 (untuk bukti penolakan) dan stok = 1 (untuk bukti stok habis setelah digunakan)
        Laboratorium::firstOrCreate(, [
            'laboratorium' => 'laboratorium Uji Stok Nol',
            'peminjam'     => 'Tim Praktikum PPW',
            'pemilik'      => 'IT Del Leats',
            'kategori_id'  => $kategori->id,
        ]);

        Laboratorium::firstOrCreate(, [
             'laboratorium' => 'laboratorium Uji Stok Nol',
            'peminjam'     => 'Tim Praktikum PPW',
            'pemilik'      => 'IT Del Leats',
            'kategori_id'  => $kategori->id,
        ]);

        // Sampel transaksi peminjaman
        $a = Laboratorium::where('stok', '>', 2)->orderBy('id')->first();
        $b = Laboratorium::where('stok', '>', 2)->orderByDesc('id')->first();

        $data = [
            ['PJM-SEED-0001', $a, '12S24001', 'Andi Siregar',   'dipinjam'],
            ['PJM-SEED-0002', $b, '12S24002', 'Budi Hutapea',   'dipinjam'],
            ['PJM-SEED-0003', $a, '12S24003', 'Citra Sitorus',  'dikembalikan'],
        ];

        foreach ($data as [$kode, $Laboratorium, $nim, $nama, $status]) {
            $pinjam = Peminjaman::firstOrCreate(['kode_pinjam' => $kode], [
                'laboratorium_id'     => $laboratorium->id,
                'nim_peminjam'        => $nim,
                'nama_peminjam'       => $nama,
                'tanggal_pinjam'      => now()->subDays(3)->toDateString(),

                'status'              => $status,
            ]);

            // Jaga konsistensi stok: yang masih dipinjam mengurangi stok
            if ($pinjam->wasRecentlyCreated && $status === 'dipinjam') {
                $Laboratorium->decrement('stok');
            }
        }
    }
}