@extends('layouts.admin')

@section('title', 'Data Dokter')

@section('content')

<div class="card">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

        <h2>Data Dokter</h2>

        <button class="btn"
        onclick="openModal()">
            + Tambah Dokter
        </button>

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

                    <button class="btn-edit"
                        onclick="openEditModal(
                            '{{ $dokter->id }}',
                            '{{ $dokter->nama_dokter }}'
                                        )">
                        Edit
                    </button>

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

<div id="modalDokter" class="modal">

    <div class="modal-content">

        <h2>Tambah Dokter</h2>

        <form action="{{ route('dokter.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label>Nama Dokter</label>
                <input type="text"
                       name="nama_dokter"
                       required>
            </div>

            <div class="form-group">
                <label>Foto Dokter</label>
                <input type="file"
                       name="foto">
            </div>

            <div class="button-group">

                <button type="submit"
                        class="btn">
                    Simpan
                </button>

                <button type="button"
                        class="btn-danger"
                        onclick="closeModal()">
                    Batal
                </button>

            </div>

        </form>

    </div>

</div>


@include('dokter.create')

@include('dokter.edit')

<script>

function openModal()
{
    document.getElementById('modalDokter').style.display = 'block';
}

function closeModal()
{
    document.getElementById('modalDokter').style.display = 'none';
}

function openEditModal(id, nama)
{
    document.getElementById('editModal').style.display = 'block';

    document.getElementById('edit_nama').value = nama;

    document.getElementById('editForm').action = '/dokter/' + id;
}

function closeEditModal()
{
    document.getElementById('editModal').style.display = 'none';
}

window.onclick = function(event)
{
    let tambahModal = document.getElementById('modalDokter');
    let editModal = document.getElementById('editModal');

    if(event.target == tambahModal)
    {
        tambahModal.style.display = 'none';
    }

    if(event.target == editModal)
    {
        editModal.style.display = 'none';
    }
}

</script>

@endsection