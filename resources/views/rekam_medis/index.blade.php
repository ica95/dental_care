@extends('layouts.admin')

@section('title', 'Data Rekam Medis')

@section('content')

<div class="card">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

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
                <th>Dokter</th>
                <th>Reservasi</th>
                <th>Tanggal Periksa</th>
                <th>Diagnosa</th>
                <th>Tindakan</th>
                <th>Resep Obat</th>
                <th>Catatan</th>
                <th>Biaya</th>
            </tr>

        </thead>

        <tbody>

            @forelse($rekamMedis as $data)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $data->pasien->nama_pasien ?? '-' }}</td>

                <td>{{ $data->dokter->nama_dokter ?? '-' }}</td>

                <td>#{{ $data->reservasi_id }}</td>

                <td>{{ $data->tanggal_periksa }}</td>

                <td>{{ $data->diagnosa }}</td>

                <td>{{ $data->tindakan }}</td>

                <td>{{ $data->resep_obat }}</td>

                <td>{{ $data->catatan }}</td>

                <td>Rp {{ number_format($data->biaya,0,',','.') }}</td>
                <td>

    <a href="/rekam_medis/{{ $data->id }}/edit"
       class="btn">
        Edit
    </a>

</td>
            </tr>

            @empty

            <tr>

                <td colspan="9" style="text-align:center;">
                    Belum ada data rekam medis
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection