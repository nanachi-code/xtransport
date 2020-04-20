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

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="form-group">

                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group row">
                        <label for="email" class="col-form-label ">{{ __('EMail') }}</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email"
                               value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        <div class="pre-icon os-icon os-icon-email-2-at2"></div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-form-label">{{ __('Password') }}</label>

                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password" required
                               autocomplete="new-password">
                        <div class="pre-icon os-icon os-icon-fingerprint"></div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                               class="col-form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" required autocomplete="new-password">
                    </div>

                </div>
                <div class="buttons-w">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
