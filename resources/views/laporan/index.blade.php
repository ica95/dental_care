@extends('layouts.admin')

@section('title','Laporan Klinik')

@section('content')

<div class="card">

<h2>
    LAPORAN KLINIK GIGI
</h2>

<br>

<form method="GET">

    <label>Pilih Bulan</label>

    <input
        type="month"
        name="bulan"
        value="{{ request('bulan') }}">

    <button
        type="submit"
        class="btn">

        Tampilkan

    </button>

</form>

<br>

<button
    onclick="window.print()"
    class="btn">

    🖨 Cetak Laporan

</button>

<br><br>

<div style="
    background:#d4edda;
    padding:15px;
    border-radius:10px;
    margin-bottom:20px;
">

    <h3>Ringkasan Bulanan</h3>

    <p>
        Jumlah Rekam Medis :
        {{ $rekamMedis->count() }}
    </p>

    <p>
        Total Pemasukan :
        <b>
            Rp {{ number_format($totalPemasukan,0,',','.') }}
        </b>
    </p>

</div>

<h3>
    Laporan Rekam Medis
</h3>

<table>

    <thead>

        <tr>

            <th>No</th>
            <th>Tanggal</th>
            <th>Pasien</th>
            <th>Dokter</th>
            <th>Diagnosa</th>
            <th>Tindakan</th>
            <th>Biaya</th>

        </tr>

    </thead>

    <tbody>

        @foreach($rekamMedis as $data)

        <tr>

            <td>
                {{ $loop->iteration }}
            </td>

            <td>
                {{ $data->tanggal_periksa }}
            </td>

            <td>
                {{ $data->pasien->nama_pasien }}
            </td>

            <td>
                {{ $data->dokter->nama_dokter }}
            </td>

            <td>
                {{ $data->diagnosa }}
            </td>

            <td>
                {{ $data->tindakan }}
            </td>

            <td>
                Rp {{ number_format($data->biaya,0,',','.') }}
            </td>

        </tr>

        @endforeach

    </tbody>

</table>

</div>

<style>

@media print {

    .btn,
    form {
        display: none;
    }

}

</style>
<style>

@media print {

    /* Sembunyikan sidebar */
    .sidebar {
        display: none !important;
    }

    /* Sembunyikan header dashboard */
    .header {
        display: none !important;
    }

    /* Sembunyikan footer */
    .footer {
        display: none !important;
    }

    /* Sembunyikan tombol dan form filter */
    .btn,
    form {
        display: none !important;
    }

    /* Hilangkan jarak kiri karena sidebar disembunyikan */
    .main {
        margin-left: 0 !important;
        padding: 0 !important;
    }

    /* Hilangkan bayangan card */
    .card {
        box-shadow: none !important;
    }

}

</style>
@endsection
