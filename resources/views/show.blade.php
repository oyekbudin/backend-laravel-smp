@include('header')

<!--main class="main">

    
    <div class="page-title">
      <div class="title-wrapper">
        <h1>{{ $berita->judul }}</h1>
      </div>
    </div>

   
    <section class="section">
  <div class="container">
    <div class="content">
      
      <img 
        src="{{ $berita->gambar ? asset($berita->gambar) : asset('assets/img/health/cardiology-2.webp') }}" 
        alt="Default Image"  
        loading="lazy" 
        style="height:auto;width: 35%; float:left; margin:0 15px 10px 0; border-radius:8px;"
      >

      <p style="text-align: justify;">
        {!! $berita->isi !!}
      </p>

    </div>
  </div>
</section>

</main-->



<main class="main">

  <article class="container py-4" style="max-width: 800px;">

    <!-- Title -->
    <section class="mb-3">
      <h1 class="fw-bold lh-sm">{{ $berita->judul }}</h1>

      
    </section>

    <!-- Thumbnail -->
    <figure class="mb-4">
      <img 
        src="{{ $berita->gambar ? asset($berita->gambar) : asset('assets/img/default.webp') }}" 
        alt="{{ $berita->judul }}"  
        class="img-fluid rounded shadow-sm w-100"
        loading="lazy"
      >
    </figure>

    <!-- Content -->
    <section class="content">
      {!! $berita->isi !!}
    </section>
    @foreach(json_decode($berita->gambar) as $img)
    <img src="{{ asset($img) }}" style="width:200px; margin:5px;">
@endforeach

  </article>

</main>



@include('footer')
