@include('header')
<style>
    .berita-img {
        width: 100%;
        aspect-ratio: 1/1;
        object-fit: cover;
        display: block;
    }

    .berita-card {
        border: 1px solid #;
        border: 1px solid rgb(0 0 0 / .15);
    }

    .berita-card h5 {
        font-size: 16px;
        line-height: 1.3;
    }

    .berita-card p {
        font-size: 14px;
        margin-bottom: 8px;
    }

    #judul-berita-home {
        line-height: 24px;
        font-size: 20px;
        font-family: Karla, sans-serif;
        font-weight: 700;
        color: #016fba;

    }

    #headline-berita-home {
        font-size: 30px;
        font-family: "Crimson Text", "Times New Roman", Times, serif;
        font-weight: 400;
        color: #016fba;
        text-align: left;
    }

    .tanggal-berita-home {
        color: #585858;
        font-size: 14px;
        font-family: Karla, sans-serif;
    }


    .berita-card {
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .berita-card:hover {
        /*transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);*/
        text-decoration: underline;
    }

    .berita-img-wrapper {
        height: 200px;
        overflow: hidden;
    }

    .berita-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.5s ease;
    }

    .berita-card:hover img {
        transform: scale(1.1);
    }

    #isi-berita {
        font-size: 17px;
        line-height: 160%;
        font-family: Karla, sans-serif;
        color: #323233;
        background-color: #fefefe;
    }
</style>


<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <div class="container-fluid p-0">
            <div class="hero-wrapper">
                <div class="hero-image">
                    <img src="assets/img/cover_smp.webp" class="img-fluid">
                </div>

                <div class="hero-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-10">
                                <div class="content-box">
                                    <span class="badge-neon">Sekolah Unggul, Berakhlak Mulia</span>
                                    <h1 class="text-gradient" data-aos="fade-up">
                                        SPMB SMP Ma'arif NU 01 Wanareja
                                    </h1>

                                    <h2 class="text-gradient-small" data-aos="fade-up">
                                        Tahun Ajaran 2026/2027
                                    </h2>

                                    <div class="cta-group">
                                        <a href="https://spmb.smpmaarifnuwanareja.sch.id" class="btn-zoom">Website SPMB
                                            Klik Disini!</a>
                                        <!--a href="services.html" class="btn btn-outline">Explore Services</a-->
                                    </div>

                                    <div class="info-badges">
                                        <div class="badge-item animate-badge">
                                            <i class="bi bi-telephone-fill"></i>
                                            <div class="badge-content">
                                                <span>Kontak</span>
                                                <strong>082358767313</strong>
                                            </div>
                                        </div>

                                        <div class="badge-item animate-badge delay-1">
                                            <i class="bi bi-clock-fill"></i>
                                            <div class="badge-content">
                                                <span>Jam Operasional</span>
                                                <strong>Senin-Sabtu: 07.00-13.00 WIB</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="features-wrapper">
                            <div class="row gy-4 feature-wrapper">

                                <div class="col-lg-6">
                                    <div class="feature-item animate-float">
                                        <div class="feature-icon">
                                            <i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="feature-text">
                                            <h2>PENDAFTARAN GELOMBANG 1</h2>
                                            <h3>JANUARI - MEI 2026</h3>
                                            <ul>
                                                <li>Free Tas Sekolah</li>
                                                <li>Free Seragam Osis (1 Stel)</li>
                                                <li>Free Seragam Almamater</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="feature-item animate-float delay-1">
                                        <div class="feature-icon">
                                            <i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="feature-text">
                                            <h2>PENDAFTARAN GELOMBANG 2</h2>
                                            <h3>JUNI - JULI 2026</h3>
                                            <ul>
                                                <li>Free Tas Sekolah</li>
                                                <li>Free Seragam Almamater</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="feature-item animate-float delay-2" >
                                        <div class="feature-icon">
                                            <i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="feature-text">
                                            <h2>DAFTAR ULANG</h2>
                                            <h3>JUNI 2026</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="feature-item animate-float delay-3" >
                                        <div class="feature-icon">
                                            <i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="feature-text">
                                            <h2>MPLS & MAKESTA</h2>
                                            <h3>JULI 2026</h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->
    <!-- pembagian area -->
    <div class="container">
        <div class="row">
            <!-- content -->
            <div class="col-lg-8">

                <!-- Home About Section -->
                <section id="home-about" class="home-about section">

                    <div class="container" >

                        <div class="row gy-5 align-items-center">
                            <div class="col-lg-6">
                                <div class="about-image">
                                    <div
                                        style="position: relative; width: 100%; max-width: 720px; padding-bottom: 177.78%; height: 0; overflow: hidden; margin:auto; border-radius:16px;">

                                        <iframe
                                            src="https://www.youtube.com/embed/3P2fzU8sojA?autoplay=1&mute=1&loop=1&playlist=3P2fzU8sojA"
                                            frameborder="0"
                                            style="position: absolute; top:0; left:0; width:100%; height:100%; border:0;"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>

                                    </div>

                                    <div class="experience-badge">
                                        <span class="years">Garuda </span>
                                        <span class="text">Nusantara</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6" >
                                <div class="about-card">

                                    <h2 id="headline-berita-home">Marching Band Garuda Nusantara</h2>
                                    <div id="isi-berita">
                                        <p class="about-text">
                                            Garuda Nusantara adalah Marching Band yang diikuti oleh siswa-siswi SMP
                                            Ma'arif
                                            NU 01
                                            Wanareja.
                                        </p>

                                        <p class="about-text">
                                            Garuda Nusantara telah mengepakkan sayapnya di berbagai acara:
                                        </p>

                                        <ul class="about-list">
                                            <li>Hari Santri Nasional ke-9 tingkat kecamatan Wanareja tahun 2023</li>
                                            <li>HUT RI Ke-79 tingkat desa Bantar tahun 2024</li>
                                            <li>Hari Santri Nasional ke-10 tingkat kecamatan Wanareja tahun 2024</li>
                                            <li>Acara Maulid Nabi dan Khatmil Qur'an di seluruh kecamatan Wanareja</li>
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <!-- Berita -->
                        <div class="container py-5">

                            <div class="text-center mb-4">
                                <h2 id="headline-berita-home" class="">Berita & Kegiatan SMP Ma'arif NU 01
                                    Wanareja</h2>
                            </div>


                            <div class="row g-3">

                                @foreach ($databerita as $db)
                                    <div class="col-md-6 col-lg-4">


                                        <div class="berita-card h-100">

                                            <a href="{{ route('show', $db->slug) }}" class="text-decoration-none">

                                                <!-- WRAPPER IMAGE -->
                                                <div style="position: relative;">

                                                    <!-- IMAGE -->
                                                    <img src="{{ $db->gambar1 ? asset($db->gambar1) : asset('assets/img/health/cardiology-2.webp') }}"
                                                        class="berita-img" alt="{{ $db->judul }}" loading="lazy">

                                                    <!-- BADGE ALBUM -->
                                                    @if (!empty($db->gambar2))
                                                        <div
                                                            style="
                    position:absolute;
                    top:10px;
                    left:10px;
                    background:rgba(0,0,0,0.6);
                    color:white;
                    padding:4px 8px;
                    border-radius:6px;
                    font-size:12px;
                    display:flex;
                    align-items:center;
                    gap:4px;
                ">
                                                            <i class="bi bi-images"></i>
                                                            Album Foto
                                                        </div>
                                                    @endif

                                                </div>

                                                <!-- CONTENT -->
                                                <div class="p-3">

                                                    <h5 id="judul-berita-home">{{ $db->judul }}</h5>

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

                        </div>
                        <!-- end Berita -->
                    </div>
                </section>
            </div>


            <!-- sidebar -->
            <div class="col-lg-4">
                <section id="mpls-ramah-anak" class="py-5 bg-light">
                    <div class="container">

                        <!-- Heading jelas (SEO penting) -->
                        <header class="text-center mb-5">
                            <h1 id="headline-berita-home">
                                Pesan & Kesan MPLS Tahun 2026
                            </h1>

                        </header>

                        <!-- Konten utama -->
                        <div class="row g-4" itemscope itemtype="https://schema.org/ItemList">
                            @forelse($pesankesan as $item)
                                <!-- ITEM -->
                                <article class="col-md-3" itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/CreativeWork">

                                    <div class="card shadow-sm h-100 border-0 mading-card">

                                        <!-- Image -->
                                        <div class="card-header">
                                            <p class="card-text" itemprop="text">
                                                <i class="bi bi-person"></i> {{ $item->penulis }}
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <!-- Isi pesan -->
                                            <p class="card-text" itemprop="text">
                                                {{ $item->konten }}
                                            </p>

                                            <!-- Author -->

                                        </div>

                                        <div class="card-footer">
                                            <footer>
                                                <p class="mb-1 text-muted small">


                                                    <i class="bi bi-calendar"></i>
                                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('j F Y') }}
                                                    &nbsp; | &nbsp;
                                                    <i class="bi bi-clock"></i>
                                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('H.i') }}
                                                </p>
                                            </footer>
                                        </div>

                                    </div>
                                </article>
                            @empty

                                <div class="col-12 text-center py-5">
                                    <div class="alert alert-light border">
                                        <h5 class="mb-2">Belum Ada Pesan</h5>
                                        <p class="mb-0 text-muted">
                                            Pesan & Kesan akan ditampilkan disini
                                        </p>
                                    </div>
                                </div>
                            @endforelse

                            <!-- COPY ITEM DI ATAS UNTUK DATA LAIN -->

                        </div>
                    </div>
                </section>
                <section>
                    <div class="card mt-3">
                        <div class="card-body">

                            <h5 class="mb-3" id="headline-berita-home">

                                Kalender Pendidikan
                            </h5>

                            @forelse($datakaldik as $item)
                                <div class="d-flex align-items-start mb-3 pb-2 border-bottom">

                                    <!-- ICON -->
                                    <div class="me-3">
                                        <i class="bi bi-calendar-event fs-4 text-primary"></i>
                                    </div>

                                    <!-- CONTENT -->
                                    <div>
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
                                            <span class="badge bg-success mt-1">Sedang Berlangsung</span>
                                        @endif

                                    </div>

                                </div>

                            @empty
                                <div class="text-muted">Tidak ada kegiatan</div>
                            @endforelse

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- end pembagian -->




    <div class="row mt-5 pt-4 certifications-row" data-aos="fade-up" data-aos-delay="600">
        <div class="col-12 text-center mb-4">
            <h4 class="certification-title"></h4>
        </div>
        <div class="col-12">
            <div class="certifications"> <!-- logo logo -->
                <div class="certification-item" data-aos="zoom-in" data-aos-delay="700">
                    <img src="assets/img/lazisnu.png" alt="Certification">
                </div>
                <div class="certification-item" data-aos="zoom-in" data-aos-delay="800">
                    <img src="assets/img/tutwuri.png" alt="Certification">
                </div>
                <div class="certification-item" data-aos="zoom-in" data-aos-delay="900">
                    <img src="assets/img/ipnuippnu.png" alt="Certification">
                </div>
                <div class="certification-item" data-aos="zoom-in" data-aos-delay="1000">
                    <img src="assets/img/tunaskelapa.png" alt="Certification">
                </div>
                <div class="certification-item" data-aos="zoom-in" data-aos-delay="1000">
                    <img src="assets/img/logo_pmi.png" style="height:70px" alt="Certification">
                </div>
            </div>
        </div>
    </div>



    <!-- Featured Departments Section -->
    <section id="featured-departments" class="featured-departments section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Ekstrakurikuler </h2>

        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="department-card">
                        <div class="department-image">
                            <img src="uploads/berita/d89f866f-9b8b-44eb-9a76-4453e83527f8.png"
                                alt="Cardiology Department" class="img-fluid">

                        </div>
                        <div class="department-content">
                            <!--div class="department-icon"-->
                            <img src="assets/img/ikon panahan.png" alt="Neurology Department"
                                class="department-icon">
                            <!--div-->
                            <h3>Panahan</h3>
                            <p>Ekstrakulikuler panahan adalah salah satu kegiatan di luar jam pelajaran yang bertujuan
                                untuk mengem....</p>
                            <a href="department-details.html" class="btn-learn-more">
                                <span>Learn More</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div><!-- End Department Card -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="department-card">
                        <div class="department-image">
                            <img src="uploads/berita/54dfd5cd-5dde-4f9a-ad31-294a1687a6a8.jpeg"
                                alt="Cardiology Department" class="img-fluid"> <!--Gambar-->
                        </div>
                        <div class="department-content">
                            <img src="assets/img/silat.png" alt="Neurology Department" class="department-icon">
                            <!--ikon/lambang-->
                            <h3>Pagar Nusa</h3>
                            <p>Pagar Nusa atau sering disingkat PN, adalah organisasi pencak silat di bawah naungan
                                Nahdlatul U....</p>
                            <a href="department-details.html" class="btn-learn-more">
                                <span>Learn More</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div><!-- End Department Card -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="department-card">
                        <div class="department-image">
                            <img src="uploads/berita/39bec5e8-3dbe-4748-9367-420c9fa395d4.png"
                                alt="Cardiology Department" class="img-fluid"> <!--Gambar-->
                        </div>
                        <div class="department-content">
                            <img src="assets/img/hadroh.png" alt="Neurology Department" class="department-icon">
                            <!--ikon/lambang-->
                            <h3>Hadroh</h3>
                            <p>Hadrah adalah sebuah seni pertunjukan tradisional dalam budaya Islam yang melibatkan
                                musik, nyanyian...</p>
                            <a href="department-details.html" class="btn-learn-more">
                                <span>Learn More</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div><!-- End Department Card -->




            </div>

        </div>

    </section><!-- /Featured Departments Section -->


    <audio id="bgMusic" loop>
        <source src="assets/musik.mp3" type="audio/mpeg">
    </audio>
</main>
<script>
    let musicStarted = false;

    window.addEventListener('scroll', function() {
        if (!musicStarted) {
            const music = document.getElementById('bgMusic');

            music.play().then(() => {
                musicStarted = true;
            }).catch((err) => {
                console.log("Autoplay blocked:", err);
            });
        }
    });
</script>
<script>
    const colors = [
        '#fff3cd', // kuning
        '#d1ecf1', // biru muda
        '#d4edda', // hijau muda
        '#f8d7da', // merah muda
        '#e2e3e5', // abu
        '#fde2e4', // pink
        '#e0f7fa' // cyan
    ];

    document.querySelectorAll('.mading-card').forEach(card => {
        let randomColor = colors[Math.floor(Math.random() * colors.length)];
        card.style.backgroundColor = randomColor;
    });
</script>
@include('footer')
