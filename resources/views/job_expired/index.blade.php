@extends('layouts.app')
@section('title')
    {{ __('messages.expired_jobs') }}
@endsection
@push('css')
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
    @include('flash::message')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-6">
                    @include('layouts.search-component')
                </div>
                <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                    <div class="table-responsive">
                        @include('job_expired.table')
                    </div>
                </div>
            </div>
            @include('job_expired.templates.templates')
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let jobsUrl = "{{ route('admin.jobs.index') }}";
        let expiredJobsUrl = "{{ route('admin.jobs.expiredJobs') }}";
    </script>
    {{--    <script src="{{ asset('assets/js/select2.min.js') }}"></script>--}}
    {{--    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>--}}
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/job_expired/job_expired.js')}}"></script>
@endpush

