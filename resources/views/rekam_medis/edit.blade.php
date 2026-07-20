@extends('layouts.admin')

@section('title', 'Edit Rekam Medis')

@section('content')

<div class="card" style="max-width:950px;margin:auto;">

    <h2 style="
        color:#DA8B8E;
        margin-bottom:25px;
        border-bottom:2px solid #ffe0ea;
        padding-bottom:10px;
    ">
        Edit Rekam Medis
    </h2>

    {{-- DATA RESERVASI --}}
    <div style="
        background:#FFF7F8;
        border:1px solid #FFD9DF;
        border-radius:12px;
        padding:20px;
        margin-bottom:25px;
    ">

        <h3 style="color:#DA8B8E;margin-bottom:15px;">
            Informasi Pasien
        </h3>

        <div style="
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:15px;
        ">

            <div>
                <label><b>Nama Pasien</b></label>

                <input
                    type="text"
                    value="{{ $rekamMedis->reservasi->nama_pasien }}"
                    readonly>
            </div>

            <div>
                <label><b>Pemilik Akun</b></label>

                <input
                    type="text"
                    value="{{ $rekamMedis->reservasi->pasien->nama_pasien }}"
                    readonly>
            </div>

            <div>
                <label><b>Tanggal Lahir</b></label>

                <input
                    type="text"
                    value="{{ $rekamMedis->reservasi->tanggal_lahir }}"
                    readonly>
            </div>

            <div>
                <label><b>Dokter</b></label>

                <input
                    type="text"
                    value="{{ $rekamMedis->dokter->nama_dokter }}"
                    readonly>
            </div>

            <div>
                <label><b>Layanan</b></label>

                <input
                    type="text"
                    value="{{ $rekamMedis->reservasi->layanan->nama_layanan }}"
                    readonly>
            </div>

            <div>
                <label><b>Keluhan</b></label>

                <textarea readonly rows="2">{{ $rekamMedis->reservasi->keluhan }}</textarea>
            </div>

        </div>

    </div>

    <form action="/rekam_medis/{{ $rekamMedis->id }}"
          method="POST">

        @csrf
        @method('PUT')

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
                    value="{{ $rekamMedis->tanggal_periksa }}"
                    required>

            </div>

            <div>

                <label><b>Biaya Pemeriksaan</b></label>

                <input
                    type="number"
                    name="biaya"
                    value="{{ $rekamMedis->biaya }}"
                    required>

            </div>

        </div>

        <label><b>Diagnosa</b></label>

        <textarea
            name="diagnosa"
            rows="4"
            required>{{ $rekamMedis->diagnosa }}</textarea>

        <label><b>Tindakan</b></label>

        <textarea
            name="tindakan"
            rows="4"
            required>{{ $rekamMedis->tindakan }}</textarea>

        <label><b>Resep Obat</b></label>

        <textarea
            name="resep_obat"
            rows="4">{{ $rekamMedis->resep_obat }}</textarea>

        <label><b>Catatan Tambahan</b></label>

        <textarea
            name="catatan"
            rows="4">{{ $rekamMedis->catatan }}</textarea>

        <div style="
            display:flex;
            gap:10px;
            margin-top:25px;
        ">

            <button
                type="submit"
                class="btn">
                Update
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

@endsection