<div>
    <div>
        <div>
            @section('top_nav_title', __('Your Cart'))
            @section('title', __('Your Cart -'))
            @section('bg_color', __('bg-dark'))
            @include('inc.spa.topnav')
        </div>
        <div class="safty-top"></div>
        <div class="container">
            @foreach (session('cart', []) as $index => $item)
                <div>
                    <div class="product-list-items">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-2">
                                    <h4 class="fw-bold"><span class="theme-text-color"> {{ $item['quantity'] }}x
                                        </span>{{ \App\Models\Product::where('id', $item['product_id'])->first()->title }}
                                    </h4>
                                    <h6 class="theme-text-color fw-bold mb-0">
                                        {{ number_format($item['price'], 2, ',', ' ') }} €</h6>
                                    <div>
                                        @if (!empty($item['variants']))
                                            @foreach ($item['variants'] as $v_id => $variant)
                                                <div class="d-flex">
                                                    <div class="text-xs">
                                                        {{ \App\Models\Variant::where('id', $variant)->first()?->value }}
                                                        ({{ number_format(\App\Models\Variant::where('id', $variant)->first()?->price, 2, ',', ' ') }}
                                                        €)
                                                    </div>

                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    {{--  --}}
                                    <div>
                                        @if (!empty($item['choices']))
                                            @foreach ($item['choices'] as $v_id => $variant)
                                                <div class="d-flex">
                                                    <div class="text-xs">
                                                        {{ \App\Models\ProductChoice::where('id', $variant)->first()?->getChoiceName()->Choice_name }}
                                                        ({{ number_format(\App\Models\ProductChoice::where('id', $variant)->first()?->price, 2, ',', ' ') }}
                                                        €)
                                                    </div>

                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    {{--  --}}
                                </div>

                            </div>
                            <div class="col-6">
                                <a href="{{ route('spa.show-product', \App\Models\Product::where('id', $item['product_id'])->first()->slug) }}"
                                    wire:navigate>
                                    <img src="{{ asset(\App\Models\Product::where('id', $item['product_id'])->first()->image_path) }}"
                                        alt="" class="img-thumb-sm">
                                </a>
                                <div class="mt-2"> <button type="button" class="btn btn-outline-danger w-100"
                                        wire:click="removeCartItem('{{ $index }}')" wire:loading.attr="disabled"
                                        wire:target="removeCartItem('{{ $index }}')"> <i class="bi bi-trash"
                                            wire:loading.remove wire:target="removeCartItem('{{ $index }}')"></i>
                                        <span class="spinner-border spinner-border-sm" role="status" wire:loading
                                            wire:target="removeCartItem('{{ $index }}')"> <span
                                                class="visually-hidden">Loading...</span> </span> </button> </div>
                                              

                            </div>
                        </div>

                    </div>
                    <div class="sept">

                    </div>
                </div>
            @endforeach

            <div class="position-sticky fixed-bottom py-2 theme-bg" style="top: 1rem;">

                <div class="mb-4">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="font-weight-bold cart-total">{{ __('Total') }}<span class="theme-text-color">  ({{number_format($total_items)}})</span></h3>
                        </div>
                        <div class="text-right">
                            <h3 class="font-weight-bold cart-total theme-text-color">{{ number_format($cart_total, 2, ',', '.') }} €</h3>
                        </div>
                    </div>
                </div>

                <a type="button" href="{{route('spa.checkout')}}"class="btn btn-dark-theme btn-lg fw-bolder w-100" wire:navigate>
                    {{ __('Checkout') }}
                </a>

            </div>
        </div>

    </div>

</div>
