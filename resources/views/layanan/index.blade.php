@extends('layouts.admin')

@section('title', 'Data Layanan')

@section('content')

<div class="card">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

        <h2>Data Layanan</h2>

        <a href="/layanan/create"
           class="btn">
            + Tambah Layanan
        </a>

    </div>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Foto</th>
                <th>Nama Layanan</th>
                <th>Deskripsi</th>
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
                            width="100"
                            style="
                                border-radius:10px;
                                object-fit:cover;
                            ">

                    @else

                        Tidak ada foto

                    @endif

                </td>

                <td>
                    {{ $layanan->nama_layanan }}
                </td>

                <td>
                    {{ $layanan->deskripsi }}
                </td>

                <td>

                    <a href="/layanan/{{ $layanan->id }}/edit"
                       class="btn">
                        Edit
                    </a>

                    <form action="/layanan/{{ $layanan->id }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn-danger"
                                onclick="return confirm('Yakin ingin menghapus layanan ini?')">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="5"
                    style="text-align:center;">
                    Belum ada data layanan
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection