@extends('layouts.admin')

@section('title', 'Edit Layanan')

@section('content')

<div class="card" style="max-width:800px;margin:auto;">


<h2 style="margin-bottom:20px;color:#ff6b9a;">
    🦷 Edit Layanan
</h2>

<form action="/layanan/{{ $layanan->id }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <label>Nama Layanan</label>

    <input type="text"
           name="nama_layanan"
           value="{{ $layanan->nama_layanan }}"
           required>

    <label>Deskripsi</label>

    <textarea name="deskripsi"
              rows="5"
              required>{{ $layanan->deskripsi }}</textarea>

    <label>Foto Saat Ini</label>

    <br>

    @if($layanan->foto)

        <img
            src="{{ asset('images/layanan/'.$layanan->foto) }}"
            width="180"
            style="
                border-radius:10px;
                margin-bottom:15px;
                box-shadow:0 3px 10px rgba(0,0,0,0.1);
            ">

    @else

        <p>Tidak ada foto</p>

    @endif

    <label>Ganti Foto</label>

    <input type="file"
           name="foto">

    <br><br>

    <button type="submit">
        💾 Update Layanan
    </button>

    <a href="/layanan"
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
