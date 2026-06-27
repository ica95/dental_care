@extends('layouts.pasien')

@section('title', 'Dashboard Pasien')

@section('content')

<!-- WELCOME CARD -->

<div class="card" style="
    background:linear-gradient(135deg,#DA8B8E,#C97A7D);
    color:white;
    border:none;
">

    <div class="card-body">

        <h2 style="
            font-size:35px;
            margin-bottom:10px;
        ">
            Selamat Datang,
            {{ $pasien->nama_pasien }}
        </h2>

        <p style="
            font-size:18px;
            opacity:.95;
        ">
            Reservasi Anda dengan mudah di Lumine Dental.
        </p>

    </div>

</div>

<br>

<!-- QUICK MENU -->

<div style="
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
">

    <!-- CARD RESERVASI -->
    <div class="card" style="
        border:1px solid #E9B8BA;
    ">

        <div class="card-body">

            <h3 style="
                color:#C97A7D;
                margin-bottom:10px;
            ">
                Reservasi Baru
            </h3>

            <p style="
                margin:10px 0;
                color:#666;
            ">
                Buat jadwal pemeriksaan dokter gigi.
            </p>

            <a href="/reservasi/create"
               class="btn"
               style="
                    background:#DA8B8E;
               ">
                Buat Reservasi
            </a>

        </div>

    </div>

    <!-- CARD RIWAYAT -->
    <div class="card" style="
        border:1px solid #E9B8BA;
    ">

        <div class="card-body">

            <h3 style="
                color:#C97A7D;
                margin-bottom:10px;
            ">
                Riwayat Reservasi
            </h3>

            <p style="
                margin:10px 0;
                color:#666;
            ">
                Lihat daftar reservasi yang sudah dibuat.
            </p>

            <a href="/reservasi"
               class="btn"
               style="
                    background:#DA8B8E;
               ">
                Lihat Riwayat
            </a>

        </div>

    </div>

</div>

@endsection