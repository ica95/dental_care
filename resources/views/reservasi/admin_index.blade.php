@extends('layouts.admin')

@section('title', 'Data Reservasi')

@section('content')

@if(session('success'))
<div style="
    background:#FDF1F1;
    color:#C97A7D;
    padding:15px;
    border-radius:10px;
    margin-bottom:20px;
    border:1px solid #E9B8BA;
">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div style="
    background:#FDECEC;
    color:#C53030;
    padding:15px;
    border-radius:10px;
    margin-bottom:20px;
    border:1px solid #f5c2c7;
">
    {{ session('error') }}
</div>
@endif

<div class="card" style="
    box-shadow:0 8px 20px rgba(218,139,142,.12);
">

    <h2 style="
        color:#C97A7D;
        margin-bottom:20px;
    ">
        Data Reservasi
    </h2>

    <table>

        <thead>

            <tr>

                <th>Nama Pasien</th>
                <th>Tanggal Lahir</th>
                <th>Dokter</th>
                <th>Layanan</th>
                <th>Tanggal Reservasi</th>
                <th>Jam</th>
                <th>Keluhan</th>
                <th>Status</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

        @forelse($reservasis as $reservasi)

            <tr>

                <td>
                    {{ $reservasi->nama_pasien }}
                </td>

                <td>
                    {{ \Carbon\Carbon::parse($reservasi->tanggal_lahir)->translatedFormat('d F Y') }}
                </td>

                <td>
                    {{ $reservasi->dokter->nama_dokter }}
                </td>

                <td>
                    {{ optional($reservasi->layanan)->nama_layanan ?? '-' }}
                </td>

                <td>
                    {{ \Carbon\Carbon::parse($reservasi->tanggal_reservasi)->translatedFormat('d F Y') }}
                </td>

                <td>
                    {{ \Carbon\Carbon::parse($reservasi->jam_reservasi)->format('H:i') }}
                </td>

                <td>
                    {{ $reservasi->keluhan }}
                </td>

                <td>

                    @if($reservasi->status == 'pending')

                        <span style="
                            background:#FFF4E0;
                            color:#B7791F;
                            padding:6px 12px;
                            border-radius:20px;
                            font-weight:bold;
                        ">
                            Pending
                        </span>

                    @elseif($reservasi->status == 'diterima')

                        <span style="
                            background:#FCEEEF;
                            color:#C97A7D;
                            padding:6px 12px;
                            border-radius:20px;
                            font-weight:bold;
                        ">
                            Diterima
                        </span>

                    @elseif($reservasi->status == 'selesai')

                        <span style="
                            background:#E8F6F0;
                            color:#2F855A;
                            padding:6px 12px;
                            border-radius:20px;
                            font-weight:bold;
                        ">
                            Selesai
                        </span>

                    @elseif($reservasi->status == 'batal')

                        <span style="
                            background:#FDECEC;
                            color:#C53030;
                            padding:6px 12px;
                            border-radius:20px;
                            font-weight:bold;
                        ">
                            Dibatalkan
                        </span>

                    @endif

                </td>

                <td>
                    @if($reservasi->status == 'batal')

    <span style="
        color:#dc3545;
        font-weight:bold;
    ">
        Reservasi telah dibatalkan pasien
    </span>

@else

<form
    action="/admin/reservasi/{{ $reservasi->id }}"
    method="POST">

    @csrf
    @method('PUT')

    <select
        name="status"
        style="
            width:100%;
            margin-bottom:10px;
            border:1px solid #E9B8BA;
            border-radius:8px;
            padding:8px;
        ">

        <option
            value="pending"
            {{ $reservasi->status == 'pending' ? 'selected' : '' }}>
            Pending
        </option>

        <option
            value="diterima"
            {{ $reservasi->status == 'diterima' ? 'selected' : '' }}>
            Diterima
        </option>

        <option
            value="selesai"
            {{ $reservasi->status == 'selesai' ? 'selected' : '' }}>
            Selesai
        </option>

        <option
            value="batal"
            {{ $reservasi->status == 'batal' ? 'selected' : '' }}>
            Batal
        </option>

    </select>

    <button
        type="submit"
        class="btn"
        style="
            width:100%;
            background:#DA8B8E;
        ">
        Simpan
    </button>

</form>

@endif

                </td>

            </tr>

        @empty

            <tr>

                <td
                    colspan="9"
                    style="
                        text-align:center;
                        color:#999;
                        padding:20px;
                    ">

                    Belum ada data reservasi.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection