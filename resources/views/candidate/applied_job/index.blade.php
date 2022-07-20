@extends('candidate.layouts.app')
@section('title')
    {{ __('messages.applied_job.applied_jobs') }}
@endsection
@push('css')
    @livewireStyles
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
    <div class="card">
        <div class="card-body">
            @livewire('applied-jobs')
        </div>
    </div>
    @include('candidate.applied_job.show_applied_jobs_modal')
    @include('candidate.applied_job.templates.templates')
    @include('candidate.applied_job.schedule_slot_book')

@endsection
@push('scripts')
    @livewireScripts
    <script>
        let candidateAppliedJobUrl = "{{ route('candidate.applied.job') }}";
    </script>
    <script src="{{mix('assets/js/candidate/applied-jobs.js')}}"></script>
@endpush
