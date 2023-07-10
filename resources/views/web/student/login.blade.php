@extends('auth.layouts.master')
@section('title', __('auth_login'))
@section('content')

<!-- Start Content-->
<div class="card">
    <div class="card-body text-center">
        <div class="mb-4">
            <i class="feather icon-unlock auth-icon"></i>
        </div>
        <h3 class="mb-4">{{ __('auth_login_title') }}</h3>

        @include('web.student.inc.message')

        <!-- Form Start -->
        <form method="POST" action="{{ route($loginRoute) }}">
        @csrf
            <div class="input-group mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('field_email') }}" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-4">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('field_password') }}">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group text-left">
                <div class="checkbox checkbox-fill d-inline">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="cr" for="remember">
                        {{ __('field_remember') }}
                    </label>
                </div>
            </div>
            <input type="submit" class="btn btn-primary shadow-2 mb-4" name="submit" value="{{ __('auth_login') }}">
        </form>
        <!-- Form End -->

        @if (Route::has('student.password.request'))
            <p class="mb-2 text-muted">
                <a href="{{ route($forgotPasswordRoute) }}">
                    {{ __('auth_forgot_password') }}
                </a>
            </p>
        @endif

        @if (Route::has('student.register'))
        <p class="mb-0 text-muted">
            {{ __("auth_dont_have_account") }} 
            <a href="{{ route('student.register') }}">
                {{ __('auth_register') }}
            </a>
        </p>
        @endif

        @isset($setting->copyright_text)
        <p class="mb-0 text-muted">&copy; {!! strip_tags($setting->copyright_text, '<a><b><br>') !!}</p>
        @endisset
    </div>
</div>
<!-- End Content-->

@endsection