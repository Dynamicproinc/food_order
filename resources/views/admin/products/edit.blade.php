@extends('admin.layout')
{{-- @section('title', 'Edit Product') --}}
@section('content')
    <div>
        <div class="container mt-3">
            
          <div class="row justify-content-center">
            <div class="col-lg-6">
                 @livewire('admin.products.edit', ['product_id' => $product_id])
            </div>
          </div>
        </div>
    </div>
@endsection