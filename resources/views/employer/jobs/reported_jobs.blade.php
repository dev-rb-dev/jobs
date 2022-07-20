@extends('layouts.app')
@section('title')
    {{ __('messages.reported_jobs') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
    {{--    @livewireStyles--}}
@endpush
@section('content')
{{--    <section class="section">--}}
{{--        <div class="section-header flex-wrap">--}}
{{--            <h1 class="mr-4 w-700">{{ __('messages.reported_jobs') }}</h1>--}}
{{--            @if(count($reportedJob) > 0)--}}
{{--                <div class="section-header-breadcrumb flex-center">--}}
{{--                    <div class="row justify-content-end">--}}
{{--                        <div class="mt-3 mt-md-0">--}}
{{--                            <div class="card-header-action w-100">--}}
{{--                                {!! Form::selectMonth('month', null, ['id' => 'filter_reported_date', 'class'=>'form-control w-100','placeholder' => 'Select Month']) !!}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                   @livewire('reported-jobs')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('employer.jobs.show_reported_job_modal')--}}
{{--    </section>--}}
{{--@section('content')--}}
    @include('flash::message')
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-6">
            @include('layouts.search-component')
            <div class="card-toolbar">
                <div class="d-flex align-items-center py-1">
                    @if(count($reportedJob) > 0)
                        <div class="me-4">
                            <a href="#" class="btn btn-flex btn btn-light-primary btn-light fw-bolder"
                               data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                               data-kt-menu-flip="top-end">
                                    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path
                                                        d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z"
                                                        fill="#000000"></path>
												</g>
											</svg>
										</span>
                                {{ __('messages.common.filter') }}</a>
                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                                 id="kt_menu_6113c71822d0d">
                                <div class="px-7 py-5">
                                    <div
                                        class="fs-5 text-dark fw-bolder">{{ __('messages.common.filter_options') }}</div>
                                </div>
                                <div class="separator border-gray-200"></div>
                                <div class="px-7 py-5">
                                    <div class="mb-5">
                                        {{ Form::selectMonth('month', null, ['id' => 'filter_reported_date', 'data-control' =>'select2', 'class' => 'form-select form-select-solid status-filter select2-hidden-accessible data-allow-clear="true"','placeholder' => 'Select Month']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
            <div class="table-responsive">
                @include('employer.jobs.reported_jobs_table')
            </div>
        </div>
    </div>
    @include('employer.jobs.show_reported_job_modal')
    @include('employer.jobs.reported_jobs_templates.templates')
@endsection
@push('scripts')
    @livewireScripts
    <script>
        let reportedJobsUrl = "{{ route('reported.jobs') }}/";
        let frontJobDetail = "{{ route('front.job.details') }}";
        let frontCandidateDetail = "{{ url('candidate-details') }}";
    </script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/jobs/reported_jobs.js')}}"></script>
@endpush

