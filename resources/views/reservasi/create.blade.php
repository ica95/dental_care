@extends('layouts.pasien')

@section('title', 'Buat Reservasi')

@section('content')

<div class="card">

    <div class="card-body">

        <h2 style="color:#ff6b9a;">
            🦷 Form Reservasi
        </h2>
@if(session('error'))
    <div style="
        background:#f8d7da;
        color:#721c24;
        padding:10px;
        border-radius:8px;
        margin-bottom:15px;
    ">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div style="
        background:#d4edda;
        color:#155724;
        padding:10px;
        border-radius:8px;
        margin-bottom:15px;
    ">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div style="
        background:#fff3cd;
        color:#856404;
        padding:10px;
        border-radius:8px;
        margin-bottom:15px;
    ">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <br>

        <form action="/reservasi" method="POST">

            @csrf

            <label>Tanggal Reservasi</label>

<input
    type="date"
    name="tanggal_reservasi"
    id="tanggal_reservasi"
    required>

<br><br>

<label>Dokter</label>

<select
    name="dokter_id"
    id="dokter_id"
    required>

    <option value="">
        Pilih Dokter
    </option>

    @foreach($dokters as $dokter)

        <option value="{{ $dokter->id }}">
            {{ $dokter->nama_dokter }}
        </option>

    @endforeach

</select>

<br><br>

<label>Layanan</label>

<select name="layanan_id" required>

    <option value="">
        Pilih Layanan
    </option>

    @foreach($layanans as $layanan)

        <option value="{{ $layanan->id }}">
            {{ $layanan->nama_layanan }}
        </option>

    @endforeach

</select>

<br><br>

<label>Jam Reservasi</label>

<select
    name="jam_reservasi"
    id="jam_reservasi"
    required>

    <option value="">
        Pilih Jam
    </option>

</select>

<br><br>

<label>Keluhan</label>

<textarea
    name="keluhan"
    rows="5"
    required></textarea>

            <br><br>

            <button
                type="submit"
                class="btn">

                Simpan Reservasi

            </button>

        </form>

    </div>

</div>
<script>

document.addEventListener(
    'DOMContentLoaded',
    function(){

        const dokter =
            document.getElementById(
                'dokter_id'
            );

        const tanggal =
            document.getElementById(
                'tanggal_reservasi'
            );

        const jam =
            document.getElementById(
                'jam_reservasi'
            );

        function loadJam()
        {
            if(
                dokter.value == '' ||
                tanggal.value == ''
            ){
                return;
            }

            fetch(
                '/jadwal-dokter/'
                + dokter.value
                + '/'
                + tanggal.value
            )

            .then(response =>
                response.json()
            )

            .then(data => {

                jam.innerHTML =
                '<option value="">Pilih Jam</option>';

                data.forEach(function(item){

                    jam.innerHTML +=
                    '<option value="'+item+'">'
                    + item +
                    '</option>';

                });

            });
        }

        dokter.addEventListener(
            'change',
            loadJam
        );

        tanggal.addEventListener(
            'change',
            loadJam
        );

    }
);

</script>
@endsection