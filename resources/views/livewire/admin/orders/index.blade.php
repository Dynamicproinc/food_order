<div>
    <div>
        @if (count($orders) > 0)
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">{{ __('ID') }}</th>
                        <th scope="col">{{ __('DON') }}</th>
                        <th scope="col">{{ __('Date') }}</th>
                        <th scope="col" style="width: 200px;">{{ __('Customer') }}</th>
                        {{-- <th scope="col">{{ __('Type') }}</th> --}}
                        <th scope="col">{{ __('Total') }}</th>
                        <th scope="col">{{ __('Pickup') }}</th>
                        <th scope="col">{{ __('D/Address') }}</th>
                        <th scope="col">{{ __('Telephone') }}</th>
                        <th scope="col">{{ __('Email') }}</th>
                        <th scope="col">{{ __('Status') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr @if($item->status === 'pending') class="pending-order" @endif>
                            <td scope="row">
                           {{ $item->id }} 
                            </td>
                            <td>
                                <span class="badge text-bg-dark">

                                    <a href="{{ route('admin.orders.show', $item->id) }}" target="_blank" class="text-decoration-none text-white">
                                        {{ $item->daily_order_number }}
                                    </a>
                                </span>
                            </td>
                            <td>{{ $item->created_at->timezone('Europe/Zagreb')->format('d.m.Y. H:i') }}</td>
                            <td>
                                <div class="d-flex mb-2">
                                    <img src="{{ $item->getUser()?->avatar }}" class="xs-avatar mx-2">
                                    {{ $item->getUser()?->name . ' ' . $item->getUser()?->last_name }}
                                </div>
                                
                                <span class="badge rounded-pill text-bg-dark">{{ $item->order_type }}</span>

                            </td>
                            {{-- <td></td> --}}
                            <td class="price-text">{{ $item->net_total }} €</td>
                            <td>{{ $item->pickup_time }}</td>
                            <td>{{ $item->address_1 . ' ' . $item->address_2 }}</td>
                            <td>{{ $item->telephone }}</td>
                            <td>{{ $item->getUser()?->email }}</td>
                            <td>
                                @if ($item->status === 'dispatched')
                                    <span class="badge text-bg-success"> <i class="bi bi-check"></i>
                                        {{ $item->status }}</span>
                                @else
                                          @if ($item->status === 'canceled')
                                    <span class="badge text-bg-danger"> <i class="bi bi-x"></i>
                                        {{ $item->status }}</span>
                                @else
                                    <span class="badge text-bg-secondary"> <i class="bi bi-clock-history"></i>
                                        {{ $item->status }}
                                    </span>
                                    @endif
                                @endif

                                
                            </td>
                            <td>
                                {{-- dispatch order action  --}}
                                {{-- <button wire:loading.attr="disabled" wire:confirm="Are you sure?"
                                    class="btn btn-sm btn-primary @if ($item->status === 'dispatched') disabled @endif"
                                    @if ($item->status === 'dispatched') disabled @endif
                                    wire:click="dispatchOrder({{ $item->id }})">
                                    <span wire:loading wire:target="dispatchOrder({{$item->id}})" class="spinner-border spinner-border-sm" role="status">
                                        
                                    </span>
                                    {{ __('Dispatch') }} 
                                </button> --}}
                                <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item @if ($item->status === 'dispatched' || $item->status === 'canceled') disabled @endif"  @if ($item->status === 'dispatched' || $item->status === 'canceled') aria-disabled="true" @endif  href="#"  wire:confirm="Are you sure?"  wire:click="dispatchOrder({{ $item->id }})">{{ __('Dispatch') }}</a>
                                    </li>
                                    <li class="">
                                        <a class="dropdown-item @if ($item->status === 'dispatched' || $item->status === 'canceled') disabled @endif" @if ($item->status === 'dispatched' || $item->status === 'canceled') aria-disabled="true" @endif href="#" wire:confirm="Are you sure?" wire:click="cancelOrder({{ $item->id }})">{{ __('Cancel order') }}</a>
                                    </li>
                                    
                                </ul>
                                </div>

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            <div class="">
                {{ $orders->links() }}
            </div>
        @else
            <p class="text-center text-muted">{{ __('No orders found') }}</p>
        @endif
    </div>
    <script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('show-alert', (event) => {
            alert(event.message);
        });
    });
</script>
</div>
