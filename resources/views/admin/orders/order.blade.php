@extends('admin.layout')
@section('title', 'Orders')
@section('content')
    <div>
    



        <div class="mt-3">
            @livewire('admin.orders.index')
        </div>
    </div>
   
@endsection
