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

    <!-- ===================== SPMB ===================== -->
    <section id="spmb" class="py-5">

        <div class="container">

            <header class="text-center mb-4">
                <h1 class="text-primary fw-bold">
                    SPMB SMP Ma'arif NU 01 Wanareja
                </h1>
                <p class="text-muted">
                    Tahun Ajaran 2026/2027
                </p>
            </header>

            <div class="row g-4">

                <!-- GEL 1 -->
                <article class="col-lg-6" data-type="spmb-gelombang">
                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body">

                            <h2 class="h5 text-primary">
                                PENDAFTARAN GELOMBANG 1
                            </h2>

                            <p class="text-muted">
                                <time datetime="2026-01">JANUARI - MEI 2026</time>
                            </p>

                            <ul>
                                <li>Free Tas Sekolah</li>
                                <li>Free Seragam OSIS</li>
                                <li>Free Seragam Almamater</li>
                            </ul>

                        </div>

                    </div>
                </article>

                <!-- GEL 2 -->
                <article class="col-lg-6" data-type="spmb-gelombang">
                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body">

                            <h2 class="h5 text-primary">
                                PENDAFTARAN GELOMBANG 2
                            </h2>

                            <p class="text-muted">
                                <time datetime="2026-06">JUNI - JULI 2026</time>
                            </p>

                            <ul>
                                <li>Free Tas Sekolah</li>
                                <li>Free Seragam Almamater</li>
                            </ul>

                        </div>

                    </div>
                </article>

                <!-- DAFTAR ULANG -->
                <article class="col-lg-6" data-type="spmb-event">
                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body">

                            <h2 class="h5 text-primary">
                                DAFTAR ULANG
                            </h2>

                            <time datetime="2026-06">JUNI 2026</time>

                        </div>

                    </div>
                </article>

                <!-- MPLS -->
                <article class="col-lg-6" data-type="spmb-event">
                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body">

                            <h2 class="h5 text-primary">
                                MPLS & MAKESTA
                            </h2>

                            <time datetime="2026-07">JULI 2026</time>

                        </div>

                    </div>
                </article>

            </div>

        </div>

    </section>


    <!-- ===================== EKSTRAKURIKULER ===================== -->
    <section id="ekstrakurikuler" class="py-5 bg-light">

        <div class="container">

            <header class="text-center mb-4">
                <h1 class="text-primary fw-bold">
                    Ekstrakurikuler
                </h1>
            </header>

            <div class="row g-4">

                <!-- PANAHAN -->
                <article class="col-lg-4" data-type="ekskul">
                    <div class="card border-0 shadow-sm h-100">

                        <img src="uploads/berita/panahan.png" class="img-fluid" alt="Ekstrakurikuler Panahan"
                            loading="lazy">

                        <div class="card-body">

                            <h2 class="h5">Panahan</h2>

                            <p>
                                Ekstrakurikuler panahan melatih fokus, ketenangan, dan ketepatan siswa.
                            </p>

                        </div>

                    </div>
                </article>

                <!-- PAGAR NUSA -->
                <article class="col-lg-4" data-type="ekskul">
                    <div class="card border-0 shadow-sm h-100">

                        <img src="uploads/berita/pagar-nusa.jpeg" class="img-fluid" alt="Ekstrakurikuler Pagar Nusa"
                            loading="lazy">

                        <div class="card-body">

                            <h2 class="h5">Pagar Nusa</h2>

                            <p>
                                Pencak silat di bawah naungan NU untuk melatih disiplin dan mental.
                            </p>

                        </div>

                    </div>
                </article>

                <!-- HADROH -->
                <article class="col-lg-4" data-type="ekskul">
                    <div class="card border-0 shadow-sm h-100">

                        <img src="uploads/berita/hadroh.png" class="img-fluid" alt="Ekstrakurikuler Hadroh"
                            loading="lazy">

                        <div class="card-body">

                            <h2 class="h5">Hadroh</h2>

                            <p>
                                Seni musik islami yang mengembangkan bakat seni dan religius siswa.
                            </p>

                        </div>

                    </div>
                </article>

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
