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
        }

        nav{
            background:#ff8db4;
            padding:20px 50px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        nav h2{
            color:white;
        }

        nav a{
            color:white;
            text-decoration:none;
            margin-left:20px;
            font-weight:bold;
        }

        .hero{
            text-align:center;
            padding:80px 20px;
            background:white;
        }

        .hero h1{
            color:#ff6b9a;
            font-size:45px;
            margin-bottom:20px;
        }

        .hero p{
            color:#666;
            margin-bottom:25px;
        }

        .hero a{
            background:#ff6b9a;
            color:white;
            padding:12px 25px;
            border-radius:10px;
            text-decoration:none;
        }

        section{
            padding:50px;
        }

        section h2{
            text-align:center;
            color:#ff6b9a;
            margin-bottom:30px;
        }

        .cards{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:20px;
        }

        .card{
            background:white;
            padding:20px;
            border-radius:15px;
            text-align:center;
            box-shadow:0 3px 10px rgba(0,0,0,0.08);
        }

        .card img{
            width:100%;
            height:220px;
            object-fit:cover;
            border-radius:10px;
            margin-bottom:15px;
        }

        .card h3{
            color:#ff6b9a;
            margin-bottom:10px;
        }

        table{
            width:100%;
            background:white;
            border-collapse:collapse;
        }

        table th{
            background:#ff8db4;
            color:white;
            padding:12px;
        }

        table td{
            border:1px solid #eee;
            padding:12px;
            text-align:center;
        }

        .profil{
            background:white;
            padding:30px;
            border-radius:15px;
            text-align:center;
            box-shadow:0 3px 10px rgba(0,0,0,0.08);
        }

        .profil img{
            width:150px;
            margin-bottom:20px;
        }

        footer{
            background:#ff8db4;
            color:white;
            text-align:center;
            padding:20px;
            margin-top:40px;
        }

    </style>

</head>
<body>

<nav>

    <h2>Dental Care</h2>

    <div>

        <a href="/">Home</a>

        <a href="#layanan">Layanan</a>

        <a href="#dokter">Dokter</a>

        <a href="#jadwal">Jadwal</a>

        <a href="#profil">Profil Klinik</a>

        @guest

            <a href="/login">Login</a>
            <a href="/pasien">Profil Saya</a>

            <a href="/register">Daftar</a>

        @endguest

        @auth

            <span style="
                color:white;
                margin-left:20px;
                font-weight:bold;
            ">
                {{ Auth::user()->name }}
            </span>

            <form action="/logout"
                  method="POST"
                  style="display:inline;">

                @csrf

                <button type="submit"
                    style="
                        background:white;
                        color:#ff6b9a;
                        border:none;
                        padding:8px 15px;
                        border-radius:8px;
                        margin-left:10px;
                        cursor:pointer;
                        font-weight:bold;
                    ">
                    Logout
                </button>

            </form>

        @endauth

    </div>

</nav>

<div class="hero">

    <h1>
        Senyum Sehat Dimulai Dari Sini
    </h1>

    <p>
        Klinik gigi terpercaya dengan pelayanan profesional
        dan dokter berpengalaman.
    </p>

    @guest

        <a href="/login">
            Login Untuk Reservasi
        </a>

    @endguest

    @auth

        <a href="/reservasi/create">
            Reservasi Sekarang
        </a>

    @endauth
    @auth



@endauth

</div>

<section id="layanan">

    <h2>Layanan Kami</h2>

    <div class="cards">

        @foreach($layanans as $layanan)

        <div class="card">

            @if($layanan->foto)

                <img src="{{ asset('images/layanan/'.$layanan->foto) }}"
                     alt="{{ $layanan->nama_layanan }}">

            @endif

            <h3>{{ $layanan->nama_layanan }}</h3>

            <p>{{ $layanan->deskripsi }}</p>

        </div>

        @endforeach

    </div>

</section>

<section id="dokter">

    <h2>Dokter Kami</h2>

    <div class="cards">

        @foreach($dokters as $dokter)

        <div class="card">

            @if($dokter->foto)

                <img src="{{ asset('images/dokter/'.$dokter->foto) }}"
                     alt="{{ $dokter->nama_dokter }}">

            @endif

            <h3>{{ $dokter->nama_dokter }}</h3>

        </div>

        @endforeach

    </div>

</section>

<section id="jadwal">

    <h2>Jadwal Dokter</h2>

    <table>

        <tr>

            <th>Dokter</th>

            <th>Hari</th>

            <th>Jam Mulai</th>

            <th>Jam Selesai</th>

        </tr>

        @foreach($jadwals as $jadwal)

        <tr>

            <td>{{ $jadwal->dokter->nama_dokter }}</td>

            <td>{{ $jadwal->hari }}</td>

            <td>{{ $jadwal->jam_mulai }}</td>

            <td>{{ $jadwal->jam_selesai }}</td>

        </tr>

        @endforeach

    </table>

</section>

<section id="profil">

    <h2>Profil Klinik</h2>

    <div class="profil">

        @if($profil && $profil->logo)

            <img src="{{ asset('images/logo/'.$profil->logo) }}"
                 alt="Logo Klinik">

        @endif

        <h3>
            {{ $profil->nama_klinik ?? 'Dental Care' }}
        </h3>

        <br>

        <p>
            <strong>Alamat :</strong>
            {{ $profil->alamat ?? '-' }}
        </p>

        <br>

        <p>
            <strong>Telepon :</strong>
            {{ $profil->telepon ?? '-' }}
        </p>

        <br>

        <p>
            <strong>Deskripsi :</strong>
            {{ $profil->deskripsi ?? '-' }}
        </p>

    </div>

</section>

<footer>

    <h3>Dental Care</h3>

    <p>
        Klinik Gigi Profesional dan Terpercaya
    </p>

    <br>

    <p>
        © 2026 Dental Care
    </p>

</footer>

</body>


</html>