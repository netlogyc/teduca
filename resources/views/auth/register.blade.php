@extends('auth.layouts.master')
@section('title', __('auth_register'))
@section('content')

<!-- Start Content-->
<div class="card">
    <div class="card-body text-center">
        <div class="mb-4">
            <i class="feather icon-user-plus auth-icon"></i>
        </div>
        <h3 class="mb-4">{{ __('auth_register_title') }}</h3>

        <!-- Form Start -->
        <form method="POST" action="{{ route('register') }}">
        @csrf
            <div class="input-group mb-3">
                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="{{ __('field_first_name') }}" autofocus>

                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="{{ __('field_last_name') }}" autofocus>

                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('field_email') }}">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('field_password') }}">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-4">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('field_confirm_password') }}">
            </div>
            <input type="submit" class="btn btn-primary shadow-2 mb-4" name="submit" value="{{ __('auth_register') }}">
        </form>
        <!-- Form End -->

        @if (Route::has('login'))
        <p class="mb-0 text-muted">
            {{ __("auth_already_have_account") }} 
            <a href="{{ route('login') }}">
                {{ __('auth_login') }}
            </a>
        </p>
        @endif
    </div>
</div>
<!-- End Content-->

@endsection
