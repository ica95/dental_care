@extends('layouts.pasien')

@section('title', 'Edit Profil')

@section('content')

<div class="card" style="
    max-width:700px;
    margin:auto;
    background:white;
    box-shadow:0 8px 20px rgba(218,139,142,.12);
    border-radius:20px;
    padding:30px;
">

    <h2 style="
        color:#C97A7D;
        margin-bottom:25px;
        text-align:center;
        font-size:30px;
        font-weight:bold;
    ">
        Edit Profil
    </h2>

    <form action="/pasien/{{ $pasien->id }}"
          method="POST">

        @csrf
        @method('PUT')

        <label style="
            font-weight:bold;
            color:#7A6A6A;
        ">
            Nama Lengkap
        </label>

        <input
            type="text"
            name="nama_pasien"
            value="{{ $pasien->nama_pasien }}"
            placeholder="Masukkan nama lengkap"
            required>

        <label style="
            font-weight:bold;
            color:#7A6A6A;
        ">
            Jenis Kelamin
        </label>

        <select name="jenis_kelamin" required>

            <option value="L"
                {{ $pasien->jenis_kelamin == 'L' ? 'selected' : '' }}>
                Laki-laki
            </option>

            <option value="P"
                {{ $pasien->jenis_kelamin == 'P' ? 'selected' : '' }}>
                Perempuan
            </option>

        </select>

        <label style="
            font-weight:bold;
            color:#7A6A6A;
        ">
            Tanggal Lahir
        </label>

        <input
            type="date"
            name="tanggal_lahir"
            value="{{ $pasien->tanggal_lahir }}"
            required>

        <label style="
            font-weight:bold;
            color:#7A6A6A;
        ">
            Alamat
        </label>

        <textarea
            name="alamat"
            rows="4"
            placeholder="Masukkan alamat"
            required>{{ $pasien->alamat }}</textarea>

        <label style="
            font-weight:bold;
            color:#7A6A6A;
        ">
            Nomor HP
        </label>

        <input
            type="text"
            name="no_hp"
            value="{{ $pasien->no_hp }}"
            placeholder="Masukkan nomor HP"
            required>

        <div style="
            display:flex;
            gap:10px;
            margin-top:20px;
        ">

            <button type="submit"
                style="
                    flex:1;
                    background:#DA8B8E;
                    color:white;
                    border:none;
                    padding:14px;
                    border-radius:10px;
                    font-weight:bold;
                    cursor:pointer;
                ">
                Simpan Perubahan
            </button>

            <a href="/pasien"
               style="
                    flex:1;
                    text-align:center;
                    background:#FDF1F1;
                    color:#C97A7D;
                    padding:14px;
                    border-radius:10px;
                    text-decoration:none;
                    font-weight:bold;
               ">
                Kembali
            </a>

        </div>

    </form>

</div>

@endsection