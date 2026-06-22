@extends('layouts.pasien')

@section('title', 'Edit Profil')

@section('content')

<div class="card" style="max-width:700px; margin:auto;">

    <h2 style="
        color:#ff6b9a;
        margin-bottom:25px;
        text-align:center;
    ">
        Edit Profil Saya
    </h2>

    <form action="/pasien/{{ $pasien->id }}"
          method="POST">

        @csrf
        @method('PUT')

        <label>Nama Lengkap</label>
        <input
            type="text"
            name="nama_pasien"
            value="{{ $pasien->nama_pasien }}"
            placeholder="Masukkan nama lengkap"
            required>

        <label>Jenis Kelamin</label>
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

        <label>Tanggal Lahir</label>
        <input
            type="date"
            name="tanggal_lahir"
            value="{{ $pasien->tanggal_lahir }}"
            required>

        <label>Alamat</label>
        <textarea
            name="alamat"
            rows="4"
            placeholder="Masukkan alamat"
            required>{{ $pasien->alamat }}</textarea>

        <label>Nomor HP</label>
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
                    background:#ff6b9a;
                    color:white;
                    border:none;
                    padding:12px;
                    border-radius:10px;
                    font-weight:bold;
                    cursor:pointer;
                ">
                Update
            </button>

            <a href="/pasien"
               style="
                    flex:1;
                    text-align:center;
                    background:#f3f3f3;
                    color:#555;
                    padding:12px;
                    border-radius:10px;
                    text-decoration:none;
                    font-weight:bold;
               ">
                Batal
            </a>

        </div>

    </form>

</div>

@endsection