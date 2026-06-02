<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Dental Care</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#fff0f5;
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
        }

        .card{
            width:450px;
            background:white;
            padding:35px;
            border-radius:20px;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }

        h2{
            text-align:center;
            color:#ff69b4;
            margin-bottom:25px;
        }

        input{
            width:100%;
            padding:12px;
            border:1px solid #ffc0cb;
            border-radius:10px;
            margin-bottom:15px;
        }

        button{
            width:100%;
            padding:12px;
            border:none;
            border-radius:10px;
            background:#ff69b4;
            color:white;
            font-weight:bold;
            cursor:pointer;
        }

        .login{
            text-align:center;
            margin-top:15px;
        }

        .login a{
            color:#ff69b4;
            text-decoration:none;
            font-weight:bold;
        }

    </style>

</head>
<body>

<div class="card">

    <h2>Registrasi Pasien</h2>

    <form action="/register" method="POST">

        @csrf

        <input type="text"
               name="name"
               placeholder="Nama Lengkap"
               required>

        <input type="email"
               name="email"
               placeholder="Email"
               required>

        <input type="password"
               name="password"
               placeholder="Password"
               required>

        <input type="password"
               name="password_confirmation"
               placeholder="Konfirmasi Password"
               required>

        <button type="submit">
            Daftar
        </button>

    </form>

    <div class="login">
        Sudah punya akun?
        <a href="/login">Login</a>
    </div>

</div>

</body>
</html>