<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JadwalDokter>
 */
class JadwalDokterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'dokter_id' => \App\Models\Dokter::inRandomOrder()->first()->id,
        'hari' => fake()->randomElement([
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat'
        ]),
        'jam_mulai' => '08:00:00',
        'jam_selesai' => '12:00:00',
    ];
}
}
