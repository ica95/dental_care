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

.logout button{
    width:100%;
    background:white;
    color:#f06292;
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
    background:#ff6b9a;
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

/* TOGGLE BUTTON */

.menu-toggle{
    display:none;
    position:fixed;
    top:20px;
    left:20px;
    width:55px;
    height:55px;
    background:#ff6b9a;
    color:white;
    border:none;
    border-radius:15px;
    font-size:24px;
    z-index:2000;
    cursor:pointer;
}

.close-btn{
    display:none;
    position:absolute;
    top:20px;
    right:20px;
    background:none;
    border:none;
    color:white;
    font-size:30px;
    cursor:pointer;
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
        left:-280px;
        width:260px;
        height:100vh;
        position:fixed;
        padding:25px 20px;
        box-shadow:0 0 25px rgba(0,0,0,.15);
    }

    .sidebar.active{
        left:0;
    }

    .close-btn{
        display:block;
    }

    .logo{
        margin-top:40px;
        margin-bottom:30px;
    }

    .logo img{
        width:70px;
        height:70px;
    }

    .logo h2{
        font-size:24px;
    }

    .menu{
        flex-direction:column;
        gap:15px;
    }

    .main{
        margin-left:0;
        width:100%;
    }

    .topbar{
        padding:20px;
        justify-content:flex-end;
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

<!-- TOGGLE -->
<button class="menu-toggle" onclick="toggleSidebar()">
    ☰
</button>

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

<!-- MAIN -->
<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">

        <a href="/pasien" class="profile">
            {{ Auth::user()->name }}
        </a>

    </div>

    <!-- CONTENT -->
    <div class="content">
        @yield('content')
    </div>

</div>

<script>
function toggleSidebar(){
    document.querySelector('.sidebar').classList.toggle('active');
}
</script>

</body>
</html>