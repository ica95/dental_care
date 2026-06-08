@extends('layouts.admin')

@section('title', 'Edit Rekam Medis')

@section('content')

<div class="card" style="max-width:800px;margin:auto;">

    <h2>✏️ Edit Rekam Medis</h2>

    <form action="/rekam_medis/{{ $rekamMedis->id }}"
          method="POST">

        @csrf
        @method('PUT')

        <label>Diagnosa</label>

        <textarea name="diagnosa"
                  rows="3">{{ $rekamMedis->diagnosa }}</textarea>

        <br><br>

        <label>Tindakan</label>

        <textarea name="tindakan"
                  rows="3">{{ $rekamMedis->tindakan }}</textarea>

        <br><br>

        <label>Resep Obat</label>

        <textarea name="resep_obat"
                  rows="3">{{ $rekamMedis->resep_obat }}</textarea>

        <br><br>

        <label>Catatan</label>

        <textarea name="catatan"
                  rows="3">{{ $rekamMedis->catatan }}</textarea>

        <br><br>

        <label>Biaya</label>

        <input type="number"
               name="biaya"
               value="{{ $rekamMedis->biaya }}">

        <br><br>

        <button type="submit">
        Update
    </button>

    </form>

</div>

@endsection