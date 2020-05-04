@extends('auth.layout')

@section('content')
<div class="all-wrapper menu-side with-pattern">
    <div class="auth-box-w">
        <div class="logo-w">
            <a href="{{url('/')}}"><img alt="" src="{{asset('images/logo-big.png')}}" /></a>
        </div>
        <h4 class="auth-header">
            {{ __('Confirm Password') }}
        </h4>
        {{ __('Please confirm your password before continuing.') }}
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <div class="form-group row">
                <label for="password" class="col-form-label">{{ __('Password') }}</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Confirm Password') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
