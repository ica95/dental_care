<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservasi>
 */
class ReservasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'pasien_id' => \App\Models\Pasien::inRandomOrder()->first()->id,
        'jadwal_dokter_id' => \App\Models\JadwalDokter::inRandomOrder()->first()->id,
        'layanan_id' => \App\Models\Layanan::inRandomOrder()->first()->id,
        'tanggal_reservasi' => fake()->date(),
        'keluhan' => fake()->sentence(),
        'status' => fake()->randomElement([
            'Menunggu',
            'Dikonfirmasi',
            'Selesai'
        ]),
    ];
}
}
