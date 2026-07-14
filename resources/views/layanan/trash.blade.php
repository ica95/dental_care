@extends('layouts.admin')

@section('title', 'Data Layanan Terhapus')

@section('content')

<div class="card">

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
    ">

        <h2>Data Layanan Terhapus</h2>

        <a href="{{ url('/layanan') }}" class="btn">
            Kembali
        </a>

    </div>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Foto</th>
                <th>Nama Layanan</th>
                <th>Biaya</th>
                <th>Dihapus Pada</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($layanans as $layanan)

            <tr>

                <td>
                    {{ $loop->iteration }}
                </td>

                <td>

                    @if($layanan->foto)

                        <img
                            src="{{ asset('images/layanan/'.$layanan->foto) }}"
                            width="90"
                            height="70"
                            style="
                                object-fit:cover;
                                border-radius:8px;
                            ">

                    @else

                        Tidak ada foto

                    @endif

                </td>

                <td>
                    {{ $layanan->nama_layanan }}
                </td>

                <td>
                    Rp {{ number_format($layanan->biaya,0,',','.') }}
                </td>

                <td>
                    {{ \Carbon\Carbon::parse($layanan->deleted_at)->translatedFormat('d F Y H:i') }}
                </td>

                <td>

                    <form
                        action="{{ url('/layanan/'.$layanan->id.'/restore') }}"
                        method="POST">

                        @csrf
                        @method('PUT')

                        <button
                            type="submit"
                            class="btn"
                            style="background:#28a745;">
                            Restore
                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" style="text-align:center;padding:25px;">
                    Tidak ada data layanan yang dihapus.
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection