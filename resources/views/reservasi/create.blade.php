@extends('layouts.pasien')

@section('title', 'Form Reservasi')

@section('content')

<div class="card" style="
    max-width:750px;
    margin:auto;
    background:white;
    padding:30px;
    border-radius:20px;
    border:1px solid #E9B8BA;
    box-shadow:0 10px 25px rgba(218,139,142,0.12);
">

    <h2 style="
        color:#C97A7D;
        margin-bottom:25px;
        text-align:center;
        font-size:30px;
    ">
        Form Reservasi
    </h2>

    {{-- ERROR --}}
    @if(session('error'))
        <div style="
            background:#FFECEC;
            color:#C97A7D;
            padding:15px;
            border-radius:10px;
            margin-bottom:20px;
            border:1px solid #E9B8BA;
        ">
            {{ session('error') }}
        </div>
    @endif

    {{-- VALIDATION --}}
    @if ($errors->any())
        <div style="
            background:#FFF6F6;
            color:#C97A7D;
            padding:15px;
            border-radius:10px;
            margin-bottom:20px;
            border:1px solid #E9B8BA;
        ">
            @foreach ($errors->all() as $error)
                <p style="margin:5px 0;">
                    {{ $error }}
                </p>
            @endforeach
        </div>
    @endif

    <form action="/reservasi" method="POST">
        @csrf

        {{-- TANGGAL --}}
        <label style="color:#C97A7D; font-weight:bold;">
            Tanggal Reservasi
        </label>

        <input
            type="date"
            name="tanggal_reservasi"
            id="tanggal"
            min="{{ date('Y-m-d') }}"
            required
            style="border:1px solid #E9B8BA;">

        {{-- DOKTER --}}
        <label style="color:#C97A7D; font-weight:bold;">
            Dokter
        </label>

        <select
            name="dokter_id"
            id="dokter"
            required
            style="border:1px solid #E9B8BA;">

            <option value="">
                Pilih Dokter
            </option>

        </select>

        {{-- LAYANAN --}}
        <label style="color:#C97A7D; font-weight:bold;">
            Layanan
        </label>

        <select
            name="layanan_id"
            required
            style="border:1px solid #E9B8BA;">

            <option value="">
                Pilih Layanan
            </option>

            @foreach($layanans as $layanan)
                <option value="{{ $layanan->id }}">
                    {{ $layanan->nama_layanan }}
                </option>
            @endforeach

        </select>

        {{-- JAM --}}
        <label style="color:#C97A7D; font-weight:bold;">
            Jam Reservasi
        </label>

        <select
            name="jam_reservasi"
            id="jam"
            required
            style="border:1px solid #E9B8BA;">

            <option value="">
                Pilih Jam
            </option>

        </select>

        {{-- KELUHAN --}}
        <label style="color:#C97A7D; font-weight:bold;">
            Keluhan
        </label>

        <textarea
            name="keluhan"
            rows="4"
            placeholder="Masukkan keluhan"
            required
            style="border:1px solid #E9B8BA;"></textarea>

        <div style="
            display:flex;
            gap:10px;
            margin-top:20px;
        ">

            <button
                type="submit"
                style="
                    flex:1;
                    background:#DA8B8E;
                    color:white;
                    border:none;
                    padding:14px;
                    border-radius:10px;
                    font-weight:bold;
                    cursor:pointer;
                ">
                Simpan Reservasi
            </button>

            <a href="/reservasi"
               style="
                    flex:1;
                    text-align:center;
                    background:#F7EAEA;
                    color:#C97A7D;
                    padding:14px;
                    border-radius:10px;
                    text-decoration:none;
                    font-weight:bold;
               ">
                Kembali
            </a>

        </div>

    </form>

</div>

<script>

// PILIH TANGGAL
document.getElementById('tanggal')
.addEventListener('change', function(){

    let tanggal = this.value;

    let dokterSelect =
        document.getElementById('dokter');

    let jamSelect =
        document.getElementById('jam');

    dokterSelect.innerHTML =
        '<option value="">Pilih Dokter</option>';

    jamSelect.innerHTML =
        '<option value="">Pilih Jam</option>';

    fetch('/get-dokter/' + tanggal)
        .then(response => response.json())
        .then(data => {

            if(data.length == 0)
            {
                dokterSelect.innerHTML +=
                '<option disabled>Tidak ada dokter praktik</option>';
            }

            data.forEach(dokter => {

                dokterSelect.innerHTML += `
                    <option value="${dokter.id}">
                        ${dokter.nama_dokter}
                        (${dokter.hari})
                        ${dokter.jam_mulai.substring(0,5)}
                        - ${dokter.jam_selesai.substring(0,5)}
                    </option>
                `;

            });

        });

});

// PILIH DOKTER
document.getElementById('dokter')
.addEventListener('change', function(){

    let dokterId = this.value;
    let tanggal =
        document.getElementById('tanggal').value;

    let jamSelect =
        document.getElementById('jam');

    jamSelect.innerHTML =
        '<option value="">Pilih Jam</option>';

    fetch('/get-jadwal/' + dokterId + '/' + tanggal)
        .then(response => response.json())
        .then(data => {

            if(data.length == 0)
            {
                jamSelect.innerHTML +=
                '<option disabled>Jam sudah penuh</option>';
            }

            data.forEach(jam => {

                jamSelect.innerHTML += `
                    <option value="${jam}">
                        ${jam}
                    </option>
                `;

            });

        });

});

</script>

@endsection