@extends('admin.layout')
@section('title', 'Add Product')
@section('content')
    <div>
        <div class="container mt-3">
           @livewire('admin.products.add')
        </div>
    </div>
@endsection