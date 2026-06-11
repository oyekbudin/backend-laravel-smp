<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SMP Ma'arif NU 01 Wanareja</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logosmp.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MediTrust
  * Template URL: https://bootstrapmade.com/meditrust-bootstrap-hospital-website-template/
  * Updated: Jul 04 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
  .mading-card img {
    height: 180px;
    object-fit: cover;
}
  .mading-card {
    box-shadow: 2px 4px 10px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.mading-card:hover {
    transform: scale(1.03) rotate(0deg);
}
  #mads .card {
    transform: rotate(-1deg);
}

#mads .card:nth-child(even) {
    transform: rotate(1deg);
}

.card {
    background: #fffbe6;
    border-left: 5px solid #ffc107;
}
      .btn-zoom{
    display: inline-block;
    padding: 12px 20px;
    background: #0d6efd;
    color: white;
    border-radius: 10px;
    text-decoration: none;
    font-weight: bold;

    animation: zoomInOut 1.5s infinite;
    transition: all 0.3s ease;
}

/* hover makin hidup */
.btn-zoom:hover{
    transform: scale(1.15);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

/* animasi otomatis */
@keyframes zoomInOut {
    0%   { transform: scale(1); }
    50%  { transform: scale(1.08); }
    100% { transform: scale(1); }
}
.feature-item{
   
    border-radius: 16px;
    padding: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

/* hover efek */
.feature-item:hover{
    transform: translateY(-10px) scale(1.03);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

/* ICON */
.feature-icon{
    font-size: 40px;
    color: #0d6efd;
    margin-bottom: 10px;
    animation: pulseIcon 2s infinite;
}

/* FLOATING ANIMATION (goyang lembut) */
.animate-float{
    animation: floatUpDown 4s ease-in-out infinite;
}

/* delay variasi biar tidak seragam */
.delay-1{ animation-delay: .5s; }
.delay-2{ animation-delay: 1s; }
.delay-3{ animation-delay: 1.5s; }

/* gerakan naik turun */
@keyframes floatUpDown{
    0%   { transform: translateY(0px); }
    50%  { transform: translateY(-8px); }
    100% { transform: translateY(0px); }
}

/* icon berdenyut */
@keyframes pulseIcon{
    0%   { transform: scale(1); }
    50%  { transform: scale(1.15); }
    100% { transform: scale(1); }
}

/* sedikit “glow hidup” */
.feature-item::before{
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: radial-gradient(circle at top, rgba(13,110,253,0.08), transparent 70%);
    pointer-events: none;
}
/* H1 besar */
.text-gradient{
    font-size: 42px;
    font-weight: 800;
    text-align: left;

    background: linear-gradient(
        270deg,
        #ff0000,
        #ff7300,
        #ffeb00,
        #00ff2a,
        #00c3ff,
        #7a00ff,
        #ff00c8
    );

    background-size: 1400% 1400%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;

    animation: gradientMove 6s ease infinite;
}

/* H2 versi lebih kecil */
.text-gradient-small{
    font-size: 22px;
    font-weight: 600;
    text-align: left;

    background: linear-gradient(
        270deg,
        #00c3ff,
        #7a00ff,
        #ff00c8,
        #ffeb00
    );

    background-size: 800% 800%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;

    animation: gradientMove 5s ease infinite;
}

/* ANIMASI GERAK GRADIENT */
@keyframes gradientMove{
    0%   { background-position: 0% 50%; }
    50%  { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}
.badge-neon{
    display:inline-block;
    padding:8px 16px;
    border-radius:999px;
    font-size:14px;
    font-weight:600;
    color:#fff;
    background:#111;

    border:1px solid #00c3ff;
    box-shadow: 0 0 10px #00c3ff, 0 0 20px #7a00ff;

    animation: neonPulse 2s infinite;
}

@keyframes neonPulse{
    0%{box-shadow:0 0 5px #00c3ff}
    50%{box-shadow:0 0 20px #7a00ff}
    100%{box-shadow:0 0 5px #00c3ff}
}
.badge-item{
    
}

/* hover efek naik */
.badge-item:hover{
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 12px 30px rgba(0,0,0,0.15);
}

/* ICON */
.badge-item i{
    font-size: 24px;
    color: #0d6efd;

    animation: pulseIcon 2s infinite;
}

/* TEXT */
.badge-content span{
    display: block;
    font-size: 12px;
    color: #888;
}

.badge-content strong{
    font-size: 14px;
    color: #888;
}

/* floating animasi ringan */
.animate-badge{
    animation: floatBadge 4s ease-in-out infinite;
}

/* delay variasi */
.delay-1{
    animation-delay: 0.5s;
}

/* animasi naik turun */
@keyframes floatBadge{
    0%{ transform: translateY(0); }
    50%{ transform: translateY(-6px); }
    100%{ transform: translateY(0); }
}

/* icon pulse */
@keyframes pulseIcon{
    0%{ transform: scale(1); }
    50%{ transform: scale(1.15); }
    100%{ transform: scale(1); }
}
.about-card{
    background: #fff;
    padding: 24px;
    border-radius: 16px;

    box-shadow: 0 10px 30px rgba(0,0,0,0.08);

    border-left: 5px solid #0d6efd;

    transition: all 0.3s ease;
}

.about-card:hover{
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.12);
}

.about-title{
    font-size: 26px;
    font-weight: 700;
    margin-bottom: 12px;
    color: #0d6efd;
}

.about-text{
    font-size: 15px;
    color: #444;
    margin-bottom: 10px;
    line-height: 1.6;
}

.about-list{
    margin-top: 10px;
    padding-left: 20px;
}

.about-list li{
    margin-bottom: 8px;
    position: relative;
    padding-left: 5px;
}

/* bullet lebih modern */
.about-list li::marker{
    color: #0d6efd;
}
.berita-card{
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.berita-card:hover{
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.berita-img-wrapper{
    height: 200px;
    overflow: hidden;
}

.berita-img-wrapper img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.5s ease;
}

.berita-card:hover img{
    transform: scale(1.1);
}
  </style>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('assets/img/logosmp.png') }}" alt="">
        <!-- <svg class="my-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g id="bgCarrier" stroke-width="0"></g>
          <g id="tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
          <g id="iconCarrier">
            <path d="M22 22L2 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M17 22V6C17 4.11438 17 3.17157 16.4142 2.58579C15.8284 2 14.8856 2 13 2H11C9.11438 2 8.17157 2 7.58579 2.58579C7 3.17157 7 4.11438 7 6V22" stroke="currentColor" stroke-width="1.5"></path>
            <path opacity="0.5" d="M21 22V8.5C21 7.09554 21 6.39331 20.6629 5.88886C20.517 5.67048 20.3295 5.48298 20.1111 5.33706C19.6067 5 18.9045 5 17.5 5" stroke="currentColor" stroke-width="1.5"></path>
            <path opacity="0.5" d="M3 22V8.5C3 7.09554 3 6.39331 3.33706 5.88886C3.48298 5.67048 3.67048 5.48298 3.88886 5.33706C4.39331 5 5.09554 5 6.5 5" stroke="currentColor" stroke-width="1.5"></path>
            <path d="M12 22V19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path opacity="0.5" d="M10 12H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path opacity="0.5" d="M5.5 11H7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path opacity="0.5" d="M5.5 14H7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path opacity="0.5" d="M17 11H18.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path opacity="0.5" d="M17 14H18.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path opacity="0.5" d="M5.5 8H7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path opacity="0.5" d="M17 8H18.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path opacity="0.5" d="M10 15H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M12 9V5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M14 7L10 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
          </g>
        </svg> -->

        <!-- <h1 class="sitename">SMP Ma'arif </h1> -->
      </a>
      @include('nav')