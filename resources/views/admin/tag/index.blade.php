@extends('layouts.dashboard')
@section('title', 'Tag')
@section('page-title', 'Tag')
@section('content')
<!-- It is never too late to be what you might have been. - George Eliot -->

@livewire('admin.tag-controller');
@endsection