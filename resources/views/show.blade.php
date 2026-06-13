@section('meta')
    <meta property="og:site_name" content="SMP Ma'arif NU 01 Wanareja" />
    <meta property="og:title" content="{{ $berita->judul }}" />
    <meta property="og:description" content="{{ Str::limit(strip_tags($berita->isi), 150) }}" />
    <meta property="og:image" content="{{ url($berita->gambar ?? 'assets/img/default.webp') }}" />
    <meta property="og:url" content="{{ url('/berita/' . $berita->slug) }}">
    <meta property="og:type" content="article" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="{{ url($berita->gambar ?? 'assets/img/default.webp') }}" />
@endsection

@include('header')

<style>
    #judul-berita {
        font-size: 55px;
        letter-spacing: -1.5px;
        line-height: 1.1;
        font-family: "Crimson Text", "Times New Roman", Times, serif;
        color: #000;
    }

    #dok-berita {
        font-size: 20px;
        letter-spacing: -1.5px;
        line-height: 1.1;
        font-family: "Crimson Text", "Times New Roman", Times, serif;
        color: #000;
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

    <article class="container py-4" style="max-width: 800px;">

        <!-- Title -->
        <section class="mb-3 pb-1">
            <h1 id="judul-berita" class="lh-sm">{{ $berita->judul }}</h1>
        </section>

        <div class="d-flex align-items-center gap-2 mb-3">

            <span class="me-2 text-muted small">Bagikan:</span>

            <!-- Facebook -->
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('/berita/' . $berita->slug) }}" target="_blank"
                class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1">
                <i class="bi bi-facebook"></i>
                Facebook
            </a>

            <!-- WhatsApp -->
            <a href="https://api.whatsapp.com/send?text={{ $berita->judul }}%0a%0a{{ url('/berita/' . $berita->slug) }}"
                target="_blank" class="btn btn-sm btn-outline-success d-flex align-items-center gap-1">
                <i class="bi bi-whatsapp"></i>
                WhatsApp
            </a>

        </div>

        <!-- Thumbnail -->
        <figure class="mb-4">
            <img src="{{ $berita->gambar1 ? asset($berita->gambar1) : asset('assets/img/default.webp') }}"
                class="img-fluid w-100" loading="lazy" alt="{{ $berita->judul }}">
        </figure>

        <!-- Content -->
        <section id="isi-berita" class="content mb-3 p-0">
            {!! $berita->isi !!}
        </section>

        @if ($berita->gambar2)
            <div id="dok-berita" class="mb-3">
                Dokumentasi Kegiatan
            </div>

            <div class="row g-3">
                @for ($i = 2; $i <= 10; $i++)
                    @php
                        $field = 'gambar' . $i;
                    @endphp

                    @if ($berita->$field)
                        <div class="col-md-4">
                            <img src="{{ asset($berita->$field) }}" class="img-fluid rounded" loading="lazy">
                        </div>
                    @endif
                @endfor
            </div>
        @endif

        <!-- 🔥 BERITA LAINNYA -->
        <section class="mt-5">
            <h5 class="mb-3">Berita Lainnya</h5>

            <div class="list-group list-group-flush">

                @foreach ($lainnya->take(10) as $item)
                    <a href="/berita/{{ $item->slug }}"
                        class="list-group-item list-group-item-action d-flex gap-3 py-3">

                        <!-- THUMBNAIL -->
                        <img src="{{ $item->gambar ? asset(is_array(json_decode($item->gambar, true)) ? json_decode($item->gambar, true)[0] : $item->gambar) : asset('assets/img/default.webp') }}"
                            class="flex-shrink-0" style="width:90px; height:70px; object-fit:cover; border-radius:8px;"
                            loading="lazy">

                        <!-- CONTENT -->
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold text-dark" style="line-height:1.3;">
                                {{ $item->judul }}
                            </h6>

                            <small class="text-muted">
                                <i class="bi bi-clock"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal_publish)->locale('id')->diffForHumans() }}
                            </small>
                        </div>

                    </a>
                @endforeach

            </div>
        </section>

    </article>

</main>

@include('footer')
