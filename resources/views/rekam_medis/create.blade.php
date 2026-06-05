@extends('layouts.admin')

@section('title', 'Tambah Rekam Medis')

@section('content')

<div class="card" style="max-width:800px;margin:auto;">

<h2 style="margin-bottom:20px;color:#ff6b9a;">
    🩺 Tambah Rekam Medis
</h2>

<form action="/rekam_medis"
      method="POST">

    @csrf

    <label>Reservasi</label>

    <select name="reservasi_id">

        @foreach($reservasis as $reservasi)

            <option value="{{ $reservasi->id }}">
                Reservasi #{{ $reservasi->id }}
            </option>

        @endforeach

    </select>

    <label>Pasien</label>

    <select name="pasien_id">

        @foreach($pasiens as $pasien)

            <option value="{{ $pasien->id }}">
                {{ $pasien->nama_pasien }}
            </option>

        @endforeach

    </select>

    <label>Dokter</label>

    <select name="dokter_id">

        @foreach($dokters as $dokter)

            <option value="{{ $dokter->id }}">
                {{ $dokter->nama_dokter }}
            </option>

        @endforeach

    </select>

    <label>Tanggal Periksa</label>

    <input type="date"
           name="tanggal_periksa">

    <label>Diagnosa</label>

    <textarea name="diagnosa"
              rows="3"
              placeholder="Masukkan diagnosa"></textarea>

    <label>Tindakan</label>

    <textarea name="tindakan"
              rows="3"
              placeholder="Masukkan tindakan"></textarea>

    <label>Resep Obat</label>

    <textarea name="resep_obat"
              rows="3"
              placeholder="Masukkan resep obat"></textarea>

    <label>Catatan</label>

    <textarea name="catatan"
              rows="3"
              placeholder="Masukkan catatan tambahan"></textarea>

    <br>

    <button type="submit">
        💾 Simpan Rekam Medis
    </button>

    <a href="/rekam_medis"
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
