<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Reservasi;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekamMedis = RekamMedis::with(
            'reservasi',
            'pasien',
            'dokter'
        )->get();

        return view(
            'rekam_medis.index',
            compact('rekamMedis')
        );
    }

    public function create()
    {
        $reservasis = Reservasi::all();

        $pasiens = Pasien::all();

        $dokters = Dokter::all();

        return view(
            'rekam_medis.create',
            compact(
                'reservasis',
                'pasiens',
                'dokters'
            )
        );
    }

    public function store(Request $request)
    {
        RekamMedis::create([

            'reservasi_id' => $request->reservasi_id,

            'pasien_id' => $request->pasien_id,

            'dokter_id' => $request->dokter_id,

            'tanggal_periksa' =>
                $request->tanggal_periksa,

            'diagnosa' =>
                $request->diagnosa,

            'tindakan' =>
                $request->tindakan,

            'resep_obat' =>
                $request->resep_obat,

            'catatan' =>
                $request->catatan
        ]);

        return redirect('/rekam_medis');
    }

    public function edit($id)
    {
        $rekamMedis =
            RekamMedis::findOrFail($id);

        return view(
            'rekam_medis.edit',
            compact('rekamMedis')
        );
    }

    public function update(Request $request, $id)
    {
        $rekamMedis =
            RekamMedis::findOrFail($id);

        $rekamMedis->update($request->all());

        return redirect('/rekam_medis');
    }

    public function destroy($id)
    {
        $rekamMedis =
            RekamMedis::findOrFail($id);

        $rekamMedis->delete();

        return redirect('/rekam_medis');
    }
}