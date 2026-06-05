@extends('layouts.admin')

@section('title', 'Edit Profil Klinik')

@section('content')

<div class="card" style="max-width:800px;margin:auto;">


<h2 style="margin-bottom:20px;color:#ff6b9a;">
    🏥 Edit Profil Klinik
</h2>

<form action="/profil_klinik/{{ $profil->id }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <label>Nama Klinik</label>

    <input type="text"
           name="nama_klinik"
           value="{{ $profil->nama_klinik }}">

    <label>Alamat</label>

    <textarea name="alamat"
              rows="4">{{ $profil->alamat }}</textarea>

    <label>No HP</label>

    <input type="text"
           name="no_hp"
           value="{{ $profil->no_hp }}">

    <label>Email</label>

    <input type="email"
           name="email"
           value="{{ $profil->email }}">

    <label>Deskripsi</label>

    <textarea name="deskripsi"
              rows="4">{{ $profil->deskripsi }}</textarea>

    <label>Logo Klinik</label>

    @if($profil->logo)

        <div style="margin-bottom:15px;">

            <img
                src="{{ asset('images/logo/'.$profil->logo) }}"
                width="120"
                style="border-radius:10px;">

        </div>

    @endif

    <input type="file"
           name="logo">

    <br><br>

    <button type="submit">
        💾 Update Profil
    </button>

    <a href="/profil_klinik"
       style="
            margin-left:10px;
            text-decoration:none;
            color:#666;
            font-weight:bold;
       ">
        Kembali
    </a>

</form>


</div>

@endsection
