@extends('layouts.app')

@section('title', 'Page Expired')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center vh-100  text-center">
    <h1 class="display-1 fw-bold text-secondary">419</h1>
    <h2 class="h4 mt-3">{{__('Page Expired')}}</h2>
    <p class="text-muted mb-4">{{__('Your session has expired. Please refresh the page and try again.')}}</p>
    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-lg me-2">
        {{__('Go Back')}}
    </a>
    <a href="{{ url('/') }}" class="btn btn-dark btn-lg mt-3">
        {{__('Go Home')}}
    </a>
</div>
@endsection
