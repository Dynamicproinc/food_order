@extends('admin.layout')
@section('title', 'Orders')
@section('content')
    <div>
        <div class="container mt-3">
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('ID') }}</th>
                            <th scope="col">{{ __('DON') }}</th>
                            <th scope="col">{{ __('Date') }}</th>
                            <th scope="col">{{ __('Customer') }}</th>
                            <th scope="col">{{ __('Type') }}</th>
                            <th scope="col">{{ __('Total') }}</th>
                            <th scope="col">{{ __('Pickup Time') }}</th>
                            <th scope="col">{{ __('Delevery Address') }}</th>
                            <th scope="col">{{ __('Telephone') }}</th>
                            <th scope="col">{{ __('Email') }}</th>
                            <th scope="col">{{ __('Status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                            <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->daily_order_number }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->getUser()->name .' '.$item->getUser()->last_name }}</td>
                            <td>{{ $item->order_type }}</td>
                            <td>{{ $item->net_total }}</td>
                            <td>{{ $item->pickup_time }}</td>
                            <td>{{ $item->address_1.' '. $item->address_2 }}</td>
                            <td>{{ $item->telephone }}</td>
                            <td>{{ $item->getUser()->email }}</td>
                            <td>{{ $item->status }}</td>
                            
                        </tr> 
                        @endforeach
                       
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
