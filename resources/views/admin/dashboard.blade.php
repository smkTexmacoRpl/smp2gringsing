@extends('layouts.dashboard')
@section('content')


<div class="container mt-4">
    <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>

@session('success')
<div class="alert alert-success" role="alert">
    {{ $value }}
</div>
@endsession

<h1 class="display-5 fw-bold">Hi, {{ auth()->user()->name }}</h1>
</div>

@endsection