@extends('layouts.depan')
@section('title','Artikel')
@section('content')
<section id="jurusan" class="py-20">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold">Berita</h2>
            <p class="mt-4 max-w-2xl mx-auto text-gray-600 dark:text-gray-400">

            </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card Jurusan 1 -->
            @forelse ($semuaBerita as $berita)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden group">
                <img src="{{ asset('storage/'.$berita->cover_image) }}" alt="{{ $berita->title }}"
                    class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">{{ $berita->title }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        {{substr($berita->content,0,100) }}
                    </p>
                    <a href="{{ route('posts.show',$berita->slug) }}"
                        class="font-semibold text-primary-600 dark:text-primary-400 hover:underline">Lihat
                        Detail
                        &rarr;</a>
                </div>
            </div>

            @empty
            <p>Tidak ada artikel tersedia.</p>

            @endforelse


            <!-- Card Jurusan 2 -->
        </div>
    </div>
</section>