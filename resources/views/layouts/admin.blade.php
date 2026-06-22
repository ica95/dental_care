<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Care Admin</title>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@yield('css')
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

        .sidebar h2{
            color:white;
            text-align:center;
            margin-bottom:40px;
        }

        .sidebar a{
            display:block;
            text-decoration:none;
            color:white;
            padding:12px;
            margin-bottom:10px;
            border-radius:10px;
            transition:.3s;
        }

        .sidebar a:hover{
            background:#ff8db4;
        }

        /* MAIN */

        .main{
            margin-left:250px;
            min-height:100vh;
            padding:30px;
            display:flex;
            flex-direction:column;
        }

        /* HEADER */

        .header{
            background:white;
            padding:20px;
            border-radius:15px;
            box-shadow:0 3px 10px rgba(0,0,0,0.08);
            margin-bottom:25px;
        }

        .header h1{
            color:#ff6b9a;
        }

        .header p{
            color:#666;
            margin-top:5px;
        }

        /* CONTENT */

        .content{
            flex:1;
        }

        .cards{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
            gap:20px;
        }

        .card{
            background:white;
            padding:25px;
            border-radius:15px;
            text-align:center;
            box-shadow:0 3px 10px rgba(0,0,0,0.08);
        }

        .card h2{
            color:#ff6b9a;
            margin-bottom:10px;
        }

        .card p{
            color:#666;
        }

        .card-link{
            text-decoration:none;
            color:inherit;
        }

        .card-link .card{
            transition:0.3s;
            cursor:pointer;
        }

        .card-link .card:hover{
            transform:translateY(-5px);
            box-shadow:0 8px 20px rgba(0,0,0,0.15);
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

        button{
            background:#ff6b9a;
            color:white;
            border:none;
            padding:12px 20px;
            border-radius:10px;
            cursor:pointer;
        }

        button:hover{
            background:#ff4f87;
        }

        /* TABLE */

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
            border-radius:15px;
            overflow:hidden;
            box-shadow:0 3px 10px rgba(0,0,0,0.08);
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

        /* BUTTON */

        .btn{
            background:#ff6b9a;
            color:white;
            text-decoration:none;
            padding:10px 15px;
            border-radius:8px;
            display:inline-block;
        }

        .btn:hover{
            background:#ff4f87;
        }

        .btn-danger{
            background:#e74c3c;
        }

        .btn-danger:hover{
            background:#c0392b;
        }

        .aksi-btn{
            display:flex;
            justify-content:center;
            align-items:center;
            gap:10px;
        }

        .aksi-btn form{
            margin:0;
        }

        .btn-edit,
        .btn-hapus{
            min-width:80px;
            text-align:center;
            padding:10px 15px;
            border-radius:10px;
            text-decoration:none;
            color:white;
            display:inline-block;
        }

        .btn-edit{
            background:#ff6b9a;
        }

        .btn-edit:hover{
            background:#ff4f87;
        }

        .btn-hapus{
            background:#e74c3c;
        }

        .btn-hapus:hover{
            background:#c0392b;
        }

        /* LOGOUT */

        .logout{
            margin-top:30px;
        }

        .logout button{
            width:100%;
            background:white;
            color:#f06292;
            font-weight:bold;
        }

        .modal{
            display:none;
            position:fixed;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:rgba(0,0,0,.4);
            z-index:9999;
        }

        .modal-content{
            width:450px;
            background:white;
            padding:25px;
            border-radius:15px;

            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);

            box-shadow:0 5px 20px rgba(0,0,0,.2);
        }

        .modal-content h2{
            margin-bottom:20px;
            color:#ff6b9a;
        }

        .button-group{
            display:flex;
            gap:10px;
        }

    </style>

</head>
<body>

<div class="sidebar">

     @php
        $profil = \App\Models\ProfilKlinik::first();
    @endphp

   <a href="/profil_klinik"
   style="
        text-decoration:none;
        display:block;
        margin-bottom:30px;
   ">

    @if($profil && $profil->logo)

        <img src="{{ asset('images/logo/'.$profil->logo) }}"
             width="80"
             height="80"
             style="
                display:block;
                margin:auto;
                margin-bottom:15px;
                border-radius:50%;
                background:white;
                padding:5px;
                object-fit:cover;
             ">

    @endif

    <h2 style="
        color:white;
        text-align:center;
        margin:0;
    ">
        {{ $profil->nama_klinik ?? 'Dental Care' }}
    </h2>

</a>

    <a href="/dashboard-admin">Dashboard</a>

    <a href="/dokter">Data Dokter</a>

    <a href="/jadwal_dokter">Jadwal Dokter</a>

    <a href="/layanan">Data Layanan</a>

    <a href="/reservasi">Reservasi</a>

    <a href="/rekam_medis">Rekam Medis</a>

    <a href="/laporan">Laporan</a>

    

    <div class="logout">

        <form action="/logout" method="POST">

            @csrf

            <button type="submit">
                Logout
            </button>

        </form>

    </div>

</div>

<div class="main">

    <!-- HEADER -->

    <div class="header">

        <h1>
            @yield('title', 'Dashboard Admin')
        </h1>

        <p>
            Selamat datang,
            {{ Auth::user()->name ?? 'Admin' }}
        </p>

    </div>

    <!-- CONTENT -->

    <div class="content">

        @yield('content')

    </div>


</div>

</body>
</html>