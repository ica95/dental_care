@extends('layouts.admin')

@section('title', 'Data Reservasi')

@section('content')

@if(session('success'))

<div style="
    background:#d4edda;
    color:#155724;
    padding:15px;
    border-radius:10px;
    margin-bottom:20px;
">
    {{ session('success') }}
</div>

@endif

<a href="/reservasi/create"
   class="btn"
   style="margin-bottom:20px;">
    + Tambah Reservasi
</a>

<table>

    <thead>

        <tr>

            <th>Pasien</th>

            <th>Dokter</th>

            <th>Layanan</th>

            <th>Tanggal</th>

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
                {{ $reservasi->pasien->nama_pasien }}
            </td>

            <td>
                {{ $reservasi->dokter->nama_dokter }}
            </td>

            <td>
                {{ $reservasi->layanan->nama_layanan }}
            </td>

            <td>
                {{ $reservasi->tanggal_reservasi }}
            </td>

            <td>
                {{ $reservasi->jam_reservasi }}
            </td>

            <td>
                {{ $reservasi->keluhan }}
            </td>

            <td>

                @if($reservasi->status == 'pending')

                    <span style="
                        color:#856404;
                        background:#fff3cd;
                        padding:5px 10px;
                        border-radius:20px;
                    ">
                        Pending
                    </span>

                @elseif($reservasi->status == 'diterima')

                    <span style="
                        color:#155724;
                        background:#d4edda;
                        padding:5px 10px;
                        border-radius:20px;
                    ">
                        Diterima
                    </span>

                @elseif($reservasi->status == 'selesai')

                    <span style="
                        color:#0c5460;
                        background:#d1ecf1;
                        padding:5px 10px;
                        border-radius:20px;
                    ">
                        Selesai
                    </span>

                @else

                    <span style="
                        color:#721c24;
                        background:#f8d7da;
                        padding:5px 10px;
                        border-radius:20px;
                    ">
                        Batal
                    </span>

                @endif

            </td>

            <td>

                <form
                    action="/admin/reservasi/{{ $reservasi->id }}"
                    method="POST">

                    @csrf

                    @method('PUT')

                    <select
                        name="status"
                        style="
                            margin-bottom:10px;
                            width:100%;
                        ">

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

                    <button
                        type="submit"
                        class="btn">
                        Simpan
                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="8">
                Belum ada data reservasi
            </td>

        </tr>

        @endforelse

    </tbody>

</table>

@endsection