@extends('layouts.admin')

@section('title', 'Jadwal Dokter')

@section('content')

<div class="card">

<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

    <h2>Data Jadwal Dokter</h2>

    <button class="btn" onclick="openModal()">
        + Tambah Jadwal
    </button>

</div>

<table>

    <thead>

        <tr>
            <th>No</th>
            <th>Dokter</th>
            <th>Hari</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>Aksi</th>
        </tr>

    </thead>

    <tbody>

        @forelse($jadwals as $jadwal)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>
                {{ $jadwal->dokter->nama_dokter }}
            </td>

            <td>
                {{ $jadwal->hari }}
            </td>

            <td>
                {{ $jadwal->jam_mulai }}
            </td>

            <td>
                {{ $jadwal->jam_selesai }}
            </td>

            <td>

                <button class="btn-edit"
                    onclick="openEditModal(
                    '{{ $jadwal->id }}',
                    '{{ $jadwal->dokter_id }}',
                    '{{ $jadwal->hari }}',
                    '{{ $jadwal->jam_mulai }}',
                    '{{ $jadwal->jam_selesai }}'
                    )">
                        Edit
                </button>

                <form action="/jadwal_dokter/{{ $jadwal->id }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn-danger"
                            onclick="return confirm('Yakin ingin menghapus jadwal ini?')">
                        Hapus
                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="6" style="text-align:center;">
                Belum ada data jadwal dokter
            </td>

        </tr>

        @endforelse

    </tbody>

</table>

</div>
@include('jadwal_dokter.create')

@include('jadwal_dokter.edit')

<script>

function openModal()
{
    document.getElementById('modalJadwal').style.display = 'block';
}

function closeModal()
{
    document.getElementById('modalJadwal').style.display = 'none';
}

function openEditModal(id,dokter,hari,mulai,selesai)
{
    document.getElementById('editModal').style.display = 'block';

    document.getElementById('edit_dokter').value = dokter;
    document.getElementById('edit_hari').value = hari;
    document.getElementById('edit_mulai').value = mulai;
    document.getElementById('edit_selesai').value = selesai;

    document.getElementById('editForm').action =
        '/jadwal_dokter/' + id;
}

function closeEditModal()
{
    document.getElementById('editModal').style.display = 'none';
}

</script>

@endsection
