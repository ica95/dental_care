@extends('layouts.admin')

@section('title', 'Data Rekam Medis')

@section('content')

<div class="card">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

        <h2>📋 Data Rekam Medis</h2>

        <a href="/rekam_medis/create"
           class="btn">
            + Tambah Rekam Medis
        </a>

    </div>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Pasien</th>
                <th>Dokter</th>
                <th>Tanggal</th>
                <th>Diagnosa</th>
                <th>Tindakan</th>

            </tr>

        </thead>

        <tbody>

            @forelse($rekamMedis as $data)

            <tr>

                <td>
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $data->pasien->nama_pasien }}
                </td>

                <td>
                    {{ $data->dokter->nama_dokter }}
                </td>

                <td>
                    {{ $data->tanggal_periksa }}
                </td>

                <td>
                    {{ $data->diagnosa }}
                </td>

                <td>
                    {{ $data->tindakan }}
                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" style="text-align:center;">
                    Belum ada data rekam medis
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection