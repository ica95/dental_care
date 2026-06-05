<h1>Tambah Layanan</h1>

<form action="/layanan"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <input type="text"
           name="nama_layanan"
           placeholder="Nama Layanan">

    <br><br>

    <textarea name="deskripsi"
              placeholder="Deskripsi"></textarea>

    <br><br>

    <input type="file"
           name="foto">

    <br><br>

    <button type="submit">
        Simpan
    </button>

</form>