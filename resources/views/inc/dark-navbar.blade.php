{{-- <nav class="mb-4">
    <div class="container">
        <div class="d-flex justify-content-between py-2">
            <div>
                <a href="{{ route('spa.shop') }}">
                    <img src="{{ asset('images/logo.jpg') }}" alt="MBrothers-food.com" style="width: 50px; height:auto;">
                </a>
            </div>
            <div class="d-flex">
                

                                
                                 @guest
                                <a href="{{ route('login')}}" type="button" class="circle-btn">
                                    
                                    <i class="bi bi-person"></i>
                                </a>
                                @endguest
                                @auth
                                <a href="{{route('myaccount')}}" class="btn btn-default text-capitalize">
                                    @if (\App\Models\User::find(auth()->user()->id)->avatar)
                                    <img class="xs-avatar" src="{{\App\Models\User::find(auth()->user()->id)->avatar}}" alt="">
                                       @else 
                                       <span class="xs-avatar-letter">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }} </span>
                                    @endif
                                   
                                </a>
                                @endauth
            </div>
        </div>
    </div>
</nav> --}}

 <div class="p-3" style="background-color:#000">
            <div class="mb-3 d-flex justify-content-between align-items-center p-3" >
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/logo.jpg') }}" alt="MBrothers-food.com" style="width: 50px; height:auto;" class="me-2">
                    <span class="logo-text fw-bold">M Brothers Food</span>
                </div>
                 <div>
                    <a href="{{route('myaccount')}}" class="btn btn-default text-capitalize">
                                    @if (\App\Models\User::find(auth()->user()->id)->avatar)
                                    <img class="xs-avatar" src="{{\App\Models\User::find(auth()->user()->id)->avatar}}" alt="">
                                       @else 
                                       <span class="xs-avatar-letter">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }} </span>
                                    @endif
                                   
                                </a>
                <button class="btn btn-dark" onclick="openSB()"><i class="bi bi-list"></i></button>
                 </div>
            </div>
        </div>
