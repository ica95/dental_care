<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Layanan;
use App\Models\JadwalDokter;
use App\Models\ProfilKlinik;

class HomeController extends Controller
{
    public function index()
    {
        $dokters = Dokter::with('jadwal')->get();

        $layanans = Layanan::all();

        $jadwals = JadwalDokter::with('dokter')->get();

        $profil = ProfilKlinik::first();

        return view(
            'home.index',
            compact(
                'dokters',
                'layanans',
                'jadwals',
                'profil'
            )
        );
    }
}