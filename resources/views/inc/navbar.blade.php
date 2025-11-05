<nav class="fixed-top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="d-flex justify-content-between dark-1 text-white">
                            <div>
                                <a href="{{ route('shop.index')}}">
                                    <img src="{{ asset('images/logo.jpg') }}" alt="MBrothers-food.com"
                                    style="width: 50px; height:auto;">
                                </a>
                            </div>
                            <div>

                            </div>
                            <div>
                                @auth
                                <a href="{{route('myaccount')}}" class="btn btn-outline-light mx-2 text-capitalize">
                                    <i class="bi bi-person"></i>
                                    {{__('Hi')}} {{ substr(auth()->user()->name, 0, 10) }}
                                </a>
                                @else
                                <a href="{{ route('login')}}" type="button" class="btn btn-outline-light mx-2">
                                    <i class="bi bi-person"></i>
                                    {{__('My Account')}}
                                </a>
                                @endauth

                                <a type="button" href="{{ route('shop.cart') }}" class="btn btn-warning">
                                    @livewire('shop.carbutton')

                                </a>
                                


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>