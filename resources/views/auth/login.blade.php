@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                 <div class="p-3 text-center">
                        <h3 class="fw-bolder">{{ __('Login')}}</h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6 p-3">
                            <a href="{{ route('google.login') }}" class="btn d-flex align-items-center justify-content-center"
                                style="background-color: #fff; border: 1px solid #ddd; border-radius: 5px; padding: 10px;">
                                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google logo"
                                    style="width: 20px; margin-right: 8px;">
                                <span style="color: #555;">{{ __('Continue with Google') }}</span>
                            </a>
                        </div>
                         <div>
                            @if(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            </div>
                        <div class="text-center">
                            {{ __('Or') }}
                        </div>

                    </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="name"
                                            placeholder="{{ __('Email Address') }}" name="email" required value="{{ old('email') }}">
                                        <label for="name">{{ __('Email Address') }}</label>

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

                        {{-- <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning btn-lg form-control">
                                    {{ __('Login') }}
                                </button>
                                 @if (Route::has('password.request'))
                                   <div class="text-center">
                                     <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                   </div>
                                @endif
                        </div>
                        
                         <div class="text-center">
                                        <p>{{__('Dont have an account?')}} <a href="{{route('register')}}">{{  __('Register') }}</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
