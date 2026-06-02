<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use App\Models\Dokter;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{
    public function index()
    {
        $jadwals = JadwalDokter::with('dokter')->get();

        return view('jadwal_dokter.index', compact('jadwals'));
    }

    public function create()
    {
        $dokters = Dokter::all();

        return view('jadwal_dokter.create', compact('dokters'));
    }

    public function store(Request $request)
    {
        JadwalDokter::create([
            'dokter_id' => $request->dokter_id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect('/jadwal_dokter');
    }
}