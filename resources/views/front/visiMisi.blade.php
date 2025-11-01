@extends('layouts.depan')
@section('title','visi&misi')
@section('content')
{{-- <section id="events" class="py-12">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12 mt-12">
            <h2 class="text-3xl md:text-4xl font-bold">VISI</h2>

        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Event Card 1 -->
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden flex flex-col sm:flex-row md:flex-col">
                <img src="https://placehold.co/600x400/8cf1c2/FFFFFF?text=Seminar" alt="Seminar Teknologi"
                    class="w-full sm:w-1/2 md:w-full h-48 object-cover" />
                <div class="p-6 flex flex-col justify-between">
                    <div>
                        <div
                            class="flex items-center text-sm text-primary-600 dark:text-primary-400 font-semibold mb-2">
                            <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                            <span>15 September 2024</span>
                        </div>
                        <p class="text-xl font-bold mb-2">
                            {{ $visi->visi }}
                        </p>
                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                            <i data-lucide="map-pin" class="w-4 h-4 mr-2"></i>
                            <span>Aula YPPIT Texmaco</span>
                        </div>
                    </div>
                    <a href="#"
                        class="mt-4 inline-block text-center bg-primary-100 dark:bg-primary-900/50 text-primary-700 dark:text-primary-300 px-4 py-2 rounded-full text-sm font-semibold hover:bg-primary-200 dark:hover:bg-primary-800/50 transition-colors">Dapatkan
                        Tiket</a>
                </div>
            </div>
            <!-- Event Card 2 -->
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden flex flex-col sm:flex-row md:flex-col">
                <img src="https://placehold.co/600x400/8cf1c2/FFFFFF?text=Workshop" alt="Workshop Coding"
                    class="w-full sm:w-1/3 md:w-full h-48 object-cover" />
                <div class="p-6 flex flex-col justify-between">
                    <div>
                        <div
                            class="flex items-center text-sm text-primary-600 dark:text-primary-400 font-semibold mb-2">
                            <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                            <span>22-24 Oktober 2024</span>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Workshop Coding untuk Pemula</h3>
                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                            <i data-lucide="map-pin" class="w-4 h-4 mr-2"></i>
                            <span>Laboratorium Komputer</span>
                        </div>
                    </div>
                    <a href="#"
                        class="mt-4 inline-block text-center bg-primary-100 dark:bg-primary-900/50 text-primary-700 dark:text-primary-300 px-4 py-2 rounded-full text-sm font-semibold hover:bg-primary-200 dark:hover:bg-primary-800/50 transition-colors">Daftar
                        Sekarang</a>
                </div>
            </div>
            <!-- Event Card 3 -->

        </div>
    </div>
    </div>
</section> --}}

{{-- <section id="events" class="py-12">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12 mt-12">
            <h2 class="text-3xl md:text-4xl font-bold">VISI</h2>
        </div>

        <!-- Ubah di sini -->
        <div class="grid grid-cols-1 gap-8">
            <!-- Event Card 1 -->
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden flex flex-col sm:flex-row md:flex-col">
                <img src="https://placehold.co/600x400/8cf1c2/FFFFFF?text=Visi" alt="Visi"
                    class="w-full sm:w-1/2 md:w-full h-48 object-cover" />
                <div class="p-6 flex flex-col justify-between">
                    <div>
                        <div
                            class="flex items-center text-sm text-primary-600 dark:text-primary-400 font-semibold mb-2">
                            <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                            <span>15 September 2024</span>
                        </div>
                        <p class="text-xl font-light mb-2">
                            {{ $visi->visi }}
                        </p>
                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                            <i data-lucide="map-pin" class="w-4 h-4 mr-2"></i>
                            <span>Aula YPPIT Texmaco</span>
                        </div>
                    </div>

                </div>
            </div>

            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden flex flex-col sm:flex-row md:flex-col">
                <img src="https://placehold.co/600x400/8cf1c2/FFFFFF?text=Misi" alt="Misi"
                    class="w-full sm:w-1/2 md:w-full h-48 object-cover" />
                <div class="p-6 flex flex-col justify-between">
                    <div>
                        <div
                            class="flex items-center text-sm text-primary-600 dark:text-primary-400 font-semibold mb-2">
                            <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                            <span>15 September 2024</span>
                        </div>
                        <p class="text-xl font-light mb-2">
                            {{ $visi->misi }}
                        </p>
                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                            <i data-lucide="map-pin" class="w-4 h-4 mr-2"></i>
                            <span></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section> --}}

<section id="blog" class="py-12 bg-gray-50 dark:bg-gray-900 mt-[10vh]">
    <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- KONTEN UTAMA -->
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4"> </h1>


            <img src="https://placehold.co/600x400/8cf1c2/FFFFFF?text=Visi" alt="Seminar Teknologi"
                class="w-full sm:w-1/2 md:w-full h-48 object-cover rounded-xl" />

            <p class="mt-6 text-2xl text-gray-700 dark:text-gray-300 leading-relaxed mb-4 text-justify">
                {{$visi->visi}}
            </p>

            <img src="https://placehold.co/600x400/8cf1c2/FFFFFF?text=Misi" alt="Seminar Teknologi"
                class="w-full sm:w-1/2 md:w-full h-48 object-cover rounded-xl" />

            <p class="mt-6 text-2xl text-gray-700 dark:text-gray-300 leading-relaxed mb-4 text-justify">
                {{$visi->misi}}
            </p>

            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6">
                <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                <span>{{ $visi->updated_at->format('d F Y') }}</span>
            </div>
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

                {{-- <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Artikel Terkait</h2>
                <ul class="space-y-4">
                    @foreach($related as $r)
                    <li><a href="{{ url('posts/'. $r->slug) }}">{{ $r->title }}</a></li>
                    @endforeach
                </ul> --}}
            </div>
        </aside>
    </div>
</section>

@endsection