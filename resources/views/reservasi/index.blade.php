@extends('layouts.pasien')

@section('title', 'Reservasi Saya')

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

<div class="card" style="
    border:1px solid #E9B8BA;
    box-shadow:0 10px 25px rgba(218,139,142,.12);
">

    <div class="card-body">

        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;
            flex-wrap:wrap;
        ">

            <h2 style="color:#C97A7D;">
                Riwayat Reservasi
            </h2>

            <a href="/reservasi/create"
               class="btn"
               style="background:#DA8B8E;">
                + Reservasi Baru
            </a>

        </div>

        <table>

            <thead>

                <tr>

                    <th>Nama Pasien</th>
                    <th>Tanggal Lahir</th>
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
                        {{ $reservasi->nama_pasien }}
                    </td>
                    <td>
                        {{ $reservasi->tanggal_lahir }}
                    </td>

                    <td>
                        {{ $reservasi->dokter->nama_dokter }}
                    </td>

                    <td>
                        {{ $reservasi->layanan->nama_layanan }}
                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($reservasi->tanggal_reservasi)->translatedFormat('d F Y') }}
                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($reservasi->jam_reservasi)->format('H:i') }} WITA
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

                        @if($reservasi->status == 'pending')

                            <form action="/reservasi/{{ $reservasi->id }}/batal"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin membatalkan reservasi?')">

                                @csrf
                                @method('PUT')

                                <button
                                    type="submit"
                                    style="
                                        background:#dc3545;
                                        color:white;
                                        border:none;
                                        padding:8px 15px;
                                        border-radius:8px;
                                        cursor:pointer;
                                    ">
                                    Batalkan
                                </button>

                            </form>

                        @else

                            -

                        @endif

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8"
                        style="
                            text-align:center;
                            padding:20px;
                        ">

                        Belum ada reservasi.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection