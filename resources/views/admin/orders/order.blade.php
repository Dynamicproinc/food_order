@extends('admin.layout')
@section('title', 'Orders')
@section('content')
    <div>
    <div id="printableDiv">
        <style>
    .receipt {
        font-family: "Courier New", monospace;
        font-size: 14px;
        width: 260px;
        border-collapse: collapse;
    }
    .receipt td {
        padding: 2px 0;
        vertical-align: top;
    }
    .receipt .title {
        font-weight: bold;
    }
    .receipt .item-name {
        font-weight: bold;
        display: block;
    }
    .receipt .item-desc {
        margin: 0;
        font-size: 12px;
    }
</style>

<table class="receipt">
    <tr>
        <td class="title">ORDER#123556</td>
        
    </tr>
    <tr>
        
        <td>JANE DOE</td>
    </tr>

    <tr>
        <td class="title">ITEM</td>
        <td class="title">QTY</td>
    </tr>

    <tr>
        <td>
            <span class="item-name">Smash Burger</span>
            <p class="item-desc">za van, Siracha, tomato, Luk, pickles</p>
        </td>
        <td>2</td>
    </tr>

    <tr>
        <td>
            <span class="item-name">Smash Burger</span>
            <p class="item-desc">za van, Siracha, pickles</p>
        </td>
        <td>1</td>
    </tr>

    <tr>
        <td>
            <span class="item-name">Cola</span>
        </td>
        <td>1</td>
    </tr>
</table>

     </div>

  
</div>

<button onclick="printDiv('printableDiv')">Print Invoice</button>

<script>
function printDiv(divId) {
    var divContents = document.getElementById(divId).innerHTML;
    var a = window.open('', '', 'height=600, width=800');
    a.document.write('<html>');
    a.document.write('<head><title>Print</title></head>');
    a.document.write('<body>');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
}
</script>

        <div class="container mt-3">
            <div>
                @if (count($orders) > 0)
                   <table class="table table-sm table-striped">
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                            <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>
                                <a href="{{route('admin.orders.show', $item->id)}}" target="_blank">
                                {{ $item->daily_order_number }}
                            </a>
                            </td>
                            <td>{{ $item->created_at->timezone('Europe/Zagreb')->format('d.m.Y. H:i') }}</td>
                            <td>
                                <div class="d-flex">
                                                                    <img src="{{ $item->getUser()?->avatar}}" class="xs-avatar mx-2">
                                {{ $item->getUser()?->name .' '.$item->getUser()?->last_name }}
                                </div>
                            </td>
                            <td>{{ $item->order_type }}</td>
                            <td>{{ $item->net_total }}</td>
                            <td>{{ $item->pickup_time }}</td>
                            <td>{{ $item->address_1.' '. $item->address_2 }}</td>
                            <td>{{ $item->telephone }}</td>
                            <td>{{ $item->getUser()?->email }}</td>
                            <td>{{ $item->status }}</td>
                            
                        </tr> 
                        @endforeach
                       
                        
                    </tbody>
                </table> 
                @else
                    <p class="text-center text-muted">{{__('No orders found')}}</p>
                @endif
            </div>
        </div>
    </div>
   
@endsection
