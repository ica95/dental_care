<?php

namespace Database\Factories;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
  	'user_id' => User::factory(),

        'nama_pasien' => fake()->name(),
        'jenis_kelamin' => fake()->randomElement(['L','P']),
        'tanggal_lahir' => fake()->date(),
        'alamat' => fake()->address(),
        'no_hp' => fake()->phoneNumber(),
    ];
}
}
