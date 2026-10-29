<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class KemhasSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'kemhas@del.ac.id'],
            ['name' => 'Kemhas Del', 'password' => 'password123']
        );
    }
}
