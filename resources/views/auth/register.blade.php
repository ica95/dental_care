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

        label{
            font-weight:bold;
            display:block;
            margin-bottom:8px;
        }

        .required{
            color:red;
        }

        input,
        select{
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

        .login{
            text-align:center;
            margin-top:15px;
        }

        .login a{
            color:#ff69b4;
            text-decoration:none;
            font-weight:bold;
        }

        .error{
            color:red;
            margin-bottom:15px;
        }

    </style>

</head>
<body>

<div class="card">

    <h2>Registrasi Pasien</h2>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="/register" method="POST">

        @csrf

        <label>
            Nama Lengkap <span class="required">*</span>
        </label>
        <input
            type="text"
            name="name"
            placeholder="Nama Lengkap"
            required>


        <label>
            Email <span class="required">*</span>
        </label>
        <input
            type="email"
            name="email"
            placeholder="Email"
            required>

        <label>
            Jenis Kelamin <span class="required">*</span>
        </label>
        <select name="jenis_kelamin" required>
            <option value="">Pilih Jenis Kelamin</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>

        <label>
            Tanggal Lahir <span class="required">*</span>
        </label>
        <input
            type="date"
            name="tanggal_lahir"
            required>

        <label>
            Alamat <span class="required">*</span>
        </label>
        <input
            type="text"
            name="alamat"
            placeholder="Alamat"
            required>

        <label>
            Nomor HP <span class="required">*</span>
        </label>
        <input
            type="text"
            name="no_hp"
            placeholder="Nomor HP"
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

        <label>
            Konfirmasi Password <span class="required">*</span>
        </label>
        <input
            type="password"
            name="password_confirmation"
            placeholder="Konfirmasi Password"
            minlength="6"
            required>

        <button type="submit">
            Daftar
        </button>

    </form>

    <div class="login">

        Sudah punya akun?

        <a href="/login">
            Login
        </a>

    </div>

</div>

</body>
</html>