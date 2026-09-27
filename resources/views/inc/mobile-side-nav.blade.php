<div class="mobile-sidenavbar" id="side_nav_bar">
    <div class="ms-wrap">

        <div class="" style="background-color:#000">
            <div class="mb-3 d-flex justify-content-between align-items-center p-3">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/logo.jpg') }}" alt="MBrothers-food.com" style="width: 50px; height:auto;"
                        class="me-2">
                    <span class="logo-text fw-bold">M Brothers Food</span>
                </div>
                <button class="btn btn-dark" onclick="closeSB()"><i class="bi bi-x-lg"></i></button>
            </div>
        </div>
        <div class="p-3">

            <div class="mb-5">
                <ul class="sn-menu">
                    <li>
                        <a wire:navigate href="/">{{ __('Home') }}</a>
                    </li>
                    <li>
                        <a wire:navigate href="/cart">{{ __('Notification') }}</a>
                    </li>

                    <li>
                        <a wire:navigate href="{{ route('home') }}">{{ __('My Account') }}</a>

                    </li>
                    <li>
                        <a wire:navigate href="#">{{ __('Contact') }}</a>

                    </li>
                    <li>
                        <a wire:navigate href="/#faq">{{ __('FAQ') }}</a>
                    </li>

                    <li>
                        <a wire:navigate href="#"> {{ __('Subscribe to Newsletters') }}</a>

                    </li>
                </ul>
            </div>
            <div>
                <div class="">
                    <span class="small">{{ __('Select language') }}</span>
                    <div class="d-flex">
                        <div class="me-2">
                            <a href="/language/en" class="{{ app()->getLocale() == 'en' ? 'tt_btn_theme-sm' : '' }}">
                                EN
                            </a>
                        </div>

                        <div class="me-2">
                            <a href="/language/hr" class="{{ app()->getLocale() == 'hr' ? 'btn-dark' : '' }}">
                                HR
                            </a>
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <div class="sn-footer p-3">
            <div class="mb-3">
                @auth
                    <div class="d-flex">
                        <a href="{{ route('myaccount') }}" class="btn btn-default text-capitalize">
                        @if (\App\Models\User::find(auth()->user()->id)->avatar)
                            <img class="xs-avatar" src="{{ \App\Models\User::find(auth()->user()->id)->avatar }}"
                                alt="">
                        @else
                            <span class="xs-avatar-letter">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }} </span>
                        @endif

                    </a>
                    <div>
                        <h5>{{__('Hello!')}}</h5>
                    <h6 class="fw-light">{{auth()->user()->name .' '.auth()->user()->last_name}}</h6>
                    </div>
                    </div>

                    
                @else
                    <h6 class="">
                        {{ __('If you already created an account, please log in to access your account.') }}</h6>

                    <a href="{{ __('home') }}" class="btn btn-lg btn-dark-theme">{{ __('Login') }} </a>
                @endauth
            </div>
            <hr />
            <h6 class="mb-0">M Brothers Food j.d.o.o.</h6>
            <small>
                Poštanska ul., 10410, Velika Gorica, Croatia
                <br>
                <a href="mailto:info@tallow-skincare.hr">info@mbrothers-food.hr</a>

            </small>


        </div>
    </div>
</div>
