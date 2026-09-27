<div>
    {{-- navbar --}}
    @include('inc.dark-navbar')

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
                    <div id="cr001" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-inner rounded-4" style="max-height: 180px">
                            <div class="carousel-item active">
                                <img src="{{ asset('images/test-banner.webp') }}" class="d-block w-100 rounded-4"
                                    alt="{{ asset('images/test-banner.webp') }}">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/test-banner.webp') }}" class="d-block w-100 rounded-4"
                                    alt="{{ asset('images/test-banner.webp') }}">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/test-banner.webp') }}" class="d-block w-100 rounded-4"
                                    alt="...">
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
                </div>
                {{-- caraseol --}}
                <div class="mb-5">
                    <h6 class="mb-3 fw-bold">{{ __('Explore Categories') }}</h6>
                    <ul class="primary-menu">
                        <li class="active-menu">Burger</li>
                        <li>Gablace</li>
                        <li>Pica</li>
                        <li>Prilozi</li>
                        <li>Wrap</li>
                    </ul>
                </div>
                <div class="mb-5">
                    <div>
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
                        <div class="sept">

                        </div>
                    </div>
                    <div>
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
                        {{-- <div class="sept">

                        </div> --}}
                    </div>

                </div>
                {{-- <a href="{{ route('product.show', 123) }}"
                    wire:click="$dispatch('open-product', { slug: '{{ 123 }}' })">
                    test man
                </a> --}}
                {{--  --}}
                {{-- @if ($show) --}}
                    <div class="position-sticky fixed-bottom btn-dark-theme d-flex justify-content-between p-2 rounded-2"
                        style="top: 1rem;">

                        <button type="button" class="btn btn-dark-theme">
                            <i class="bi bi-bag"></i> 5 - 37,50 €
                        </button>

                        <button type="button" class="btn btn-dark-theme fw-bolder">
                            Continue
                        </button>

                    </div>
                {{-- @endif --}}

                {{--  --}}
            </div>
        </div>

    </div>
</div>
