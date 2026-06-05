@extends('layouts.admin')

@section('title', 'Tambah Layanan')

@section('content')

<div class="card" style="max-width:800px;margin:auto;">

```
<h2 style="margin-bottom:20px;color:#ff6b9a;">
    🦷 Tambah Layanan
</h2>

<form action="/layanan"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <label>Nama Layanan</label>

    <input type="text"
           name="nama_layanan"
           placeholder="Masukkan nama layanan"
           required>

    <label>Deskripsi</label>

    <textarea name="deskripsi"
              rows="5"
              placeholder="Masukkan deskripsi layanan"
              required></textarea>

    <label>Foto Layanan</label>

    <input type="file"
           name="foto"
           accept="image/*">
@extends('layouts.admin')

@section('title', 'Tambah Layanan')

@section('content')

<div class="card" style="max-width:800px;margin:auto;">

```
<h2 style="margin-bottom:20px;color:#ff6b9a;">
    🦷 Tambah Layanan
</h2>

<form action="/layanan"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <label>Nama Layanan</label>

    <input type="text"
           name="nama_layanan"
           placeholder="Masukkan nama layanan"
           required>

    <label>Deskripsi</label>

    <textarea name="deskripsi"
              rows="5"
              placeholder="Masukkan deskripsi layanan"
              required></textarea>

    <label>Foto Layanan</label>

    <input type="file"
           name="foto"
           accept="image/*">

    <br><br>

    <button type="submit">
        💾
```

    <br><br>

    <button type="submit">
        💾
```
