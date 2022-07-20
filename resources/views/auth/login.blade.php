@extends('layouts.auth')
@section('title')
    Admin Login
@endsection
@section('content')
    <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
        <form class="form w-100" method="POST" novalidate="novalidate" action="{{ route('login') }}">
            @csrf
            <div id="candidateValidationErrBox">
                @include('layouts.errors')
            </div>
            <div class="text-center mb-10">
                <h1 class="text-dark mb-3">Admin Login</h1>
            </div>
            <div class="fv-row mb-10">
                <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                <input aria-describedby="emailHelpBlock" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg form-control-solid" type="text" name="email" autocomplete="off" value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" placeholder="Enter Email" required/>
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            </div>
            <div class="fv-row mb-10">
                <div class="d-flex flex-stack mb-2">
                    <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                    <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                </div>
                <input aria-describedby="passwordHelpBlock" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg form-control-solid" type="password" name="password" autocomplete="off" value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : old('password') }}" placeholder="Enter Password" required/>
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            </div>

            <div class="fv-row mb-10">
                <label class="form-check form-check-custom form-check-solid form-check-inline" for="remember_me">
                    <input class="form-check-input" id="remember" {{ (Cookie::get('remember') !== null) ? 'checked' : '' }} type="checkbox" name="remember"/>
                    <span class="form-check-label fw-bold text-gray-700 fs-6">{{ __('messages.remember_me') }}</span>
                </label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-primary w-100 mb-5" id="loginBtn">
                    <span class="indicator-label">Login</span>
                    <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </form>
    </div>
@endsection
