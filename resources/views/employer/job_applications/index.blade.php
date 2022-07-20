@extends('employer.layouts.app')
@section('title')
    {{ __('messages.job_applications') }}
@endsection
@push('css')
{{--    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>--}}
@endpush
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{  route('front.job.details',$job->job_id) }}" class="font-weight-bold">{{$job->job_title}}</a> &nbsp @yield('title')</h1>
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
{{--            <h1>--}}
{{--                <a href="{{  route('front.job.details',$job->job_id) }}"--}}
{{--                   class="font-weight-bold">{{$job->job_title}}</a> {{ __('messages.job_applications') }}--}}
{{--            </h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <div class="pl-3 pr-md-3 pr-0 py-1 grid-width-100">--}}
{{--                    <div class="card-header-action w-100">--}}
{{--                        {{ Form::select('status',$statusArray,null, ['class'=>'form-control','id'=>'filterStatus','placeholder'=>'Select Status']) }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <a href="{{  route('job.edit',$job->id) }}"--}}
{{--                   class="btn btn-warning form-btn mr-2">{{ __('messages.job.edit_job') }}--}}
{{--                </a>--}}
{{--                <a href="{{ route('job.index') }}" class="btn btn-primary form-btn">{{ __('messages.common.back') }}--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}

       <div class="section-body">
            @include('flash::message')
            <div class="card">
                <div class="card-header border-0 pt-6">
                    @include('layouts.search-component')
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center py-1">
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
                                            {{ Form::select('status', $statusArray,null, ['id' => 'filterStatus', 'data-control' =>'select2', 'class' => 'form-select form-select-solid status-selector select2-hidden-accessible data-allow-clear="true"','placeholder' => 'Select Status']) }}
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="reset" class="btn btn-sm fs-6 btn-light btn-active-light-primary me-2"
                                                    id="resetFilter"
                                                    data-kt-menu-dismiss="true">{{ __('messages.common.reset') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{  route('job.edit',$job->id) }}"
                               class="btn btn-primary form-btn">{{ __('messages.job.edit_job') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('employer.job_applications.table')
                </div>
            </div>
        </div>
        @include('employer.job_applications.job_stages_modal')
        @include('employer.job_applications.templates.templates')
    </section>
@endsection
@push('scripts')
    <script>
        let jobApplicationsUrl = "{{  route('job-applications', ['jobId' => $jobId]) }}";
        let jobApplicationStatusUrl = "{{  url('employer/job-applications') }}/";
        let jobApplicationDeleteUrl = "{{  url('employer/job-applications') }}";
        let jobDetailsUrl = "{{  route('front.job.details') }}";
        let candidateDetailsUrl = "{{  url('candidate-details') }}";
        let statusArray = JSON.parse('@json($statusArray)');
        let downloadDocumentUrl = "{{ url('employer/resume-download') }}";
        let changeJobStage = "{{ route('change.job.stage', ['jobId' => $jobId]) }}";
        let viewSlotScreen = "{{ url('employer/job-applications/'.request()->route('jobId')) }}";
        let stageCheck = "{{ route('stage-check') }}";
    </script>
{{--    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>--}}
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/custom/currency.js') }}"></script>
    <script src="{{mix('assets/js/job_applications/job_applications.js')}}"></script>
@endpush

