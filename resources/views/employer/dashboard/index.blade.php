@extends('employer.layouts.app')
@section('title')
    {{ __('messages.employer_dashboard.dashboard') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
@endpush
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
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
    <div class="row g-5 g-xl-8">
        <div class="col-xl-4">
            <a class="card bg-success hoverable card-xl-stretch mb-xl-8 cursor-default" href="{{ route('job.index') }}">
                <div class="card-body">
                    <i class="fas fa-briefcase text-white fa-4x"></i>
                    <div
                            class="text-white fw-bolder fs-2 mb-2 mt-5">{{ isset($totalJobs)?$totalJobs:'0' }}</div>
                    <div
                        class="fw-bold text-white">{{ __('messages.employer_menu.total_jobs') }}</div>
                </div>
            </a>
        </div>

        <div class="col-xl-4">

            <a class="card bg-primary hoverable card-xl-stretch mb-xl-8 cursor-default" href="{{ route('job.jobStatus',1) }}">
                <div class="card-body">
                    <i class="far fa-clock text-white fa-4x"></i>
                     <div
                            class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ isset($jobCount)?$jobCount:'0' }}</div>
                    <div
                        class="fw-bold text-white">{{ __('messages.employer_menu.live_jobs') }}</div>
                </div>
            </a>
        </div>

        <div class="col-xl-4">
            <a class="card bg-warning hoverable card-xl-stretch mb-xl-8 cursor-default" href="{{ route('job.jobStatus',3) }}">
                <div class="card-body">
                    <i class="fas fa-pause-circle text-white fa-4x"></i>
                    <div
                            class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ isset($pausedJobCount)?$pausedJobCount:'0' }}</div>
                    <div
                        class="fw-bold text-white">{{ __('messages.employer_menu.paused_jobs') }}</div>
                </div>
            </a>
        </div>
    </div>


    <div class="row g-5 g-xl-8">
        <div class="col-xl-4">
            <a class="card bg-danger hoverable card-xl-stretch mb-xl-8 cursor-default" href="{{ route('job.jobStatus',2) }}">
                <div class="card-body">
                    <i class="fas fa-window-close text-white fa-4x"></i>
                    <div
                            class="text-white fw-bolder fs-2 mb-2 mt-5">{{ isset($closedJobCount)?$closedJobCount:'0' }}</div>
                    <div
                        class="fw-bold text-white">{{ __('messages.employer_menu.closed_jobs') }}</div>
                </div>
            </a>
        </div>
        <div class="col-xl-4">
            <a class="card bg-info hoverable card-xl-stretch mb-xl-8 cursor-default" href="{{ route('job.jobStatus',0) }}">
                <div class="card-body">
                    <i class="far fa-user text-white fa-4x"></i>
                    <div
                            class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ isset($draftedJobCount)?$draftedJobCount:'0' }}</div>
                    <div
                        class="fw-bold text-white">{{ __('messages.employer_menu.drafted_jobs') }}</div>
                </div>
            </a>
        </div>
        <div class="col-xl-4">
            <a class="card bg-dark hoverable card-xl-stretch mb-xl-8 cursor-default" href="#">
                <div class="card-body">
                    <i class="fas fa-file text-white fa-4x"></i>
                    <div
                            class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ isset($jobApplicationsCount)?$jobApplicationsCount:'0' }}</div>
                    <div
                        class="fw-bold text-white">{{ __('messages.employer_menu.total_job_applications') }}</div>
                </div>
            </a>
        </div>
    </div>
            <!-- ===== Start of Notices Section ===== -->
            @if(count($notices) > 0)
            <section class="app-section p-0 notice-div">
                <div class="card mb-5 mb-xl-10 auto-container">
                    <div class="sec-title text-center">
                        <h2 class="capitalize text-center">{{ __('web.home_menu.notices') }}</h2>
                    </div>
                    <div class="row justify-content-center">
                        <div class="content-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column wow fadeInRight p-0">
                                <div class="sec-title">
                                    <marquee direction="up" scrolldelay="150" id="notices">
                                        @foreach($notices as $key=>$notice)
                                            <div class="notice color{{$key}}" role="listitem">
                                                <div class="d-flex justify-content-between mb-2"><span>{{ html_entity_decode($notice->name) }} </span>
                                                    <span class="sec-date date-color{{$key}}">{{ date('jS M, Y', strtotime($notice->created_at)) }}</span>
                                                </div>
                                                <p>{!! nl2br(strip_tags($notice->description)) !!}</p>
                                            </div>
                                        @endforeach
                                    </marquee>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!-- ===== End of Notices Section ===== -->
    <div class="row g-5 g-xl-8">
        <!--begin::Charts Widget 3-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                                    <span
                                        class="card-label fw-bolder fs-3 mb-1">{{ __('messages.job_applications') }}</span>
                </h3>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="row justify-content-end">
                        <div class="col-lg-4 col-md-4 col-xl-3 col-sm-4 mt-3 mt-md-0 ">
                            <div class="card-header-action w-100">
                                {{  Form::select('jobs', $jobStatus, null, ['id' => 'jobStatus', 'class' => 'form-control status-filter', 'placeholder' => 'Select Job']) }}
                            </div>
                        </div>
                        <div class="col-lg-4  col-md-4 col-xl-3 col-sm-4 mt-3 mt-md-0">
                            <div class="card-header-action w-100">
                                {{  Form::select('gender', $gender, null, ['id' => 'gender', 'class' => 'form-control status-filter', 'placeholder' => 'Select Gender']) }}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xl-4 col-sm-4 mt-0">
                            <div id="timeRange" class="time_range time_range_width w-100">
                                <i class="far fa-calendar-alt"
                                   aria-hidden="true"></i>&nbsp;&nbsp;<span></span> <b
                                    class="caret"></b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="jobContainer" class="card-body">
                <canvas id="employerDashboardChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
    <div class="row g-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xl-6 ps-0">
            <!--begin::Tables Widget 1-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                                <span
                                    class="card-label fw-bolder fs-3 mb-1">{{ __('messages.employer_menu.recent_jobs') }}</span>
                    </h3>
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                        <span class="svg-icon svg-icon-2">
															 <a href="{{ route('job.index') }}"
                                                                class="btn btn-info">{{ __('messages.common.view_more') }} <i
                                                                     class="fas fa-chevron-right"></i></a>
														</span>
                        <!--end::Svg Icon-->
                        <!--end::Menu-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped align-middle gs-0 gy-5">
                            <!--begin::Table head-->
                            <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-200px">{{ __('messages.job.job_title') }}</th>
                                <th class="min-w-200px">{{ __('messages.employer_menu.expires_on') }}</th>
                                <th class="min-w-50px text-center">{{ __('messages.common.status') }}</th>
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                            @if(count($recentJobs) > 0)
                                @foreach($recentJobs as $recentJob)
                                    <tr>
                                        <td class="ps-3">
                                            <a href="{{ route('front.job.details',$recentJob->job_id) }}">{{ html_entity_decode($recentJob->job_title) }}</a>
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($recentJob->job_expiry_date)->format('jS M, Y') }}
                                        </td>
                                        <td class="text-center">
                                            <div
                                                class="badge w-auto badge-{{\App\Models\Job::STATUS_COLOR[$recentJob->status]}}">
                                                <span
                                                    class="px-3">{{ \App\Models\Job::STATUS[$recentJob->status] }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
            </div>
            <!--endW::Tables Widget 1-->
        </div>
        <!--end::Col-->
        <div class="col-xl-6 pe-0">
            <!--begin::Tables Widget 1-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                                <span
                                    class="card-label fw-bolder fs-3 mb-1">{{ __('messages.employer_menu.recent_follower') }}</span>
                    </h3>
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                        <span class="svg-icon svg-icon-2">
															 <a href="{{ route('followers.index') }}"
                                                                class="btn btn-info">{{ __('messages.common.view_more') }} <i
                                                                     class="fas fa-chevron-right"></i></a>
														</span>
                        <!--end::Svg Icon-->
                        <!--end::Menu-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped align-middle gs-0 gy-5">
                            <!--begin::Table head-->
                            <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-100px">{{ __('messages.company.candidate_name') }}</th>
                                <th class="min-w-100px">{{ __('messages.company.candidate_phone') }}</th>
                                <th class="min-w-200px text-center">{{ __('messages.company.candidate_email') }}</th>
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                            @if(count($recentFollowers) > 0)
                                @foreach($recentFollowers as $recentFollower)
                                    <tr>
                                        <td class="ps-3">
                                            {{ html_entity_decode($recentFollower->user->full_name) }}
                                        </td>
                                        <td>
                                            {{ empty($recentFollower->user->phone) ? __('messages.common.n/a') : $recentFollower->user->phone }}
                                        </td>
                                        <td>
                                            {{ $recentFollower->user->email }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center">
                                        <span>{{ __('messages.employer_menu.no_data_available') }}.</span>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
            </div>
            <!--endW::Tables Widget 1-->
        </div>

    </div>
@endsection
@push('scripts')
    <script>
        let jobsApplicationUrl = "{{route('employer.dashboard.chart')}}";
        let jobdata = "{{route('employer.job.data')}}";
        let userId = "{{ getLoggedInUserId() }}";
    </script>

    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
    <script src="{{mix('assets/js/employer/dashboard.js')}}"></script>
@endpush
