@extends('auth.layout')

@section('content')
    <div class="all-wrapper menu-side with-pattern">
        <div class="auth-box-w wider">
            <div class="logo-w">
                <a href="{{url('/')}}"><img alt="" src="{{asset('images/logo-big.png')}}"/></a>
            </div>
            <h4 class="auth-header">
                {{ __('Register') }}
            </h4>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="col-form-label">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                           value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <div class="pre-icon os-icon os-icon-user"></div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="email" class="col-form-label">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email"
                           placeholder="Enter your email"
                    >
                    <div class="pre-icon os-icon os-icon-email-2-at2"></div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('Password') }}</label>

                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password" placeholder="Password">
                            <div class="pre-icon os-icon os-icon-fingerprint"></div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation"
                                   required autocomplete="new-password" placeholder="Password">
                        </div>
                    </div>
                </div>
                <div class="buttons-w text-center">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Register') }}
                    </button>
                </div>
                <li class="nav-link pl-0">
                    <a href="{{ route('login') }}">{{ __('Back to Login?') }}</a>
                </li>
            </form>
        </div>
    </div>
@endsection
