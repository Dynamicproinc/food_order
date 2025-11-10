@extends('layouts.app')

@section('title', 'Server Error - ')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center vh-100  text-center">
    <h1 class="display-1 fw-bold text-danger">500</h1>
    <h2 class="h4 mt-3">{{__('Oops! Something went wrong')}}</h2>
    <p class="text-muted mb-4">{{__('It looks like there’s an internal server error. Please try again later.')}}</p>
    <a href="{{ url('/') }}" class="btn btn-dark btn-lg">
        {{__('Go Home')}}
    </a>
</div>
@endsection
