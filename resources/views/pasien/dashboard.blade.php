@extends('layouts.pasien')

@section('title', 'Dashboard Pasien')

@section('content')

<!-- WELCOME CARD -->

<div class="card" style="
    background:linear-gradient(135deg,#ff8fb1,#ff6b9a);
    color:white;
">

    <div class="card-body">

        <h2 style="
            font-size:35px;
            margin-bottom:10px;
        ">
            👋 Selamat Datang,
            {{ $pasien->nama_pasien }}
        </h2>

        <p style="
            font-size:18px;
            opacity:.9;
        ">
            Kelola profil dan reservasi Anda dengan mudah di Lumine Dental.
        </p>

    </div>

</div>

<br>

<!-- INFO CARD -->

<div style="
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
">


<!-- QUICK MENU -->

<div style="
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
">

    <div class="card">

        <div class="card-body">

            <h3>
                Reservasi Baru
            </h3>

            <p style="
                margin:10px 0;
                color:#666;
            ">
                Buat jadwal pemeriksaan dokter gigi.
            </p>

            <a href="/reservasi/create"
               class="btn">
                Buat Reservasi
            </a>

        </div>

    </div>

    <div class="card">

        <div class="card-body">

            <h3>
                Riwayat Reservasi
            </h3>

            <p style="
                margin:10px 0;
                color:#666;
            ">
                Lihat daftar reservasi yang sudah dibuat.
            </p>

            <a href="/reservasi"
               class="btn">
                Lihat Riwayat
            </a>

        </div>

    </div>

</div>

@endsection