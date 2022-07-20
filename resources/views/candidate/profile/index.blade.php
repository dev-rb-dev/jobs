@extends('candidate.layouts.app')
@section('title')
    {{ __('messages.profile') }}
@endsection
@section('header_toolbar')
{{--    <section class="section profile">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.profile') }}</h1>--}}
{{--            <a class="font-weight-bold public-profile"--}}
{{--               href="{{ route('front.candidate.details',$user->candidate->unique_id) }}"--}}
{{--               target="_blank">{{ __('messages.common.view_profile') }}</a>--}}
{{--        </div>--}}
{{--        @include('flash::message')--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                @include('layouts.errors')--}}
{{--                <div class="card-body py-0 mt-2">--}}
{{--                    @include('candidate.profile.profile_menu')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
             data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
             class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
        </div>
    </div>
</div>
@endsection
@section('content')
@include('flash::message')
@include('layouts.errors')
        <div class="card mb-5 mb-xl-8">
            <div class="card-body py-0">
                @include('candidate.profile.profile_menu')
                </div>
        </div>
        <div class="card">
            <div class="card-body py-0">
                @yield('section')
            </div>
        </div>
@endsection
@push('scripts')
    <script>
        let companyStateUrl = "{{ route('states-list') }}";
        let companyCityUrl = "{{ route('cities-list') }}";
        let defaultImageUrl = "{{ asset('assets/img/infyom-logo.png') }}";
    </script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
@endpush
