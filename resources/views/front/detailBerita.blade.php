@extends('layouts.depan')
@section('title','detail berita')
@section('content')
<section id="blog" class="py-12 bg-gray-50 dark:bg-gray-900 mt-[10vh]">
    <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- KONTEN UTAMA -->
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">{{ $post->title }}</h1>
            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6">
                <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                <span>{{ $post->published_at->format('d F Y') }}</span>
                <span class="mx-2">•</span>
                <span>Oleh admin</span>
            </div>

            <img src="{{ asset('storage/'.$post->cover_image) }}" alt="{{ $post->slug }}"
                class="w-full h-64 object-cover rounded-xl mb-6">

            <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4 text-justify">
                {{$post->content}}
            </p>

            <div class="mt-6">
                <strong>Tags:</strong>
                <span class="ml-2">
                    @foreach ($post->tags as $tag)
                    <a href="{{ route('tag.show', $tag->slug) }}"
                        class="inline-block bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2 hover:bg-gray-300 dark:hover:bg-gray-600">
                        {{ $tag->name }}
                    </a>
                    @endforeach
                </span>
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