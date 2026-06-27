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
            background:#FFF8F8;
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
            padding:20px;
        }

        .card{
            width:450px;
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

        input,
        select{
            width:100%;
            padding:12px;
            border:1px solid #E2A2A4;
            border-radius:10px;
            margin-bottom:15px;
            outline:none;
            transition:.3s;
        }

        input:focus,
        select:focus{
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

        .login{
            text-align:center;
            margin-top:15px;
            color:#666;
        }

        .login a{
            color:#C97A7D;
            text-decoration:none;
            font-weight:bold;
        }

        .login a:hover{
            color:#B86A6D;
        }

        .error{
            background:#FDECEC;
            color:#B86A6D;
            padding:12px;
            border-radius:10px;
            margin-bottom:15px;
            border:1px solid #F5C6CB;
        }

        @media(max-width:768px){
            .card{
                width:100%;
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