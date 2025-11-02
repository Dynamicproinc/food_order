@extends('admin.layout')
@section('title', 'All Products')
@section('content')
    <div>
        <div class="container mt-3">
           <div class="row justify-content-center">
            <div class="col-lg-10">
                <div>
                    <h3>ALL PRODUCT</h3>
                </div>
                <div class="bg-white rounded shadow overflow-hidden">
                    @if (count($products) > 0)
                    <div class="table-responsive">
                       <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">{{ __('IMAGE')}}</th>
      <th scope="col">{{ __('PRODUCT ID')}}</th>
      <th scope="col">{{ __('TITLE')}}</th>
      <th scope="col">{{ __('CUSTOMIZATION')}}</th>
      <th scope="col">{{ __('STATUS')}}</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($products as $item)
        
    <tr>
      <th scope="row"><img src="{{asset($item->image_path ? $item->image_path : 'images/logo.jpg')}}" alt="" style="width:100px;height:100px; border-radius:16px;object-fit: cover"></th>
      <td>{{ $item->id }}</td>
      <td><a href="{{route('admin.product.edit', $item->id)}}" target="_blank">{{ $item->title }}</a></td>
      <td>dasda</td>
      <td>
        @if ($item->status == 'draft')
            <span class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill text-capitalize"> {{ $item->status }}</span>
        @endif
        @if ($item->status == 'active')
            <span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill text-capitalize"> {{ $item->status }}</span>
        @endif
       
    </td>
    </tr>
    @endforeach
    
  </tbody>
</table> 
                    </div>
                    @else
                      <div class="p-5">
                    <h5 class="text-center">
                    {{__('❌ No products found!')}}    
                    </h5>     
                    </div> 
                    @endif
                    
                </div>
            </div>
           </div>
        </div>
    </div>
@endsection