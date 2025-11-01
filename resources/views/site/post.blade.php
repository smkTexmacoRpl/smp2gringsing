<!-- resources/views/site/post.blade.php -->
@extends('layouts.apps')
@section('title',$post->title)
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <div class="mb-2 text-muted">Kategori: <a href="{{ route('category.show', $post->kategori->slug) }}">{{
                    $post->kategori->name }}</a> — {{ $post->published_at?->format('d M Y') }}</div>
            @if($post->cover_image)
            <img src="{{ asset('storage/'.$post->cover_image) }}" class="img-fluid mb-3">
            @endif
            <div class="content">{!! $post->content !!}</div>
            <div class="mt-3">
                @foreach($post->tags as $tag) <a href="{{ route('tag.show',$tag->slug) }}"
                    class="badge bg-secondary text-decoration-none">{{ $tag->name }}</a> @endforeach
            </div>
        </div>

        <div class="col-md-4">
            <h5>Artikel Terkait</h5>
            @foreach($related as $r)
            <div><a href="{{ route('posts.show', $r->slug) }}">{{ $r->title }}</a></div>
            @endforeach
        </div>
    </div>
</div>
@endsection