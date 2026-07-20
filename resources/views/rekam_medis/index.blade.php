@extends('layouts.admin')

@section('title', 'Data Rekam Medis')

@section('content')

<div class="card">

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
        flex-wrap:wrap;
        gap:10px;
    ">

        <h2>Data Rekam Medis</h2>

        <a href="/rekam_medis/create" class="btn">
            + Tambah Rekam Medis
        </a>

    </div>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Pasien</th>
                <th>Pemilik Akun</th>
                <th>Dokter</th>
                <th>Layanan</th>
                <th>Tanggal Periksa</th>
                <th>Biaya</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

        @forelse($rekamMedis as $data)

            <tr>

                <td>{{ $loop->iteration }}</td>

                {{-- Nama pasien yang diperiksa --}}
                <td>
                    {{ $data->reservasi->nama_pasien ?? '-' }}
                </td>

                {{-- Nama akun yang melakukan reservasi --}}
                <td>
                    {{ $data->reservasi->pasien->nama_pasien ?? '-' }}
                </td>

                <td>
                    {{ $data->dokter->nama_dokter ?? '-' }}
                </td>

                <td>
                    {{ $data->reservasi->layanan->nama_layanan ?? '-' }}
                </td>

                <td>
                    {{ \Carbon\Carbon::parse($data->tanggal_periksa)->translatedFormat('d F Y') }}
                </td>

                <td>
                    Rp {{ number_format($data->biaya,0,',','.') }}
                </td>

                <td>

                    <div style="
                        display:flex;
                        justify-content:center;
                        gap:10px;
                        flex-wrap:wrap;
                    ">

                        <a
                            href="/rekam_medis/{{ $data->id }}"
                            class="btn"
                            style="background:#17a2b8;">
                            Detail
                        </a>

                        <a
                            href="/rekam_medis/{{ $data->id }}/edit"
                            class="btn">
                            Edit
                        </a>

                    </div>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="8" style="text-align:center;padding:20px;">
                    Belum ada data rekam medis.
                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection