<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Reservasi;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Layanan;
use App\Models\JadwalDokter;
use App\Models\RekamMedis;
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
        )
        ->orderBy('updated_at', 'desc')
        ->get();

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
        ->where('pasien_id', $pasien->id)
        ->orderBy('updated_at', 'desc')
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

    'nama_pasien' => 'required|string|max:255',

    'tanggal_lahir' => 'required|date',

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
            $jamReservasi = Carbon::createFromFormat(
            'H:i',
            $request->jam_reservasi
        )->format('H:i:s');

        if (
            $jamReservasi < $jadwal->jam_mulai ||
            $jamReservasi > $jadwal->jam_selesai
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

        $cekJam = Reservasi::where('dokter_id', $request->dokter_id)
            ->where('tanggal_reservasi', $request->tanggal_reservasi)
            ->where('jam_reservasi', $request->jam_reservasi)
            ->where('status', '!=', 'Batal')
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

    'nama_pasien' => $request->nama_pasien,

    'tanggal_lahir' => $request->tanggal_lahir,

    'dokter_id' => $request->dokter_id,

    'layanan_id' => $request->layanan_id,

    'tanggal_reservasi' => $request->tanggal_reservasi,

    'jam_reservasi' => $request->jam_reservasi,

    'keluhan' => $request->keluhan,

    'status' => 'Pending'

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
    $reservasi = Reservasi::findOrFail($id);

    // Jika reservasi sudah dibatalkan pasien
    if ($reservasi->status == 'batal') {

        return redirect('/admin/reservasi')
            ->with('error', 'Reservasi sudah dibatalkan oleh pasien dan tidak dapat diubah.');
    }

    $reservasi->update([
        'status' => $request->status
    ]);

    return redirect('/admin/reservasi')
        ->with('success', 'Status reservasi berhasil diperbarui.');
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
    public function getDokter($tanggal)
{
    Carbon::setLocale('id');

    $hari = Carbon::parse($tanggal)
        ->translatedFormat('l');

    $hari = ucfirst($hari);

    $jadwals = JadwalDokter::join(
        'dokters',
        'jadwal_dokters.dokter_id',
        '=',
        'dokters.id'
    )
    ->where(
        'jadwal_dokters.hari',
        $hari
    )
   ->select(
    'dokters.id',
    'dokters.nama_dokter',
    'jadwal_dokters.hari',
    'jadwal_dokters.jam_mulai',
    'jadwal_dokters.jam_selesai'
)
    
    ->get();

    return response()->json($jadwals);
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
    $jamTerpakai = Reservasi::where('dokter_id', $dokterId)
        ->where('tanggal_reservasi', $tanggal)
        ->whereIn('status', ['Pending', 'Diterima'])
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
public function batal($id)
{
    $reservasi = Reservasi::findOrFail($id);

    $pasien = Pasien::where('user_id', Auth::id())->first();

    // Pastikan reservasi milik pasien yang login
    if ($reservasi->pasien_id != $pasien->id) {
        abort(403);
    }

    // Hanya bisa dibatalkan jika masih pending
    if ($reservasi->status != 'pending') {
        return redirect('/reservasi')
            ->with('error', 'Reservasi tidak dapat dibatalkan.');
    }

    $reservasi->status = 'batal';
    $reservasi->save();

    return redirect('/reservasi')
        ->with('success', 'Reservasi berhasil dibatalkan.');
}
}