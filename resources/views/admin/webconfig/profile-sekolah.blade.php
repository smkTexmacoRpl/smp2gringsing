@extends('layouts.dashboard')
@section('title', 'Profil Sekolah')
@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Profil Sekolah</h1>
    @livewire('admin.profil-sekolah')
</div>

@endsection