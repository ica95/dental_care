<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Lumine Dental Care')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

@php
    $profil = \App\Models\ProfilKlinik::first();
@endphp

<style>

    *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

html{
    scroll-behavior:smooth;
}

body{
    background:#fff5f7;
}

/* NAVBAR */

.navbar{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    z-index:1000;

    display:flex;
    justify-content:space-between;
    align-items:center;

    padding:15px 60px;

    background:rgba(255,255,255,.15);
    backdrop-filter:blur(12px);
}

.logo{
    display:flex;
    align-items:center;
    gap:15px;
}

.logo img{
    width:70px;
    height:70px;
    border-radius:50%;
    object-fit:cover;
    background:white;
    padding:4px;
}

.logo span{
    color:#ff6b9a;
    font-size:30px;
    font-weight:bold;
}

.menu{
    display:flex;
    gap:25px;
    align-items:center;
}

.menu a{
    color:#ff6b9a;
    text-decoration:none;
    font-weight:600;
    transition:.3s;
}

.menu a:hover{
    color:#ff4f87;
}

.btn-reservasi{
    background:#ff6b9a;
    color:white !important;
    padding:12px 24px;
    border-radius:30px;
}

.btn-reservasi:hover{
    background:#ff4f87;
}
.menu-toggle{
    display:none;
    background:#ff6b9a;
    color:white;
    border:none;
    width:50px;
    height:50px;
    border-radius:12px;
    font-size:22px;
    cursor:pointer;
}
/* HERO */

.hero{
    min-height:100vh;

    background:
    linear-gradient(
        rgba(0,0,0,.45),
        rgba(0,0,0,.45)
    ),
    url('/images/logo_lumine.jpeg');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;

    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;

    color:white;
}

.hero-content h1{
    font-size:80px;
    margin-bottom:20px;
}

.hero-content p{
    font-size:26px;
    margin-bottom:30px;
}

.hero-contact{
    margin-top:30px;
}

.hero-contact p{
    font-size:20px;
    margin:15px 0;
}

.hero-contact i{
    margin-right:10px;
    font-size:24px;
}

.hero-contact .fa-instagram{
    color:#E1306C;
}

.hero-contact .fa-tiktok{
    color:white;
}

.hero-contact .fa-whatsapp{
    color:#25D366;
}

.hero-btn{
    display:inline-block;
    background:#ff6b9a;
    color:white;
    text-decoration:none;
    padding:15px 35px;
    border-radius:30px;
    font-weight:bold;
}

.hero-btn:hover{
    background:#ff4f87;
}

/* SECTION */

section{
    padding:90px 10%;
}

section h2{
    text-align:center;
    color:#ff6b9a;
    font-size:42px;
    margin-bottom:40px;
}

/* CARD */

.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:25px;
}

.card{
    background:white;
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    transition:.3s;
}

.card:hover{
    transform:translateY(-8px);
}

.card img{
    width:100%;
    height:250px;
    object-fit:cover;
}

.card-body{
    padding:20px;
}

.card-body h3{
    color:#ff6b9a;
    margin-bottom:10px;
}

/* DOKTER */

.dokter-card{
    text-align:center;
    min-height:450px;
}

.dokter-card img{
    width:220px;
    height:220px;
    border-radius:50%;
    object-fit:cover;
    margin:20px auto;
}

.btn-jadwal{
    margin-top:15px;
    background:#ff6b9a;
    color:white;
    border:none;
    padding:10px 15px;
    border-radius:8px;
    cursor:pointer;
}

.btn-jadwal:hover{
    background:#ff4f87;
}

.jadwal-box{
    display:none;
    margin-top:15px;
    padding:15px;
    background:#fff0f5;
    border-radius:10px;
    text-align:center;
}

.jadwal-box p{
    margin:5px 0;
    color:#666;
}

/* LOKASI */

.section-title{
    text-align:center;
    margin-bottom:40px;
}

.section-title p{
    color:#666;
}

.lokasi-card{
    max-width:900px;
    margin:auto;
    background:white;
    padding:35px;
    border-radius:25px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.lokasi-info{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
    margin-bottom:25px;
}

.info-item{
    background:#fff5f7;
    padding:20px;
    border-radius:15px;
    text-align:center;
}

.info-item h3{
    color:#ff6b9a;
    margin-bottom:10px;
}

.maps-wrapper iframe{
    width:100%;
    height:320px;
    border:none;
    border-radius:20px;
}

.btn-wrapper{
    text-align:center;
    margin-top:25px;
}

.btn-lokasi{
    display:inline-block;
    background:#ff6b9a;
    color:white;
    text-decoration:none;
    padding:12px 24px;
    border-radius:12px;
}

/* KONTAK */

.kontak-container{
    max-width:1100px;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:25px;
}

.kontak-card{
    background:white;
    padding:35px;
    border-radius:25px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.kontak-icon{
    font-size:55px;
    margin-bottom:20px;
}

.fa-whatsapp{
    color:#25D366;
}

.fa-instagram{
    color:#E1306C;
}

.fa-tiktok{
    color:#000;
}

.kontak-card h3{
    color:#ff6b9a;
    margin-bottom:10px;
}

.btn-wa,
.btn-sosmed{
    display:inline-block;
    color:white;
    text-decoration:none;
    padding:12px 20px;
    border-radius:12px;
    margin-top:10px;
}

.btn-wa{
    background:#ff6b9a;
}

.btn-sosmed{
    background:#ff6b9a;
}

/* FOOTER */

footer{
    background:#ff6b9a;
    color:white;
    text-align:center;
    padding:50px 20px;
}

/* FLOATING WA */

.wa-float{
    position:fixed;
    right:25px;
    bottom:25px;

    width:65px;
    height:65px;

    background:#25D366;

    border-radius:50%;

    display:flex;
    justify-content:center;
    align-items:center;

    color:white;
    text-decoration:none;
    font-size:30px;

    z-index:9999;
}

@media(max-width:768px){

    .navbar{
        padding:15px 20px;
        flex-direction:row;
        justify-content:space-between;
        align-items:center;
        background:white;
    }

    .logo{
        flex-direction:row;
        gap:10px;
    }

    .logo img{
        width:55px;
        height:55px;
    }

    .logo span{
        font-size:20px;
    }

    .menu-toggle{
        display:block;
    }

    .menu{
        position:absolute;
        top:90px;
        left:0;
        width:100%;
        background:white;
        display:none;
        flex-direction:column;
        padding:20px;
        box-shadow:0 8px 20px rgba(0,0,0,.1);
    }

    .menu.active{
        display:flex;
    }

    .menu a{
        padding:12px 0;
        font-size:18px;
    }

    .btn-reservasi{
        width:100%;
        text-align:center;
        margin-top:10px;
    }

    .hero{
        padding:140px 20px 60px;
    }

    .hero-content h1{
        font-size:42px;
    }

    .hero-content p{
        font-size:18px;
    }

    .cards{
        grid-template-columns:1fr;
    }

    .kontak-container{
        grid-template-columns:1fr;
    }

}
</style>

</head>
<body>

<div class="navbar">

<div class="logo">

    @if($profil && $profil->logo)
        <img src="{{ asset('images/logo/'.$profil->logo) }}">
    @endif

    <span>Lumine Dental Care</span>

</div>

<button class="menu-toggle" onclick="toggleMenu()">
    <i class="fas fa-bars"></i>
</button>

<div class="menu" id="mobileMenu">

    <a href="#beranda">
        Beranda
    </a>

    <a href="#layanan">
        Layanan
    </a>

    <a href="#dokter">
        Dokter
    </a>

    <a href="#lokasi">
        Lokasi
    </a>

    <a href="#kontak">
        Kontak
    </a>


</div>

</div>

@yield('content')

<footer>

<h3>
    Lumine Dental Care
</h3>

<p>
    Klinik Gigi Profesional dan Terpercaya
</p>

</footer>
<script>
function toggleMenu(){
    document.getElementById('mobileMenu').classList.toggle('active');
}
</script>
</body>
</html>
