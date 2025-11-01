@extends('layouts.depan')
@section('title', ($kategori->nama_kategori ?? $tag->name) ?? 'Daftar Post')
@section('content')
<section class="container mx-auto px-6 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-[10%]">

        <!-- === KIRI: KONTEN ARTIKEL === -->
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">

            <!-- Bagian dalam: dibagi 2 grid -->
            @foreach ($posts as $post )

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">

                <!-- Kolom kiri: gambar -->
                <div class="overflow-hidden rounded-xl shadow-md">
                    <img src="{{ asset('storage/'.$post->cover_image) }}" alt="{{ $post->slug }}"
                        class="w-full h-64 md:h-80 object-cover rounded-xl shadow-md">
                </div>

                <!-- Kolom kanan: teks -->
                <div class="flex flex-col justify-between">
                    <div>
                        <h1
                            class="text-3xl font-bold text-gray-800 dark:text-white mb-3 hover:text-green-400 transition">
                            <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                        </h1>

                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-4">
                            <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                            <span>{{ $post->published_at->format('d F Y') }}</span>
                            <span class="mx-2">•</span>
                            <span>Oleh admin</span>
                        </div>

                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed text-justify mb-4">
                            {{ Str::limit(strip_tags($post->content), 200) }}
                        </p>
                    </div>

                    <div class="mt-2">
                        <strong>Tags:</strong>
                        <span class="ml-2">
                            {{-- @foreach ($posts->tags as $tag) --}}
                            <a href="{{ route('tag.show', $tag->slug) }}"
                                class="inline-block bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2 hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                                {{ $tag->name }}
                            </a>
                            {{-- @endforeach --}}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- === KANAN: SIDEBAR === -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
            <h2
                class="text-xl font-semibold text-gray-800 dark:text-white mb-4 border-b border-gray-300 dark:border-gray-700 pb-2">
                Berita Terbaru
            </h2>

            @foreach ($latestPosts as $latest)
            <div class="flex items-start mb-4">
                <img src="{{ asset('storage/'.$latest->cover_image) }}" alt="{{ $latest->title }}"
                    class="w-16 h-16 object-cover rounded-lg mr-4 transition-transform duration-300 hover:scale-105">
                <div>
                    <a href="{{ route('posts.show', $latest->slug) }}"
                        class="font-semibold text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">
                        {{ Str::limit($latest->title, 60) }}
                    </a>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $latest->published_at->format('d M Y') }}
                    </p>
                </div>
            </div>
            @endforeach

            <a href="{{ url('posts.index') }}"
                class="inline-block mt-4 text-blue-600 dark:text-blue-400 hover:underline font-semibold">
                Lihat Semua Berita →
            </a>
        </div>
    </div>
</section>

@endsection