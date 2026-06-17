<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title','Lumine Dental')</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#fff5f7;
            display:flex;
            min-height:100vh;
        }

        /* SIDEBAR */

        .sidebar{
            width:250px;
            height:100vh;
            background:#f8a5c2;
            position:fixed;
            left:0;
            top:0;
            padding:30px 20px;
            overflow-y:auto;
        }

        .logo{
            text-align:center;
            margin-bottom:40px;
        }

        .logo img{
            width:80px;
            height:80px;
            border-radius:50%;
            object-fit:cover;
            background:white;
            padding:5px;
            margin-bottom:15px;
        }

        .logo h2{
            color:white;
            font-size:28px;
            line-height:1.4;
        }

        .menu{
            display:flex;
            flex-direction:column;
            gap:10px;
        }

        .menu a{
            display:block;
            text-decoration:none;
            color:white;
            padding:14px;
            border-radius:12px;
            font-weight:bold;
            transition:.3s;
        }

        .menu a:hover{
            background:#ff8db4;
        }

        .active{
            background:#ff8db4;
        }

        /* MAIN */

        .main{
            margin-left:250px;
            flex:1;
            display:flex;
            flex-direction:column;
        }

        /* TOPBAR */

        .topbar{
            background:white;
            padding:20px 40px;
            display:flex;
            justify-content:flex-end;
            align-items:center;
            gap:20px;
            box-shadow:0 3px 10px rgba(0,0,0,.08);
        }

        .notif{
            width:55px;
            height:55px;
            background:#fff0f5;
            border-radius:15px;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:22px;
        }

        .profile{
            background:#ff6b9a;
            color:white;
            text-decoration:none;
            padding:14px 25px;
            border-radius:15px;
            font-weight:bold;
        }

        .logout button{
            background:#fff0f5;
            color:#ff6b9a;
            border:none;
            padding:14px 20px;
            border-radius:15px;
            font-weight:bold;
            cursor:pointer;
        }

        /* CONTENT */

        .content{
            padding:40px;
        }

        /* CARD */

        .card{
            background:white;
            padding:25px;
            border-radius:20px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
            margin-bottom:20px;
        }

        /* BUTTON */

        .btn{
            background:#ff6b9a;
            color:white;
            text-decoration:none;
            padding:12px 20px;
            border-radius:10px;
            display:inline-block;
            font-weight:bold;
        }

        .btn:hover{
            background:#ff4f87;
        }

        /* TABLE */

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
            border-radius:15px;
            overflow:hidden;
        }

        th{
            background:#ff6b9a;
            color:white;
            padding:15px;
        }

        td{
            padding:15px;
            border-bottom:1px solid #eee;
        }

        tr:hover{
            background:#fff0f5;
        }

        /* FORM */

        input,
        select,
        textarea{
            width:100%;
            padding:14px;
            border:1px solid #ffc0cb;
            border-radius:10px;
            margin-bottom:15px;
        }

        /* RESPONSIVE */

        @media(max-width:768px){

            body{
                flex-direction:column;
            }

            .sidebar{
                width:100%;
                height:auto;
                position:relative;
            }

            .menu{
                flex-direction:row;
                flex-wrap:wrap;
                justify-content:center;
            }

            .main{
                margin-left:0;
            }

            .topbar{
                padding:20px;
                flex-wrap:wrap;
                justify-content:center;
            }

            .content{
                padding:20px;
            }

        }

    </style>

</head>
<body>

@php
    $profil = \App\Models\ProfilKlinik::first();
@endphp

<!-- SIDEBAR -->

<div class="sidebar">

    <div class="logo">

        @if($profil && $profil->logo)

            <img src="{{ asset('images/logo/'.$profil->logo) }}">

        @endif

        <h2>
            {{ $profil->nama_klinik ?? 'Lumine Dental' }}
        </h2>

    </div>

    <div class="menu">

        <a href="/dashboard-pasien"
           class="{{ request()->is('dashboard-pasien') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="/reservasi/create"
           class="{{ request()->is('reservasi/create') ? 'active' : '' }}">
            Reservasi
        </a>

        <a href="/reservasi"
           class="{{ request()->is('reservasi') ? 'active' : '' }}">
            Riwayat Reservasi
        </a>

        <a href="/pasien"
           class="{{ request()->is('pasien') ? 'active' : '' }}">
            Profil Saya
        </a>

    </div>

</div>

<!-- MAIN -->

<div class="main">

    <!-- TOPBAR -->

    <div class="topbar">


        <a href="/pasien" class="profile">
            {{ Auth::user()->name }}
        </a>

        <div class="logout">

            <form action="/logout" method="POST">

                @csrf

                <button type="submit">
                    Logout
                </button>

            </form>

        </div>

    </div>

    <!-- CONTENT -->

    <div class="content">

        @yield('content')

    </div>

</div>

</body>
</html>