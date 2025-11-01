<!-- resources/views/site/list.blade.php -->
@extends('layouts.depan')
@section('title', ($kategori->nama_kategori ?? $tag->name) ?? 'Daftar Post')
@section('content')
<div class="container py-4">
    <h3>Daftar Post: {{ $kategori->nama_kategori ?? $tag->name }}</h3>
    @foreach($posts as $post)
    <div class="mb-4">
        <h4><a href="{{ route('posts.show',$post->slug) }}">{{ $post->title }}</a></h4>
        <p class="text-muted">{{ $post->excerpt }}</p>
    </div>
    @endforeach
    {{ $posts->links() }}
</div>
@endsection