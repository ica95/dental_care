<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dental Care</title>

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
            height:100vh;
        }

        .card{
            width:400px;
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

        label{
            font-weight:bold;
            display:block;
            margin-bottom:8px;
        }

        .required{
            color:red;
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

        button:hover{
            background:#ff4fa3;
        }

        .register{
            text-align:center;
            margin-top:15px;
        }

        .register a{
            text-decoration:none;
            color:#ff69b4;
            font-weight:bold;
        }

        .error{
            background:#ffe5e5;
            color:red;
            padding:10px;
            border-radius:8px;
            margin-bottom:15px;
        }

    </style>

</head>
<body>

<div class="card">

    <h2>Login Dental Care</h2>

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <form action="/login" method="POST">

        @csrf

        <label>
    Nama <span class="required">*</span>
</label>
        <input
    type="text"
    name="name"
    placeholder="Masukkan Nama"
    required>

        <label>
            Password <span class="required">*</span>
        </label>

        <input type="password"
               name="password"
               placeholder="Minimal 6 karakter"
               minlength="6"
               required>

        <button type="submit">
            Login
        </button>

    </form>

    <div class="register">
        Belum punya akun?
        <a href="{{ url('/register') }}">Daftar</a>
    </div>

</div>

</body>
</html>