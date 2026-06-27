@extends('layouts.pasien')

@section('title', 'Reservasi Saya')

@section('content')

<div class="card">

    <div class="card-body">

        <h2 style="color:#ff6b9a;text-align:center;">
            Riwayat Reservasi
        </h2>

        <br>

        <table>

            <thead>

                <tr>

                    <th>Dokter</th>

                    <th>Tanggal</th>

                    <th>Jam</th>

                    <th>Keluhan</th>

                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

                @forelse($reservasis as $reservasi)

                <tr>

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
                                background:#fff3cd;
                                color:#856404;
                                padding:6px 12px;
                                border-radius:20px;
                                font-weight:bold;
                            ">
                                Pending
                            </span>

                        @elseif($reservasi->status == 'diterima')

                            <span style="
                                background:#d4edda;
                                color:#155724;
                                padding:6px 12px;
                                border-radius:20px;
                                font-weight:bold;
                            ">
                                Diterima
                            </span>

                        @elseif($reservasi->status == 'selesai')

                            <span style="
                                background:#d1ecf1;
                                color:#0c5460;
                                padding:6px 12px;
                                border-radius:20px;
                                font-weight:bold;
                            ">
                                Selesai
                            </span>

                        @else

                            <span style="
                                background:#f8d7da;
                                color:#721c24;
                                padding:6px 12px;
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

                    <td colspan="5">
                        Belum ada reservasi
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection