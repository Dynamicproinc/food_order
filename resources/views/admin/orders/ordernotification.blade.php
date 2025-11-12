
@extends('admin.layout')
@section('title', 'Orders')
@section('content')
<div>
  {{--  --}}
 
  <div class="center">
        <div class="pulse"></div>
    </div>
  {{--  --}}
    <div class="white-box" id="newOrderNotification">
  <div class="text-center">
    <img src="{{asset('images/money.gif')}}" alt="" >
    <h4 class="fw-bold">{{__('NEW ORDER!')}}</h4>
    <p>{{__('You have received a new order.')}}</p>
    <a class="btn btn-dark" href="{{ route('admin.orders.index') }}" target="_blank">{{__('View Orders')}}</a>
  </div>
</div>
    @push('script')
         <script>
    var eventSource = new EventSource('/sse'+'?v={{ uniqid() }}');

    eventSource.onmessage = function(event) {
        console.log('Message received: ' + event.data);
         var bell = new Audio("{{ asset('audio/bell.mp3') }}");
        document.getElementById('newOrderNotification').style.display = 'flex';
        bell.play();
        // alert('New order received: ' + event.data);
        // Optionally, you can refresh the page or update the order list dynamically here   
        // location.reload(); // Simple way to refresh the order list
    };
</script>
    @endpush
</div>
@endsection