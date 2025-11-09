@extends('home')
@section('acc-content')
    <div>
        @if (count($sales_orders))
            <div class="tab-pane-table">
                <table class="table table-striped table-responsive">
                    <thead class="">
                        <tr>
                            <th scope="col">{{ __('Order') }}</th>
                            <th scope="col">{{ __('Date') }}</th>
                            <th scope="col">{{ __('Amount') }}</th>
                            <th scope="col">{{ __('Type') }}</th>

                            <th scope="col">{{ __('Status') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($sales_orders as $item)
                            <tr>
                                <th scope="row">
                                    
                                        {{ $item->daily_order_number }}
                                </th>
                                <td>
                                    
                                        {{ $item->created_at->format('d.m.Y') }}
                                    
                                   

                                </td>
                                
                                <td>
                                    {{ number_format($item->net_total, 2, ',', ' ') }}  €
                                       
                                </td>
                                <td>
                                    {{ __($item->order_type) }}
                                </td>
                                {{-- <td></td> --}}
                                {{-- <td style="text-align: right"></td> --}}
                                <td>
                                    <small class="txt-xs fw-bold text-uppercase">
                                        {{ __($item->status) }}</small>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        @else
            <p class="text-muted">{{ __('No orders found') }}</p>
        @endif
    </div>
@endsection
