@extends('layouts.app')
@section('title')
    {{ __('messages.salary_periods') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.salary_periods') }}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="#" class="btn btn-primary form-btn addSalaryPeriodModal back-btn-right">{{ __('messages.salary_period.add') }}--}}
{{--                    <i class="fas fa-plus"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @livewire('salary-periods')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

@include('flash::message')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-6">
                @include('layouts.search-component')
                <div class="card-toolbar">
                    <div class="d-flex align-items-center py-1">
                        <a class="btn btn-primary addSalaryPeriodModal"><i
                                class="fas fa-plus"></i>{{ __('messages.marital_status.add') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                <div class="table-responsive">
                    @include('salary_periods.table')
                </div>
            </div>
        </div>
        @include('salary_periods.templates.templates')
        @include('salary_periods.add_modal')
        @include('salary_periods.edit_modal')
        @include('salary_periods.show_modal')
</div>
</div>
@endsection
@push('scripts')
    <script>
        let salaryPeriodUrl = "{{ route('salaryPeriod.index') }}";
        let salaryPeriodSaveUrl = "{{ route('salaryPeriod.store') }}";
    </script>
    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/salary_periods/salary_periods.js')}}"></script>
@endpush
