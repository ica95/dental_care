<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Lumine Dental')</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:#fdf6f6;
    display:flex;
    min-height:100vh;
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
    transition:.3s;
    z-index:999;
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
    font-size:26px;
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
    background:#C97A7D;
}

.active{
    background:#C97A7D;
}

/* LOGOUT */

.logout button{
    width:100%;
    background:white;
    color:#C97A7D;
    border:none;
    padding:14px;
    border-radius:12px;
    font-weight:bold;
    cursor:pointer;
    margin-top:20px;
}

/* MAIN */

.main{
    margin-left:250px;
    flex:1;
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
    backdrop-filter:blur(4px);
    z-index:900;
    display:none;
}

.overlay.active{
    display:block;
}

/* TOPBAR */

.topbar{
    background:white;
    padding:20px 40px;
    display:flex;
    justify-content:flex-end;
    align-items:center;
    box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.profile{
    background:#DA8B8E;
    color:white;
    text-decoration:none;
    padding:14px 25px;
    border-radius:15px;
    font-weight:bold;
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
    background:#DA8B8E;
    color:white;
    text-decoration:none;
    padding:12px 20px;
    border-radius:10px;
    display:inline-block;
    font-weight:bold;
}

.btn:hover{
    background:#C97A7D;
}

/* FORM */

input,
select,
textarea{
    width:100%;
    padding:14px;
    border:1px solid #E9B8BA;
    border-radius:10px;
    margin-bottom:15px;
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
    background:#D47D82;
    color:white;
    padding:15px;
}

td{
    padding:15px;
    border-bottom:1px solid #eee;
}

tr:hover{
    background:#fff0f1;
}

/* TOGGLE BUTTON */

.menu-toggle{
    display:none;
    position:fixed;
    top:15px;
    left:15px;
    width:50px;
    height:50px;
    background:#DA8B8E;
    color:white;
    border:none;
    border-radius:12px;
    font-size:22px;
    z-index:2000;
    cursor:pointer;
    box-shadow:0 4px 10px rgba(0,0,0,.15);
}

/* MOBILE */

@media(max-width:768px){

    body{
        display:block;
    }

    .menu-toggle{
        display:flex;
        justify-content:center;
        align-items:center;
    }

    .sidebar{
        left:-230px;
        width:220px;
        height:95vh;
        top:10px;
        padding:20px;
        border-radius:0 20px 20px 0;
        box-shadow:4px 0 15px rgba(0,0,0,.15);
    }

    .sidebar.active{
        left:0;
    }

    .logo{
        margin-top:20px;
        margin-bottom:25px;
    }

    .logo img{
        width:60px;
        height:60px;
    }

    .logo h2{
        font-size:20px;
    }

    .menu{
        gap:8px;
    }

    .menu a{
        padding:12px;
        font-size:15px;
    }

    .logout button{
        padding:12px;
        font-size:15px;
    }

    .main{
        margin-left:0;
        width:100%;
    }

    .topbar{
        padding:20px;
    }

    .profile{
        padding:12px 18px;
        font-size:14px;
    }

    .content{
        padding:20px;
    }

    .card{
        padding:20px;
    }

    table{
        display:block;
        overflow-x:auto;
        white-space:nowrap;
    }

    th,
    td{
        padding:12px;
        font-size:14px;
    }

    input,
    select,
    textarea{
        padding:12px;
    }

    .btn{
        width:100%;
        text-align:center;
    }
}

</style>
</head>
<body>

@php
    $profil = \App\Models\ProfilKlinik::first();
@endphp

<button class="menu-toggle" onclick="toggleSidebar()">
    ☰
</button>

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

        <div class="logout">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit">
                    Logout
                </button>
            </form>
        </div>

    </div>

</div>

<div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

<div class="main">

    <div class="topbar">

        <a href="/pasien" class="profile">
            {{ Auth::user()->name }}
        </a>

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