<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <div class="order p-3">
                    {{--  --}}
                    @if ($orders && count($orders) > 0)

                        <div class="row">
                            @foreach ($orders as $item)
                                <div class="col-lg-3 mb-3">
                                    <div class="order-card">
                                        <div class="order-card-head p-3 border-bottom bg-warning">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="fw-bolder">#{{ $item->daily_order_number }}</h5>
                                                @if ($item->order_type === 'pickup')
                                                    <h6 class="fw-bolder text-uppercase">
                                                        {{ $item->order_type }}
                                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->pickup_time)->format('H:i') }}
                                                    </h6>
                                                @endif
                                                @if ($item->order_type === 'delivery')
                                                    <h6 class="fw-bolder text-uppercase">
                                                        {{ $item->order_type }}

                                                    </h6>
                                                @endif

                                            </div>
                                        </div>
                                        <div
                                            class="order-card-body p-3 @if ($item->status === 'pending') bg-pending @endif">
                                            <div class="text-uppercase">
                                                <h6>{{ substr($item->getUser()?->name, 0, 10) }} {{ substr($item->getUser()?->last_name, 0, 10) }} | {{ $item->telephone}}</h6>
                                            </div>
                                            @if ($item->order_type === 'delivery')
                                                <div class="alert alert-info">
                                                    <p>{{ $item->address_1 . ' ' . $item->address_2 }}</p>
                                                    <p>{{ $item->telephone }}</p>
                                                </div>
                                            @endif
                                            <div class="items">
                                                @if (count($item->getItems()) > 0)
                                                    @foreach ($item->getItems() as $order_items)
                                                        <div class="mb-3">
                                                            <h6 class="fw-bold text-uppercase">
                                                                {{ $order_items->getProduct()->title }} <span
                                                                    class="badge rounded-pill text-bg-dark">{{ number_format($order_items->quantity, 0) }}</span>
                                                            </h6>
                                                            @if (count($order_items->variants) > 0)
                                                                <ul class="choices d-flex flex-wrap">
                                                                    @foreach ($order_items->variants as $variant)
                                                                        <li>{{ \App\Models\Variant::where('id', $variant)->first()->value }}
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                            @if (count($order_items->choices) > 0)
                                                                <ul class="choices d-flex flex-wrap">
                                                                    @foreach ($order_items->choices as $choice)
                                                                        {{-- {{$choice}} --}}
                                                                        @php
                                                                            $ch = \App\Models\ProductChoice::where(
                                                                                'id',
                                                                                $choice,
                                                                            )->first();
                                                                            $cprice = $ch->price;
                                                                            $cid = $ch->Choice_id;
                                                                        @endphp

                                                                        <li>{{ \App\Models\Choice::where('id', $cid)->first()->Choice_name }}
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif

                                                        </div>
                                                    @endforeach
                                                @else
                                                @endif



                                            </div>
                                        </div>
                                        <div class="order-card-footer p-3">
                                            <div class="row">
                                                {{-- <div class="col-4">
                                                    <button class="btn btn-outline-dark btn-lg w-100">
                                                        <i class="bi bi-x-lg"></i>
                                                    </button>
                                                </div> --}}
                                                <div class="col-12">
                                                    @if ($item->status === 'pending')
                                                        <button class="btn btn-warning btn-lg w-100"
                                                            wire:click="orderAccepted({{ $item->id }})">
                                                            <span class="spinner-border spinner-border-sm" wire:loading
                                                                wire:target="orderAccepted({{ $item->id }})" role="status">
                                                                <span class="visually-hidden">Loading...</span>
                                                            </span>
                                                            <i class="bi bi-check2"></i> {{ __('Accept') }}
                                                        </button>
                                                    @endif
                                                    @if ($item->status === 'accepted')
                                                        <button class="btn btn-warning btn-lg w-100"
                                                            wire:click="orderReady({{ $item->id }})">
                                                            <span class="spinner-border spinner-border-sm" wire:loading
                                                                wire:target="orderReady({{ $item->id }})" role="status">
                                                                <span class="visually-hidden">Loading...</span>
                                                            </span>
                                                            <i class="bi bi-check-circle-fill"></i> {{ __('Ready') }}
                                                        </button>
                                                    @endif





                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    @else
                        <div class="p-3">
                            <h5 class="text-muted fw-bold">{{ __('No Orders') }}</h5>
                        </div>
                    @endif
                    {{--  --}}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="mt-3 position-fixed " style="width:220px">
                    <div class="ready-orders-list mb-5">
                        @if ($ready_orders && count($ready_orders) > 0)
                            @foreach ($ready_orders as $ro)
                                <div class="ready-items mb-3">
                                    <div class="d-flex">
                                        <div class="mid-cont">
                                            {{ $ro->daily_order_number }}
                                        </div>
                                        <div class="p-2">
                                            <h6 class="fw-bold mb-0 text-uppercase">
                                                {{ substr($ro->getUser()->name, 0, 10) }} {{ substr($ro->getUser()->last_name, 0, 10) }}
                                                {{-- {{ $ro->getUser()->name . ' ' . $ro->getUser()->last_name }} --}}
                                            </h6>
                                            <small class="fw-bolder text-uppercase">{{ $ro->order_type }}</small>
                                            <h6 class="mb-0 mb-2">{{ number_format($ro->net_total, 2, ',', ' ') }} €
                                            </h6>
                                            <button wire:loading.attr="disabled" class="btn btn-dark w-100"
                                                wire:click="orderDispatch({{ $ro->id }})">
                                                <span class="spinner-border spinner-border-sm" wire:loading
                                                                wire:target="orderDispatch({{ $ro->id }})" role="status">
                                                                <span class="visually-hidden">Loading...</span>
                                                            </span>
                                                {{ __('Dispatch') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h5>{{ __('No Ready Items') }}</h5>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
     {{-- @push('script') --}}
         <script>
    var eventSource = new EventSource('/sse'+'?v={{ uniqid() }}');

    eventSource.onmessage = function(event) {
        console.log('Message received: ' + event.data);
         var bell = new Audio("{{ asset('audio/bell.mp3') }}");
       
        bell.play();
         @this.fetchOrders();

       
    };
 </script>
    {{-- @endpush --}}
</div>
