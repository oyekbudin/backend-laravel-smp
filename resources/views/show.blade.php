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

        <!-- Thumbnail -->
        <figure class="mb-4">
            <img src="{{ $berita->gambar ? asset(is_array(json_decode($berita->gambar, true)) ? json_decode($berita->gambar, true)[0] : $berita->gambar) : asset('assets/img/default.webp') }}"
                class="img-fluid w-100" loading="lazy">
        </figure>

        <!-- Content -->
        <section id="isi-berita" class="content mb-4 p-0">
            {!! $berita->isi !!}
        </section>

        <!-- Gallery -->
        @php
            $images = json_decode($berita->gambar, true);
        @endphp

        @if (is_array($images) && count($images) > 1)
            <div class="d-flex flex-wrap mb-4">
                @foreach ($images as $index => $img)
                    @if ($index != 0)
                        <img src="{{ asset($img) }}" style="width:200px; margin:5px;" loading="lazy">
                    @endif
                @endforeach
            </div>
        @endif

        <!-- 🔥 BERITA LAINNYA -->
        <section class="mt-5">
            <h5 class="mb-3">Berita Lainnya</h5>

            <div class="row g-2">
                @foreach ($lainnya as $item)
                    <div class="col-4">
                        <a href="/berita/{{ $item->slug }}">
                            <img src="{{ $item->gambar ? asset(is_array(json_decode($item->gambar, true)) ? json_decode($item->gambar, true)[0] : $item->gambar) : asset('assets/img/default.webp') }}"
                                class="img-fluid w-100" style="aspect-ratio:1/1; object-fit:cover;" loading="lazy">
                        </a>
                    </div>
                @endforeach
            </div>
        </section>

    </article>

</main>

@include('footer')
