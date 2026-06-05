@extends('layouts.admin')

@section('title', 'Tambah Profil Klinik')

@section('content')

<div class="card" style="max-width:800px;margin:auto;">


<h2 style="margin-bottom:20px;color:#ff6b9a;">
    🏥 Tambah Profil Klinik
</h2>

<form action="/profil_klinik"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <label>Nama Klinik</label>

    <input type="text"
           name="nama_klinik"
           placeholder="Masukkan nama klinik"
           required>

    <label>Alamat</label>

    <textarea name="alamat"
              rows="4"

