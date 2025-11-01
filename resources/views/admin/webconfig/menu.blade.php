@extends('layouts.dashboard')
@section('title', 'Menu')
@section('content')
<div class="container mx-auto p-4">
    @livewire('menu-dropdown')
</div>
@endsection