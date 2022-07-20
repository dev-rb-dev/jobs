@extends('layouts.app')
@section('title')
    {{ __('messages.job_tags') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
{{--    <section class="section">--}}
{{--        <div class="section-header flex-wrap">--}}
{{--            <h1 class="mb-2">{{ __('messages.job_tags') }}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="#" class="btn btn-primary form-btn addJobTagModal back-btn-right">{{__('messages.job_tag.add') }}--}}
{{--                    <i class="fas fa-plus"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @livewire('job-tags')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('job_tags.add_modal')--}}
{{--        @include('job_tags.edit_modal')--}}
{{--        @include('job_tags.show_modal')--}}
{{--    </section>--}}
@include('flash::message')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-6">
                @include('layouts.search-component')
                <div class="card-toolbar">
                    <div class="d-flex align-items-center py-1">
                        <a class="btn btn-primary addJobTagModal"><i
                                class="fas fa-plus"></i>{{__('messages.job_tag.add') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                <div class="table-responsive">
                    @include('job_tags.table')
                </div>
            </div>
        </div>
        @include('job_tags.templates.templates')
        @include('job_tags.add_modal')
        @include('job_tags.edit_modal')
        @include('job_tags.show_modal')
    </div>
</div>
@endsection
@push('scripts')
    <script>
        let jobTagUrl = "{{ route('jobTag.index') }}/";
        let jobTagSaveUrl = "{{ route('jobTag.store') }}";
    </script>
            <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
            <script src="{{ asset('assets/js/summernote.min.js') }}"></script>
             <script src="{{mix('assets/js/job_tags/job_tags.js')}}"></script>
@endpush
