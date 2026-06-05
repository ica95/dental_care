<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Layanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasis = Reservasi::with(
            'pasien',
            'dokter',
            'layanan'
        )->get();

        return view(
            'reservasi.index',
            compact('reservasis')
        );
    }

   public function create()
{
    $pasien = Pasien::where(
        'user_id',
        Auth::id()
    )->first();

    $dokters = Dokter::all();

    $layanans = Layanan::all();

    return view(
        'reservasi.create',
        compact(
            'pasien',
            'dokters',
            'layanans'
        )
    );
}

    public function store(Request $request)
    {
        $request->validate([
            // hapus pasien_id
            'dokter_id' => 'required',
            'layanan_id' => 'required',
            'tanggal_reservasi' => 'required',
            'jam_reservasi' => 'required',
            'keluhan' => 'required'
        ]);
        
$pasien = Pasien::where(
    'user_id',
    Auth::id()
)->first();
        Reservasi::create([

            'pasien_id' => $pasien->id,
            'dokter_id' => $request->dokter_id,

            'layanan_id' => $request->layanan_id,

            'tanggal_reservasi' =>
                $request->tanggal_reservasi,

            'jam_reservasi' =>
                $request->jam_reservasi,

            'keluhan' =>
                $request->keluhan,

            'status' => 'pending'
        ]);

        return redirect('/reservasi')
            ->with('success', 'Reservasi berhasil ditambahkan');
    }

    public function show($id)
{
    return redirect('/reservasi');

    
        $reservasi = Reservasi::with(
            'pasien',
            'dokter',
            'layanan'
        )->findOrFail($id);

        return view(
            'reservasi.show',
            compact('reservasi')
        );
    }

    public function edit($id)
    {
        $reservasi = Reservasi::findOrFail($id);

        $pasiens = Pasien::all();

        $dokters = Dokter::all();

        $layanans = Layanan::all();

        return view(
            'reservasi.edit',
            compact(
                'reservasi',
                'pasiens',
                'dokters',
                'layanans'
            )
        );
    }

    public function update(Request $request, $id)
{
    $reservasi = Reservasi::findOrFail($id);

    $reservasi->update([
        'status' => $request->status
    ]);

    return redirect('/reservasi')
        ->with('success', 'Status berhasil diupdate');
}

    public function destroy($id)
    {
        $reservasi = Reservasi::findOrFail($id);

        $reservasi->delete();

        return redirect('/reservasi')
            ->with('success', 'Reservasi berhasil dihapus');
    }
}