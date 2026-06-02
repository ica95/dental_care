<h1>Jadwal Dokter</h1>

<a href="/jadwal_dokter/create">Tambah</a>

<table border="1">
    <tr>
        <th>Dokter</th>
        <th>Hari</th>
        <th>Jam</th>
    </tr>

    @foreach ($jadwals as $jadwal)
    <tr>
        <td>{{ $jadwal->dokter->nama_dokter }}</td>
        <td>{{ $jadwal->hari }}</td>
        <td>{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
    </tr>
    @endforeach
</table>