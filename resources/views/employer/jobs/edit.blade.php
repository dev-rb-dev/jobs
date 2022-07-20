@extends('employer.layouts.app')
@section('title')
    {{ __('messages.job.edit_job') }}
@endsection
@push('css')
    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('job.index') }}"
                   class="btn btn-sm btn-light btn-active-light-primary pull-right">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="section ">
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.job.edit_job') }}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="{{ route('job.index') }}"--}}
{{--                   class="btn btn-primary form-btn float-right">{{ __('messages.common.back') }}</a>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="section-body">
            @include('layouts.errors')
            <div class="card">
                <div class="card-body">
                    {{ Form::model($job, ['route' => ['job.update', $job->id], 'method' => 'put', 'id' => 'editJobForm']) }}

                    @include('employer.jobs.edit_fields')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        let isEdit = true;
        let jobStateUrl = "{{ route('states-list') }}";
        let jobCityUrl = "{{ route('cities-list') }}";
        let employerPanel = true;
    </script>
    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>
{{--    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>--}}
    <script src="{{mix('assets/js/jobs/create-edit.js')}}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/autonumeric/autoNumeric.min.js') }}"></script>
@endpush
