@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<div class="cards">

    <div class="card">
        <h2>{{ $jumlahDokter }}</h2>
        <p>Data Dokter</p>
    </div>

    <div class="card">
        <h2>{{ $jumlahPasien }}</h2>
        <p>Data Pasien</p>
    </div>

    <div class="card">
        <h2>{{ $jumlahLayanan }}</h2>
        <p>Data Layanan</p>
    </div>

    <div class="card">
        <h2>{{ $jumlahReservasi }}</h2>
        <p>Data Reservasi</p>
    </div>

    <div class="card">
        <h2>{{ $jumlahRekamMedis }}</h2>
        <p>Rekam Medis</p>
    </div>

</div>

@endsection