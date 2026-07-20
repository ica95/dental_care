@extends('layouts.admin')

@section('title', 'Tambah Rekam Medis')

@section('content')

<div class="card" style="max-width:950px;margin:auto;">

    <h2 style="
        color:#DA8B8E;
        margin-bottom:25px;
        border-bottom:2px solid #ffe0ea;
        padding-bottom:10px;
    ">
        Tambah Rekam Medis
    </h2>

    <form action="/rekam_medis" method="POST">

        @csrf

        {{-- Reservasi --}}
        <label><b>Reservasi</b></label>

        <select id="reservasi" name="reservasi_id" required>

            <option value="">Pilih Reservasi</option>

            @foreach($reservasis as $reservasi)

            <option
                value="{{ $reservasi->id }}"
                data-pasien="{{ $reservasi->nama_pasien }}"
                data-pemilik="{{ $reservasi->pasien->nama_pasien }}"
                data-lahir="{{ $reservasi->tanggal_lahir }}"
                data-dokter="{{ $reservasi->dokter->nama_dokter }}"
                data-layanan="{{ $reservasi->layanan->nama_layanan }}"
                data-keluhan="{{ $reservasi->keluhan }}">

                {{ $reservasi->nama_pasien }}
                -
                {{ $reservasi->dokter->nama_dokter }}
                -
                {{ $reservasi->tanggal_reservasi }}

            </option>

            @endforeach

        </select>

        <hr style="margin:25px 0;">

        <h3 style="color:#DA8B8E;margin-bottom:15px;">
            Informasi Pasien
        </h3>

        <div style="
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:20px;
        ">

            <div>

                <label><b>Nama Pasien</b></label>

                <input
                    type="text"
                    id="nama_pasien"
                    readonly>

            </div>

            <div>

                <label><b>Pemilik Akun</b></label>

                <input
                    type="text"
                    id="pemilik_akun"
                    readonly>

            </div>

            <div>

                <label><b>Tanggal Lahir</b></label>

                <input
                    type="text"
                    id="tanggal_lahir"
                    readonly>

            </div>

            <div>

                <label><b>Dokter</b></label>

                <input
                    type="text"
                    id="dokter"
                    readonly>

            </div>

            <div>

                <label><b>Layanan</b></label>

                <input
                    type="text"
                    id="layanan"
                    readonly>

            </div>

            <div>

                <label><b>Keluhan</b></label>

                <textarea
                    id="keluhan"
                    rows="2"
                    readonly></textarea>

            </div>

        </div>

        <hr style="margin:25px 0;">

        <div style="
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:20px;
        ">

            <div>

                <label><b>Tanggal Pemeriksaan</b></label>

                <input
                    type="date"
                    name="tanggal_periksa"
                    value="{{ date('Y-m-d') }}"
                    required>

            </div>

            <div>

                <label><b>Biaya Pemeriksaan</b></label>

                <input
                    type="number"
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
            placeholder="Masukkan tindakan"></textarea>

        <label><b>Resep Obat</b></label>

        <textarea
            name="resep_obat"
            rows="4"
            placeholder="Masukkan resep obat"></textarea>

        <label><b>Catatan Tambahan</b></label>

        <textarea
            name="catatan"
            rows="4"
            placeholder="Masukkan catatan"></textarea>

        <div style="
            margin-top:25px;
            display:flex;
            gap:10px;
        ">

            <button
                type="submit"
                class="btn">
                Simpan
            </button>

            <a
                href="/rekam_medis"
                class="btn"
                style="background:#6c757d;">
                Kembali
            </a>

        </div>

    </form>

</div>

<script>

document.getElementById('reservasi').addEventListener('change', function(){

    let data = this.options[this.selectedIndex];

    document.getElementById('nama_pasien').value = data.dataset.pasien || '';
    document.getElementById('pemilik_akun').value = data.dataset.pemilik || '';
    document.getElementById('tanggal_lahir').value = data.dataset.lahir || '';
    document.getElementById('dokter').value = data.dataset.dokter || '';
    document.getElementById('layanan').value = data.dataset.layanan || '';
    document.getElementById('keluhan').value = data.dataset.keluhan || '';

});

</script>

@endsection