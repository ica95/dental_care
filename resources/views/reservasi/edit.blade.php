@extends('layouts.admin')

@section('title', 'Edit Reservasi')

@section('content')

<div class="card" style="max-width:600px;margin:auto;">


<h2 style="margin-bottom:20px;color:#ff6b9a;">
     Edit Status Reservasi
</h2>

<form action="/reservasi/{{ $reservasi->id }}"
      method="POST">

    @csrf
    @method('PUT')

    <label>Status Reservasi</label>

    <select name="status" required>

        <option value="pending"
            {{ $reservasi->status == 'pending' ? 'selected' : '' }}>
            Pending
        </option>

        <option value="diterima"
            {{ $reservasi->status == 'diterima' ? 'selected' : '' }}>
            Diterima
        </option>

        <option value="selesai"
            {{ $reservasi->status == 'selesai' ? 'selected' : '' }}>
            Selesai
        </option>

        <option value="batal"
            {{ $reservasi->status == 'batal' ? 'selected' : '' }}>
            Batal
        </option>

    </select>

    <br>

    <button type="submit">
        Update Reservasi
    </button>

    <a href="/reservasi"
       style="
            display:inline-block;
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
