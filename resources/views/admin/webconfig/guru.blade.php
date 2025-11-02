@extends('layouts.dashboard')
@section('title', 'Web Configuration - Guru')
@section('content')
<div class="container mx-auto px-4 py-8">
    @livewire('admin.guru-controller')
</div>
@endsection