@extends('layouts.depan')
@section('content')
<section id="blog" class="py-12 bg-gray-50 dark:bg-gray-900 mt-[10vh]">
    <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- KONTEN UTAMA -->
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4"> </h1>


            <img src="https://placehold.co/600x400/8cf1c2/FFFFFF?text=Sambutan Kepala Sekolah" alt="Seminar Teknologi"
                class="w-full sm:w-1/2 md:w-full h-48 object-cover rounded-xl" />

            <p class="mt-6 text-xl text-gray-700 dark:text-gray-300 leading-relaxed mb-4 text-justify ">
                {{$prakata->isi}}
            </p>

            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6">
                <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                <span>{{ $prakata->updated_at->format('d F Y') }}</span>
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