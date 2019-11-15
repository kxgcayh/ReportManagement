@extends('layouts.app', (['title' => 'Verify Email']))

@section('content')

@breadcrumb(['header' => 'Verification', 'active' => ''])
@endbreadcrumb

@if (session('resent'))
    <div class="alert alert-success" role="alert">
        {{ __('A fresh verification link has been sent to your email address.') }}
    </div>
@endif

<div class="container-fluid">
    @card(['header' => 'Verify Your Email Address'])
        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
    @endcard
</div>
@endsection
