<h1>Edit Jadwal Dokter</h1>

<form action="/jadwal_dokter/{{ $jadwal->id }}"
      method="POST">

    @csrf
    @method('PUT')

    <select name="dokter_id">

        @foreach($dokters as $dokter)

            <option
                value="{{ $dokter->id }}"
                {{ $jadwal->dokter_id == $dokter->id ? 'selected' : '' }}>

                {{ $dokter->nama_dokter }}

            </option>

        @endforeach

    </select>

    <br><br>

    <input type="text"
           name="hari"
           value="{{ $jadwal->hari }}">

    <br><br>

    <input type="time"
           name="jam_mulai"
           value="{{ $jadwal->jam_mulai }}">

    <br><br>

    <input type="time"
           name="jam_selesai"
           value="{{ $jadwal->jam_selesai }}">

    <br><br>

    <button type="submit">
        Update
    </button>

</form>