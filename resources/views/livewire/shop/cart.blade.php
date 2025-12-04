<div>
    @if (session('cart', []) && count(session('cart', [])) > 0)
        <div class="d-flex justify-content-between">

            {{-- <a href="{{ route('shop.index') }}" class="btn btn-default btn-lg fw-bold"> <i class="bi bi-chevron-left"></i> {{ __('Order now') }}</a> --}}
            <div class="px-3">
                <h5 class="fw-bolder">{{ __('Order now') }}</h5>
            </div>
        </div>
        {{-- <div class="cou-switch">
            
        </div> --}}
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="p-3">
                    <form wire:submit="saveOrder">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="firstname"
                                        placeholder="{{ __('First Name') }}" wire:model="first_name" disabled>
                                    <label for="firstname">{{ __('First Name') }}</label>
                                </div>
                            </div>
                            <div class="col-lg-6 form-group">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="lastname"
                                        placeholder="{{ __('Last Name') }}" wire:model="last_name" disabled>
                                    <label for="lastname">{{ __('Last Name') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="Email"
                                    placeholder="{{ __('Email') }}" wire:model="email" disabled>
                                <label for="Email">{{ __('Email') }}</label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control @error('telephone') is-invalid @enderror"
                                    id="telephone" placeholder="{{ __('Telephone') }}" wire:model="telephone">
                                <label for="telephone">{{ __('Telephone') }}</label>
                                @error('telephone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="accord-area border mb-3">
                            <div class="accord-item">
                                <div class="acc-container">
                                    <div class="">
                                        <input class="form-check-input pm my-3 mx-2" type="radio" id="pmcard"
                                            value="pickup" wire:model="order_type">
                                        <label class="pm-check-label my-3" for="pmcard">
                                            <span>{{ __('Pickup/Dine-in') }}</span>



                                        </label>
                                        <section class="acd-section border-top border-bottom">
                                            <div>
                                                <div class="form-group">
                                                    <label for=""
                                                        class="mb-2">{{ __('Select Time (24-hour format)') }}
                                                    </label>
                                                    <input type="time"
                                                        class="form-control @error('pickup_time') is-invalid @enderror mb-2"
                                                        wire:model="pickup_time">
                                                    @error('pickup_time')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                    <div>
                                                        {{-- <span
                                                            class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">
                                                            {{ __('Orders can only be placed between 10:00 AM and 2:00 PM.') }}
                                                        </span> --}}
                                                        <div class="info-alert-bar mt-2">
                                                            {{-- <i class="bi bi-info-circle-fill"></i> --}}
                                                            <span>{{ __('Please arrive within 15 minutes of your scheduled pickup time.( Working hours are from 10:00 AM to 2:00 PM. Mon - Fri)') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>




                                </div>

                            </div>

                            <div class="accord-item">
                                <div class="acc-container">

                                    <div class="">
                                        <input class="form-check-input pm my-3 mx-2" name="payment_method"
                                            type="radio" id="pmcod" value="delivery" wire:model="order_type"
                                            @if ($grand_total < 69) disabled @endif>
                                        <label class="pm-check-label my-3" for="pmcod">
                                            {{ __('Home Delivery') }} <small
                                                class="fw-bold">{{ __('(Only for orders above 70,00 €)') }}</small>


                                        </label>
                                        <section class="acd-section-h100 border-top">
                                            <div>
                                                <div class="mb-2">
                                                    <span
                                                        class="badge bg-warning-subtle border border-warning-subtle text-warning-emphasis rounded-pill">
                                                        {{ __('We currently deliver within the Velika Gorica area only.') }}
                                                    </span>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <div class="form-floating">
                                                        <select class="form-select @error('city') is-invalid @enderror"
                                                            id="floatingSelect" aria-label="fl-select-country"
                                                            wire:model="city">
                                                            <option value="">{{ __('Select') }}</option>
                                                            @foreach ($cities as $item)
                                                                <option value="{{ $item->id }}" selected>
                                                                    {{ $item->city }}</option>
                                                            @endforeach

                                                        </select>
                                                        <label for="floatingSelect">{{ __('City') }}</label>
                                                    </div>
                                                    @error('city')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror

                                                </div>
                                                <div class="form-group mb-3">
                                                    <div class="form-floating">
                                                        <input type="text"
                                                            class="form-control @error('address') is-invalid @enderror"
                                                            id="Address" placeholder="{{ __('Address') }}"
                                                            wire:model="address">
                                                        <label for="Address">{{ __('Address') }}</label>
                                                    </div>
                                                    @error('address')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <div class="form-floating">
                                                        <input type="text"
                                                            class="form-control @error('address_2') is-invalid @enderror"
                                                            id="Address2" placeholder="{{ __('Address 2') }}"
                                                            wire:model="address_2">
                                                        <label
                                                            for="Address2">{{ __('Appartment, Suite, etc. (Optional)') }}</label>
                                                    </div>
                                                    @error('address_2')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" wire:model="save_address"
                                                        id="ckaddress">
                                                    <label class="form-check-label" for="ckaddress">
                                                        {{ __('Save this address for future orders') }}
                                                    </label>
                                                </div>
                                                {{-- <div class="row">
                                                <div class="col-lg-6 form-group">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="postal_code"
                                                            placeholder="{{ __('Postal Code') }}">
                                                        <label for="postal_code">{{ __('Postal Code') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 form-group">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="city"
                                                            placeholder="{{ __('City') }}">
                                                        <label for="city">{{ __('City') }}</label>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            </div>
                                        </section>
                                    </div>




                                </div>

                            </div>

                        </div>
                        <div class="form-group">
                             @php
                               $status = App\Models\ShopStatus::whereDate('closing_date', today())
                                ->where('status_name', 'closed')
                                ->first();
                                @endphp
                            <button class="btn btn-warning form-control @if ($status) disabled @endif"  @if ($status) disabled @endif>
                               
                                <span class="spinner-border spinner-border-sm" wire:loading wire:target="saveOrder"
                                    role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </span>
                                {{ __('Place Your Order') }}
                            </button>
                            @if ($status)
                                <div class="text-danger">{{ $status->status_color}}</div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <div class="cart-items-list p-3">

                    @foreach (session('cart', []) as $index => $item)
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
                                <h6>{{ number_format($item['price'], 2, ',', ' ') }} €</h6>
                                {{-- <h6>{{ number_format($item['price'] * $item['quantity'], 2, ',', ' ') }} €</h6> --}}
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
                                        <button class=" btn-0 text-danger clickable fw-bold text-uppercase txt-xs"
                                            wire:click="removeCartItem('{{ $index }}')">
                                            <span class="spinner-border spinner-border-sm" role="status" wire:loading
                                                wire:target="removeCartItem('{{ $index }}')">
                                                <span class="visually-hidden">Loading...</span>
                                            </span>

                                            X {{ __('Remove') }}
                                        </button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    @endforeach

                </div>
                <div>
                    {{-- new design for coupon --}}
                    {{-- end new design coupon --}}
                    <div class="mt-3 p-3">
                        <div class="row">
                            <div class="form-group col-8">
                                <input type="text" class="form-control @error('coupon_code') is-invalid  @enderror"
                                    wire:model="coupon_code" placeholder="{{ __('Discount or gift card') }}">
                                @error('coupon_code')
                                    <span class="text-danger">{{ $message }}</span>
        @endif
    </div>
    <div class="form-group col-4">
        <button class="btn btn-outline-dark form-control" wire:click="applyCoupon">
            <span class="spinner-border spinner-border-sm" wire:loading wire:target="applyCoupon" role="status">
                <span class="visually-hidden">Loading...</span>
            </span>
            {{ __('Apply') }}
        </button>
    </div>
    </div>
    @if ($c_message) <small
            class="text-danger">{{ __($c_message) }}</small> @endif
    </div>
    @if ($user_points >= $min_coupon_limit)
        <div class="p-3">
            <div class="mb-2">
                <span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">
                    {{ __('Coupon Balance:') }} {{ $user_points }} | {{ __('You can apply for 10% discount') }}
                </span>
                {{-- <span><i class="bi bi-info-circle"></i></span> --}}
            </div>

            <div class="cou-switch">
                <div class="d-flex justify-content-between">
                    <label for="apple-switch">{{ __('Apply Coupon') }}</label>
                    <input id="apple-switch" class="apple-switch" type="checkbox" wire:model.live="pay_coupon"
                        value="1" wire:click="payCoupon">



                </div>
            </div>
            @if($pay_coupon)
            <div class="info-alert-warning mt-2">
                {{-- <i class="bi bi-exclamation-triangle-fill"></i> --}}
                <span>{{ __('You have applied a 10% discount using all 10 of your coupons') }}</span>
            @endif

        </div>
    @else
        <div class="p-3 row">
            <div class="col-9">
                <span class="badge bg-danger-subtle border border-danger-subtle text-danger-emphasis rounded-pill">
                    {{ __('Coupon Balance:') }} {{ $user_points }} | {{ __('Not enough coupons for disccount') }}
                </span>

            </div>
            <div class="col-3 d-flex flex-row-reverse">



            </div>
        </div>
        <div class="p-3">
            <div class="info-alert-bar">
                <p>{{ __('For every burger you purchase, you’ll receive one coupon. Once you collect 10 coupons, you become eligible for a 10% discount on your next order') }}
                </p>
            </div>
        </div>

    @endif

    <div class="p-3">
        <div class="d-flex justify-content-between fw-normal">
            <div>
                <span>{{ __('Sub Total') }}</span>

            </div>
            <div class="text-right">
                <span>{{ number_format($grand_total, 2, ',', ' ') }} €</span>

            </div>
        </div>
        <div class="d-flex justify-content-between fw-normal">
            <div>
                <span>{{ __('Discount') }} ({{ $discount . '%' }})</span>

            </div>
            <div class="text-right">
                <span> {{ number_format($discount_value, 2, ',', ' ') }} € </span>

            </div>
        </div>
        <div class="d-flex justify-content-between fw-normal mb-3">
            <div>
                <span>{{ __('Delivery') }}</span>

            </div>
            <div class="text-right">
                <span> {{ number_format(0, 2, ',', ' ') }} €</span>

            </div>
        </div>
        <div class="d-flex justify-content-between fw-bold">
            <div>
                <span class="fw-bolder">{{ __('Net Total') }}</span>

            </div>
            <div class="text-right">
                <span class="fw-bolder"> {{ number_format($net_total, 2, ',', ' ') }} €</span>

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@else
    <div class="empty-cart-list">
        <div>
            <h3 class="text-muted">{{ __('Your bag is empty') }} 😢</h3>
            <div class="d-flex justify-content-center">
                <a href="{{ route('shop.index') }}" class="btn btn-dark mt-3">{{ __('Shop') }}</a>
            </div>
        </div>
    </div>
    @endif
    {{-- fixed message bar --}}
    {{-- @if ($success_message || $error_message)
            <div class="fixed-message-bar">
                <div>
                    @if ($success_message)
                        <small x-data x-init="setTimeout(() => $wire.set('success_message', ''), 3000)" class="text-success font-weight-bold d-block mt-2">
                            <i class="bi bi-check-circle-fill"></i> {{ $success_message }}
                        </small>
                    @endif
                    @if ($error_message)
                        <small x-data x-init="setTimeout(() => $wire.set('error_message', ''), 3000)" class="text-danger font-weight-bold d-block mt-2">
                            <i class="bi bi-exclamation-circle-fill"></i> {{ $error_message }}
                        </small>
                    @endif
                </div>
            </div>
        @endif --}}
    {{--  --}}
    </div>
