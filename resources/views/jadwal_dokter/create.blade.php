<h1>Tambah Jadwal Dokter</h1>

<form action="{{ route('jadwal_dokter.store') }}" method="POST">

    @csrf

    <label>Dokter</label>
    <select name="dokter_id">
        @foreach ($dokters as $dokter)
            <option value="{{ $dokter->id }}">
                {{ $dokter->nama_dokter }}
            </option>
        @endforeach
    </select>

    <br><br>

    <label>Hari</label>
    <input type="text" name="hari">

    <br><br>

    <label>Jam Mulai</label>
    <input type="time" name="jam_mulai">

    <br><br>

    <label>Jam Selesai</label>
    <input type="time" name="jam_selesai">

    <br><br>

    <button type="submit">Simpan</button>

</form>