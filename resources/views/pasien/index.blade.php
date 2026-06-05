<!DOCTYPE html>
<html>
<head>
    <title>Profil Pasien</title>
</head>
<body>

<h1>Profil Pasien</h1>

<p>
    Nama :
    {{ $pasien->nama_pasien }}
</p>

<p>
    Jenis Kelamin :
    {{ $pasien->jenis_kelamin }}
</p>

<p>
    Tanggal Lahir :
    {{ $pasien->tanggal_lahir }}
</p>

<p>
    Alamat :
    {{ $pasien->alamat }}
</p>

<p>
    No HP :
    {{ $pasien->no_hp }}
</p>

<a href="/pasien/{{ $pasien->id }}/edit">
    Edit Profil
</a>

</body>
</html>