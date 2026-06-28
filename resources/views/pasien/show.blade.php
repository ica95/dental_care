@extends('layouts.pasien')

@section('title', 'Profil Saya')

@section('content')

<div class="card" style="
    max-width:900px;
    margin:auto;
    background:white;
    box-shadow:0 8px 20px rgba(218,139,142,.12);
">

    <h2 style="
        color:#C97A7D;
        text-align:center;
        margin-bottom:30px;
        font-size:28px;
    ">
        Profil Saya
    </h2>

    @if(session('success'))
        <div style="
            background:#F3FAF4;
            color:#4F8A5B;
            padding:12px;
            border-radius:10px;
            margin-bottom:20px;
            border:1px solid #D4E8D8;
        ">
            {{ session('success') }}
        </div>
    @endif

    {{-- NAMA --}}
    <label style="
        font-weight:bold;
        color:#7A6A6A;
    ">
        Nama Lengkap
    </label>

    <input
        type="text"
        value="{{ $pasien->nama_pasien }}"
        readonly
        style="
            background:#FFF8F8;
            border:1px solid #EBC1C3;
        ">

    {{-- JENIS KELAMIN --}}
    <label style="
        font-weight:bold;
        color:#7A6A6A;
    ">
        Jenis Kelamin
    </label>

    <input
        type="text"
        value="{{ $pasien->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}"
        readonly
        style="
            background:#FFF8F8;
            border:1px solid #EBC1C3;
        ">

    {{-- TANGGAL LAHIR --}}
    <label style="
        font-weight:bold;
        color:#7A6A6A;
    ">
        Tanggal Lahir
    </label>

    <input
        type="text"
        value="{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}"
        readonly
        style="
            background:#FFF8F8;
            border:1px solid #EBC1C3;
        ">

    {{-- ALAMAT --}}
    <label style="
        font-weight:bold;
        color:#7A6A6A;
    ">
        Alamat
    </label>

    <textarea
        rows="4"
        readonly
        style="
            background:#FFF8F8;
            border:1px solid #EBC1C3;
        ">{{ $pasien->alamat }}</textarea>

    {{-- NOMOR HP --}}
    <label style="
        font-weight:bold;
        color:#7A6A6A;
    ">
        Nomor HP
    </label>

    <input
        type="text"
        value="{{ $pasien->no_hp }}"
        readonly
        style="
            background:#FFF8F8;
            border:1px solid #EBC1C3;
        ">

    <div style="
        display:flex;
        gap:15px;
        margin-top:20px;
    ">

        <a href="/pasien/{{ $pasien->id }}/edit"
           class="btn"
           style="
                flex:1;
                text-align:center;
                background:#DA8B8E;
           ">
            Edit Profil
        </a>

        <a href="/dashboard-pasien"
           style="
                flex:1;
                text-align:center;
                background:#FDF1F1;
                color:#C97A7D;
                padding:12px;
                border-radius:10px;
                text-decoration:none;
                font-weight:bold;
                border:1px solid #EBC1C3;
           ">
            Kembali
        </a>

    </div>

</div>

@endsection