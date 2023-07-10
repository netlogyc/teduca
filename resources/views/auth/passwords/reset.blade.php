@extends('auth.layouts.master')
@section('title', __('auth_reset'))
@section('content')

<!-- Start Content-->
<div class="card">
   <div class="card-body text-center">
        <div class="mb-4">
            <i class="feather icon-lock auth-icon"></i>
        </div>
        <h5 class="mb-4">{{ __('auth_reset_title') }}</h5>

        <!-- Form Start -->
        <form method="POST" action="{{ route('password.update') }}">
        @csrf

          <input type="hidden" name="token" value="{{ $token }}">

          <div class="input-group mb-3">
            <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="{{ __('field_email') }}" autofocus>

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
          <input type="submit" class="btn btn-primary shadow-2 mb-4" name="submit" value="{{ __('auth_reset') }}">
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
