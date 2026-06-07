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

        <select name="reservasi_id" required>

            <option value="">
                Pilih Reservasi
            </option>

            @foreach($reservasis as $reservasi)

                <option value="{{ $reservasi->id }}">

                    {{ $reservasi->pasien->nama_pasien }}
                    -
                    {{ $reservasi->dokter->nama_dokter }}
                    -
                    {{ $reservasi->tanggal_reservasi }}

                </option>

            @endforeach

        </select>


        <label>Diagnosa</label>

        <textarea
            name="diagnosa"
            rows="4"
            required
            placeholder="Masukkan diagnosa"></textarea>

        <br><br>

        <label>Tindakan</label>

        <textarea
            name="tindakan"
            rows="4"
            required
            placeholder="Masukkan tindakan"></textarea>

        <br><br>

        <label>Resep Obat</label>

        <textarea
            name="resep_obat"
            rows="4"
            placeholder="Masukkan resep obat"></textarea>

        <br><br>

        <label>Catatan</label>

        <textarea
            name="catatan"
            rows="4"
            placeholder="Masukkan catatan tambahan"></textarea>

        <br><br>
        <label>Biaya</label>

<input
    type="number"
    name="biaya"
    placeholder="Masukkan biaya">

<br><br>

        <button type="submit"
                class="btn">

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