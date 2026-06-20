@extends('layouts.admin')

@section('title', 'Data Pasien')

@section('content')

<div class="card">

    <h2 style="
        color:#ff6b9a;
        margin-bottom:20px;
    ">
        Data Pasien
    </h2>

    <table>

        <tr>
            <th>No</th>
            <th>Nama Pasien</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>No HP</th>
        </tr>

        @foreach($pasiens as $index => $pasien)

        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $pasien->nama_pasien }}</td>
            <td>{{ $pasien->jenis_kelamin }}</td>
            <td>{{ $pasien->tanggal_lahir }}</td>
            <td>{{ $pasien->alamat }}</td>
            <td>{{ $pasien->no_hp }}</td>
        </tr>

        @endforeach

    </table>

</div>

@endsection