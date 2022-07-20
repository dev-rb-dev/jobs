@extends('layouts.app')
@section('title')
    {{ __('messages.country.countries') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.country.countries') }}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="#" class="btn btn-primary form-btn addCountryModal back-btn-right">{{ __('messages.common.add') }}--}}
{{--                    <i class="fas fa-plus"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @livewire('countries')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('countries.add_modal')--}}
{{--        @include('countries.edit_modal')--}}
{{--    </section>--}}
@include('flash::message')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-6">
                @include('layouts.search-component')
                <div class="card-toolbar">
                    <div class="d-flex align-items-center py-1">
                        <a class="btn btn-primary addCountryModal"><i
                                class="fas fa-plus"></i>{{ __('messages.common.add') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                <div class="table-responsive">
                    @include('countries.table')
                </div>
            </div>
        </div>
        @include('countries.templates.templates')
        @include('countries.add_modal')
        @include('countries.edit_modal')
    </div>
</div>
@endsection
@push('scripts')
    <script>
        let countryUrl = "{{ route('countries.index') }}";
        let countrySaveUrl = "{{ route('countries.store') }}";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/countries/countries.js')}}"></script>
@endpush
