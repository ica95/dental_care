@extends('layouts.admin')

@section('title', 'Edit Rekam Medis')

@section('content')

<div class="card" style="max-width:900px;margin:auto;">

    <h2 style="
        color:#ff6b9a;
        margin-bottom:25px;
        border-bottom:2px solid #ffe0ea;
        padding-bottom:10px;
    ">
        Edit Rekam Medis
    </h2>

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

                <label><b>Biaya Pemeriksaan</b></label>

                <input type="number"
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
            margin-top:25px;
            display:flex;
            gap:10px;
        ">

            <button type="submit"
                    class="btn">
                Update
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