@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<style>
.card-link{
    text-decoration:none;
    color:inherit;
}

.card-link:hover{
    text-decoration:none;
}

.card{
    background:white;
    padding:25px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 5px 15px rgba(218,139,142,.12);
    transition:.3s;
}

.card:hover{
    transform:translateY(-5px);
}

.card h2{
    color:#C97A7D;
    font-size:40px;
    margin-bottom:10px;
}

.card p{
    color:#7A6A6A;
    font-size:20px;
    font-weight:500;
}
</style>

<div class="cards">

    <a href="/dokter" class="card-link">
        <div class="card">
            <h2>{{ $jumlahDokter }}</h2>
            <p>Data Dokter</p>
        </div>
    </a>

    <a href="/data-pasien" class="card-link">
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