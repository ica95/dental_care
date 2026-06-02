<h1>Edit Dokter</h1>

<form action="{{ route('dokter.update', $dokter->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <label>Nama Dokter</label>
    <br>

    <input type="text"
           name="nama_dokter"
           value="{{ $dokter->nama_dokter }}">

    <br><br>

    <label>Foto Saat Ini</label>
    <br>

    @if ($dokter->foto)
        <img src="{{ asset('images/dokter/' . $dokter->foto) }}"
             width="150">
    @else
        <p>Foto belum ada</p>
    @endif

    <br><br>

    <label>Upload Foto Baru</label>
    <br>

    <input type="file" name="foto">

    <br><br>

    <button type="submit">
        Update
    </button>

</form>