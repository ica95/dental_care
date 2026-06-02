<h1>Edit Layanan</h1>

<form action="{{ route('layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <label>Nama Layanan</label>
    <br>
    <input type="text" name="nama_layanan" value="{{ $layanan->nama_layanan }}">
    <br><br>

    <label>Biaya</label>
    <br>
    <input type="number" name="biaya" value="{{ $layanan->biaya }}">
    <br><br>

    <label>Deskripsi</label>
    <br>
    <textarea name="deskripsi">{{ $layanan->deskripsi }}</textarea>
    <br><br>

    <label>Foto Saat Ini</label>
    <br>
    @if ($layanan->foto)
        <img src="{{ asset('images/layanan/' . $layanan->foto) }}" width="120">
    @else
        <p>Tidak ada foto</p>
    @endif

    <br><br>

    <label>Upload Foto Baru</label>
    <br>
    <input type="file" name="foto">
    <br><br>

    <button type="submit">Update</button>

</form>