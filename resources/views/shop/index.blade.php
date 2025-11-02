@extends('layouts.app')
@section('title', 'Shop')
@section('content')
    <div>
        <div class="d-flex justify-content-center">
           <div>
             @if (count($categories) > 0)
                <div class="d-flex mb-3">
                    <a href="{{ route('shop.index')}}" class="menu-tab {{ request()->route('category') == null ? 'menu-tab-active' : '' }}">Sve</a>
                    @foreach ($categories as $item )
                         
                    <a class="menu-tab {{ request()->route('category') == $item->category_name ? 'menu-tab-active' : '' }}" href="{{route('shop.category',$item->category_name)}}">
                        {{$item->category_name}}
                    </a>
                    @endforeach
                
            </div>
           @endif
           </div>
        </div>
    @livewire('shop.index',['products'=>$products])
    </div>
@endsection
