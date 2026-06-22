@extends('layouts.guest')

@section('title','Home')

@section('content')

<!-- HERO -->
<section id="beranda" class="hero">

    <div class="hero-content">

        <h1>
            Lumine Dental Care
        </h1>

        <p>
            Senyum Sehat, Percaya Diri Meningkat
        </p>

    <div class="hero-contact">

        <p>
            <i class="fa-brands fa-instagram"></i>
            Instagram : @luminedental_care
        </p>

        <p>
            <i class="fa-brands fa-tiktok"></i>
            TikTok : @lumine.dental.care
        </p>

        <p>
            <i class="fa-brands fa-whatsapp"></i>
            Kontak Kami : 081772862667
        </p>

    </div>

    </div>

</section>

<!-- TENTANG -->
<section id="tentang">

    <h2>
        Tentang Kami
    </h2>

    <div class="card">

        <div class="card-body">

            <p style="
                text-align:center;
                line-height:1.8;
                font-size:18px;
            ">

                Lumine Dental Care adalah klinik gigi yang menyediakan
                pelayanan kesehatan gigi profesional dengan dokter
                berpengalaman dan fasilitas modern.

                <br><br>

                Kami berkomitmen memberikan pelayanan terbaik untuk
                menjaga kesehatan dan keindahan senyum setiap pasien
                dengan standar pelayanan yang nyaman, aman dan terpercaya.

            </p>

        </div>

    </div>

</section>

<!-- LAYANAN -->
<section id="layanan">

    <h2>
        Layanan Kami
    </h2>

    <div class="cards">

        @foreach($layanans as $layanan)

            <div class="card">

                @if($layanan->foto)

                    <img src="{{ asset('images/layanan/'.$layanan->foto) }}"
                         alt="{{ $layanan->nama_layanan }}">

                @endif

                <div class="card-body">

                    <h3>
                        {{ $layanan->nama_layanan }}
                    </h3>

                    <p>
                        {{ $layanan->deskripsi }}
                    </p>

                </div>

            </div>

        @endforeach

    </div>

</section>

<!-- DOKTER -->
<section id="dokter">

    <h2>Dokter Kami</h2>

    <div class="cards">

        @foreach($dokters as $dokter)

        <div class="card dokter-card">

            @if($dokter->foto)
                <img src="{{ asset('images/dokter/'.$dokter->foto) }}"
                     alt="{{ $dokter->nama_dokter }}">
            @endif

            <div class="card-body">

                <h3>{{ $dokter->nama_dokter }}</h3>

                <button class="btn-jadwal"
                        onclick="toggleJadwal({{ $dokter->id }})">
                    Lihat Jadwal
                </button>

                <div id="jadwal-{{ $dokter->id }}"
                     class="jadwal-box">

                    @foreach($dokter->jadwal as $jadwal)

                        <p>
                            <b>{{ $jadwal->hari }}</b>
                        </p>

                        <p>
                            {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}
                            -
                            {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                        </p>

                    @endforeach

                </div>

            </div>

        </div>

        @endforeach

    </div>

</section>

<!-- LOKASI -->
<section id="lokasi" class="section">

    <div class="section-title">

        <h2>
            Lokasi Kami
        </h2>

        <p>
            Temukan lokasi Lumine Dental Care dengan mudah
        </p>

    </div>

    <div class="lokasi-card">

        <div class="lokasi-info">

            <div class="info-item">

                <h3>
                    Alamat
                </h3>

                <p>
                    Komplek HKSN Permai Blok 11 (57),
                    Banjarmasin
                </p>

            </div>

            <div class="info-item">

                <h3>
                    Jam Operasional
                </h3>

                <p>
                    Senin - Sabtu
                    <br>
                    08.00 - 20.00 WITA
                </p>

            </div>

        </div>

        <div class="maps-wrapper">

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.2854846036903!2d114.57760107353519!3d-3.27922499669571!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de42390cad5c2c3%3A0x5bd695a8ce658833!2sKomplek%20HKSN%20Permai%20Blok%2011%20(57)!5e0!3m2!1sid!2sid!4v1780991345047!5m2!1sid!2sid"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>

        </div>

        <div class="btn-wrapper">

            <a href="https://maps.app.goo.gl/sQSwibSe9A6SXiSPA"
               target="_blank"
               class="btn-lokasi">

                Lihat Lokasi di Google Maps

            </a>

        </div>

    </div>

</section>
<!-- KONTAK -->
<section id="kontak" class="section">

    <div class="section-title">

        <h2>
            Kontak Kami
        </h2>

        <p>
            Hubungi dan ikuti media sosial Lumine Dental Care
        </p>

    </div>

    <div class="kontak-container">

        <!-- WHATSAPP -->
        <div class="kontak-card">

            <div class="kontak-icon">
                <i class="fa-brands fa-whatsapp"></i>
            </div>

            <h3>WhatsApp</h3>

            <p>081772862667</p>

            <a href="https://wa.me/6281772862667"
            target="_blank"
            class="btn-wa">
                Chat Sekarang
            </a>

        </div>

        <!-- INSTAGRAM -->
        <div class="kontak-card">

            <div class="kontak-icon">
                <i class="fa-brands fa-instagram"></i>
            </div>

            <h3>Instagram</h3>

            <p>@luminedental_care</p>

            <a href="https://instagram.com/luminedental_care"
            target="_blank"
            class="btn-sosmed">
                Kunjungi Instagram
            </a>

        </div>

        <!-- TIKTOK -->
        <div class="kontak-card">

            <div class="kontak-icon">
                <i class="fa-brands fa-tiktok"></i>
            </div>

            <h3>TikTok</h3>

            <p>@lumine.dental.care</p>

            <a href="https://tiktok.com/@lumine.dental.care"
            target="_blank"
            class="btn-sosmed">
                Kunjungi TikTok
            </a>

        </div>

    </div>

</section>

<script>
function toggleJadwal(id)
{
    let box = document.getElementById('jadwal-' + id);

    if(box.style.display === 'block')
    {
        box.style.display = 'none';
    }
    else
    {
        box.style.display = 'block';
    }
}
</script>

@endsection