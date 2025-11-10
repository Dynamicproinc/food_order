<div>
    <a type="button" href="{{ route('shop.cart') }}" class="btn btn-warning">
    <i class="bi bi-bag cart-icon"></i>
    @if (session('cart') && count(session('cart')))
        <span class="badge text-bg-warning"> {{ $item_count }} - {{ number_format($grand_total, 2, ',', ' ') }}
            €</span>
    @else
        <span class="badge text-bg-warning">0 - 0,00 €</span>
    @endif
    </a>
     @if (session('cart') && count(session('cart')) > 0)
      <a type="button" href="{{ route('shop.cart') }}">
     <div class="fixed-cart">
        <i class="bi bi-bag"></i>
       </div>
      </a>
     @endif

    {{-- fixed message bar --}}
    @if ($success_message || $error_message)
        <div class="fixed-message-bar">
            <div>
                @if ($success_message)
                    {{-- <small x-data x-init="setTimeout(() => $wire.set('success_message', ''), 3000)" class="text-success font-weight-bold d-block mt-2">
                            <i class="bi bi-check-circle-fill"></i> {{ $success_message }}
                        </small> --}}
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill mx-2"></i>
                        <small x-data x-init="setTimeout(() => $wire.set('success_message', ''), 1000)" class="fw-bold">
                            {{ __($success_message) }}
                        </small>
                    </div>
                @endif
                @if ($error_message)
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill mx-2"></i>
                        <small x-data x-init="setTimeout(() => $wire.set('success_message', ''), 1000)" class="fw-bold">
                           {{__( $error_message )}}
                        </small>
                    </div>
                @endif
            </div>
        </div>
    @endif
   

</div>
