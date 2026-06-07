@extends('layouts.pasien')

@section('content')

<div class="hero">

<h1>
    Senyum Sehat Dimulai Dari Sini
</h1>

<p>
    Klinik gigi terpercaya dengan pelayanan profesional
    dan dokter berpengalaman.
</p>

@guest

    <a href="/login">
        Login Untuk Reservasi
    </a>

@endguest

@auth

    <a href="/reservasi/create">
        Reservasi Sekarang
    </a>

@endauth


</div>

<section id="layanan">

<h2>Layanan Kami</h2>

<div class="cards">

    @foreach($layanans as $layanan)

    <div class="card">

        @if($layanan->foto)

            <img src="{{ asset('images/layanan/'.$layanan->foto) }}"
                 alt="{{ $layanan->nama_layanan }}">

        @endif

        <h3>{{ $layanan->nama_layanan }}</h3>

        <p>{{ $layanan->deskripsi }}</p>

    </div>

    @endforeach

</div>

</section>

<section id="dokter">

<h2>Dokter Kami</h2>

<div class="cards">

    @foreach($dokters as $dokter)

    <div class="card">

        @if($dokter->foto)

            <img src="{{ asset('images/dokter/'.$dokter->foto) }}"
                 alt="{{ $dokter->nama_dokter }}">

        @endif

        <h3>{{ $dokter->nama_dokter }}</h3>

    </div>

    @endforeach

</div>

</section>

<section id="jadwal">


<h2>Jadwal Dokter</h2>

<table>

    <tr>

        <th>Dokter</th>
        <th>Hari</th>
        <th>Jam Mulai</th>
        <th>Jam Selesai</th>

    </tr>

    @foreach($jadwals as $jadwal)

    <tr>

        <td>{{ $jadwal->dokter->nama_dokter }}</td>
        <td>{{ $jadwal->hari }}</td>
        <td>{{ $jadwal->jam_mulai }}</td>
        <td>{{ $jadwal->jam_selesai }}</td>

    </tr>

    @endforeach

</table>

</section>

<section id="profil">

```
<h2>Profil Klinik</h2>

<div class="profil">

    @if($profil && $profil->logo)

        <img src="{{ asset('images/logo/'.$profil->logo) }}"
             alt="Logo Klinik">

    @endif

    <h3>
        {{ $profil->nama_klinik ?? 'Dental Care' }}
    </h3>

    <br>

    <p>
        <strong>Alamat :</strong>
        {{ $profil->alamat ?? '-' }}
    </p>

    <br>

    <p>
        <strong>No HP :</strong>
        {{ $profil->no_hp ?? '-' }}
    </p>

    <br>

    <p>
        <strong>Email :</strong>
        {{ $profil->email ?? '-' }}
    </p>

    <br>

    <p>
        <strong>Deskripsi :</strong>
        {{ $profil->deskripsi ?? '-' }}
    </p>

</div>


</section>

@endsection
