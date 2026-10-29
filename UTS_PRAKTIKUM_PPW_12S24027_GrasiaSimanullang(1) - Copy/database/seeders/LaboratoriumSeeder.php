<?php

namespace Database\Seeders;

use App\Models\Laboratorium;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        Buku::factory()->count(25)->recycle(Kategori::all())->create();
    }
}