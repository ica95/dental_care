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
    background:#FFF8F8;
}

/* SIDEBAR */
.sidebar{
    width:250px;
    height:100vh;
    background:#DA8B8E;
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
    background:#C97A7D;
}

/* MAIN */
.main{
    margin-left:250px;
    min-height:100vh;
    padding:30px;
    display:flex;
    flex-direction:column;
}

/* OVERLAY */
.overlay{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,.25);
    backdrop-filter:blur(5px);
    z-index:1400;
    display:none;
}

.overlay.active{
    display:block;
}

/* HEADER */
.header{
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 8px 20px rgba(218,139,142,0.15);
    margin-bottom:25px;
}

.header h1{
    color:#C86D71;
}

.header p{
    color:#666;
    margin-top:5px;
}

/* CONTENT */
.content{
    flex:1;
}

/* CARD */
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
    box-shadow:0 8px 20px rgba(218,139,142,0.15);
}

.card h2{
    color:#C86D71;
}

.card p{
    color:#666;
}

/* FORM */
input,
select,
textarea{
    width:100%;
    padding:12px;
    border:1px solid #EBC1C3;
    border-radius:10px;
    margin-bottom:15px;
}

/* BUTTON */
button{
    background:#D47D82;
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:10px;
    cursor:pointer;
}

button:hover{
    background:#C86D71;
}

.btn{
    background:#D47D82;
    color:white;
    text-decoration:none;
    padding:10px 15px;
    border-radius:8px;
    display:inline-block;
}

.btn:hover{
    background:#C86D71;
}

.btn-danger{
    background:#C65A4E;
}

.btn-danger:hover{
    background:#B94B3F;
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

.btn-edit{
    min-width:80px;
    text-align:center;
    padding:10px 15px;
    border-radius:10px;
    text-decoration:none;
    color:white;
    display:inline-block;
    background:#D47D82;
}

.btn-edit:hover{
    background:#C86D71;
}

.btn-hapus{
    min-width:80px;
    text-align:center;
    padding:10px 15px;
    border-radius:10px;
    text-decoration:none;
    color:white;
    display:inline-block;
    background:#C65A4E;
}

.btn-hapus:hover{
    background:#B94B3F;
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
    background:white;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 8px 20px rgba(218,139,142,0.15);
}

th{
    background:#D47D82;
    color:white;
    padding:15px;
}

td{
    padding:15px;
    border-bottom:1px solid #f3d8da;
}

tr:hover{
    background:#FFF1F2;
}

/* LOGOUT */
.logout{
    margin-top:30px;
}

.logout button{
    width:100%;
    background:white;
    color:#C86D71;
    font-weight:bold;
}

.logout button:hover{
    background:#F8E6E7;
}

/* MODAL */
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
}

.button-group{
    display:flex;
    gap:10px;
}

/* TOGGLE */
.menu-toggle{
    display:none;
    position:fixed;
    top:20px;
    left:20px;
    z-index:2001;
    background:#D47D82;
    color:white;
    border:none;
    padding:12px 15px;
    border-radius:12px;
    font-size:20px;
    box-shadow:0 4px 10px rgba(0,0,0,.15);
}

/* MOBILE */
@media(max-width:768px){

    .menu-toggle{
        display:block;
    }

    .sidebar{
        left:-230px;
        width:220px;
        height:95vh;
        top:10px;
        transition:.3s;
        z-index:2000;
        padding:20px;
        border-radius:0 20px 20px 0;
        box-shadow:4px 0 15px rgba(0,0,0,.12);
    }

    .sidebar.active{
        left:0;
    }

    .sidebar img{
        width:60px !important;
        height:60px !important;
        margin-bottom:10px !important;
    }

    .sidebar h2{
        font-size:18px;
        margin-bottom:20px;
    }

    .menu-admin{
        gap:6px;
    }

    .menu-admin a{
        padding:10px 12px;
        font-size:15px;
    }

    .logout{
        margin-top:20px;
    }

    .logout button{
        padding:10px;
        font-size:15px;
    }

    .main{
        margin-left:0;
        padding:15px;
    }

    .header{
        margin-top:75px;
    }

    table{
        display:block;
        overflow-x:auto;
        white-space:nowrap;
    }

    .cards{
        grid-template-columns:1fr;
    }
}
</style>

</head>
<body>

<div class="sidebar">

@php
    $profil = \App\Models\ProfilKlinik::first();
@endphp

<a href="/profil_klinik" style="text-decoration:none; display:block; margin-bottom:30px;">

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

<h2>
    {{ $profil->nama_klinik ?? 'Dental Care' }}
</h2>

</a>

<div class="menu-admin">
    <a href="/dashboard-admin">Dashboard</a>
    <a href="/dokter">Data Dokter</a>
    <a href="/jadwal_dokter">Jadwal Dokter</a>
    <a href="/layanan">Data Layanan</a>
    <a href="/reservasi">Reservasi</a>
    <a href="/rekam_medis">Rekam Medis</a>
    <a href="/laporan">Laporan</a>
</div>

<div class="logout">
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>

</div>

<div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

<div class="main">

<button class="menu-toggle" onclick="toggleSidebar()">
    ☰
</button>

<div class="header">
    <h1>@yield('title', 'Dashboard Admin')</h1>
    <p>Selamat datang, {{ Auth::user()->name ?? 'Admin' }}</p>
</div>

<div class="content">
    @yield('content')
</div>

</div>

<script>
function toggleSidebar(){
    document.querySelector('.sidebar').classList.toggle('active');
    document.querySelector('.overlay').classList.toggle('active');
}
</script>

</body>
</html> 