<!-- resources/views/site/home.blade.php -->
@extends('layouts.app')
@section('title','Beranda - Blog SMA')
@section('content')
<div class="container">
    <!-- Hero -->
    <section class="py-5 text-center"
        style="background:url('{{ $hero['bg'] ?? asset('images/hero-school.jpg') }}') center/cover;">
        <div class="bg-dark bg-opacity-50 text-white p-5 rounded">
            <h1>{{ $hero['title'] }}</h1>
            <p class="lead">{{ $hero['subtitle'] }}</p>
        </div>
    </section>

    <!-- About -->
    <section class="py-5">
        <div class="row">
            <div class="col-md-8">
                <h3>Tentang Sekolah</h3>
                <p>{{ $about }}</p>
            </div>
            <div class="col-md-4">
                <h5>Visi</h5>
                <p>{{ $visi }}</p>
                <h5>Misi</h5>
                <ul>
                    @foreach($misi as $m) <li>{{ $m }}</li> @endforeach
                </ul>
            </div>
        </div>
    </section>

    <!-- Latest posts -->
    <section class="py-5">
        <h3>Berita Terbaru</h3>
        <div class="row">
            @foreach($latest as $post)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($post->cover_image)
                    <img src="{{ asset('storage/'.$post->cover_image) }}" class="card-img-top"
                        style="height:180px;object-fit:cover">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-sm btn-primary">Baca</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection