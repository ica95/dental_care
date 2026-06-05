@extends('layouts.admin')

@section('title', 'Data Dokter')

@section('content')

<div class="card">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

        <h2>👨‍⚕️ Data Dokter</h2>

        <a href="{{ route('dokter.create') }}"
           class="btn">
            + Tambah Dokter
        </a>

    </div>

    <table>

        <thead>

            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Dokter</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

            @forelse($dokters as $dokter)

            <tr>

                <td>
                    {{ $loop->iteration }}
                </td>

                <td>

                    @if($dokter->foto)

                        <img
                            src="{{ asset('images/dokter/'.$dokter->foto) }}"
                            width="80"
                            style="
                                border-radius:10px;
                                object-fit:cover;
                            ">

                    @else

                        Tidak ada foto

                    @endif

                </td>

                <td>
                    {{ $dokter->nama_dokter }}
                </td>

                <td>

                    <a href="{{ route('dokter.edit', $dokter->id) }}"
                       class="btn">
                        Edit
                    </a>

                    <form action="{{ route('dokter.destroy', $dokter->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn-danger"
                                onclick="return confirm('Yakin ingin menghapus dokter ini?')">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="4" style="text-align:center;">
                    Belum ada data dokter
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection