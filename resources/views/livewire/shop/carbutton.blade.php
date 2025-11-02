<div>
    <i class="bi bi-bag cart-icon"></i>
    @if (session('cart') && count(session('cart')))
        <span class="badge text-bg-warning"> {{ $item_count }} - {{ number_format($grand_total, 2, ',', ' ') }}
            €</span>
    @else
        <span class="badge text-bg-warning">0 - 0,00 €</span>
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
                        <i class="bi bi-check2 me-2"></i>
                        <small x-data x-init="setTimeout(() => $wire.set('success_message', ''), 2000)" class="fw-bold">
                            {{ $success_message }}
                        </small>
                    </div>
                @endif
                @if ($error_message)
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check2 me-2"></i>
                        <small x-data x-init="setTimeout(() => $wire.set('success_message', ''), 2000)" class="fw-bold">
                           {{ $error_message }}
                        </small>
                    </div>
                @endif
            </div>
        </div>
    @endif
    {{--  --}}
    {{-- <div class="fixed-message-bar">
        <div class="d-flex align-items-center">
            <i class="bi bi-check2 me-2"></i>
            <small x-data x-init="setTimeout(() => $wire.set('success_message', ''), 3000)" class="fw-bold">
                askjdhas kdhas d
            </small>
        </div>

    </div> --}}
    {{--  --}}

</div>
