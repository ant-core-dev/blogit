@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="jumbotron text-center">
        <h1>Blog It!</h1>
        <p>What's stopping you from sharing your experiences?</p>
        @if(!Auth::guest())
        <p><a class="btn btn-primary btn-lg" href="/posts" role="button">View Blog</a></p>
        @else
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
        @endif
    </div>
@endsection