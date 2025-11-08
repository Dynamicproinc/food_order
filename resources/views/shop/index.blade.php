@extends('layouts.app')
@section('title', 'Shop')
@section('content')
    <div>
        <div class="d-flex justify-content-center mb-3 mt-3">
           <div>
           
             @if (count($categories) > 0)
                <div class="d-flex mb-3">
                    {{-- <a href="{{ route('shop.index')}}" class="menu-tab {{ request()->route('category') == null ? 'menu-tab-active' : '' }}">
                       
                        Sve
                    </a> --}}
                    <a href="{{ route('shop.index')}}" class="cat-link">
                 <div class="cat-button">
               <div class="">
                 <div class="d-flex justify-content-center">
                    <div class="icon  {{ request()->route('category') == null ? 'cat-active' : '' }}">
                     <img src="{{asset('images/category/all.svg')}}" alt="" class="img-fluid">
                </div>
                 </div>
                <div class="text">
                    sve
                </div>
               </div>
            </div>
            </a>
                    @foreach ($categories as $item )
                         
                    {{-- <a class="menu-tab {{ request()->route('category') == $item->category_name ? 'menu-tab-active' : '' }}" href="{{route('shop.category',$item->category_name)}}">
                        {{$item->category_name}}
                    </a> --}}
                    <a href="{{route('shop.category',$item->category_name)}}" class="cat-link">
                 <div class="cat-button">
               <div class="">
                 <div class="d-flex justify-content-center">
                    <div class="icon {{ request()->route('category') == $item->category_name ? 'cat-active' : '' }}">
                     <img src="{{asset('images/category/'.$item->image)}}" alt="" class="img-fluid">
                </div>
                 </div>
                <div class="text">
                   {{$item->category_name}}
                </div>
               </div>
            </div>
            </a>
                    @endforeach
                
            </div>
            {{--  --}}
             
            {{--  --}}
           @endif
           </div>
        </div>
    @livewire('shop.index',['products'=>$products])
    </div>
@endsection
