@extends('layouts.app')

@section('title', 'Access Denied')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center vh-100  text-center">
    <h1 class="display-1 fw-bold text-warning">403</h1>
    <h2 class="h4 mt-3">{{__('Access Denied')}}</h2>
    <p class="text-muted mb-4">{{__('You don’t have permission to access this page.')}}</p>
    <a href="{{ url('/') }}" class="btn btn-dark btn-lg">
        {{__('Go Home')}}
    </a>
</div>
@endsection
