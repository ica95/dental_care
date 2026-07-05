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
                     {{ \Carbon\Carbon::parse($reservasi->tanggal_reservasi)->locale('id')->translatedFormat('d F Y') }}
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
                            color:#B7791F;
                            background:#FFF4E0;
                            padding:6px 12px;
                            border-radius:20px;
                            font-weight:bold;
                        ">
                            Pending
                        </span>

                    @elseif($reservasi->status == 'diterima')

                        <span style="
                            color:#C97A7D;
                            background:#FCEEEF;
                            padding:6px 12px;
                            border-radius:20px;
                            font-weight:bold;
                        ">
                            Diterima
                        </span>

                    @elseif($reservasi->status == 'selesai')

                        <span style="
                            color:#2F855A;
                            background:#E8F6F0;
                            padding:6px 12px;
                            border-radius:20px;
                            font-weight:bold;
                        ">
                            Selesai
                        </span>

                    @elseif($reservasi->status == 'diperiksa')

                        <span style="
                            color:#6B46C1;
                            background:#F3E8FF;
                            padding:6px 12px;
                            border-radius:20px;
                            font-weight:bold;
                        ">
                            Diperiksa
                        </span>

                    @else

                        <span style="
                            color:#C53030;
                            background:#FDECEC;
                            padding:6px 12px;
                            border-radius:20px;
                            font-weight:bold;
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
                                border:1px solid #E9B8BA;
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
                            class="btn"
                            style="
                                width:100%;
                                background:#DA8B8E;
                            ">
                            Simpan
                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="8" style="
                    text-align:center;
                    color:#999;
                    padding:20px;
                ">
                    Belum ada data reservasi
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection