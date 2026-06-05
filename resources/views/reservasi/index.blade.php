@extends('layouts.admin')

@section('title', 'Data Reservasi')

@section('content')

<div class="card">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

        <h2>📅 Data Reservasi</h2>

        <a href="/reservasi/create" class="btn">
            + Tambah Reservasi
        </a>

    </div>

    <table>

        <thead>

            <tr>
                <th>No</th>
                <th>Pasien</th>
                <th>Dokter</th>
                <th>Layanan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

            @forelse($reservasis as $reservasi)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $reservasi->pasien->nama_pasien }}</td>

                <td>{{ $reservasi->dokter->nama_dokter }}</td>

                <td>{{ $reservasi->layanan->nama_layanan }}</td>

                <td>{{ $reservasi->tanggal_reservasi }}</td>

                <td>{{ $reservasi->jam_reservasi }}</td>

                <td>

                    @if($reservasi->status == 'pending')
                        <span style="color:orange;font-weight:bold;">
                            Pending
                        </span>

                    @elseif($reservasi->status == 'diterima')
                        <span style="color:green;font-weight:bold;">
                            Diterima
                        </span>

                    @elseif($reservasi->status == 'selesai')
                        <span style="color:blue;font-weight:bold;">
                            Selesai
                        </span>

                    @else
                        <span style="color:red;font-weight:bold;">
                            Batal
                        </span>
                    @endif

                </td>

                <td>

                    <a href="/reservasi/{{ $reservasi->id }}/edit"
                       class="btn">
                        Edit
                    </a>

                    <form action="/reservasi/{{ $reservasi->id }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn-danger"
                                onclick="return confirm('Yakin ingin menghapus reservasi ini?')">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="8" style="text-align:center;">
                    Belum ada data reservasi
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection