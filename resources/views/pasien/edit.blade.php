<!DOCTYPE html>
<html>
<head>
    <title>Edit Profil</title>
</head>
<body>

<h1>Edit Profil</h1>

<form
action="/pasien/{{ $pasien->id }}"
method="POST">

    @csrf
    @method('PUT')

    <input
        type="text"
        name="nama_pasien"
        value="{{ $pasien->nama_pasien }}"
        placeholder="Nama">

    <br><br>

    <select name="jenis_kelamin">

        <option value="Laki-laki">
            Laki-laki
        </option>

        <option value="Perempuan">
            Perempuan
        </option>

    </select>

    <br><br>

    <input
        type="date"
        name="tanggal_lahir"
        value="{{ $pasien->tanggal_lahir }}">

    <br><br>

    <textarea
        name="alamat">{{ $pasien->alamat }}</textarea>

    <br><br>

    <input
        type="text"
        name="no_hp"
        value="{{ $pasien->no_hp }}">

    <br><br>

    <button type="submit">
        Simpan
    </button>

</form>

</body>
</html>