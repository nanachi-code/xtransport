@extends('layouts.app')

@section('content')
    <div class="all-wrapper menu-side with-pattern">
        <div class="auth-box-w">
            <div class="logo-w">
                <a href="{{url('/')}}"><img alt="" src="{{asset('images/logo-big.png')}}"/></a>
            </div>
            <h4 class="auth-header">
                {{ __('Reset Password') }}
            </h4>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <label for="">{{ __('EMail') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                           placeholder="Enter your username" name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus/>
                    <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="buttons-w">
                    <button class="btn btn-primary btn-block" type="submit">{{ __('Send Password Reset Link') }}</button>
                </div>
                <li class="nav-link pl-0">
                    <a href="{{ route('login') }}">{{ __('Back to Login?') }}</a>
                </li>
            </form>
        </div>
    </div>
@endsection
