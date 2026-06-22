<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $rekamMedis = RekamMedis::with(
            'pasien',
            'dokter'
        );

        if ($request->bulan) {
            $rekamMedis->whereMonth(
                'tanggal_periksa',
                date('m', strtotime($request->bulan))
            )->whereYear(
                'tanggal_periksa',
                date('Y', strtotime($request->bulan))
            );
        }

        $rekamMedis = $rekamMedis->get();

        $totalPemasukan = $rekamMedis->sum('biaya');

        return view(
            'laporan.index',
            compact(
                'rekamMedis',
                'totalPemasukan'
            )
        );
    }
}