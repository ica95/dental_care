@extends('layouts.admin')

@section('title', 'Tambah Profil Klinik')

@section('content')

<div class="card" style="max-width:800px;margin:auto;">

```
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
              placeholder="Masukkan alamat klinik"
              required></textarea>

    <label>No HP</label>

    <input type="text"
           name="no_hp"
           placeholder="Masukkan nomor HP"
           required>

    <label>Email</label>

    <input type="email"
           name="email"
           placeholder="Masukkan email klinik"
           required>

    <label>Deskripsi</label>

    <textarea name="deskripsi"
              rows="4"
              placeholder="Masukkan deskripsi klinik"
              required></textarea>

    <label>Logo Klinik</label>

    <input type="file"
           name="logo"
           accept="image/*">

    <br><br>

    <button type="submit">
        💾 Simpan Profil Klinik
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
```

</div>

@endsection
