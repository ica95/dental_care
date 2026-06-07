<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DATA REKAM MEDIS
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $rekamMedis = RekamMedis::with(
            'pasien',
            'dokter',
            'reservasi'
        )->get();
$totalPemasukan = RekamMedis::sum('biaya');
        return view(
            'rekam_medis.index',
            compact('rekamMedis',
            'totalPemasukan')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH REKAM MEDIS
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $reservasis = Reservasi::with(
            'pasien',
            'dokter'
        )->get();

        return view(
            'rekam_medis.create',
            compact('reservasis')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN REKAM MEDIS
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'reservasi_id' => 'required',
            
            'diagnosa' => 'required',

            'tindakan' => 'required',

              'biaya' => 'required|numeric'

        ]);

        $reservasi = Reservasi::findOrFail(
            $request->reservasi_id
        );

       RekamMedis::create([

    'reservasi_id' => $reservasi->id,

    'pasien_id' => $reservasi->pasien_id,

    'dokter_id' => $reservasi->dokter_id,

    'tanggal_periksa' => $reservasi->tanggal_reservasi,

    'diagnosa' => $request->diagnosa,

    'tindakan' => $request->tindakan,

    'resep_obat' => $request->resep_obat,

    'catatan' => $request->catatan,

    'biaya' => $request->biaya

]);

        

        return redirect('/rekam_medis')
            ->with(
                'success',
                'Rekam medis berhasil ditambahkan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL REKAM MEDIS
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $rekamMedis = RekamMedis::with(
            'pasien',
            'dokter',
            'reservasi'
        )->findOrFail($id);

        return view(
            'rekam_medis.show',
            compact('rekamMedis')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | FORM EDIT REKAM MEDIS
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);

        $reservasis = Reservasi::with(
            'pasien',
            'dokter'
        )->get();

        return view(
            'rekam_medis.edit',
            compact(
                'rekamMedis',
                'reservasis'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE REKAM MEDIS
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        $id
    )
    {
        $request->validate([

            'reservasi_id' => 'required',
            'tanggal_periksa' => 'required',
            'diagnosa' => 'required',
            'tindakan' => 'required'

        ]);

        $reservasi = Reservasi::findOrFail(
            $request->reservasi_id
        );

        $rekamMedis = RekamMedis::findOrFail($id);

        $rekamMedis->update([

            'reservasi_id' => $reservasi->id,

            'pasien_id' => $reservasi->pasien_id,

            'dokter_id' => $reservasi->dokter_id,

            'diagnosa' => $request->diagnosa,

            'tindakan' => $request->tindakan

        ]);

        return redirect('/rekam_medis')
            ->with(
                'success',
                'Rekam medis berhasil diperbarui'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS REKAM MEDIS
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);

        $rekamMedis->delete();

        return redirect('/rekam_medis')
            ->with(
                'success',
                'Rekam medis berhasil dihapus'
            );
    }
}