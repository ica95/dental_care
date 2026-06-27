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
<br>
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
    background:white;
    border-radius:15px;
    box-shadow:0 8px 20px rgba(218,139,142,0.15);
}

.judul-laporan{
    text-align:center;
    color:#C86D71;
    margin-bottom:20px;
    margin-top:0;
    font-weight:bold;
}

.summary-box{
    background:#FFF1F2;
    border:1px solid #EBC1C3;
    padding:15px;
    border-radius:12px;
    margin:20px 0;
}

.summary-box h3{
    color:#C86D71;
    margin-bottom:10px;
}

.summary-box p{
    color:#666;
    margin:8px 0;
}

.laporan-table{
    width:100%;
    border-collapse:collapse;
    font-size:14px;
    background:white;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 8px 20px rgba(218,139,142,0.12);
}

.laporan-table th,
.laporan-table td{
    padding:10px;
    text-align:center;
    border:1px solid #f3d8da;
}

.laporan-table th{
    background:#D47D82;
    color:white;
    font-weight:600;
}

.laporan-table tr:nth-child(even){
    background:#FFF8F8;
}

.laporan-table tr:hover{
    background:#FFF1F2;
}

label{
    font-weight:600;
    color:#C86D71;
}

input[type="month"]{
    border:1px solid #EBC1C3;
    padding:10px;
    border-radius:10px;
}

.btn{
    background:#D47D82;
    color:white;
    border:none;
    padding:10px 18px;
    border-radius:10px;
    cursor:pointer;
    transition:.3s;
}

.btn:hover{
    background:#C86D71;
}

h3{
    color:#C86D71;
    margin-bottom:15px;
}

@media print{

    @page{
        size:auto;
        margin:5mm;
    }

    html, body{
        width:100%;
        height:auto;
        margin:0;
        padding:0;
        background:white !important;
    }

    body{
        zoom:100%;
    }

    .sidebar,
    .header,
    .footer,
    .btn,
    form,
    .menu-toggle,
    .overlay{
        display:none !important;
    }

    .main{
        width:100% !important;
        margin:0 !important;
        padding:0 !important;
    }

    .content{
        width:100% !important;
        margin:0 !important;
        padding:0 !important;
    }

    .laporan-card{
        width:100vw !important;
        max-width:100% !important;
        margin:0 !important;
        padding:0 !important;
        box-shadow:none !important;
        border:none !important;
    }

    .judul-laporan{
        text-align:center;
        font-size:28px !important;
        margin-bottom:20px !important;
        color:black !important;
    }

    .summary-box{
        width:100% !important;
        margin:0 0 20px 0 !important;
        padding:15px !important;
        border:1px solid #ccc !important;
        background:white !important;
        box-sizing:border-box;
    }

    .summary-box h3{
        font-size:22px !important;
        margin-bottom:10px !important;
    }

    .summary-box p{
        font-size:16px !important;
        line-height:1.6;
    }

    .laporan-table{
        width:100% !important;
        table-layout:fixed !important;
        border-collapse:collapse !important;
        font-size:14px !important;
    }

    .laporan-table th,
    .laporan-table td{
        padding:10px !important;
        border:1px solid #999 !important;
        text-align:center !important;
        word-break:break-word;
    }

    .laporan-table th{
        background:#ddd !important;
        color:black !important;
    }

    tr{
        page-break-inside:avoid;
    }
}
</style>

@endsection