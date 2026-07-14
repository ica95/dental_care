@extends('layouts.admin')

@section('title', 'Data Layanan')

@section('content')

@if(session('success'))
<div style="background:#d4edda;color:#155724;padding:15px;border-radius:10px;margin-bottom:20px;">
    {{ session('success') }}
</div>
@endif

<div class="card">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;flex-wrap:wrap;gap:10px;">

        <h2>Data Layanan</h2>

        <div style="display:flex;gap:10px;">

            <a href="{{ route('layanan.trash') }}" class="btn" style="background:#6c757d;">
                Data Terhapus
            </a>

            <button class="btn" onclick="openModal()">
                + Tambah Layanan
            </button>

        </div>

    </div>

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Layanan</th>
                <th>Biaya</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($layanans as $layanan)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>

                @if($layanan->foto)

                    <img src="{{ asset('images/layanan/'.$layanan->foto) }}"
                         width="90"
                         style="border-radius:10px;object-fit:cover;">

                @else

                    Tidak ada foto

                @endif

            </td>

            <td>{{ $layanan->nama_layanan }}</td>

            <td>Rp {{ number_format($layanan->biaya,0,',','.') }}</td>

            <td>

                <div style="display:flex;justify-content:center;gap:10px;flex-wrap:wrap;">

                    <button
                        class="btn"
                        onclick="openEditModal(
                            '{{ $layanan->id }}',
                            @js($layanan->nama_layanan),
                            '{{ $layanan->biaya }}',
                            @js($layanan->foto)
                        )">
                        Edit
                    </button>

                    <form
                        action="{{ route('layanan.destroy',$layanan->id) }}"
                        method="POST"
                        onsubmit="return confirm('Layanan ini akan dipindahkan ke Data Terhapus. Lanjutkan?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            style="background:#dc3545;color:white;border:none;padding:12px 18px;border-radius:10px;cursor:pointer;">
                            Hapus
                        </button>

                    </form>

                </div>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="5" style="text-align:center;padding:20px;">
                Belum ada data layanan.
            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>

@include('layanan.create')
@include('layanan.edit')

<script>

function openModal(){
    document.getElementById('modalLayanan').style.display='block';
}

function closeModal(){
    document.getElementById('modalLayanan').style.display='none';
}

function openEditModal(id,nama,biaya,foto){

    document.getElementById('editModal').style.display='block';

    document.getElementById('edit_nama').value=nama;
    document.getElementById('edit_biaya').value=biaya;

    document.getElementById('editForm').action='/layanan/'+id;

    let preview=document.getElementById('edit_foto_preview');

    if(foto){
        preview.src='/images/layanan/'+foto;
        preview.style.display='block';
    }else{
        preview.style.display='none';
    }

}

function closeEditModal(){
    document.getElementById('editModal').style.display='none';
}

window.onclick=function(event){

    let tambah=document.getElementById('modalLayanan');
    let edit=document.getElementById('editModal');

    if(event.target==tambah){
        tambah.style.display='none';
    }

    if(event.target==edit){
        edit.style.display='none';
    }

}

</script>

@endsection