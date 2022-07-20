@extends('layouts.app')
@section('title')
    {{ __('messages.job_types') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
{{--    <section class="section">--}}
{{--        <div class="section-header flex-wrap">--}}
{{--            <h1 class="mb-2">{{ __('messages.job_types') }}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="#" class="btn btn-primary form-btn addJobTypeModal back-btn-right">{{ __('messages.job_type.add') }}--}}
{{--                    <i class="fas fa-plus"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @livewire('job-types')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('job_types.add_modal')--}}
{{--        @include('job_types.edit_modal')--}}
{{--        @include('job_types.show_modal')--}}
{{--    </section>--}}

@include('flash::message')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-6">
                @include('layouts.search-component')
                <div class="card-toolbar">
                    <div class="d-flex align-items-center py-1">
                        <a class="btn btn-primary addJobTypeModal"><i
                                class="fas fa-plus"></i>{{ __('messages.job_type.add') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                <div class="table-responsive">
                    @include('job_types.table')
                </div>
            </div>
        </div>
        @include('job_types.templates.templates')
        @include('job_types.add_modal')
        @include('job_types.edit_modal')
        @include('job_types.show_modal')
    </div>
</div>

@endsection
@push('scripts')
    <script>
        let jobTypeUrl = "{{ route('jobType.index') }}/";
        let jobTypeSaveUrl = "{{ route('jobType.store') }}";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/job_types/job_types.js')}}"></script>
@endpush
