<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Care</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#fff5f7;
            color:#4a4a4a;
        }

        /* NAVBAR */
        .navbar{
            background:#f8a5c2;
            padding:20px 50px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 3px 10px rgba(0,0,0,0.08);
        }

        .navbar h2{
            color:white;
        }

        .navbar ul{
            display:flex;
            list-style:none;
            gap:20px;
        }

        .navbar ul li a{
            text-decoration:none;
            color:white;
            font-weight:bold;
            transition:0.3s;
        }

        .navbar ul li a:hover{
            color:#ffe3ee;
        }

        /* HERO */
        .hero{
            background:linear-gradient(135deg, #ffd6e8, #fff0f5);
            padding:80px 50px;
            text-align:center;
        }

        .hero h1{
            font-size:45px;
            color:#ff6b9a;
            margin-bottom:20px;
        }

        .hero p{
            font-size:18px;
            color:#555;
        }

        /* SECTION */
        .section{
            padding:60px 50px;
        }

        .section-title{
            text-align:center;
            font-size:35px;
            margin-bottom:40px;
            color:#ff6b9a;
        }

        /* CARD */
        .card-container{
            display:flex;
            flex-wrap:wrap;
            gap:25px;
            justify-content:center;
        }

        .card{
            background:white;
            width:300px;
            border-radius:18px;
            overflow:hidden;
            box-shadow:0 5px 15px rgba(0,0,0,0.08);
            transition:0.3s;
        }

        .card:hover{
            transform:translateY(-6px);
        }

        .card img{
            width:100%;
            height:220px;
            object-fit:cover;
        }

        .card-body{
            padding:18px;
        }

        .card-body h3{
            color:#ff6b9a;
            margin-bottom:10px;
        }

        .price{
            margin-top:10px;
            font-weight:bold;
            color:#ff6b9a;
        }

        /* JADWAL */
        .jadwal{
            margin-top:12px;
            background:#fff0f6;
            padding:10px;
            border-radius:10px;
            border-left:4px solid #ff6b9a;
        }

        footer{
            background:#f8a5c2;
            color:white;
            text-align:center;
            padding:18px;
            margin-top:50px;
        }

    </style>

</head>

<body>

<!-- NAVBAR -->
<div class="navbar">

    <h2>
        {{ $profil->nama_klinik ?? 'Dental Care' }}
    </h2>

    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="{{ route('layanan.index') }}">Layanan</a></li>
        <li><a href="{{ route('dokter.index') }}">Dokter</a></li>
        <li><a href="{{ route('jadwal_dokter.index') }}">Jadwal</a></li>
        <li><a href="{{ route('reservasi.index') }}">Reservasi</a></li>
    </ul>

</div>

<!-- HERO -->
<div class="hero">

    <h1>Healthy Teeth, Beautiful Smile</h1>

    <p>
        {{ $profil->deskripsi ?? 'Selamat datang di klinik dental care terbaik untuk kesehatan gigi anda.' }}
    </p>

</div>

<!-- TENTANG -->
<div class="section">

    <h2 class="section-title">Tentang Klinik</h2>

    <center>
        <p style="max-width:700px;">
            {{ $profil->alamat ?? 'Alamat klinik belum tersedia' }}
        </p>
    </center>

</div>

<!-- LAYANAN -->
<div class="section">

    <h2 class="section-title">Layanan Kami</h2>

    <div class="card-container">

        @foreach ($layanans as $layanan)

            <div class="card">

                <img src="{{ asset('images/layanan/' . $layanan->foto) }}">

                <div class="card-body">

                    <h3>{{ $layanan->nama_layanan }}</h3>

                    <p>{{ $layanan->deskripsi }}</p>

                    <p class="price">
                        Rp {{ number_format($layanan->biaya) }}
                    </p>

                </div>

            </div>

        @endforeach

    </div>

</div>

<!-- DOKTER -->
<div class="section">

    <h2 class="section-title">Dokter Kami</h2>

    <div class="card-container">

        @foreach ($dokters as $dokter)

            <div class="card">

                <img src="{{ asset('images/dokter/' . $dokter->foto) }}">

                <div class="card-body">

                    <h3>{{ $dokter->nama_dokter }}</h3>

                    <div class="jadwal">

                        <h4>Jadwal Praktik</h4>

                        @foreach ($dokter->jadwal as $jadwal)

                            <p>
                                {{ $jadwal->hari }} :
                                {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
                            </p>

                        @endforeach

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

<!-- FOOTER -->
<footer>
    © 2026 Dental Care | All Rights Reserved
</footer>

</body>
</html>