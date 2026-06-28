@extends('layouts.pasien')

@section('title', 'Dashboard Pasien')

@section('content')

<style>
.quick-menu{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
}

.quick-card{
    border:1px solid #E9B8BA;
    transition:.3s;
}

.quick-card:hover{
    transform:translateY(-5px);
    box-shadow:0 8px 20px rgba(218,139,142,.15);
}

.quick-card h3{
    color:#C97A7D;
    margin-bottom:10px;
}

.quick-card p{
    margin:10px 0;
    color:#666;
    line-height:1.6;
}

.quick-btn{
    background:#DA8B8E;
}

.quick-btn:hover{
    background:#C97A7D;
}

@media(max-width:768px){
    .welcome-title{
        font-size:26px !important;
    }

    .welcome-text{
        font-size:16px !important;
    }

    .quick-menu{
        grid-template-columns:1fr;
    }
}
</style>

<!-- WELCOME CARD -->
<div class="card" style="
    background:linear-gradient(135deg,#DA8B8E,#C97A7D);
    color:white;
    border:none;
    box-shadow:0 10px 20px rgba(218,139,142,.25);
">

    <div class="card-body">

        <h2 class="welcome-title" style="
            font-size:35px;
            margin-bottom:10px;
        ">
            Selamat Datang,
            {{ $pasien->nama_pasien }}
        </h2>

        <p class="welcome-text" style="
            font-size:18px;
            opacity:.95;
        ">
            Reservasi Anda dengan mudah di Lumine Dental Care.
        </p>

    </div>

</div>

<br>

<!-- QUICK MENU -->
<div class="quick-menu">

    <!-- CARD RESERVASI -->
    <div class="card quick-card">

        <div class="card-body">

            <h3>
                Reservasi Baru
            </h3>

            <p>
                Buat jadwal pemeriksaan dokter gigi dengan cepat dan mudah.
            </p>

            <a href="/reservasi/create"
               class="btn quick-btn">
                Buat Reservasi
            </a>

        </div>

    </div>

    <!-- CARD RIWAYAT -->
    <div class="card quick-card">

        <div class="card-body">

            <h3>
                Riwayat Reservasi
            </h3>

            <p>
                Lihat daftar reservasi dan status pemeriksaan Anda.
            </p>

            <a href="/reservasi"
               class="btn quick-btn">
                Lihat Riwayat
            </a>

        </div>

    </div>

</div>

@endsection