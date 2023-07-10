@extends('auth.layouts.master')
@section('title', __('auth_verify'))
@section('content')

<!-- Start Content-->
<div class="card">
    <div class="card-body text-center">
        <div class="mb-4">
            <i class="feather icon-mail auth-icon"></i>
        </div>
        <h3 class="mb-4">{{ __('auth_verify_title') }}</h3>
        
        @include('web.student.inc.message')

        <p class="mb-0 text-muted">
            {{ __('auth_check_your_email') }}
        </p>
        <p class="mb-0 text-muted">
            {{ __('auth_not_receive_email') }}, <a href="{{ route('verification.resend') }}">{{ __('auth_send_another_request') }}</a>
        </p>
    </div>
</div>
<!-- End Content-->

@endsection
