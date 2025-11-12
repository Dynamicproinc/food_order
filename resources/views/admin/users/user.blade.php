@extends('admin.layout')
@section('title', 'Users')
@section('content')
    <div>
        <div class="container mt-3">
            
         @if (count($users) > 0)
             <table class="table caption-top">
  <caption>List of users</caption>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">{{__('Registered at')}}</th>
      <th scope="col">{{__('Avatar')}}</th>
      <th scope="col">{{__('First Name')}}</th>
      <th scope="col">{{__('Last Name')}}</th>
      <th scope="col">{{__('Email')}}</th>
      <th scope="col">{{__('Points')}}</th>
      <th scope="col">{{__('QR Code')}}</th>
    </tr>
  </thead>
  <tbody>
    
   @foreach ($users as $item)
       <tr>
      <th scope="row">{{ $item->id }}</th>
      <td>{{ $item->created_at }}</td>
      <td><img src="{{ $item->avatar }}" class="xs-avatar"></td>
      <td>{{ $item->name }}</td>
      <td>{{ $item->last_name }}</td>
      <td>{{ $item->email }}</td>
      <td>{{ number_format($item->getPointBalance()?->balance ?? 0) }}</td>
      <td>{{ $item->getQR()?->slug ?? 'n/a' }}</td>
    </tr>
   @endforeach
  </tbody>
</table>
         @else
             
         @endif
        </div>
    </div>
@endsection