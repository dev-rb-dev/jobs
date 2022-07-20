@extends('layouts.auth')
@section('title')
    Reset Password
@endsection
@section('content')
{{--    <div class="card card-primary">--}}
{{--        <div class="card-header"><h4>Set a New Password</h4></div>--}}
{{--        <div class="card-body">--}}
{{--            <form method="POST" action="{{ url('/password/reset') }}">--}}
{{--                @csrf--}}
{{--                @if ($errors->any())--}}
{{--                    <div class="alert alert-danger p-0">--}}
{{--                        <ul>--}}
{{--                            @foreach ($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                <input type="hidden" name="token" value="{{ $token }}">--}}
{{--                <div class="form-group">--}}
{{--                    <label for="email">Email</label>--}}
{{--                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"--}}
{{--                           name="email" tabindex="1" value="{{ old('email') }}" autofocus>--}}
{{--                    <div class="invalid-feedback">--}}
{{--                        {{ $errors->first('email') }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="password" class="control-label">Password</label>--}}
{{--                    <input id="password" type="password"--}}
{{--                           class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password"--}}
{{--                           tabindex="2">--}}
{{--                    <div class="invalid-feedback">--}}
{{--                        {{ $errors->first('password') }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="password_confirmation" class="control-label">Confirm Password</label>--}}
{{--                    <input id="password_confirmation" type="password"--}}
{{--                           class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid': '' }}"--}}
{{--                           name="password_confirmation" tabindex="2">--}}
{{--                    <div class="invalid-feedback">--}}
{{--                        {{ $errors->first('password_confirmation') }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">--}}
{{--                        Set a New Password--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}

<div class="w-lg-550px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    <form class="form w-100" novalidate="novalidate" method="POST" action="{{ url('/password/reset') }}">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger p-0">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Setup New Password</h1>
        </div>
        <div class="mb-10 fv-row">
            <div class="mb-1">
                <div class="fv-row mb-10">
                    <label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-solid" type="email" placeholder="" name="email" autocomplete="off" value="{{ old('email') }}" required/>
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                </div>
                <label class="form-label fw-bolder text-dark fs-6">Password</label>
                <div class="position-relative mb-3" data-kt-password-meter="true">
                    <input class="form-control{{ $errors->has('password') ? ' is-invalid': '' }} form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" tabindex="2"/>
                </div>
            </div>
        </div>
        <div class="fv-row mb-10">
            <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
            <input class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid': '' }} form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation" autocomplete="off" tabindex="2"/>
            <div class="invalid-feedback">
                {{ $errors->first('password_confirmation') }}
            </div>
        </div>
        <div class="text-center">
            <button type="submit" id="kt_new_password_submit" class="btn btn-lg btn-primary fw-bolder">
                <span class="indicator-label"> Set a New Password</span>
                <span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
    </form>
</div>
{{--    <div class="mt-5 text-muted text-center">--}}
{{--        Recalled your login info? <a href="{{ route('admin.login') }}">Sign In</a>--}}
{{--    </div>--}}
@endsection
