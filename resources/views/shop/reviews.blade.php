@extends('layouts.app')
@section('meta_description', __('Read reviews and ratings from our customers about :product', ['product' => $product->title]))
@section('title', __('Reviews -'))
@section('content')
    <div class="mb-5">
        <div>
            {{-- <h5>{{ __('Reviews') }}</h5> --}}
            <div>
                <div class="d-flex mb-3">
                    <div class="review-image-container">
                        <img src="{{ asset($product->image_path) }}" alt="{{ $product->title }}" class="">

                    </div>
                    <div class="mx-3">
                        {{-- <h5 class="fw-bold text-capitalize">{{ $product->title }}</h5> --}}
                        <div class="">
                            <h5 class="title-md">{{ $product->title }}</h5>
                            <div class="d-flex star-rating mb-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $product->getRatingScore()['integer_part'])
                                        <i class="bi bi-star-fill"></i>
                                    @else
                                        <i class="bi bi-star"></i>
                                    @endif
                                @endfor
                                
                                
                               
                                <span> {{$product->getRatingScore()['average_score']}} | <a href="{{route('product.reviews', $product->slug)}}"> {{$product->getRatingScore()['total_ratings']}} {{__('Reviews')}}</a></span>
                            </div>



                            <div class="mb-3 d-flex">
                                <h5 class="fw-bold mb-0">{{ number_format($product->discounted_price, 2, ',', ' ') }} €</h5>
                                <div class="mx-3">
                                    @if ($product->points > 0)
                                        <span
                                            class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">{{ __('Coupon applied') }}</span>
                                    @else
                                        <span
                                            class="badge bg-dark-subtle border border-dark-subtle text-dark-emphasis rounded-pill">{{ __('Coupon not applied') }}</span>
                                    @endif
                                </div>
                            </div>





                        </div>
                    </div>

                </div>
                <div class="mb-5 bg-white rounded p-3 comment-area">

                    <div>
                        @livewire('shop.review',['product' => $product])
                    </div>
                </div>
                <div>
                    <div class="mb-3">
                        <h6>{{ __('Reviews') }} ({{$product->getRatingScore()['total_ratings']}})</h6>
                    </div>

                 @if (count($product->getRatings() ) > 0)
                       @foreach ($product->getRatings() as $item )
                        <div class="mb-3">
                        <div class="d-flex">
                            <div>
                                 @if ($item->getUser()->avatar)
                                    <img class="xs-avatar" src="{{$item->getUser()->avatar}}" alt="">
                                       @else 
                                       <span class="xs-avatar-letter">{{ strtoupper(substr($item->getUser()->name, 0, 1)) }} </span>
                                    @endif
                                
                            </div>
                            <div class="mx-3">
                                <div><strong>{{$item->getUser()->name.' '.$item->getUser()->last_name}}</strong>  <small class="text-muted txt-xs">{{ $item->created_at->timezone('Europe/Zagreb')->diffForHumans() }}</small></div>
                                <div>
                                    
                                    <div class="d-flex star-rating mb-2">
                                       @for ($i=0; $i < 5 ; $i++)
                                       @if($i < $item->score)
                                       
                                       <i class="bi bi-star-fill"></i>
                                       @else
                                       
                                        <i class="bi bi-star"></i>
                                        @endif  
                                    @endfor
                                        
                                    </div>
                                </div>
                                <div>
                                    <p>{{$item->comment}}</p>
                                </div>
                                    <div class="d-flex flex-row-reverse">
                                       
                                    </div>
                            </div>
                        </div>
                    </div>
                   @endforeach
                   <div>
                    
                   {{$product->getRatings()->links()}}
                   </div>
                 @else
                    <p class="text-center">{{__('No reviews found')}}</p>
                 @endif
                    
                </div>
            </div>
        </div>
    </div>
@endsection
