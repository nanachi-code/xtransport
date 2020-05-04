@extends('auth.layout')

@section('content')
<div class="all-wrapper menu-side with-pattern">
    <div class="auth-box-w wider">
        <div class="logo-w">
            <a href="{{url('/')}}"><img alt="" src="{{asset('images/logo-big.png')}}" /></a>
        </div>
        <h4 class="auth-header">
            {{ __('Verify Your Email Address') }}
        </h4>
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        @endif

        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <div class="buttons-w text-center">
                <button type="submit"
                    class="btn btn-link btn-block align-baseline">{{ __('click here to request another') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
