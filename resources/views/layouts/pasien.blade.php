<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Dental Care')</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body{
            background:#fff5f7;
            color:#333;
            min-height:100vh;
            display:flex;
            flex-direction:column;
        }

        /* NAVBAR */

        .navbar{
            background:#f8a5c2;
            padding:15px 40px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 3px 12px rgba(0,0,0,0.08);
        }

        .logo{
            display:flex;
            align-items:center;
            gap:15px;
        }

        .logo img{
            width:60px;
            height:60px;
            border-radius:50%;
            object-fit:cover;
            background:white;
            padding:4px;
        }

        .logo h2{
            color:white;
            font-size:32px;
        }

        .menu{
            display:flex;
            align-items:center;
            gap:12px;
        }

        .menu a{
            color:white;
            text-decoration:none;
            padding:10px 15px;
            border-radius:10px;
            font-weight:600;
            transition:.3s;
        }

        .menu a:hover{
            background:#ff8db4;
        }

        /* PROFILE BUTTON */

        .profile-btn{
            background:#ff8db4;
            color:white !important;
            padding:12px 18px;
            border-radius:14px;
            font-weight:600;
            text-decoration:none;
            transition:.3s;
        }

        .profile-btn:hover{
            background:#ff78aa;
        }

        /* LOGOUT BUTTON */

        .logout-btn{
    background:white;
    color:#f06292;
    border:none;
    padding:12px 18px;
    border-radius:14px;
    cursor:pointer;
    font-weight:600;
    transition:.3s;
}

.logout-btn:hover{
    background:#fff0f5;
    color:#e91e63;
}

        /* CONTAINER */

        .container{
            width:90%;
            max-width:1300px;
            margin:30px auto;
            flex:1;
        }

        /* HEADER */

        .header{
            background:white;
            padding:30px;
            border-radius:20px;
            margin-bottom:30px;
            box-shadow:0 5px 15px rgba(0,0,0,0.08);
        }

        .header h1{
            color:#ff6b9a;
            font-size:45px;
            margin-bottom:10px;
        }

        .header p{
            color:#666;
            font-size:18px;
        }

        /* CARD */

        .card{
            background:white;
            border-radius:20px;
            padding:25px;
            box-shadow:0 5px 15px rgba(0,0,0,0.08);
            margin-bottom:25px;
        }

        /* TABLE */

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
        }

        th{
            background:#ff6b9a;
            color:white;
            padding:15px;
        }

        td{
            padding:15px;
            border-bottom:1px solid #eee;
            text-align:center;
        }

        tr:hover{
            background:#fff0f5;
        }

        /* FORM */

        input,
        select,
        textarea{
            width:100%;
            padding:12px;
            border:1px solid #ffc0cb;
            border-radius:10px;
            margin-bottom:15px;
        }

        /* FOOTER */

        footer{
            background:#f8a5c2;
            color:white;
            text-align:center;
            padding:25px;
            margin-top:auto;
        }

        footer h3{
            margin-bottom:10px;
        }

        /* RESPONSIVE */

        @media(max-width:768px){

            .navbar{
                flex-direction:column;
                gap:15px;
            }

            .menu{
                flex-wrap:wrap;
                justify-content:center;
            }

            .logo h2{
                font-size:24px;
            }

            .header h1{
                font-size:32px;
            }

            .container{
                width:95%;
            }
        }

    </style>

</head>
<body>

@php
    $profil = \App\Models\ProfilKlinik::first();
@endphp

<!-- NAVBAR -->

<div class="navbar">

    <div class="logo">

        @if($profil && $profil->logo)
            <img src="{{ asset('images/logo/'.$profil->logo) }}">
        @endif

        <h2>
            {{ $profil->nama_klinik ?? 'Dental Care' }}
        </h2>

    </div>

    <div class="menu">

        <a href="/home">Home</a>

        @auth

            <a href="/reservasi/create">
                Reservasi
            </a>

            <a href="/reservasi">
                Riwayat Reservasi
            </a>

            <a href="/pasien" class="profile-btn">
                👤 {{ Auth::user()->name }}
            </a>

            <form action="/logout"
                  method="POST"
                  style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>

        @endauth

        @guest

            <a href="/login">
                Login
            </a>

            <a href="/register">
                Daftar
            </a>

        @endguest

    </div>

</div>

<!-- CONTENT -->

<div class="container">

    <div class="header">

        <h1>
            @yield('title','Dashboard Pasien')
        </h1>

        @auth
            <p>
                Selamat datang, {{ Auth::user()->name }}
            </p>
        @else
            <p>
                Selamat datang di Sistem Reservasi Klinik Gigi
            </p>
        @endauth

    </div>

    @yield('content')

</div>

<!-- FOOTER -->

<footer>

    <h3>
        {{ $profil->nama_klinik ?? 'Dental Care' }}
    </h3>

    <p>
        Klinik Gigi Profesional dan Terpercaya
    </p>

    <br>

    <p>
        © {{ date('Y') }} Dental Care System
    </p>

</footer>

</body>
</html>