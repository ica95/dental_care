<h1>Tambah Dokter</h1>

<form action="/dokter"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <input type="text"
           name="nama_dokter"
           placeholder="Nama Dokter">

    <br><br>

    <input type="file"
           name="foto">

    <br><br>

    <button type="submit">
        Simpan
    </button>

</form>