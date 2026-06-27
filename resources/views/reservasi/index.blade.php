@extends('layouts.pasien')

@section('title', 'Reservasi Saya')

@section('content')

<div class="card" style="
    border:1px solid #E9B8BA;
    box-shadow:0 10px 25px rgba(218,139,142,0.12);
">

    <div class="card-body">

        <h2 style="
            color:#C97A7D;
            text-align:center;
            margin-bottom:20px;
        ">
            Riwayat Reservasi
        </h2>

        <table style="
            width:100%;
            border-collapse:collapse;
            border-radius:15px;
            overflow:hidden;
        ">

            <thead>

                <tr style="background:#D47D82; color:white;">

                    <th>Dokter</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Keluhan</th>
                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

                @forelse($reservasis as $reservasi)

                <tr style="border-bottom:1px solid #F2D9DA;">

                    <td>
                        {{ $reservasi->dokter->nama_dokter }}
                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($reservasi->tanggal_reservasi)->locale('id')->translatedFormat('d F Y') }}
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
                                padding:6px 14px;
                                border-radius:20px;
                                font-weight:bold;
                            ">
                                Pending
                            </span>

                        @elseif($reservasi->status == 'diterima')

                            <span style="
                                background:#FCEEEF;
                                color:#C97A7D;
                                padding:6px 14px;
                                border-radius:20px;
                                font-weight:bold;
                            ">
                                Diterima
                            </span>

                        @elseif($reservasi->status == 'selesai')

                            <span style="
                                background:#E8F6F0;
                                color:#2F855A;
                                padding:6px 14px;
                                border-radius:20px;
                                font-weight:bold;
                            ">
                                Selesai
                            </span>

                        @else

                            <span style="
                                background:#FDECEC;
                                color:#C53030;
                                padding:6px 14px;
                                border-radius:20px;
                                font-weight:bold;
                            ">
                                Batal
                            </span>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" style="
                        text-align:center;
                        padding:20px;
                        color:#999;
                    ">
                        Belum ada reservasi
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection