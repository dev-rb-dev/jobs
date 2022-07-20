@extends('layouts.app')
@section('title')
    {{ __('messages.job_notification.job_notifications') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
    {{--    <section class="section">--}}
    {{--        <div class="section-header flex-wrap">--}}
    {{--            <h1 class="mb-2 mr-4 w-700">{{ __('messages.job_notification.job_notifications') }}</h1>--}}
    {{--            <div class="section-header-breadcrumb flex-center">--}}
    {{--                <div class="row justify-content-end">--}}
    {{--                    <div class="col-12">--}}
    {{--                        <div class="card-header-action">--}}
    {{--                            {{  Form::select('employers', $companies, null, ['id' => 'filter_employers', 'class' => 'form-control status-filter','placeholder' => 'Select Employer']) }}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            @include('flash::message')--}}
{{--            <div class="card">--}}
    {{--                <div class="card-body">--}}
    {{--                    {{ Form::open(['route' => 'job-notification.store','id' => 'createJobNotificationForm']) }}--}}
    {{--                    @include('job_notification.send_notification')--}}
    {{--                    {{ Form::close() }}--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        @include('job_notification.templates.templates')--}}
    {{--    </section>--}}

    @include('flash::message')
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-6 justify-content-end">
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
                                    <label class="form-label fs-6 fw-bold">{{ __('messages.employers').':' }}</label>
                                    {{ Form::select('employers', $companies,null, ['id' => 'filter_employers', 'data-control' =>'select2', 'class' => 'form-select form-select-solid status-selector select2-hidden-accessible data-allow-clear="true"','placeholder' => 'Select Employer']) }}
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-sm fs-6 btn-light btn-active-light-primary"
                                            id="resetFilter"
                                            data-kt-menu-dismiss="true">{{ __('messages.common.reset') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
            {{ Form::open(['route' => 'job-notification.store','id' => 'createJobNotificationForm']) }}
            @include('job_notification.send_notification')
            {{ Form::close() }}
        </div>
    </div>
    @include('job_notification.templates.templates')
@endsection
@push('scripts')
    <script>
        let getEmployerJobs = "{{ url('admin/employer-jobs') }}";
        let jobDetails = "{{ url('admin/jobs') }}";
        let jobNotification = "{{ url('admin/job-notifications') }}";
    </script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{mix('assets/js/jobs/job_notification.js')}}"></script>
@endpush

