<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ORD-{{ date('Y') }}- {{ $order->daily_order_number}} {{ __('Order confirmation')}}</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px;
      background: #f9f9f9;
      font-size: 12px;
    }
    .order {
      background: #fff;
      padding: 20px;
      border: 1px solid #ddd;
      max-width: 700px;
      margin: auto;
    }
    h1, h2 {
      margin: 0;
    }
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background: #f2f2f2;
    }
    .text-right {
      text-align: right;
    }
    .total {
      font-weight: bold;
    }
    .footer {
      margin-top: 20px;
      font-size: 12px;
      color: #555;
      text-align: center;
    }
    ul{
      list-style: none;
      padding: 0;
      margin: 4px;
    }
  </style>
</head>
<body>
  <div class="order">
    <div class="header">
      <img src="{{asset('images/logo.jpg')}}" alt="" style="width:64px; filter: invert(1);">
      <h1>{{ __('Order confirmation')}}</h1>
      <p>{{ __('Order')}} #: <strong>ORD-{{ $order->daily_order_number}}</strong><br>{{__('Date')}}: <strong>{{ $order->created_at->format('d.m.Y H:i') }}</strong></p>
    </div>

    <p><strong>{{__('From')}}:</strong> M Brothers Food<br>Poštanska ul. 1b, 10410,<br>Velika Gorica<br>Email: info@mbrothers-food.com</p>
    <p style="text-transform: capitalize;"><strong>{{__('To')}}:</strong> {{ $order->getUser()->name.' '.$order->getUser()->last_name}} @if($order->order_type == 'delivery') <br>{{$order->address_1 }} <br>{{$order->address_2 }}@endif</p>

    <h3>{{ __('Order items')}}</h3>
    <table>
      <thead>
        <tr>
          <th>{{ __('Item')}}</th>
          <th>{{ __('Quantity')}}</th>
          <th>{{ __('Price')}}</th>
          <th style="width:70px">{{__('Sub Total')}}</th>
        </tr>
      </thead>
      <tbody>
       @if (count($order->getItems()) > 0)
          @foreach($order->getItems() as $item)
        <tr>
          <td>
           <span style="font-weight: 700"> {{ $item->getProduct()->title .' - '.number_format(($item->getProduct()->discounted_price), 2, ',', ' ').'€' }}</span>
            <div>
              @if (count($item->variants) > 0)
               <ul>
                 @foreach ($item->variants as $variant)
                    <li>{{\App\Models\Variant::where('id', $variant)->first()->value}}</li>
                @endforeach
               </ul>
              @endif
              @if (count($item->choices) > 0)
               <ul>
                 @foreach ($item->choices as $choice)
                 {{-- {{$choice}} --}}
                 @php
                   $ch = \App\Models\ProductChoice::where('id', $choice)->first();
                   $cprice = $ch->price;
                   $cid = $ch->Choice_id
                 @endphp

                    <li>{{ \App\Models\Choice::where('id', $cid)->first()->Choice_name .' - '. number_format($cprice, 2, ',', ' ')  }}€</li>
                @endforeach
               </ul>
              @endif
            </div>
          </td>
          <td>{{ $item->quantity }}</td>
          <td>{{ number_format($item->price, 2, ',', ' ') }} €</td>
          <td class="text-right">
            {{ number_format(($item->price * $item->quantity), 2, ',', ' ') }} € 
          </td>
          {{-- <td class="text-right">{{ number_format(($item->quantity * $item->price), 2, ',', ' ') }} € </td> --}}
        </tr>
        @endforeach
       @endif
        
        <tr class="total">
          <td colspan="3" class="text-right">{{__('Sub Total')}}</td>
          <td class="text-right">{{number_format($order->sub_total, 2, ',', ' ')}} €</td>
        </tr>
        <tr class="total">
          <td colspan="3" class="text-right">{{__('Discount')}} {{$order->discount}} %</td>
          <td class="text-right">{{number_format(($order->sub_total * $order->discount) / 100, 2, ',', ' ')}} €</td>
        </tr>
        <tr class="total">
          <td colspan="3" class="text-right">{{__('Delivery')}}</td>
          <td class="text-right">{{number_format($order->delivery, 2, ',', ' ')}} €</td>
        </tr>
        
        <tr class="total">
          <td colspan="3" class="text-right">{{__('Net Total')}}</td>
          <td class="text-right">{{number_format($order->net_total, 2, ',', ' ')}} €</td>
        </tr>
      </tbody>
    </table>

    <p><strong>{{__('Payment method')}}</strong> {{__('Cash on Delivery / Pay at pickup')}}</p>
    <p style="text-transform: capitalize"><strong>{{__('Order type :')}}</strong> @if($order->order_type === 'pickup') {{$order->order_type}} @ {{$order->pickup_time}} @endif</p>
    {{-- <p><strong>Estimated Delivery:</strong> 2025-11-03</p> --}}

    <div class="footer">
      {{__('Thank you for shopping with us!')}}
      <br>
      {{__('For support, contact')}}: info@mbrothers-food.com
    </div>
  </div>
</body>
</html>