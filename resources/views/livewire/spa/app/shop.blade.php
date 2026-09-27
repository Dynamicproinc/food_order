<div>
     {{-- navbar --}}
    {{-- @include('inc.dark-navbar') --}}
    @include('inc.spa.topnav')
    <div class="safty-top"></div>

    {{-- centent --}}
    <div>
        <div class="container">
            <div id="index-shop">
                {{-- search bar --}}

                <div class="search-bar mb-4">
                    <div class="search-input">
                        <i class="bi bi-search"></i>
                        <input type="text" placeholder="Search Dish, Restaurant..." />
                    </div>

                    <button class="filter-btn" type="button">
                        <i class="bi bi-sliders2"></i>
                    </button>
                </div>
                {{--  --}}
                {{-- carseol --}}
                <div class="mb-4">
                    <div class="d-flex justify-content-between">
                        <h6 class="fw-bold mb-3">{{ __('Exclusive Offers') }}</h6>
                        <a href="#">{{ __('See all') }}</a>
                    </div>
                    @persist('carousel')
                    <div id="cr001" class="carousel slide" data-bs-ride="carousel" wire:ignore>

                        <div class="carousel-inner rounded-4" style="max-height: 180px">
                            <div class="carousel-item active">
                                <img src="{{ asset('images/mb-food-cr-003.jpg') }}" class="d-block w-100 rounded-4"
                                    alt="{{ asset('images/mb-food-cr-003.jpg') }}">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/mb-foods-cr-001.webp') }}" class="d-block w-100 rounded-4"
                                    alt="{{ asset('images/mb-foods-cr-001.webp') }}">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/mb-food-cr-002.jpg') }}" class="d-block w-100 rounded-4"
                                    alt="{{ asset('images/mb-food-cr-002.jpg') }}">
                            </div>
                            
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#cr001" data-bs-slide-to="0" class="active"
                                    aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#cr001" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#cr001" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                        </div>

                    </div>
                    @endpersist

                </div>
                {{-- caraseol --}}
                {{-- notice --}}
                {{-- <div class="theme-notice-wrap">
                     <div class="theme-notice">We are closed today see you soon</div>
                </div> --}}
                {{-- end notice --}}
                <div class="mb-5"  id="shop-section">
                    <h6 class="mb-3 fw-bold">{{ __('Explore Categories') }}</h6>
                    <ul class="primary-menu">
                        {{-- <li class="active-menu">Burger</li>
                        <li>Gablace</li>
                        <li>Pica</li>
                        <li>Prilozi</li>
                        <li>Wrap</li> --}}
                        <li @if($selected_category_id == null) class="active-menu" @endif>
                            <a href="{{ route('spa.shop') }}" wire:navigate>SVE</a>
                        </li>
                        @foreach ($categories as $item)
                             <li @if($selected_category_id == $item->id) class="active-menu" @endif>
                                <a href="{{ route('spa.shop', $item->category_name) }}" wire:navigate  wire:scroll>{{  str_replace('-', ' ', $item->category_name); }}</a>
                             </li>
                        @endforeach
                    </ul>
                </div>
                <div class="mb-5">
                  
                    <div>
                        @foreach ($products as $product)
                           <div wire:transition.duration.300ms>
                             <div class="product-list-item">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-2">
                                        <h1 class="product-title mb-0">{{ $product->title }}</h1>
                                        <h6 class="theme-text-color fw-bold mb-0">{{ number_format($product->discounted_price, 2, ',', ' ') }} €</h6>
                                        @if($product->points > 0)
                                        <span class="theme-badge">
                                            <i class="bi bi-tag"></i> {{number_format($product->points)}} - {{ __('Coupon applied') }}
                                        </span>
                                        @endif
                                    </div>
                                    <p class="theme-p">
                                        {{Str::limit($product->description, 70, '...')}}
                                    </p>
                                </div>
                                <div class="col-6">
                                    <a href="{{route('spa.show-product', $product->slug)}}" wire:navigate>
                                        <img src="{{ asset($product->image_path) }}" alt="" class="img-thumb">
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="sept">

                        </div>
                           </div>
                        @endforeach
                    </div>
                  
                        {{-- <div>
                        <div class="product-list-item">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-2">
                                        <h1 class="product-title mb-0">Smash Burger</h1>
                                        <h6 class="theme-text-color fw-bold mb-0">7,50 EUR</h6>
                                        <span class="theme-badge">
                                            <i class="bi bi-tag"></i> Coupone applicable
                                        </span>
                                    </div>
                                    <p class="theme-p">Dvije pljeskavice od 80 g Black Angus govedine s dvjema
                                        kriškama cheddar sira, poslužene u brioche pecivu</p>
                                </div>
                                <div class="col-6">
                                    <img src="{{ asset('images/test-banner.webp') }}" alt="" class="img-thumb">
                                </div>
                            </div>

                        </div>
                       
                    </div> --}}

                </div>
                {{-- <a href="{{ route('product.show', 123) }}"
                    wire:click="$dispatch('open-product', { slug: '{{ 123 }}' })">
                    test man
                </a> --}}
                {{--  --}}
                {{-- @if ($show) --}}
               
                @if(session('cart',[]))
                    <div class="position-sticky fixed-bottom btn-dark-theme d-flex justify-content-between p-2 mb-2 rounded-2"
                        style="top: 1rem; bottom:1rem">
                         
                            @php
                                $cart_total = 0;
                                $total_items = 0;
                                foreach (session('cart', []) as $key => $item) {
                                  $cart_total = $cart_total + ($item['price'] * $item['quantity']);
                                  $total_items = $total_items + $item['quantity'];

                                }
                            @endphp
                        <button type="button" class="btn btn-dark-theme">
                            <i class="bi bi-bag"></i> {{number_format($total_items)}} - {{ number_format($cart_total, 2, ',', '.') }} €
                        </button>

                        <a type="button" class="btn btn-dark-theme fw-bolder" href="{{route('spa.cart')}}" wire:navigate>
                            {{__('Continue')}}
                        </a>

                    </div>
                    @endif
                {{-- @endif --}}

                {{--  --}}
            </div>
        </div>

    </div>

</div>
