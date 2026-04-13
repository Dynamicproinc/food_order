@extends('layouts.app')
@section('title', 'Shop')
@section('content')

    {{-- @php
            $status = App\Models\ShopStatus::whereDate('closing_date', today())
                ->where('status_name', 'closed')
                ->first();
        @endphp
        @if ($status)
        <div class="fixed-bottom">
            <div class="notice">
                <p>{{ $status->status_color}}</p>
            </div>
        </div>
        @endif --}}

    {{-- <div class="banner">
        <div class="row">
            <div class="col-8">
                <div class="">
                    <div class="hero-banner">
                        <div>
                            <h1>Uživaj u ukusnoj hrani i osvoji kupone!</h1>
                            <p>Dobij kupon za svako jelo iz <strong>M Brothers Food</strong> trucka — požuri i registriraj se još danas!</p>
                             @guest<a href="{{ route('register') }}" class="btn btn-warning">Registriraj se</a>@endguest
                        </div>
                    </div>
                </div>



            </div>
            <div class="col-4">
                <div class="">
                    <img src="{{ asset('images/design/philly_cheese.png') }}" alt="burger" class="banner-image">
                </div>
            </div>
        </div>
    </div> --}}


    <div>
        {{-- <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="banner">
                        <div class="row">
                            <div class="col-8">
                                <div class="">
                                    <div class="hero-banner">
                                        <div>
                                            <h1>Uživaj u ukusnoj hrani i osvoji kupone!</h1>
                                            <p>Dobij kupon za svako jelo iz <strong>M Brothers Food</strong> trucka — požuri
                                                i registriraj se još danas!</p>
                                            @guest<a href="{{ route('register') }}" class="btn btn-warning">Registriraj
                                                se</a>@endguest
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="col-4">
                                <div class="">
                                    <img src="{{ asset('images/design/philly_cheese.png') }}" alt="burger"
                                        class="banner-image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="banner" style="background-image: url('{{ asset('images/design/banner2.JPG') }}')">
                        <div class="row">
                            <div class="col-12">
                                <div class="">
                                    <div class="hero-banner" style="background-color: rgba(0, 0, 0, 0.5); height:400px">
                                        <div>
                                            <h1>Gladni? 😋</h1>
                                            <p>Naš food truck u Velikoj Gorici poslužuje sreću, zalogaj po zalogaj. Dođite i pridružite se street food zabavi!</p>
                                           
                                        </div>
                                    </div>
                                </div>



                            </div>
                           
                        </div>
                    </div>
                </div>
               
            </div>
           
        </div> --}}
         <div class="banner">
            {{-- add video cover here responsivr --}}
            <video autoplay muted loop style="width: 100%; height:100%">
                <source src="{{ asset('videos/mbrothers_food.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="overlay"></div>
                      
        </div>


    </div>

    <div class="d-flex justify-content-center mb-3 mt-3">
        <div class="d-sm-block d-none">
            <div style="">

                @if (count($categories) > 0)
                    <div class="d-flex mb-3">
                        {{-- <a href="{{ route('shop.index')}}" class="menu-tab {{ request()->route('category') == null ? 'menu-tab-active' : '' }}">
                       
                        Sve
                    </a> --}}
                        <a href="{{ route('shop.index') }}" class="cat-link">
                            <div class="cat-button">
                                <div class="">
                                    <div class="d-flex justify-content-center">
                                        <div class="icon  {{ request()->route('category') == null ? 'cat-active' : '' }}">
                                            <img src="{{ asset('images/category/all.svg') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="text">
                                        sve
                                    </div>
                                </div>
                            </div>
                        </a>
                        @foreach ($categories as $item)
                            {{-- <a class="menu-tab {{ request()->route('category') == $item->category_name ? 'menu-tab-active' : '' }}" href="{{route('shop.category',$item->category_name)}}">
                        {{$item->category_name}}
                    </a> --}}
                            <a href="{{ route('shop.category', $item->category_name) }}" class="cat-link">
                                <div class="cat-button">
                                    <div class="">
                                        <div class="d-flex justify-content-center">
                                            <div
                                                class="icon {{ request()->route('category') == $item->category_name ? 'cat-active' : '' }}">
                                                <img src="{{ asset('images/category/' . $item->image) }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="text">
                                            {{ str_replace('-', ' ', $item->category_name) }}

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
        <div class="d-sm-none d-block">
            <div style="max-width:380px; overflow-x:auto;">

                @if (count($categories) > 0)
                    <div class="d-flex mb-3">
                        {{-- <a href="{{ route('shop.index')}}" class="menu-tab {{ request()->route('category') == null ? 'menu-tab-active' : '' }}">
                       
                        Sve
                    </a> --}}
                        <a href="{{ route('shop.index') }}" class="cat-link">
                            <div class="cat-button">
                                <div class="">
                                    <div class="d-flex justify-content-center">
                                        <div class="icon  {{ request()->route('category') == null ? 'cat-active' : '' }}">
                                            <img src="{{ asset('images/category/all.svg') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="text">
                                        sve
                                    </div>
                                </div>
                            </div>
                        </a>
                        @foreach ($categories as $item)
                            {{-- <a class="menu-tab {{ request()->route('category') == $item->category_name ? 'menu-tab-active' : '' }}" href="{{route('shop.category',$item->category_name)}}">
                        {{$item->category_name}}
                    </a> --}}
                            <a href="{{ route('shop.category', $item->category_name) }}" class="cat-link">
                                <div class="cat-button">
                                    <div class="">
                                        <div class="d-flex justify-content-center">
                                            <div
                                                class="icon {{ request()->route('category') == $item->category_name ? 'cat-active' : '' }}">
                                                <img src="{{ asset('images/category/' . $item->image) }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="text">
                                            {{ str_replace('-', ' ', $item->category_name) }}

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
    </div>
    @livewire('shop.index', ['products' => $products])
    </div>
@endsection
