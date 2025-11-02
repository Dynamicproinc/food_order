<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ORD-{{ date('Y') }}- {{ $order->daily_order_number}} Order Confirmation</title>
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
      <h1>Order Confirmation</h1>
      <p>Order #: <strong>ORD-{{ $order->daily_order_number}}</strong><br>Date: <strong>{{ $order->created_at->format('d.m.Y') }}</strong></p>
    </div>

    <p><strong>From:</strong> The M-Brothers Food Truck<br>Poštanska ul. 1b, 10410,<br>Velika Gorica<br>Email: info@the-m-brothers.com</p>
    <p style="text-transform: capitalize;"><strong>To:</strong> {{ $order->getUser()->name.' '.$order->getUser()->last_name}} @if($order->order_type == 'delivery') <br>{{$order->address_1 }} <br>{{$order->address_2 }}@endif</p>

    <h3>Ordered Items</h3>
    <table>
      <thead>
        <tr>
          <th>Item</th>
          <th>Quantity</th>
          <th>Sub Total</th>
          <th style="width:70px">Total</th>
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
          <td class="text-right">{{ number_format($item->price, 2, ',', ' ') }} € </td>
          {{-- <td class="text-right">{{ number_format(($item->quantity * $item->price), 2, ',', ' ') }} € </td> --}}
        </tr>
        @endforeach
       @endif
        
        <tr class="total">
          <td colspan="3" class="text-right">Subtotal</td>
          <td class="text-right">{{number_format($order->sub_total, 2, ',', ' ')}} €</td>
        </tr>
        <tr class="total">
          <td colspan="3" class="text-right">Discount {{$order->discount}} %</td>
          <td class="text-right">{{number_format(($order->sub_total * $order->discount) / 100, 2, ',', ' ')}} €</td>
        </tr>
        <tr class="total">
          <td colspan="3" class="text-right">Delivery</td>
          <td class="text-right">{{number_format($order->delivery, 2, ',', ' ')}} €</td>
        </tr>
        
        <tr class="total">
          <td colspan="3" class="text-right">Total</td>
          <td class="text-right">{{number_format($order->net_total, 2, ',', ' ')}} €</td>
        </tr>
      </tbody>
    </table>

    <p><strong>Payment Method:</strong> Cash on Delivery / Pay at Store</p>
    <p style="text-transform: capitalize"><strong>Order Type:</strong> {{ $order->order_type}}</p>
    {{-- <p><strong>Estimated Delivery:</strong> 2025-11-03</p> --}}

    <div class="footer">
      Thank you for shopping with The M-Brothers Food Truck!<br>
      For support, contact: info@the-m-brothers.com
    </div>
  </div>
</body>
</html>
