{{--@extends('employer.layouts.app')--}}
{{--@section('title')--}}
{{--    {{ __('messages.company.followers') }}--}}
{{--@endsection--}}
{{--@push('css')--}}
{{--    @livewireStyles--}}
{{--@endpush--}}
{{--@section('content')--}}
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.company.followers') }}</h1>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body followers-body">--}}
{{--                    @livewire('followers')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}
{{--@push('scripts')--}}
{{--    @livewireScripts--}}
{{--@endpush--}}




@extends('employer.layouts.app')
@section('title')
    {{ __('messages.company.followers') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('header_toolbar')
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
    <div class="post d-flex flex-column-fluid" id="kt_follower">
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-6">
                    @include('layouts.search-component')
                </div>
                <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                    <div class="table-responsive">
                        @include('employer.followers.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let indexUrl = '{{route('followers.index')}}';
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{asset('assets/js/employer/follower.js')}}"></script>
@endpush

