<!DOCTYPE html>
<html>
<head>
    <title>Dental Care</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI', sans-serif;
        }

        body{
            background:#fff5f7;
        }

        nav{
            background:#f8a5c2;
            padding:18px 50px;
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
            font-weight:500;
        }

        nav a:hover{
            color:#fff0f5;
        }

        .container{
            width:90%;
            margin:auto;
            padding:30px;
        }

        .card{
            background:white;
            padding:25px;
            border-radius:20px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
        }

    </style>

</head>
<body>

<nav>

    <h2>🦷 Dental Care</h2>

    <div>

        <a href="/">Home</a>

        <a href="/reservasi-saya">
            Reservasi Saya
        </a>

        <a href="/rekam-medis-saya">
            Rekam Medis Saya
        </a>

        <a href="/logout">
            Logout
        </a>

    </div>

</nav>

<div class="container">

    @yield('content')

</div>

</body>
</html>