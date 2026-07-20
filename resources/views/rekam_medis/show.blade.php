@extends('layouts.admin')

@section('title','Detail Rekam Medis')

@section('content')

<div class="card">

    <h2>Detail Rekam Medis</h2>

    <table>

        <tr>
            <td><b>Pasien</b></td>
            <td>{{ $rekamMedis->reservasi->nama_pasien }}</td>
        </tr>

        <tr>
            <td><b>Pemilik Akun</b></td>
            <td>{{ $rekamMedis->reservasi->pasien->nama_pasien }}</td>
        </tr>

        <tr>
            <td><b>Dokter</b></td>
            <td>{{ $rekamMedis->dokter->nama_dokter }}</td>
        </tr>

        <tr>
            <td><b>Layanan</b></td>
            <td>{{ $rekamMedis->reservasi->layanan->nama_layanan }}</td>
        </tr>

        <tr>
            <td><b>Keluhan</b></td>
            <td>{{ $rekamMedis->reservasi->keluhan }}</td>
        </tr>

        <tr>
            <td><b>Diagnosa</b></td>
            <td>{{ $rekamMedis->diagnosa }}</td>
        </tr>

        <tr>
            <td><b>Tindakan</b></td>
            <td>{{ $rekamMedis->tindakan }}</td>
        </tr>

        <tr>
            <td><b>Resep Obat</b></td>
            <td>{{ $rekamMedis->resep_obat }}</td>
        </tr>

        <tr>
            <td><b>Catatan</b></td>
            <td>{{ $rekamMedis->catatan }}</td>
        </tr>

        <tr>
            <td><b>Biaya</b></td>
            <td>Rp {{ number_format($rekamMedis->biaya,0,',','.') }}</td>
        </tr>

    </table>

    <br>

    <a href="/rekam_medis" class="btn">
        Kembali
    </a>

</div>

@endsection