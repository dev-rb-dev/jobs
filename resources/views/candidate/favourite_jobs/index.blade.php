@extends('candidate.layouts.app')
@section('title')
    {{ __('messages.favourite_jobs') }}
@endsection
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
    <div class="card">
        <div class="card-body favourite-jobs">
            @include('candidate.favourite_jobs.table')
            {{--                    @livewire('favorite-jobs')--}}
        </div>
        @include('candidate.favourite_jobs.templates.templates')
    </div>
@endsection
@push('scripts')
    <script>
        let favouriteJobsUrl = "{{ route('favourite.jobs') }}";
        let jobDetailsUrl = "{{ route('front.job.details') }}";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/candidate/favourite_jobs.js')}}"></script>
@endpush
