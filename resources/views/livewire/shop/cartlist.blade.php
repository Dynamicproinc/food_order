<div>
   <div class="sidenav-cont" id="navcont" wire:ignore.self>
                    <div class="sidenav-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="m-0 p-0  font-weight-bold">{{ __('My Shopping Bag') }} (<span
                                    class="cart-count">0.00</span>)</h6>
                            <button class="btn-close" onclick="closeNav()"></button>
                        </div>
                    </div>
                    <div>
                        <div class="cart-items container p-4 mt-4">
                            <div>
                                {{-- livewirecattlist --}}
                                @if(session('cart',[]) && count(session('cart',[])) > 0)
                                    @foreach (session('cart',[]) as $index => $item)
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
                                                                    {{ \App\Models\Variant::where('id', $variant)->first()?->value }}
                                                                    ({{ number_format(\App\Models\Variant::where('id', $variant)->first()?->price, 2, ',', ' ') }}
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
                                                                    {{ \App\Models\ProductChoice::where('id', $variant)->first()?->getChoiceName()->Choice_name }}
                                                                    ({{ number_format(\App\Models\ProductChoice::where('id', $variant)->first()?->price, 2, ',', ' ') }}
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

                                {{-- livewire cartlist --}}
                            </div>
                        </div>
                        <div class="sidenav-footer">
                            <div class="p-4">
                                <div>
                                    <span class="fw-normal">Total</span>
                                    <h3 class="font-weight-bolder">{{ number_format($grand_total, 2, ',', ' ') }} €</h3>

                                </div>
                                <div class="">
                                    <button class="btn  btn-dark w-100">
                                        <i class="bi bi-bag-check"></i>
                                        {{ __('CHECKOUT') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
