@extends('admin.layout')
@section('title', 'Reviews')
@section('content')
<div>
        <div class="container mt-3">
           <div class="row justify-content-center">
            <div class="col-lg-10">
                @livewire('admin.products.reviews')
            </div>
           </div>
        </div>
</div>

@endsection