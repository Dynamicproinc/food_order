<div>
    <div class="head-nav py-2 fixed-top @yield('bg_color')" id="topnav" style="z-index: 9999">

        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="div">
                    @if (request()->routeIs('spa.shop'))
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/logo.jpg') }}" alt="MBrothers-food.com"
                                style="width: 50px; height:auto;" class="me-2">
                            <span class="logo-text fw-bold">M Brothers Food</span>
                        </div>
                    @else
                        <a class="btn btn-dark-theme fw-bolder me-3" href="#"
                            onclick="history.back(); return false;">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                        <strong class="fw-bold">@yield('top_nav_title')</strong>
                    @endif
                </div>
                <div class="d-flex">
                   <a href="{{ route('spa.cart') }}" class="btn btn-darks position-relative">
    <i class="bi bi-bag"></i>

    @if (count(session('cart', [])) > 0)
        <span class="cart-badge">
            {{ count(session('cart', [])) }}
        </span>
    @endif
</a>
                    <button class="btn btn-dark" onclick="openSB()"><i class="bi bi-list"></i></button>

                </div>

            </div>
        </div>
    </div>
    {{-- side menu --}}
    @include('inc.mobile-side-nav')
    {{-- end side menu --}}
</div>
