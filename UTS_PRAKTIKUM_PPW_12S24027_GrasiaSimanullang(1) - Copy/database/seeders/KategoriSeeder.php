<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['RNG_1', 'Ruangan_1'],
            ['RNG_2', 'Ruangan_2'],
            ['RNG_3', 'Ruangan_3'],
        ];

        foreach ($data as [$kode, $nama]) {
            Kategori::updateOrCreate(
                ['kode_kategori' => $kode],
                ['nama_kategori' => $nama]
            );
        }
    }
}