<div>
    <div class="">
         {{-- <div class="d-flex justify-content-center">
              @if (count($categories) > 0)
                <div class="d-flex mb-3 m-tab">
                    @foreach ($categories as $item )
                    <input type="radio" id="rd{{$item->id}}" wire:model.live="category" value="{{$item->id}}">
                    <label for="rd{{$item->id}}" class="menu-tab">{{$item->category_name}}</label>
                    
                    @endforeach
                
            </div>
           @endif
         </div> --}}
         {{-- fixed messagebar --}}
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
         {{-- end fixed messagebar --}}


            <div>
                @if(count($products) > 0)
                   <div class="row">
                    @foreach ($products as $item)
                        
                    <div class="col-6 col-lg-4 mb-3" >
                        <div class="product-sm bg-white" wire:click="selectProduct({{ $item->id }})">
                            <div class="thumb-sm">
                                <img src="{{asset($item->image_path)}}"
                                    alt="" class="img-fluid">
                            </div>
                            <div class="p-3 bg-white">
                                <small class="fw-bolder txt-xs text-muted text-uppercase">{{ $item->getCategory()->category_name }}</small>
                                <h5 class="fw-bold lh-sm">{{ $item->title }}</h5>
                                <h6 class="fw-bold">{{ number_format($item->discounted_price, 2, ',', ' ') }} €</h6>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div> 
                @else
                    <div class="p-5">
                        <h5 class="text-center text-muted">
                            😢 {{__('No product found!')}}
                        </h5>
                    </div>
                @endif
                
            </div>
        </div>
        {{-- show product modal --}}
        @if ($product_modal)
        @include('inc.modal.product')
            
        @endif

        {{-- cart modal --}}
        {{-- @if ($cart_modal)
            
        @include('inc.modal.cartmodal')
        @endif --}}
        {{--  --}}
        {{--  --}}
</div>
