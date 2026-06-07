<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Reservasi;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Layanan;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    public function index()
    {
        // ADMIN
        if (Auth::user()->role == 'admin')
        {
            $reservasis = Reservasi::with(
                'pasien',
                'dokter',
                'layanan'
            )->get();

            return view(
                'reservasi.admin_index',
                compact('reservasis')
            );
        }

        // PASIEN
        $pasien = Pasien::where(
            'user_id',
            Auth::id()
        )->first();

        $reservasis = Reservasi::with(
            'dokter',
            'layanan'
        )
        ->where(
            'pasien_id',
            $pasien->id
        )
        ->get();

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

            'dokter_id' => 'required',

            'layanan_id' => 'required',

            'tanggal_reservasi' => 'required|date',

            'jam_reservasi' => 'required',

            'keluhan' => 'required'

        ]);

        // Ambil nama hari dari tanggal reservasi
        Carbon::setLocale('id');

        $hari = Carbon::parse(
            $request->tanggal_reservasi
        )->translatedFormat('l');

        $hari = ucfirst($hari);

        // Cari jadwal dokter
        $jadwal = JadwalDokter::where(
            'dokter_id',
            $request->dokter_id
        )
        ->where(
            'hari',
            $hari
        )
        ->first();

        // Dokter tidak praktik
        if (!$jadwal)
        {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Dokter tidak praktik pada hari '.$hari
                );
        }

        // Jam di luar jadwal dokter
        if (
            $request->jam_reservasi < $jadwal->jam_mulai ||
            $request->jam_reservasi > $jadwal->jam_selesai
        )
        {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Jam reservasi harus antara '
                    .$jadwal->jam_mulai.
                    ' sampai '
                    .$jadwal->jam_selesai
                );
        }

        $pasien = Pasien::where(
            'user_id',
            Auth::id()
        )->first();
$cekJam = Reservasi::where(
    'dokter_id',
    $request->dokter_id
)
->where(
    'tanggal_reservasi',
    $request->tanggal_reservasi
)
->where(
    'jam_reservasi',
    $request->jam_reservasi
)
->exists();

if($cekJam)
{
    return back()
        ->withInput()
        ->with(
            'error',
            'Jam tersebut sudah dibooking'
        );
}
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
            ->with(
                'success',
                'Reservasi berhasil ditambahkan'
            );
    }

    public function show($id)
    {
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
    $rekamMedis = RekamMedis::findOrFail($id);

    $rekamMedis->update([

        'diagnosa' => $request->diagnosa,

        'tindakan' => $request->tindakan,

        'resep_obat' => $request->resep_obat,

        'catatan' => $request->catatan,

        'biaya' => $request->biaya

    ]);

    return redirect('/rekam_medis')
        ->with(
            'success',
            'Rekam medis berhasil diupdate'
        );
}

    public function destroy($id)
    {
        $reservasi = Reservasi::findOrFail($id);

        $reservasi->delete();

        return redirect('/admin/reservasi')
            ->with(
                'success',
                'Reservasi berhasil dihapus'
            );
    }
   public function getJadwal($dokterId, $tanggal)
{
    Carbon::setLocale('id');

    $hari = Carbon::parse($tanggal)
        ->translatedFormat('l');

    $hari = ucfirst($hari);

    $jadwal = JadwalDokter::where(
        'dokter_id',
        $dokterId
    )
    ->where(
        'hari',
        $hari
    )
    ->first();

    if (!$jadwal)
    {
        return response()->json([]);
    }

    $jamTersedia = [];

    $mulai = intval(
        substr($jadwal->jam_mulai,0,2)
    );

    $selesai = intval(
        substr($jadwal->jam_selesai,0,2)
    );

    for($i=$mulai;$i<$selesai;$i++)
    {
        $jamTersedia[] =
            sprintf('%02d:00',$i);
    }

    // Jam yang sudah dibooking
    $jamTerpakai = Reservasi::where(
        'dokter_id',
        $dokterId
    )
    ->where(
        'tanggal_reservasi',
        $tanggal
    )
    ->pluck('jam_reservasi')
    ->toArray();

    // Hapus jam yang sudah terpakai
    $jamTersedia = array_diff(
        $jamTersedia,
        $jamTerpakai
    );

    return response()->json(
        array_values($jamTersedia)
    );
}
}