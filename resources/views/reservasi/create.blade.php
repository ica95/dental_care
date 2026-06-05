@extends('layouts.admin')

@section('title', 'Tambah Reservasi')

@section('content')

<div class="card" style="max-width:700px;margin:auto;">

<h2 style="margin-bottom:20px;color:#ff6b9a;">
    📅 Tambah Reservasi
</h2>

<form action="/reservasi"
      method="POST">

    @csrf

    <label>Pasien</label>

    <input type="text"
           value="{{ $pasien->nama_pasien }}"
           readonly>

    <input type="hidden"
           name="pasien_id"
           value="{{ $pasien->id }}">

    <label>Dokter</label>

    <select name="dokter_id" required>

        @foreach($dokters as $dokter)

        <option value="{{ $dokter->id }}">
            {{ $dokter->nama_dokter }}
        </option>

        @endforeach

    </select>

    <label>Layanan</label>

    <select name="layanan_id" required>

        @foreach($layanans as $layanan)

        <option value="{{ $layanan->id }}">
            {{ $layanan->nama_layanan }}
        </option>

        @endforeach

    </select>

    <label>Tanggal Reservasi</label>

    <input type="date"
           name="tanggal_reservasi"
           required>

    <label>Jam Reservasi</label>

    <input type="time"
           name="jam_reservasi"
           required>

    <label>Keluhan</label>

    <textarea name="keluhan"
              rows="4"
              placeholder="Masukkan keluhan pasien"
              required></textarea>

    <button type="submit">
        Simpan Reservasi
    </button>

    <a href="/reservasi"
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
