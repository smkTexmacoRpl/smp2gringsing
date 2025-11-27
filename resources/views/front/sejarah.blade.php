@extends('layouts.depan')
@section('title','visi&misi')
@section('content')

<section id="blog" class="py-12 bg-gray-50 dark:bg-gray-900 mt-[10vh]">
    <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- KONTEN UTAMA -->
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">Sejarah Berdirinya SMP Negeri 2 Gringsing,
                Kabupaten Batang, Jawa Tengah </h1>

            <p class="mt-6  text-gray-700 dark:text-gray-300 leading-relaxed mb-4 text-justify">

                Pendahuluan
                SMP Negeri 2 Gringsing merupakan salah satu lembaga pendidikan menengah pertama di wilayah Kecamatan
                Gringsing, Kabupaten Batang, Provinsi Jawa Tengah. Sekolah ini tidak hanya menjadi pusat pembelajaran
                bagi siswa setempat, tetapi juga simbol perkembangan pendidikan di daerah pedesaan yang kaya akan
                potensi alam dan budaya. Dengan komitmen untuk mencetak generasi muda yang beriman, berilmu, dan
                berakhlak mulia, SMP Negeri 2 Gringsing telah menempuh perjalanan panjang sejak didirikan lebih dari
                tiga dekade lalu. Artikel ini akan mengupas sejarah berdirinya sekolah ini, mulai dari latar belakang
                hingga perkembangannya hingga kini.
            </p>
            <p class="mt-6  text-gray-700 dark:text-gray-300 leading-relaxed mb-4 text-justify">


                Latar Belakang Pendirian
                Pada awal tahun 1990-an, Kabupaten Batang mengalami peningkatan signifikan dalam kebutuhan pendidikan
                dasar dan menengah, seiring dengan program pemerintah Orde Baru yang menekankan wajib belajar sembilan
                tahun. Di Kecamatan Gringsing, yang dikenal dengan panorama alamnya seperti pantai dan perbukitan, akses
                pendidikan menengah masih terbatas. SMP Negeri 1 Gringsing, yang berdiri sejak 1965, sudah kelebihan
                daya tampung, sehingga muncul kebutuhan mendesak untuk mendirikan sekolah baru guna menjangkau siswa
                dari desa-desa sekitar seperti Surodadi, Wonotunggal, dan daerah pegunungan.
                Pemerintah daerah Kabupaten Batang, bekerja sama dengan Kementerian Pendidikan dan Kebudayaan, merespons
                tuntutan ini dengan merencanakan pendirian SMP baru. Inisiatif ini didorong oleh tokoh masyarakat lokal
                dan pejabat pendidikan setempat, yang melihat pendidikan sebagai kunci pemberdayaan ekonomi dan sosial
                di wilayah agraris tersebut. Pendirian sekolah ini juga sejalan dengan kebijakan nasional untuk
                memperluas jaringan sekolah negeri di daerah terpencil.
            </p>



        </div>

        <!-- SIDEBAR: LATEST NEWS -->
        <aside class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Berita Terbaru</h2>
            <ul class="space-y-4">
                @foreach ($latestPosts as $post)
                <li class="border-b border-gray-200 dark:border-gray-700 pb-4">
                    <a href="{{ route('posts.show', $post->slug) }}"
                        class="block hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                        🔹 {{ $post->title }}
                    </a>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $post->published_at->format('d F Y') }}
                    </p>
                </li>
                @endforeach
            </ul>
            <div class="mt-6">

                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Artikel Terkait</h2>
                <ul class="space-y-4">
                    @foreach($related as $r)
                    <li><a href="{{ url('posts/'. $r->slug) }}">{{ $r->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </aside>
    </div>
</section>

@endsection