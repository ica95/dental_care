@extends('layouts.admin')

@section('title', 'Profil Klinik')

@section('content')

<div class="card">

<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

    <h2>🏥 Profil Klinik</h2>

    <a href="/profil_klinik/create"
       class="btn">
        + Tambah Profil Klinik
    </a>

</div>

<table>

    <thead>

        <tr>

            <th>No</th>
            <th>Logo</th>
            <th>Nama Klinik</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Deskripsi</th>
            <th>Aksi</th>

        </tr>

    </thead>

    <tbody>

        @forelse($profils as $profil)

        <tr>

            <td>
                {{ $loop->iteration }}
            </td>

            <td>

                @if($profil->logo)

                    <img
                        src="{{ asset('images/logo/'.$profil->logo) }}"
                        width="80"
                        style="border-radius:10px;">

                @else

                    Tidak ada logo

                @endif

            </td>

            <td>
                {{ $profil->nama_klinik }}
            </td>

            <td>
                {{ $profil->alamat }}
            </td>

            <td>
                {{ $profil->no_hp }}
            </td>

            <td>
                {{ $profil->email }}
            </td>

            <td>
                {{ $profil->deskripsi }}
            </td>

            <td>

                <a href="/profil_klinik/{{ $profil->id }}/edit"
                   class="btn">
                    Edit
                </a>

                <form action="/profil_klinik/{{ $profil->id }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn-danger"
                            onclick="return confirm('Yakin ingin menghapus profil klinik ini?')">
                        Hapus
                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="8" style="text-align:center;">
                Belum ada data profil klinik
            </td>

        </tr>

        @endforelse

    </tbody>

</table>

</div>

@endsection
