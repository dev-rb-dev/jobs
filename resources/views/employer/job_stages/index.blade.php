@extends('employer.layouts.app')
@section('title')
    {{ __('messages.job_stage.job_stage') }}
@endsection
{{--@push('css')--}}
{{--    @livewireStyles--}}
{{--    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--@endpush--}}
@section('header_toolbar')
    {{--    <section class="section">--}}
    {{--        <div class="section-header">--}}
    {{--            <h1>{{ __('messages.job_stage.job_stage') }}</h1>--}}
    {{--            <div class="section-header-breadcrumb">--}}
    {{--                <div class="px-3 back-btn-right">--}}
    {{--                    <a href="javascript:void(0)"--}}
    {{--                       class="btn btn-primary form-btn addJobStageModal">{{ __('messages.common.add') }}--}}
    {{--                        <i class="fas fa-plus"></i></a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="section-body">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-body followers-body">--}}
    {{--                    @livewire('job-stage')--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        @include('employer.job_stages.add_modal')   --}}
    {{--        @include('employer.job_stages.edit_modal')--}}
    {{--        @include('employer.job_stages.show_modal')--}}
    {{--    </section>--}}


    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            </div>
            <div class="row">
                <div class="card-toolbar">
                    <div class="d-flex align-items-center py-1">
                        <a class="btn btn-primary btn-sm addJobStageModal"><i
                                class="fas fa-plus"></i>{{ __('messages.marital_status.add') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @include('flash::message')
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-6">
            @include('layouts.search-component')
        </div>
        <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
            <div class="table-responsive">
                @include('employer.job_stages.table')
            </div>
        </div>
    </div>
    @include('employer.job_stages.templates.templates')
        @include('employer.job_stages.add_modal')
        @include('employer.job_stages.edit_modal')
        @include('employer.job_stages.show_modal')
    </div>
</div>

@endsection
@push('scripts')
    <script>
        let jobStageUrl = "{{ route('job.stage.index') }}/";
        let jobStageSaveUrl = "{{ route('job.stage.store') }}";
        let jobShowUrl = '{{route('job.stage.show')}}';
    </script>
{{--    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>--}}
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/job_stages/job_stages.js')}}"></script>

@endpush
