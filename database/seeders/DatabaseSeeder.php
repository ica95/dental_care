<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Layanan;
use App\Models\JadwalDokter;
use App\Models\Reservasi;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Dokter::factory(4)->create();

        Pasien::factory(5)->create();

        Layanan::factory(5)->create();

        JadwalDokter::factory(10)->create();

        Reservasi::factory(5)->create();
    }
}