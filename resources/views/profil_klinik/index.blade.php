@extends('layouts.admin')

@section('title', 'Profil Klinik')

@section('content')

<div class="card">

<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

    <h2>Profil Klinik</h2>

    <button class="btn"
            onclick="openModal()">
        + Tambah Profil
    </button>

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

            <div style="display:flex; gap:10px;">

                <button class="btn-edit"
                    onclick="openEditModal(
                    '{{ $profil->id }}',
                    '{{ $profil->nama_klinik }}',
                    '{{ $profil->alamat }}',
                    '{{ $profil->no_hp }}',
                    '{{ $profil->email }}',
                    `{{ $profil->deskripsi }}`
                    )">
                    Edit
                </button>

                <form action="/profil_klinik/{{ $profil->id }}"
                    method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn-danger"
                            onclick="return confirm('Yakin ingin menghapus profil klinik ini?')">
                        Hapus
                    </button>

                </form>

            </div>

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

@include('profil_klinik.create')
@include('profil_klinik.edit')

<script>

function openModal()
{
    document.getElementById('modalProfil').style.display = 'block';
}

function closeModal()
{
    document.getElementById('modalProfil').style.display = 'none';
}

function openEditModal(
    id,
    nama,
    alamat,
    no_hp,
    email,
    deskripsi
)
{
    document.getElementById('editModal').style.display = 'block';

    document.getElementById('edit_nama_klinik').value = nama;
    document.getElementById('edit_alamat').value = alamat;
    document.getElementById('edit_no_hp').value = no_hp;
    document.getElementById('edit_email').value = email;
    document.getElementById('edit_deskripsi').value = deskripsi;

    document.getElementById('editForm').action =
        '/profil_klinik/' + id;
}

function closeEditModal()
{
    document.getElementById('editModal').style.display = 'none';
}

window.onclick = function(event)
{
    let modalTambah = document.getElementById('modalProfil');
    let modalEdit = document.getElementById('editModal');

    if(event.target == modalTambah)
    {
        modalTambah.style.display = 'none';
    }

    if(event.target == modalEdit)
    {
        modalEdit.style.display = 'none';
    }
}

</script>

@endsection
