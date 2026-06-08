@extends('layouts.admin')

@section('title', 'Tambah Rekam Medis')

@section('content')

<div class="card" style="max-width:900px;margin:auto;">

    <h2 style="
        color:#ff6b9a;
        margin-bottom:25px;
        border-bottom:2px solid #ffe0ea;
        padding-bottom:10px;
    ">
        Tambah Rekam Medis
    </h2>

    <form action="/rekam_medis"
          method="POST">

        @csrf

        <div style="
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:20px;
        ">

            <div>

                <label><b>Reservasi</b></label>

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

            </div>

            <div>

                <label><b>Biaya Pemeriksaan</b></label>

                <input type="number"
                       name="biaya"
                       placeholder="Masukkan biaya"
                       required>

            </div>

        </div>

        <label><b>Diagnosa</b></label>

        <textarea
            name="diagnosa"
            rows="4"
            required
            placeholder="Masukkan hasil diagnosa"></textarea>

        <label><b>Tindakan</b></label>

        <textarea
            name="tindakan"
            rows="4"
            required
            placeholder="Masukkan tindakan yang dilakukan"></textarea>

        <label><b>Resep Obat</b></label>

        <textarea
            name="resep_obat"
            rows="4"
            placeholder="Masukkan resep obat"></textarea>

        <label><b>Catatan Tambahan</b></label>

        <textarea
            name="catatan"
            rows="4"
            placeholder="Masukkan catatan tambahan"></textarea>

        <div style="
            margin-top:25px;
            display:flex;
            gap:10px;
        ">

            <button type="submit"
                    class="btn">
                Simpan
            </button>

            <button type="button"
                    class="btn-danger"
                    onclick="window.location.href='/rekam_medis'">
                Batal
            </button>

        </div>

    </form>

</div>

@endsection