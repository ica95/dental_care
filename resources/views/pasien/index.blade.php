@extends('layouts.pasien')

@section('title', 'Profil Saya')

@section('content')

<div class="card" style="max-width:700px; margin:auto;">

    <h2 style="
        color:#ff6b9a;
        margin-bottom:25px;
        text-align:center;
    ">
        👤 Profil Pasien
    </h2>

    <div style="line-height:2; font-size:17px;">

        <p>
            <strong>Nama Lengkap :</strong><br>
            {{ $pasien->nama_pasien }}
        </p>

        <hr>

        <p>
            <strong>Jenis Kelamin :</strong><br>
            {{ $pasien->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
        </p>

        <hr>

        <p>
            <strong>Tanggal Lahir :</strong><br>
            {{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d F Y') }}
        </p>

        <hr>

        <p>
            <strong>Alamat :</strong><br>
            {{ $pasien->alamat }}
        </p>

        <hr>

        <p>
            <strong>No HP :</strong><br>
            {{ $pasien->no_hp }}
        </p>

    </div>

    <div style="
        margin-top:25px;
        text-align:center;
    ">

        <a href="/pasien/{{ $pasien->id }}/edit"
           style="
                background:#ff6b9a;
                color:white;
                padding:12px 25px;
                border-radius:10px;
                text-decoration:none;
                font-weight:bold;
           ">
            ✏️ Edit Profil
        </a>

    </div>

</div>

@endsection