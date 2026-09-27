<div>
    <div>
        {{-- headder --}}
        
       @include('inc.spa.topnav')
        {{-- headder end --}}
        <div class="mb-3">
            {{-- image in xs devices no margin but md devices must be has padding  --}}
            <img src="{{ asset($product->image_path) }}" class="img-md">
            
        </div>
        <div class="container">
            <div>
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <h6 class="theme-text-color fw-bold mb-0">
                            {{ number_format($product->discounted_price, 2, ',', ' ') }} €</h6>

                    </div>
                    <div>
                        <div class="d-flex-star">
                            <i class="bi bi-star-fill star"></i>
                            <strong>{{ $product->getRatingScore()['average_score'] }}</strong> <span
                                class="text-muted">({{ $product->getRatingScore()['total_ratings'] }})</span>

                        </div>
                    </div>
                </div>
                <div class="">
                    <div>
                        <h5 class="fw-bold text-capitalize">{{ $product->title }}</h5>
                    </div>
                    <div>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
                <div class="sept"></div>
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="circle-btn-gray me-2"><i class="bi bi-alarm"></i></div>
                        <div>
                            <small class="text-muted">{{ __('Cooking Time') }}</small>
                            <div>
                                <strong>10 Mins</strong>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="circle-btn-gray me-2"><i class="bi bi-tag"></i></div>
                        <div>
                            <small class="text-muted">{{ __('Coupons') }}</small>
                            <div>

                                @if ($product->points > 0)
                                    {{ number_format($product->points) }} - {{ __('Point') }}
                                @else
                                    N/A
                                @endif

                            </div>
                        </div>
                    </div>

                </div>
                <div class="sept"></div>
                {{-- variations --}}
                <div>
                    <div class="mb-3 variants-sections">
                        @php
                            $grouped_options = $product->getGroupedOption();
                        @endphp

                        @if ($grouped_options->count() > 0)
                            @foreach ($grouped_options as $option_id => $variants)
                                <h6 class="fw-bold mb-3 text-capitalize">
                                    {{ App\Models\Options::where('id', $option_id)->first()->option_name }}
                                </h6>

                                <div class="hor-scroll mb-3">
                                    <div class="d-flex">
                                        @foreach ($variants as $key => $item)
                                            <div class="mb-2">
                                                <div class="">
                                                    <div class="fc-wrapper">
                                                        <input class="fc-input" type="radio"
                                                            name="radioDefault_{{ $option_id }}"
                                                            id="rd{{ $item->id }}" value="{{ $item->id }}"
                                                            wire:model.live="variant.{{ $option_id }}"
                                                            wire:click="calculateTotal"
                                                            @if ($loop->first) checked @endif>
                                                        <label class="fc-label" for="rd{{ $item->id }}">
                                                            <div>
                                                                <div class="text-muted mb-0">{{ $item->value }}
                                                                    {{ $item->description ?? $item->description }}
                                                                </div>
                                                                <h5 class="">
                                                                    {{ number_format($item->price, 2, ',', ' ') }}
                                                                    €</h5>
                                                                @if ($item->description)
                                                                    <p class="txt-xs" style="line-height: 1.2;">

                                                                    </p>
                                                                @endif
                                                            </div>

                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                            @error('variant')
                                <small class="text-danger fw-bold">{{ $message }}</small>
                            @enderror
                        @endif

                    </div>
                    {{-- addons --}}
                    <div class="mb-3 mt-3">
                        @if (count($product->getChoices()) > 0)
                            <h6 class="fw-bold mb-3">{{ __('Add-ons') }}</h6>

                            <div class="d-flex flex-wrap">
                                @foreach ($product->getChoices() as $item)
                                    <div class="mb-2">
                                        <div class="">
                                            <div class="fc-wrapper">
                                                <input class="fc-input" type="checkbox" value="{{ $item->id }}"
                                                    id="chk{{ $item->id }}" wire:model.live="choices"
                                                    wire:click="calculateTotal">
                                                <label class="fc-label" for="chk{{ $item->id }}">
                                                    <div>
                                                        <div class="text-muted">
                                                            {{ $item->getChoiceName()->Choice_name }}
                                                        </div>
                                                        <h5>
                                                            {{ number_format($item->price, 2, ',', ' ') }}
                                                            €
                                                        </h5>
                                                    </div>

                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        @endif










                    </div>
                </div>
                {{--  --}}
                <div class="fixed-bottom bg-dark py-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-5">

                                {{-- <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <button class="btn circle-btn-gray">-</button>
                            </div>
                            <div><input type="text" value="100" style="max-width: 30px;background:none;border:0;outline:0" readonly></div>
                            <div>
                                 <button class="btn circle-btn-gray theme-bg-btn">+</button>
                            </div>
                        </div> --}}
                                <div x-data="{ qty: @entangle('quantity').live }">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <button type="button" class="btn circle-btn-gray" @click="qty--">
                                                -
                                            </button>
                                        </div>

                                        <div>
                                            <input type="text" x-model="qty"
                                                style="max-width: 30px; background:none; border:0; outline:0;" readonly>
                                        </div>

                                        <div>
                                            <button type="button" class="btn circle-btn-gray theme-bg-btn"
                                                @click="qty++">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-7">
                               
                                <button class="btn btn-dark-theme fw-bold w-100 btn-lg rounded-4 fw-bolder" wire:click="addCart"
                                    wire:loading.attr="disabled">
                                    {{ __('Add Cart') }}

                                    ({{ $grand_total ?? number_format($grand_total, 2, ',', ' ') }} €)
                                </button>
                                {{-- <button class="btn btn-dark-theme fw-bold w-100 btn-lg rounded-4">{{__('Add Cart')}} 1500</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- fixed add cart --}}

    {{-- fixed add cart --}}
</div>
