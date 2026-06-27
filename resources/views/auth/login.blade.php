<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login - Dental Care</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#FFF8F8;
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
            box-shadow:0 8px 20px rgba(218,139,142,.15);
            border:1px solid #F3D9DA;
        }

        h2{
            text-align:center;
            color:#C97A7D;
            margin-bottom:25px;
        }

        label{
            font-weight:bold;
            display:block;
            margin-bottom:8px;
            color:#8B5E61;
        }

        .required{
            color:#D47D82;
        }

        input{
            width:100%;
            padding:12px;
            border:1px solid #E2A2A4;
            border-radius:10px;
            margin-bottom:15px;
            outline:none;
            transition:.3s;
        }

        input:focus{
            border-color:#C97A7D;
            box-shadow:0 0 0 3px rgba(218,139,142,.15);
        }

        button{
            width:100%;
            padding:12px;
            border:none;
            border-radius:10px;
            background:#DA8B8E;
            color:white;
            font-weight:bold;
            cursor:pointer;
            transition:.3s;
        }

        button:hover{
            background:#C97A7D;
        }

        .register{
            text-align:center;
            margin-top:15px;
            color:#666;
        }

        .register a{
            text-decoration:none;
            color:#C97A7D;
            font-weight:bold;
        }

        .register a:hover{
            color:#B86A6D;
        }

        .error{
            background:#FDECEC;
            color:#B86A6D;
            padding:10px;
            border-radius:8px;
            margin-bottom:15px;
            border:1px solid #F5C6CB;
        }

        @media(max-width:768px){
            .card{
                width:90%;
                padding:25px;
            }

            h2{
                font-size:24px;
            }
        }

    </style>

</head>
<body>

<div class="card">

    <h2>
        Login Dental Care
    </h2>

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <form action="/login" method="POST">

        @csrf

        <label>
            Email <span class="required">*</span>
        </label>

        <input
            type="email"
            name="email"
            placeholder="Masukkan Email"
            required>

        <label>
            Password <span class="required">*</span>
        </label>

        <input
            type="password"
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

        <a href="{{ url('/register') }}">
            Daftar
        </a>

    </div>

</div>

</body>
</html>