@extends('layouts.auth')
@section('title')
    Forgot Password
@endsection
@section('content')
{{--    <div class="card card-primary">--}}
{{--        <div class="card-header"><h4>Reset Password</h4></div>--}}

{{--        <div class="card-body">--}}
{{--            @if (session('status'))--}}
{{--                <div class="alert alert-success">--}}
{{--                    {{ session('status') }}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <form method="POST" action="{{ route('password.email') }}">--}}
{{--                @csrf--}}
{{--                <div class="form-group">--}}
{{--                    <label for="email">Email</label>--}}
{{--                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"--}}
{{--                           name="email" tabindex="1" value="{{ old('email') }}" autofocus required>--}}
{{--                    <div class="invalid-feedback">--}}
{{--                        {{ $errors->first('email') }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">--}}
{{--                        Send Reset Link--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
<!--begin::Wrapper-->
<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" method="POST" action="{{ route('password.email') }}">
        @csrf
        @include('flash::message')
        @include('web.layouts.errors')
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
    @endif
    <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Reset Password ?</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-solid" type="email"
                   placeholder="Your Email" name="email" autocomplete="off" value="{{ old('email') }}" required/>
            <div class="invalid-feedback">
                {{ $errors->first('email') }}
            </div>
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <button type="submit" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
                <span class="indicator-label">Send Reset Link</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
<!--begin::Footer-->
{{--<div class="d-flex flex-center flex-column-auto p-10">--}}
{{--<!--begin::Links-->--}}
{{--<div class="d-flex align-items-center fw-bold fs-6">--}}
{{--Recalled your login info? <a href="{{ route('admin.login') }}">Sign In</a>--}}
{{--</div>--}}
{{--<!--end::Links-->--}}
{{--</div>--}}
<!--end::Footer-->
@endsection
