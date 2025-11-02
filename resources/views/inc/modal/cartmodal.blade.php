<div class="light-modal" wire:transition>
    <div class="light-modal-content">
        <div class="">
            <div class="product-display">
                <div class="d-flex justify-content-between p-3 light-header">
                    <div>Your Cart</div>
                    <div>
                        <button class="btn-close" wire:click="closeCartModal"></button>
                        
                    </div>
                </div>
                {{-- <div class="close-btn">
                    <button class="btn btn-default" wire:click="closeModal">X</button>
                </div> --}}
                <div class="scroll-content">
                    <div class="product-md p-3">
                       {{--  --}}
                       {{-- livewirecattlist --}}
                                @if ($cart_items)
                                    @foreach ($cart_items as $index => $item)
                                        <div class="row mb-3">
                                            <div class="col-4">
                                                <div class="position-relative">
                                                    <img src="{{ \App\Models\Product::where('id', $item['product_id'])->first()->image_path }} "
                                                    class="cart-image rounded">
                                                    <span class="qty-badge">
                                                        {{ $item['quantity'] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <span
                                                    class="text-capitalize fw-bold">{{ \App\Models\Product::where('id', $item['product_id'])->first()->title }}
                                                    
                                                </span>
                                                <h6>{{ number_format($item['price'] * $item['quantity'], 2, ',', ' ')}} €</h6>
                                                <div>
                                                    @if (!empty($item['variants']))
                                                        @foreach ($item['variants'] as $v_id => $variant)
                                                            <div class="d-flex justify-content-between">
                                                                <div class="text-xs">
                                                                    {{ \App\Models\Variant::where('id', $variant)->first()->value }}
                                                                    ({{ number_format(\App\Models\Variant::where('id', $variant)->first()->price, 2, ',', ' ') }}
                                                                    €)
                                                                </div>
                                                                <div class="text-xs">
                                                                    {{-- {{ number_format(\App\Models\Variant::where('id', $variant)->first()->price, 2, ',', ' ')}} --}}
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div>
                                                    @if (!empty($item['choices']))
                                                        @foreach ($item['choices'] as $v_id => $variant)
                                                            <div class="d-flex justify-content-between">
                                                                <div class="text-xs">
                                                                    {{ \App\Models\ProductChoice::where('id', $variant)->first()->getChoiceName()->Choice_name }}
                                                                    ({{ number_format(\App\Models\ProductChoice::where('id', $variant)->first()->price, 2, ',', ' ') }}
                                                                    €)
                                                                </div>
                                                                <div class="text-xs">

                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="">
                                                        
                                                        <div class="">
                                                            <small class="text-muted clickable"
                                                                wire:click="removeCartItem('{{$index}}')">Remove</small>
                                                        </div>
                                                    </div>
                                            </div>
                                            

                                        </div>
                                    @endforeach
                                @else
                                    <div class="empty-cart-list">
                                        <div>
                                            <h3 class="text-muted">{{ __('Your cart is empty') }} 😢</h3>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-dark mt-3">{{ __('SHOP NOW') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                       {{--  --}}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
