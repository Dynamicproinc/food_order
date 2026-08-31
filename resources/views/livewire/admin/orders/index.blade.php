<div>
    <div>
        @if (count($orders) > 0)
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">{{ __('ID') }}</th>
                        <th scope="col">{{ __('DON') }}</th>
                        <th scope="col">{{ __('Date') }}</th>
                        <th scope="col">{{ __('Customer') }}</th>
                        <th scope="col">{{ __('Type') }}</th>
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
                        <tr @if($item->status !== 'dispatched') class="pending-order" @endif>
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
                                <div class="d-flex">
                                    <img src="{{ $item->getUser()?->avatar }}" class="xs-avatar mx-2">
                                    {{ $item->getUser()?->name . ' ' . $item->getUser()?->last_name }}
                                </div>
                            </td>
                            <td>{{ $item->order_type }}</td>
                            <td>{{ $item->net_total }}</td>
                            <td>{{ $item->pickup_time }}</td>
                            <td>{{ $item->address_1 . ' ' . $item->address_2 }}</td>
                            <td>{{ $item->telephone }}</td>
                            <td>{{ $item->getUser()?->email }}</td>
                            <td>
                                @if ($item->status === 'dispatched')
                                    <span class="badge text-bg-success"> <i class="bi bi-check"></i>
                                        {{ $item->status }}</span>
                                @else
                                    <span class="badge text-bg-secondary"> <i class="bi bi-clock-history"></i>
                                        {{ $item->status }}</span>
                                @endif
                            </td>
                            <td>
                                {{-- dispatch order action  --}}
                                <button wire:loading.attr="disabled" wire:confirm="Are you sure?"
                                    class="btn btn-sm btn-primary @if ($item->status === 'dispatched') disabled @endif"
                                    @if ($item->status === 'dispatched') disabled @endif
                                    wire:click="dispatchOrder({{ $item->id }})">
                                    <span wire:loading wire:target="dispatchOrder({{$item->id}})" class="spinner-border spinner-border-sm" role="status">
                                        
                                    </span>
                                    {{ __('Dispatch') }} 
                                </button>

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
