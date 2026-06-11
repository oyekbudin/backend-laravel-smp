@include('header')

<main class="main">

  <article class="container py-4" style="max-width: 800px;">

    <!-- Title -->
    <section class="mb-3">
      <h1 class="fw-bold lh-sm">{{ $berita->judul }}</h1>
    </section>

    <!-- Thumbnail utama -->
    <figure class="mb-4">
      <img 
        src="{{ $berita->gambar ? asset(is_array(json_decode($berita->gambar, true)) ? json_decode($berita->gambar, true)[0] : $berita->gambar) : asset('assets/img/default.webp') }}" 
        alt="{{ $berita->judul }}"  
        class="img-fluid w-100"
        loading="lazy"
      >
    </figure>

    <!-- Content -->
    <section class="content mb-4">
      {!! $berita->isi !!}
    </section>

    <!-- Gallery (multiple images) -->
    @php
        $images = json_decode($berita->gambar, true);
    @endphp

    @if(is_array($images) && count($images) > 1)
      <div class="d-flex flex-wrap">
        @foreach($images as $index => $img)
          @if($index != 0) {{-- skip gambar pertama (sudah jadi thumbnail) --}}
            <img 
              src="{{ asset($img) }}" 
              style="width:200px; margin:5px;"
              loading="lazy"
            >
          @endif
        @endforeach
      </div>
    @endif

  </article>

</main>

@include('footer')