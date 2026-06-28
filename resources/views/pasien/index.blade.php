@extends('layouts.admin')

@section('title', 'Data Pasien')

@section('content')

<div class="card">

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
    ">
        <h2 style="
            color:#C97A7D;
            font-size:28px;
            font-weight:bold;
        ">
            Data Pasien
        </h2>
    </div>

    <div style="overflow-x:auto;">

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                </tr>
            </thead>

            <tbody>

                @forelse($pasiens as $index => $pasien)

                <tr>
                    <td>{{ $index + 1 }}</td>

                    <td>
                        {{ $pasien->nama_pasien }}
                    </td>

                    <td>
                        {{ $pasien->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}
                    </td>

                    <td>
                        {{ $pasien->alamat }}
                    </td>

                    <td>
                        {{ $pasien->no_hp }}
                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="6" style="
                        padding:20px;
                        color:#999;
                        font-style:italic;
                    ">
                        Data pasien belum tersedia
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<style>

.card{
    background:white;
    padding:25px;
    border-radius:20px;
    box-shadow:0 8px 20px rgba(218,139,142,.12);
}

table{
    width:100%;
    border-collapse:collapse;
    overflow:hidden;
    border-radius:15px;
    min-width:900px;
}

th{
    background:#DA8B8E;
    color:white;
    padding:15px;
    text-align:center;
    font-size:15px;
}

td{
    padding:15px;
    text-align:center;
    border-bottom:1px solid #F3D8DA;
    color:#6B5B5B;
    font-size:14px;
}

tr:hover{
    background:#FFF1F2;
}

@media(max-width:768px){

    .card{
        padding:15px;
    }

    h2{
        font-size:22px !important;
    }

    th,
    td{
        padding:12px;
        font-size:13px;
    }

}

</style>

@endsection