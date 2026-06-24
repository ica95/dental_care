@extends('layouts.admin')

@section('title','Laporan Klinik')

@section('content')

<div class="card laporan-card">

    <h2 class="judul-laporan">
        LAPORAN KLINIK GIGI
    </h2>

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

    <button
        onclick="window.print()"
        class="btn">
        🖨 Cetak Laporan
    </button>

    <div class="summary-box">

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

    <h3>Laporan Rekam Medis</h3>

    <table class="laporan-table">

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
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->tanggal_periksa }}</td>
                <td>{{ $data->pasien->nama_pasien }}</td>
                <td>{{ $data->dokter->nama_dokter }}</td>
                <td>{{ $data->diagnosa }}</td>
                <td>{{ $data->tindakan }}</td>
                <td>Rp {{ number_format($data->biaya,0,',','.') }}</td>
            </tr>

            @endforeach

        </tbody>

    </table>

</div>

<style>

.laporan-card{
    padding:20px;
}

.judul-laporan{
    text-align:center;
    color:#b03a5b;
    margin-bottom:20px;
    margin-top:0;
}

.summary-box{
    background:#d4edda;
    padding:15px;
    border-radius:10px;
    margin:20px 0;
}

.laporan-table{
    width:100%;
    border-collapse:collapse;
    font-size:14px;
}

.laporan-table th,
.laporan-table td{
    padding:8px;
    text-align:center;
    border:1px solid #ddd;
}

.laporan-table th{
    background:#ffb6c1;
}

@media print {

    .sidebar,
    .header,
    .footer,
    .btn,
    form{
        display:none !important;
    }

    .main{
        margin-left:0 !important;
        padding:0 !important;
    }

    .card{
        box-shadow:none !important;
        padding:10px !important;
    }

    .judul-laporan{
        margin-top:0 !important;
        margin-bottom:10px !important;
        font-size:26px;
    }

    .summary-box{
        margin-bottom:15px !important;
        padding:10px !important;
    }

    .laporan-table{
        font-size:12px;
    }

    .laporan-table th,
    .laporan-table td{
        padding:5px;
    }

}

</style>

@endsection