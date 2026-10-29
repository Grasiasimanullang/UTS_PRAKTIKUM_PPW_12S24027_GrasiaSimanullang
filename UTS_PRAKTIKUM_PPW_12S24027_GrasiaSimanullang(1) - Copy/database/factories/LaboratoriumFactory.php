<?php

namespace Database\Factories;
use App\Models\Kategori;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laboratorium>
 */
class LaboratoriumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'laboratorium'  => fake()->unique()->isbn13(),
        'kode_ruangan'  => Str::title(fake()->words(rand(3, 6), true)),
        'peminjam'      => fake()->name(),([
            'Raspberry Pi 4 Model B (8GB RAM) Starter Kit', 'EQ- IOT-  005',
            'Andi Offset', 'Mizan', 'Deepublish',
        ]),
    ];
}
}
