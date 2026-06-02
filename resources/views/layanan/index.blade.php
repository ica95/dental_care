<h1>Data Layanan</h1>

<a href="{{ route('layanan.create') }}">Tambah Layanan</a>

<hr>

@foreach ($layanans as $layanan)

    <div style="margin-bottom:20px;">

        <img src="{{ asset('images/layanan/' . $layanan->foto) }}" width="120">

        <h3>{{ $layanan->nama_layanan }}</h3>

        <p>{{ $layanan->deskripsi }}</p>

        <p>Rp {{ number_format($layanan->biaya) }}</p>

        <a href="{{ route('layanan.edit', $layanan->id) }}">Edit</a>

        <form action="{{ route('layanan.destroy', $layanan->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">Hapus</button>
        </form>

    </div>

@endforeach