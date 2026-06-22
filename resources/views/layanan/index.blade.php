@extends('layouts.admin')

@section('title', 'Data Layanan')

@section('content')

<div class="card">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

        <h2>Data Layanan</h2>

        <button class="btn" onclick="openModal()">
            + Tambah Layanan
        </button>

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
                    <div class="aksi-btn">

                        <button class="btn"
                        onclick="openEditModal(
                            '{{ $layanan->id }}',
                            '{{ $layanan->nama_layanan }}',
                            '{{ $layanan->deskripsi }}'
                        )">
                            Edit
                        </button>

                        <button type="submit"
                            class="btn btn-danger"
                            onclick="return confirm('Yakin ingin menghapus data layanan ini?')">
                            Hapus
                        </button>

                    </div>
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

    @include('layanan.create')
    @include('layanan.edit')

<script>

function openModal()
{
    document.getElementById('modalLayanan').style.display = 'block';
}

function closeModal()
{
    document.getElementById('modalLayanan').style.display = 'none';
}

function openEditModal(id,nama,deskripsi)
{
    document.getElementById('editModal').style.display = 'block';

    document.getElementById('edit_nama').value = nama;
    document.getElementById('edit_deskripsi').value = deskripsi;

    document.getElementById('editForm').action =
        '/layanan/' + id;
}

function closeEditModal()
{
    document.getElementById('editModal').style.display = 'none';
}

window.onclick = function(event)
{
    let modalTambah = document.getElementById('modalLayanan');
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