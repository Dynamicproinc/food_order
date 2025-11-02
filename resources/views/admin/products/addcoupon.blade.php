@extends('admin.layout')
@section('title', 'Add Coupon')
@section('content')
    <div>
        <div class="container mt-3">
           @livewire('admin.products.coupon')
        </div>
    </div>
@endsection