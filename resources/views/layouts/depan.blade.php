<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $appName2 }}</title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  @livewireStyles

  <!-- Tailwind CSS v3.4 -->
  @include('layouts.partial.style')

</head>

<body class="bg-gray-50 dark:bg-gray-900 text-primary-800 dark:text-gray-200">
  <!-- ===== HEADER & NAVIGATION ===== -->
  @include('layouts.partial.header')
  <main>
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

    <!-- ===== STATS SECTION ===== -->

    {{--
    <x-halaman_depan.statistik /> --}}
    @yield('content')

    <!-- ===== JURUSAN UNGGULAN SECTION ===== -->
    {{--
    <x-halaman_depan.jurusan_unggulan /> --}}


    <!-- ===== POPULAR COURSES SECTION ===== -->
    {{--
    <x-halaman_depan.kursus /> --}}


    <!-- ===== UPCOMING EVENTS SECTION ===== -->


    <!-- ===== PARTNERSHIP SECTION ===== -->


    <!-- ===== STUDENT FEEDBACK SECTION ===== -->

    <section id='footer'>
      <x-halaman_depan.footer />

    </section>
  </main>

  <!-- Swiper.js JS -->
  @include('layouts.partial.scripts')


  {{-- <script>
    alert('halo');
  // --- HERO SLIDER ---
const slides = document.querySelectorAll(".hero-slide");
const sliderDotsContainer = document.getElementById("slider-dots");
const heroTitle = document.getElementById("hero-title");
const heroSubtitle = document.getElementById("hero-subtitle");

const slideContent = [
{
  title: "Membangun Generasi Unggul Berkarakter",
subtitle:
"Yayasan Pendidikan YPPIT Texmaco berkomitmen untuk menyediakan pendidikan berkualitas yang inovatif dan berlandaskan
nilai-nilai luhur.",
},
{
title: "Fasilitas Modern & Lengkap",
subtitle:
"Menunjang proses belajar mengajar dengan laboratorium, perpustakaan, dan sarana olahraga yang memadai.",
},
{
  title: "Kembangkan Bakat & Minat",
subtitle:
"Beragam kegiatan ekstrakurikuler untuk membentuk siswa yang kreatif, aktif, dan berprestasi.",
},
];

let currentSlide = 0;

// Buat dots navigasi
slides.forEach((_, index) => {
const dot = document.createElement("button");
dot.classList.add(
  "w-3",
  "h-3",
"rounded-full",
"transition-colors",
"duration-300"
);
dot.classList.add(
index === 0 ? "bg-white" : "bg-white/50",
"hover:bg-white"
);
dot.addEventListener("click", () => {
goToSlide(index);
});
sliderDotsContainer.appendChild(dot);
});
const dots = sliderDotsContainer.querySelectorAll("button");

function goToSlide(slideIndex) {
slides[currentSlide].classList.remove("active");
dots[currentSlide].classList.replace("bg-white", "bg-white/50");

currentSlide = slideIndex;

slides[currentSlide].classList.add("active");
dots[currentSlide].classList.replace("bg-white/50", "bg-white");

// Update teks hero dengan animasi fade
heroTitle.style.opacity = 0;
heroSubtitle.style.opacity = 0;
setTimeout(() => {
heroTitle.textContent = slideContent[currentSlide].title;
heroSubtitle.textContent = slideContent[currentSlide].subtitle;
heroTitle.style.opacity = 1;
heroSubtitle.style.opacity = 1;
}, 500);
}

function nextSlide() {
  let newSlide = (currentSlide + 1) % slides.length;
goToSlide(newSlide);
}

// Ganti slide setiap 5 detik
setInterval(nextSlide, 5000);
  </script> --}}
  @stack('scripts')
</body>

</html>