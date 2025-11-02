<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
     <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ uniqid() }}">
    @livewireStyles
</head>

<body>
    <div id="app">
        <nav class="fixed-top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="d-flex justify-content-between dark-1 text-white">
                            <div>
                                <a href="{{ route('shop.index')}}">
                                    <img src="{{ asset('images/logo.jpg') }}" alt=""
                                    style="width: 50px; height:auto;">
                                </a>
                            </div>
                            <div>

                            </div>
                            <div>
                                @auth
                                <a href="{{route('myaccount')}}" class="btn btn-outline-light mx-2">
                                    <i class="bi bi-person"></i>
                                    {{__('Hi')}} {{auth()->user()->name}}
                                </a>
                                @else
                                <a href="{{ route('login')}}" type="button" class="btn btn-outline-light mx-2">
                                    <i class="bi bi-person"></i>
                                    {{__('My Account')}}
                                </a>
                                @endauth

                                <a type="button" href="{{ route('shop.cart') }}" class="btn btn-warning">
                                    @livewire('shop.carbutton')

                                </a>
                                {{-- <button class="animated-cart">
                                        <i class="bi bi-bag"></i>
                                </button> --}}


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        {{-- sidebar --}}
        <div id="snav" class="sidenav">
            <div class="nv-wrap">
                @livewire('shop.cartlist')
                {{--  --}}
            </div>
        </div>
        {{-- sidebar end --}}
        <div style="height:80px"></div>

        <main class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    {{-- sidebar --}}
    <script>
        function openNav() {
            document.getElementById("snav").style.width = "100%";
            document.getElementById("navcont").style.right = "0";
        }

        function closeNav() {
            document.getElementById("navcont").style.right = "-400px";
            document.getElementById("snav").style.width = "0";
        }
    </script>
    <script>
        window.addEventListener('open-nav', event => {
            openNav();
        });
    </script>
    <script>
         window.addEventListener('pop', event => {
           const element = document.querySelector('.cart-icon');
        element.classList.add('cart-pop');
        setTimeout(() => element.classList.remove('cart-pop'), 500); // remove after animation
        });
        
    </script>
    <script>
         window.addEventListener('shrink', event => {
           const element = document.querySelector('.cart-icon');
        element.classList.add('cart-shrink');
        setTimeout(() => element.classList.remove('cart-shrink'), 500); // remove after animation
        });
        
    </script>
    {{-- sidebar --}}
</body>

</html>
