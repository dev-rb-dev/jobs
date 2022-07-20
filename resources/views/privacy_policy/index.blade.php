@extends('layouts.app')
@section('title')
    {{ __('messages.setting.privacy_policy') }}
@endsection
@push('css')
    {{--    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>--}}
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
    @include('flash::message')
            <div class="card mb-5 mb-xl-8">
                <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                    @include('privacy_policy.privacy_policy')
                    {{--                    @include('privacy_policy.terms_conditions')--}}
                </div>
            </div>
@endsection
@push('scripts')
    <script>
        let termConditionData = `{{$privacyPolicy['terms_conditions']}}`;
        let privacyPolicyData = `{{$privacyPolicy['privacy_policy']}}`;
    </script>
    <script src="{{ mix('assets/js/privacy_policy/privacy_policy.js') }}"></script>
    {{--    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>--}}
@endpush
