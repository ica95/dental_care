<h1>Data Dokter</h1>

<a href="{{ route('dokter.create') }}">
    Tambah Dokter
</a>

<hr>

@foreach ($dokters as $dokter)

    <div style="margin-bottom:20px;">

        <img src="{{ asset('images/dokter/' . $dokter->foto) }}"
             width="120">

        <h3>{{ $dokter->nama_dokter }}</h3>

        <!-- EDIT -->
        <a href="{{ route('dokter.edit', $dokter->id) }}">
            Edit
        </a>

        <!-- DELETE -->
        <form action="{{ route('dokter.destroy', $dokter->id) }}"
              method="POST"
              style="display:inline;">

            @csrf
            @method('DELETE')

            <button type="submit">
                Hapus
            </button>

        </form>

    </div>

@endforeach