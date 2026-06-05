@extends('layouts.admin')

@section('title', 'Jadwal Dokter')

@section('content')

<div class="card">

```
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

    <h2>📅 Data Jadwal Dokter</h2>

    <a href="/jadwal_dokter/create" class="btn">
        + Tambah Jadwal
    </a>

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

                <a href="/jadwal_dokter/{{ $jadwal->id }}/edit"
                   class="btn">
                    Edit
                </a>

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
```

</div>

@endsection
