@include('header')

<style>
    .berita-img {
        width: 100%;
        aspect-ratio: 1/1;
        object-fit: cover;
        display: block;
    }

    .berita-card {
        border: 1px solid rgba(0, 0, 0, .12);
        overflow: hidden;
        transition: transform .25s ease;
    }

    /* hover ringan saja (tanpa underline + tanpa shadow berat) */
    .berita-card:hover {
        transform: translateY(-4px);
    }

    .berita-img-wrapper img {
        transition: transform .4s ease;
    }

    .berita-card:hover img {
        transform: scale(1.05);
    }

    #headline-berita-home {
        font-size: 30px;
        font-family: "Crimson Text", serif;
        font-weight: 400;
        color: #016fba;
    }

    .tanggal-berita-home {
        color: #585858;
        font-size: 14px;
        font-family: Karla, sans-serif;
    }

    #isi-berita {
        font-size: 17px;
        line-height: 160%;
        font-family: Karla, sans-serif;
        color: #323233;
    }
</style>

<main class="main">

    <!-- HERO (cukup 1 animasi saja) -->
    <!-- SPMB SECTION -->
    <section class="py-5">

        <div class="container">

            <div class="text-center mb-4">
                <h2 class="fw-bold text-primary">
                    SPMB SMP Ma'arif NU 01 Wanareja
                </h2>
                <p class="text-muted">
                    Tahun Ajaran 2026/2027
                </p>
            </div>

            <div class="row g-4">

                <!-- GELOMBANG 1 -->
                <div class="col-lg-6 col-md-6">
                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body">

                            <h5 class="fw-bold text-primary">
                                PENDAFTARAN GELOMBANG 1
                            </h5>

                            <p class="text-muted mb-2">
                                JANUARI - MEI 2026
                            </p>

                            <ul class="mb-0">
                                <li>Free Tas Sekolah</li>
                                <li>Free Seragam OSIS (1 Stel)</li>
                                <li>Free Seragam Almamater</li>
                            </ul>

                        </div>

                    </div>
                </div>

                <!-- GELOMBANG 2 -->
                <div class="col-lg-6 col-md-6">
                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body">

                            <h5 class="fw-bold text-primary">
                                PENDAFTARAN GELOMBANG 2
                            </h5>

                            <p class="text-muted mb-2">
                                JUNI - JULI 2026
                            </p>

                            <ul class="mb-0">
                                <li>Free Tas Sekolah</li>
                                <li>Free Seragam Almamater</li>
                            </ul>

                        </div>

                    </div>
                </div>

                <!-- DAFTAR ULANG -->
                <div class="col-lg-6 col-md-6">
                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body">

                            <h5 class="fw-bold text-primary">
                                DAFTAR ULANG
                            </h5>

                            <p class="text-muted mb-0">
                                JUNI 2026
                            </p>

                        </div>

                    </div>
                </div>

                <!-- MPLS -->
                <div class="col-lg-6 col-md-6">
                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body">

                            <h5 class="fw-bold text-primary">
                                MPLS & MAKESTA
                            </h5>

                            <p class="text-muted mb-0">
                                JULI 2026
                            </p>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </section>

    <div class="container">
        <div class="row">

            <!-- CONTENT -->
            <div class="col-lg-8">

                <!-- ABOUT (tanpa animasi berlebihan) -->
                <section class="home-about section">
                    <div class="row gy-5 align-items-center">

                        <div class="col-lg-6">
                            <div class="about-image">
                                <iframe
                                    src="https://www.youtube.com/embed/3P2fzU8sojA?autoplay=1&mute=1&loop=1&playlist=3P2fzU8sojA"
                                    frameborder="0" style="width:100%; aspect-ratio:9/16; border:0;" allowfullscreen>
                                </iframe>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <h2 id="headline-berita-home">Marching Band Garuda Nusantara</h2>

                            <div id="isi-berita">
                                <p>Garuda Nusantara adalah Marching Band siswa SMP Ma'arif NU 01 Wanareja.</p>
                                <p>Telah tampil di berbagai acara tingkat kecamatan dan desa.</p>
                            </div>
                        </div>

                    </div>
                </section>

                <!-- BERITA -->
                <section class="py-5">

                    <div class="text-center mb-4">
                        <h2 id="headline-berita-home">
                            Berita & Kegiatan
                        </h2>
                    </div>

                    <div class="row g-3">

                        @foreach ($databerita as $db)
                            <div class="col-md-6 col-lg-4">

                                <div class="berita-card h-100">

                                    <a href="{{ route('show', $db->slug) }}" class="text-decoration-none">

                                        <img src="{{ $db->gambar1 ? asset($db->gambar1) : asset('assets/img/health/cardiology-2.webp') }}"
                                            class="berita-img" loading="lazy">

                                        <div class="p-3">

                                            <h5>{{ $db->judul }}</h5>

                                            <span class="tanggal-berita-home">
                                                <i class="bi bi-clock"></i>
                                                {{ \Carbon\Carbon::parse($db->tanggal_publish)->diffForHumans() }}
                                            </span>

                                        </div>

                                    </a>

                                </div>

                            </div>
                        @endforeach

                    </div>
                </section>

            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4">

                <!-- PESAN KESAN (tanpa animasi) -->
                <section class="py-4 bg-light">

                    <h3 class="text-center mb-4" id="headline-berita-home">
                        Pesan & Kesan MPLS 2026
                    </h3>

                    <div class="row g-3">

                        @forelse($pesankesan as $item)
                            <div class="col-12">

                                <div class="card border-0 shadow-sm">

                                    <div class="card-header bg-white">
                                        <strong>{{ $item->penulis }}</strong>
                                    </div>

                                    <div class="card-body">
                                        {{ $item->konten }}
                                    </div>

                                    <div class="card-footer text-muted small">
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('j F Y H:i') }}
                                    </div>

                                </div>

                            </div>
                        @empty
                            <div class="text-center text-muted">Belum ada pesan</div>
                        @endforelse

                    </div>

                </section>

                <!-- KALENDER -->
                <section class="card mt-3">
                    <div class="card-body">

                        <h5 id="headline-berita-home">Kalender Pendidikan</h5>

                        @forelse($datakaldik as $item)
                            <div class="mb-3 border-bottom pb-2">

                                <div class="fw-semibold">
                                    {{ $item->agenda }}
                                </div>

                                <div class="text-muted small">
                                    @if ($item->mulai == $item->selesai)
                                        {{ \Carbon\Carbon::parse($item->mulai)->translatedFormat('l, j F Y') }}
                                    @else
                                        {{ \Carbon\Carbon::parse($item->mulai)->translatedFormat('l, j F Y') }}
                                        s/d
                                        {{ \Carbon\Carbon::parse($item->selesai)->translatedFormat('l, j F Y') }}
                                    @endif
                                </div>

                                @if (now()->between($item->mulai, $item->selesai))
                                    <span class="badge bg-success">Sedang Berlangsung</span>
                                @endif

                            </div>
                        @empty
                            <div class="text-muted">Tidak ada kegiatan</div>
                        @endforelse

                    </div>
                </section>

            </div>
        </div>
    </div>

    <!-- LOGO SECTION (tanpa AOS berat) -->
    <div class="container text-center py-5">
        <div class="d-flex flex-wrap justify-content-center gap-4">
            <img src="assets/img/lazisnu.png" height="60">
            <img src="assets/img/tutwuri.png" height="60">
            <img src="assets/img/ipnuippnu.png" height="60">
            <img src="assets/img/tunaskelapa.png" height="60">
            <img src="assets/img/logo_pmi.png" height="60">
        </div>
    </div>

    <!-- EKSTRAKURIKULER (tetap pakai AOS hanya di section title saja) -->
    <section class="featured-departments section">

        <div class="container section-title" data-aos="fade-up">
            <h2>Ekstrakurikuler</h2>
        </div>

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4">
                    <div class="card">
                        <img src="uploads/berita/xxx.png" class="img-fluid">
                        <div class="p-3">
                            <h5>Panahan</h5>
                            <p>Ekstrakurikuler panahan...</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

</main>

<!-- AUDIO (tetap tapi tidak autoplay scroll) -->
<audio id="bgMusic" loop>
    <source src="assets/musik.mp3" type="audio/mpeg">
</audio>

<script>
    /* musik hanya jika user klik (lebih aman & tidak diblok browser) */
    document.addEventListener('click', function startMusic() {
        const music = document.getElementById('bgMusic');
        music.play().catch(() => {});
        document.removeEventListener('click', startMusic);
    });
</script>

<script>
    /* random color ringan */
    document.addEventListener('DOMContentLoaded', () => {
        const colors = ['#fff3cd', '#d1ecf1', '#d4edda', '#f8d7da', '#e2e3e5'];

        document.querySelectorAll('.mading-card').forEach(card => {
            card.style.backgroundColor =
                colors[Math.floor(Math.random() * colors.length)];
        });
    });
</script>

@include('footer')
