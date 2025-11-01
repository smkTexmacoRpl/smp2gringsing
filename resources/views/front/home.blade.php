@extends('layouts.depan')
@section('content')
<!-- ===== HERO SECTION ===== -->
{{-- <section id="hero" class="relative h-screen min-h-[600px] flex items-center">
    <!-- Slides -->
    <div class="hero-slide active" style="background-image: url('{{asset('assets/images/smp21.webp')}}')"></div>
    <div class="hero-slide" style="
						background-image: url('{{asset('assets/images/smp21.webp')}}');
					"></div>
    <div class="hero-slide" style="background-image: url('{{asset('assets/images/smp21.webp')}}')"></div>

    <!-- Overlay Gelap -->
    <div class="absolute inset-0 bg-black/50"></div>

    <!-- Konten Hero -->
    <div class="container mx-auto px-6 relative z-10 text-white text-center">
        <h1 id="hero-title" class="text-4xl md:text-6xl font-extrabold mb-4 transition-all duration-500">
            Membangun Generasi Unggul Berkarakter
        </h1>
        <p id="hero-subtitle" class="text-lg md:text-xl max-w-3xl mx-auto mb-8 transition-all duration-500">
            SMP N 2 Gringsing menyediakan pendidikan
            berkualitas yang inovatif dan berlandaskan nilai-nilai luhur.
        </p>
        <a href="#"
            class="bg-primary-600 text-white px-8 py-3 rounded-full hover:bg-primary-700 transition-transform hover:scale-105 text-lg font-semibold">Jelajahi
            Lebih Lanjut</a>
    </div>

    <!-- Navigasi Slider -->
    <div id="slider-dots" class="absolute bottom-8 left-1/2 -translate-x-1/2 flex space-x-3 z-10">
        <!-- Dots akan digenerate oleh JavaScript -->
    </div>
</section> --}}

<!-- ===== HERO SECTION ===== -->
<x-halaman_depan.hero />

<!-- ===== STATS SECTION ===== -->

<x-halaman_depan.statistik />


<!-- ===== JURUSAN UNGGULAN SECTION ===== -->

<x-halaman_depan._sambutan />


<!-- ===== POPULAR COURSES SECTION ===== -->

<x-halaman_depan.kursus />


<!-- ===== UPCOMING EVENTS SECTION ===== -->


<!-- ===== PARTNERSHIP SECTION ===== -->


<!-- ===== STUDENT FEEDBACK SECTION ===== -->
<x-halaman_depan.student_feedback />


@endsection