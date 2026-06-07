@extends('layouts.pasien')

@section('title', 'Dashboard Pasien')

@section('content')

<!-- KARTU SELAMAT DATANG -->

<div class="card">

    <div class="card-body">

        <h2 style="
            color:#ff6b9a;
            font-size:35px;
            margin-bottom:10px;
        ">
            👋 Selamat Datang,
            {{ $pasien->nama_pasien }}
        </h2>

        <p style="
            color:#666;
            font-size:18px;
        ">
            Kelola profil dan reservasi Anda di sini.
        </p>

    </div>

</div>

<br>

<!-- INFORMASI PASIEN -->

<div class="cards">

    <div class="card">

        <div class="card-body">

            <h3>
                📱 No HP
            </h3>

            <p>
                {{ $pasien->no_hp }}
            </p>

        </div>

    </div>

    <div class="card">

        <div class="card-body">

            <h3>
                📍 Alamat
            </h3>

            <p>
                {{ $pasien->alamat }}
            </p>

        </div>

    </div>

</div>

<br>

<!-- RESERVASI -->

<div class="card">

    <div class="card-body">

        <h3>
            🦷 Reservasi Pemeriksaan
        </h3>

        <p>
            Klik tombol berikut untuk melakukan
            reservasi dokter gigi.
        </p>

        <br>

        <a href="/reservasi/create"
           class="btn">

            Buat Reservasi

        </a>

    </div>

</div>

@endsection