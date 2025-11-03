@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="p-3 text-center">
                        <h3 class="fw-bolder">{{ __('Register')}}</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" novalidate>
                            @csrf
                           
                            {{-- <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                            <div class="row">
                                <div class="col-lg-6 form-group mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="name"
                                            placeholder="{{ __('First Name') }}" name="first_name" required value="{{ old('first_name') }}">
                                        <label for="name">{{ __('First Name') }}</label>

                                    </div>
                                    @error('first_name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 form-group mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                            placeholder="{{ __('Last Name') }}" name="last_name" required value="{{ old('last_name') }}">
                                        <label for="last_name">{{ __('Last Name') }}</label>
                                    </div>
                                    @error('last_name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-floating">
                                        <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" id="email" placeholder="{{ __('Email Address') }}" required>
                                        <label for="email">{{ __('Email Address') }}</label>
                                    </div>
                               

                                    @error('email')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                    <div class="form-floating">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                            placeholder="{{ __('Password') }}" name="password" required>
                                        <label for="password">{{ __('Password') }}</label>
                                    </div>
                                    @error('password')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            <div class="form-group mb-3">
                                    <div class="form-floating">
                                        <input type="password" class="form-control @error('confirm_oassword') is-invalid @enderror" id="c_password"
                                            placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required>
                                        <label for="c_password">{{ __('Confirm Password') }}</label>
                                    </div>
                                    @error('text-danger')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            {{-- <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}

                            {{-- <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}

                            {{-- <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <button class="btn btn-lg btn-warning form-control">
                                        {{ __('Register')}}
                                </button>
                                <div class="mt-3">
                                    <div class="text-center">
                                        <p>{{__('Already have an account?')}} <a href="{{route('login')}}">{{  __('Login') }}</a></p>
                                    </div>
                                    <div>
                                        <p class="text-muted">{{__('By clicking, you agree to the') }} <a href="/terms" target="_blank" rel="noopener">{{__('Terms and Conditions')}}</a>.</p>

                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
