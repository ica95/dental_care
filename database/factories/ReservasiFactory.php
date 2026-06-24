<?php

namespace Database\Factories;

use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Layanan;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservasiFactory extends Factory
{
    public function definition(): array
    {
        return [
            'pasien_id' => Pasien::inRandomOrder()->first()?->id ?? Pasien::factory(),
            'dokter_id' => Dokter::inRandomOrder()->first()?->id ?? Dokter::factory(),
            'layanan_id' => Layanan::inRandomOrder()->first()?->id ?? Layanan::factory(),

            'tanggal_reservasi' => fake()->date(),
            'jam_reservasi' => fake()->time('H:i:s'),

            'keluhan' => fake()->sentence(),
            'status' => fake()->randomElement([
                'pending',
                'diterima',
                'selesai',
                'batal',
            ]),
        ];
    }
}
