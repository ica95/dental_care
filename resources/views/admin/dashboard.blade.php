@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<div class="cards">

    <a href="/dokter" class="card-link">
        <div class="card">
            <h2>{{ $jumlahDokter }}</h2>
            <p>Data Dokter</p>
        </div>
    </a>

    <a href="/pasien" class="card-link">
        <div class="card">
            <h2>{{ $jumlahPasien }}</h2>
            <p>Data Pasien</p>
        </div>
    </a>

    <a href="/layanan" class="card-link">
        <div class="card">
            <h2>{{ $jumlahLayanan }}</h2>
            <p>Data Layanan</p>
        </div>
    </a>

    <a href="/reservasi" class="card-link">
        <div class="card">
            <h2>{{ $jumlahReservasi }}</h2>
            <p>Data Reservasi</p>
        </div>
    </a>

    <a href="/rekam_medis" class="card-link">
        <div class="card">
            <h2>{{ $jumlahRekamMedis }}</h2>
            <p>Rekam Medis</p>
        </div>
    </a>

</div>
@endsection