@extends('layouts.pasien')

@section('title', 'Profil Saya')

@section('content')

<div class="card" style="
    max-width:900px;
    margin:auto;
">

    <h2 style="
        color:#ff6b9a;
        text-align:center;
        margin-bottom:30px;
    ">
         Profil Saya
    </h2>

    @if(session('success'))
        <div style="
            background:#d4edda;
            color:#155724;
            padding:12px;
            border-radius:10px;
            margin-bottom:20px;
        ">
            {{ session('success') }}
        </div>
    @endif

    {{-- NAMA --}}
    <label>Nama Lengkap</label>
    <input
        type="text"
        value="{{ $pasien->nama_pasien }}"
        readonly>

    {{-- JENIS KELAMIN --}}
    <label>Jenis Kelamin</label>
    <input
        type="text"
        value="{{ $pasien->jenis_kelamin }}"
        readonly>

    {{-- TANGGAL LAHIR --}}
    <label>Tanggal Lahir</label>
    <input
        type="text"
        value="{{ $pasien->tanggal_lahir }}"
        readonly>

    {{-- ALAMAT --}}
    <label>Alamat</label>
    <textarea rows="4" readonly>{{ $pasien->alamat }}</textarea>

    {{-- NOMOR HP --}}
    <label>Nomor HP</label>
    <input
        type="text"
        value="{{ $pasien->no_hp }}"
        readonly>

    <div style="
        display:flex;
        gap:15px;
        margin-top:20px;
    ">

        <a href="/pasien/{{ $pasien->id }}/edit"
           class="btn"
           style="flex:1; text-align:center;">
            Edit Profil
        </a>

        <a href="/dashboard-pasien"
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
            Kembali
        </a>

    </div>

</div>

@endsection