<h1>Tambah Layanan</h1>

<form action="{{ route('layanan.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <label>Nama Layanan</label>
    <br>
    <input type="text" name="nama_layanan" placeholder="Nama layanan">
    <br><br>

    <label>Biaya</label>
    <br>
    <input type="number" name="biaya" placeholder="Biaya layanan">
    <br><br>

    <label>Deskripsi</label>
    <br>
    <textarea name="deskripsi" placeholder="Deskripsi layanan"></textarea>
    <br><br>

    <label>Foto</label>
    <br>
    <input type="file" name="foto">
    <br><br>

    <button type="submit">Simpan</button>

</form>