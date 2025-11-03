@extends('layouts.app')
@section('title', 'Cart')
@section('content')
    <div class="mb-5">
        {{-- @if(session('cart') && count(session('cart')> 0)) --}}
        
        @livewire('shop.cart')
        {{-- @else
        @endif --}}
    </div>
@endsection