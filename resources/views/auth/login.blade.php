@extends('layouts.app')

@section('content')
<div class="all-wrapper menu-side with-pattern">
    <div class="auth-box-w">
        <div class="logo-w">
            <a href="{{url('/')}}"><img alt="" src="{{asset('images/logo-big.png')}}" /></a>
        </div>
        <h4 class="auth-header">
            {{ __('Login') }}
        </h4>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="">{{ __('Email') }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Enter your username" name="email" value="{{ old('email') }}" required
                    autocomplete="email" autofocus />
                <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">{{ __('Password') }}</label>
                <input class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password"
                    type="password" name="password" required autocomplete="current-password" />
                <div class="pre-icon os-icon os-icon-fingerprint"></div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-check-inline ml-0">
                <input class="form-check-input ml-0" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <div class="buttons-w">
                <button class="btn btn-primary btn-block" type="submit"> {{ __('Login') }}</button>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <li class="nav-link pl-0 pr-0">
                        <a class="float-left text-warning"
                            href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
                    </li>
                </div>
                <div class="col-md-6">
                    <li class="nav-link pl-0 pr-0">
                        <a class="float-right" href="{{ route('register') }}">{{ __('Create Account?') }}</a>
                    </li>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
