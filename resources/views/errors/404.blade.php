@extends('layouts.app')

@section('title', 'Page Not Found -')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center vh-100  text-center">
    <h1 class="display-1 fw-bold text-danger">404</h1>
    <h2 class="h4 mt-3">{{__('Oops! Page not found')}}</h2>
    <p class="text-muted mb-4">{{__('The page you’re looking for doesn’t exist or has been moved.')}}</p>
    <a href="{{ url('/') }}" class="btn btn-dark btn-lg">
        {{__('Go Home')}}
    </a>
</div>
@endsection
