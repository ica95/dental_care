<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Layanan;
use App\Models\Reservasi;
use App\Models\RekamMedis;

class AdminController extends Controller
{
    public function dashboard()
    {
        $jumlahDokter = Dokter::count();
        $jumlahPasien = Pasien::count();
        $jumlahLayanan = Layanan::count();
        $jumlahReservasi = Reservasi::count();
        $jumlahRekamMedis = RekamMedis::count();

        return view('admin.dashboard', compact(
            'jumlahDokter',
            'jumlahPasien',
            'jumlahLayanan',
            'jumlahReservasi',
            'jumlahRekamMedis'
        ));
    }
}