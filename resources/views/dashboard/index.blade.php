@extends('layouts.app')
@section('title')
    {{ __('messages.dashboard') }}
@endsection
@push('css')
    <link href="{{ mix('assets/css/dashboard-widgets.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="row">
                <div class="col-xl-3">
                    <a href="javascript:void(0)"
                       class="card bg-success hoverable card-xl-stretch mb-5 mt-xl-0 mt-5 mb-xl-8 cursor-default">
                        <div class="card-body">
                            <i class="fas fa-users text-white fa-4x"></i>
                            <div
                                class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $data['dashboardData']['totalCandidates'] }}</div>
                            <div
                                class="fw-bold text-white">{{ __('messages.admin_dashboard.total_candidates') }}</div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3">
                    <a href="javascript:void(0)"
                       class="card cursor-default bg-dark hoverable card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body">
                            <i class="fas fa-user-shield text-white fa-4x"></i>
                            <div
                                class="text-gray-100 fw-bolder fs-2 mb-2 mt-5"> {{ $data['dashboardData']['totalEmployers'] }}</div>
                            <div
                                class="fw-bold text-gray-100">{{ __('messages.admin_dashboard.total_employers') }}</div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3">
                    <a href="javascript:void(0)"
                       class="card cursor-default bg-warning hoverable card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body">
                            <i class="fas fa-list-alt text-white fa-4x"></i>
                            <div
                                class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $data['dashboardData']['totalActiveJobs'] }}</div>
                            <div class="fw-bold text-white">{{ __('messages.admin_dashboard.total_active_jobs') }}</div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3">
                    <a href="javascript:void(0)"
                       class="card cursor-default bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body">
                            <i class="fab fa-foursquare text-white fa-4x"></i>
                            <div
                                    class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ $data['dashboardData']['featuredJobs'] }}</div>
                            <div class="fw-bold text-white">{{ __('messages.admin_dashboard.featured_jobs') }}</div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3">
                    <a href="javascript:void(0)"
                       class="card cursor-default bg-secondary hoverable card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body">
                            <i class="fas fa-user-tag text-dark fa-4x"></i>
                            <div
                                    class="text-dark fw-bolder fs-2 mb-2 mt-5">  {{ $data['dashboardData']['featuredEmployers'] }}</div>
                            <div
                                class="fw-bold text-dark">{{ __('messages.admin_dashboard.featured_employers') }}</div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3">
                    <a href="javascript:void(0)"
                       class="card cursor-default bg-danger hoverable card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body">
                            <i class="fas fa-money-check text-white fa-4x"></i>
                            <div
                                    class="text-white fw-bolder fs-2 mb-2 mt-5">  {{ number_format($data['dashboardData']['featuredJobsIncomes']) }}</div>
                            <div
                                class="fw-bold text-white">{{ __('messages.admin_dashboard.featured_jobs_incomes') }}</div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3">
                    <a href="javascript:void(0)"
                       class="card bg-body hoverable cursor-default rd-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body">
                            <i class="fas fa-money-check-alt text-dark fa-4x"></i>
                            <div
                                    class="text-dark fw-bolder fs-2 mb-2 mt-5">  {{ number_format($data['dashboardData']['featuredCompanysIncomes']) }}</div>
                            <div
                                class="fw-bold text-dark">{{ __('messages.admin_dashboard.featured_employers_incomes') }}</div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3">
                    <a href="javascript:void(0)"
                       class="card bg-primary hovera cursor-default card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body">
                            <i class="fas fa-money-bill text-white fa-4x"></i>
                            <div
                                class="text-white fw-bolder fs-2 mb-2 mt-5"> {{ number_format($data['dashboardData']['subscriptionIncomes']) }}</div>
                            <div
                                class="fw-bold text-white">{{ __('messages.admin_dashboard.subscription_incomes') }}</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="card">
                {{--                <div class="card-header border-0 pt-5 justify-content-end">--}}
                {{--                    <div class="card-toolbar" data-kt-buttons="true">--}}
                {{--                        --}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="row g-5 g-xl-8">
                    <div class="col-xl-6">
                        <!--begin::Charts Widget 3-->
                        <div class="card card-xl-stretch mb-5">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span
                                        class="card-label fw-bolder fs-3 mb-1 border-bottom border-2 border-primary">{{ __('messages.admin_dashboard.post_statistics') }}</span>
                                </h3>
                            </div>
                            <div class="card-body" id="postStatisticsChartContainer">
                                <canvas id="postStatisticsChart" width="515" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card card-xl-stretch mb-5">
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span
                                        class="card-label border-bottom border-2 border-primary fw-bolder fs-3 mb-1">{{ __('messages.admin_dashboard.weekly_users') }}</span>
                                </h3>
                                <div id="timeRange" class="time_range time_range_width w-30 h-40px">
                                    <i class="far fa-calendar-alt"
                                       aria-hidden="true"></i>&nbsp;&nbsp<span></span> <b
                                        class="caret"></b>
                                </div>
                            </div>
                            <div class="card-body" id="weeklyUserBarChartContainer">
                                <canvas id="weeklyUserBarChart" width="515" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xl-6">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span
                                    class="card-label fw-bolder fs-3 mb-1">{{ __('messages.admin_dashboard.recent_candidates') }}</span>
                            </h3>
                            <div class="card-toolbar">
                                <span class="svg-icon svg-icon-2">
															 <a href="{{ route('candidates.index') }}"
                                                                class="btn btn-info">{{ __('messages.common.view_more') }} <i
                                                                     class="fas fa-chevron-right"></i></a>
														</span>
                            </div>
                        </div>
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table table-striped align-middle gs-0 gy-5">
                                    <thead>
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-100px">{{ __('messages.common.name') }}</th>
                                        <th class="min-w-100px">{{ __('messages.common.created_date') }}</th>
                                        <th class="min-w-30px text-center">{{ __('messages.candidate.immediate_available') }}</th>
                                        <th class="min-w-30px text-center">{{ __('messages.candidate.is_verified') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-bold">
                                    @forelse($data['registerCandidatesData'] as $registeredCandidates)
                                        <tr>
                                            <td class="ps-3">
                                                <a href="{{ route('candidates.show', $registeredCandidates->id) }}">{{ Str::limit($registeredCandidates->user->full_name,20,'...') }}</a>
                                            </td>
                                            <td>{{ $registeredCandidates->created_at->diffForhumans() }}</td>
                                            <td class="text-center">
                                                <i class="{{ ($registeredCandidates->immediate_available) ? 'fas fa-check-circle text-success' : 'fas fa-times-circle text-danger' }}"></i>
                                            </td>
                                            <td class="text-center">
                                                <i class="{{ ($registeredCandidates->user->is_verified) && ($registeredCandidates->user->email_verified_at) ? 'fas fa-check-circle text-success' : 'fas fa-times-circle text-danger' }}"></i>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6"
                                                class="text-center">{{ __('messages.employer_menu.no_data_available') }}
                                                .
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span
                                    class="card-label fw-bolder fs-3 mb-1">{{ __('messages.admin_dashboard.recent_employers') }}</span>
                            </h3>
                            <div class="card-toolbar">
                                <span class="svg-icon svg-icon-2">
															 <a href="{{ route('company.index') }}"
                                                                class="btn btn-info">{{ __('messages.common.view_more') }} <i
                                                                     class="fas fa-chevron-right"></i></a>
														</span>
                            </div>
                        </div>
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table table-striped align-middle gs-0 gy-5">
                                    <thead>
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-100px">{{ __('messages.common.name') }}</th>
                                        <th class="min-w-100px">{{ __('messages.common.created_date') }}</th>
                                        <th class="min-w-50px text-center">{{ __('messages.company.website') }}</th>
                                        <th class="min-w-50px text-center">{{ __('messages.company.location') }}</th>
                                        <th class="min-w-30px text-center">{{ __('messages.company.is_featured') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-bold">
                                    @forelse($data['registerEmployersData'] as $registeredEmployers)
                                        <tr>
                                            <td class="ps-3">
                                                <a href="{{ route('company.show', $registeredEmployers->id) }}">{{ Str::limit($registeredEmployers->user->full_name,10,'...') }}</a>
                                            </td>
                                            <td>{{ $registeredEmployers->created_at->diffForhumans() }}</td>
                                            <td>
                                                @if($registeredEmployers->website !== null)
                                                    <a href="{{
                                                                                        (!str_contains($registeredEmployers->website,'https://')
                                                                                        ? 'https://'.$registeredEmployers->website
                                                                                        : $registeredEmployers->website) }}"
                                                       target="_blank">{{ Str::limit($registeredEmployers->website,10,'...') }}</a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                {{ $registeredEmployers->location != '' ? Str::limit($registeredEmployers->location,10,'...') : 'N/A' }}
                                            </td>
                                            <td class="text-center">
                                                <i class="{{ ($registeredEmployers->activeFeatured) ? 'fas fa-check-circle text-success' : 'fas fa-times-circle text-danger' }}"></i>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6"
                                                class="text-center">{{ __('messages.employer_menu.no_data_available') }}
                                                .
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@role('Admin')
                <div class="col-xl-12">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span
                                    class="card-label fw-bolder fs-3 mb-1">{{ __('messages.admin_dashboard.recent_jobs') }}</span>
                            </h3>
                            <div class="card-toolbar">
                                <span class="svg-icon svg-icon-2">
															 <a href="{{ route('admin.jobs.index') }}"
                                                                class="btn btn-info">{{ __('messages.common.view_more') }} <i
                                                                     class="fas fa-chevron-right"></i></a>
														</span>
                            </div>
                        </div>
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table table-striped align-middle gs-0 gy-5">
                                    <thead>
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-100px">{{ __('messages.job.job_title') }}</th>
                                        <th class="min-w-100px">{{ __('messages.company.employer_name') }}</th>
                                        <th class="min-w-30px">{{ __('messages.common.created_date') }}</th>
                                        <th class="min-w-30px">{{ __('messages.job_category.job_category') }}</th>
                                        <th class="min-w-30px">{{ __('messages.job.job_type') }}</th>
                                        <th class="min-w-30px">{{ __('messages.job.job_shift') }}</th>
                                        <th class="min-w-30px text-center">{{ __('messages.job.is_featured') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-bold">
                                    @forelse($data['recentJobsData'] as $recentJobs)
                                        <tr>
                                            <td class="ps-3">
                                                <a href="{{ route('admin.jobs.show', $recentJobs->id) }}">{{ $recentJobs->job_title }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('company.show', $recentJobs->company_id) }}">{{ $recentJobs->company->user->full_name }}</a>
                                            </td>
                                            <td>{{ $recentJobs->created_at->diffForhumans() }}</td>
                                            <td>{{ $recentJobs->jobCategory->name }}</td>
                                            <td>{{ Str::limit($recentJobs->jobType->name,50,'...') }}</td>
                                            <td>{{ (!empty($recentJobs->jobShift)) ? $recentJobs->jobShift->shift : 'N/A' }}</td>
                                            <td class="text-center">
                                                <i class="{{ ($recentJobs->activeFeatured) ? 'fas fa-check-circle text-success' : 'fas fa-times-circle text-danger' }}"></i>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6"
                                                class="text-center">{{ __('messages.employer_menu.no_data_available') }}
                                                .
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endrole
            </div>
        </div>
    </div>

    {{--    <section class="section">--}}

    {{--        card old--}}
    <!-- statistics count starts -->
    {{--        <div class="row">--}}
    {{--            <div class="col-lg-3 col-md-6 col-sm-12 col-12">--}}
    {{--                <div class="card card-statistic-1">--}}
    {{--                    <div class="card-icon total-users-bg">--}}
    {{--                        <i class="fas fa-users"></i>--}}
    {{--                    </div>--}}
    {{--                    <div class="card-wrap">--}}
    {{--                        <div class="card-header">--}}
    {{--                            <h4>{{ __('messages.admin_dashboard.total_candidates') }}</h4>--}}
    {{--                        </div>--}}
    {{--                        <div class="card-body mt-0">--}}
    {{--                            {{ $data['dashboardData']['totalCandidates'] }}--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-lg-3 col-md-6 col-sm-12 col-12">--}}
    {{--                <div class="card card-statistic-1">--}}
    {{--                    <div class="card-icon verified-users-bg">--}}
    {{--                        <i class="fas fa-user-shield"></i>--}}
    {{--                    </div>--}}
    {{--                    <div class="card-wrap">--}}
    {{--                        <div class="card-header">--}}
    {{--                            <h4>{{ __('messages.admin_dashboard.total_employers') }}</h4>--}}
    {{--                        </div>--}}
    {{--                        <div class="card-body mt-0">--}}
    {{--                            {{ $data['dashboardData']['totalEmployers'] }}--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-lg-3 col-md-6 col-sm-12 col-12">--}}
    {{--                <div class="card card-statistic-1">--}}
    {{--                    <div class="card-icon today-jobs-bg">--}}
    {{--                        <i class="fas fa-list-alt"></i>--}}
    {{--                    </div>--}}
    {{--                    <div class="card-wrap">--}}
    {{--                        <div class="card-header">--}}
    {{--                            <h4>{{ __('messages.admin_dashboard.total_active_jobs') }}</h4>--}}
    {{--                        </div>--}}
    {{--                        <div class="card-body mt-0">--}}
    {{--                            {{ $data['dashboardData']['totalActiveJobs'] }}--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-lg-3 col-md-6 col-sm-12 col-12">--}}
    {{--                <div class="card card-statistic-1">--}}
    {{--                    <div class="card-icon feature-jobs-bg">--}}
    {{--                        <i class="fab fa-foursquare"></i>--}}
    {{--                    </div>--}}
    {{--                    <div class="card-wrap">--}}
    {{--                        <div class="card-header">--}}
    {{--                            <h4>{{ __('messages.admin_dashboard.featured_jobs') }}</h4>--}}
    {{--                        </div>--}}
    {{--                        <div class="card-body mt-0">--}}
    {{--                            {{ $data['dashboardData']['featuredJobs'] }}--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-lg-3 col-md-6 col-sm-12 col-12">--}}
    {{--                <div class="card card-statistic-1">--}}
    {{--                    <div class="card-icon feature-employers-bg">--}}
    {{--                        <i class="fas fa-user-tag"></i>--}}
    {{--                    </div>--}}
    {{--                    <div class="card-wrap">--}}
    {{--                        <div class="card-header">--}}
    {{--                            <h4>{{ __('messages.admin_dashboard.featured_employers') }}</h4>--}}
    {{--                        </div>--}}
    {{--                        <div class="card-body mt-0">--}}
    {{--                            {{ $data['dashboardData']['featuredEmployers'] }}--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-lg-3 col-md-6 col-sm-12 col-12">--}}
    {{--                <div class="card card-statistic-1">--}}
    {{--                    <div class="card-icon feature-jobs-incomes-bg">--}}
    {{--                        <i class="fas fa-money-check"></i>--}}
    {{--                    </div>--}}
    {{--                    <div class="card-wrap">--}}
    {{--                        <div class="card-header">--}}
    {{--                            <h4>{{ __('messages.admin_dashboard.featured_jobs_incomes') }}</h4>--}}
    {{--                        </div>--}}
    {{--                        <div class="card-body mt-0">--}}
    {{--                            {{ number_format($data['dashboardData']['featuredJobsIncomes']) }}--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-lg-3 col-md-6 col-sm-12 col-12">--}}
    {{--                <div class="card card-statistic-1">--}}
    {{--                    <div class="card-icon feature-employers-incomes-bg">--}}
    {{--                        <i class="fas fa-money-check-alt"></i>--}}
    {{--                    </div>--}}
    {{--                    <div class="card-wrap">--}}
    {{--                        <div class="card-header">--}}
    {{--                            <h4>{{ __('messages.admin_dashboard.featured_employers_incomes') }}</h4>--}}
    {{--                        </div>--}}
    {{--                        <div class="card-body mt-0">--}}
    {{--                            {{ number_format($data['dashboardData']['featuredCompanysIncomes']) }}--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-lg-3 col-md-6 col-sm-12 col-12">--}}
    {{--                <div class="card card-statistic-1">--}}
    {{--                    <div class="card-icon subscription-incomes-bg">--}}
    {{--                        <i class="fas fa-money-bill"></i>--}}
    {{--                    </div>--}}
    {{--                    <div class="card-wrap">--}}
    {{--                        <div class="card-header">--}}
    {{--                            <h4>{{ __('messages.admin_dashboard.subscription_incomes') }}</h4>--}}
    {{--                        </div>--}}
    {{--                        <div class="card-body mt-0">--}}
    {{--                            {{ number_format($data['dashboardData']['subscriptionIncomes']) }}--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    <!-- statistics count ends -->
    {{--       old cards --}}


    {{--        <div class="row">--}}
    {{--            <div class="col-12">--}}
    {{--                <div class="card">--}}
    {{--                    <div class="card-header justify-content-end pb-0">--}}
    {{--                        <div id="timeRange" class="time_range time_range_width w-30">--}}
    {{--                            <i class="far fa-calendar-alt"--}}
    {{--                               aria-hidden="true"></i>&nbsp;&nbsp;<span></span> <b--}}
    {{--                                class="caret"></b>--}}
    {{--                        </div>--}}
    {{--                </div>--}}
    {{--                <div class="card-body mt-0">--}}
    {{--                    <div class="row">--}}
    <!-- Posts Statistics chart starts -->
    {{--                        <div class="col-lg-8 col-md-6 col-sm-12">--}}
    {{--                            <div class="card border">--}}
    {{--                                <div class="card-header justify-content-between">--}}
    {{--                                    <h4>{{ __('messages.admin_dashboard.post_statistics') }}</h4>--}}
    {{--                                </div>--}}
    {{--                                <div class="card-body p-0 mt-0" id="postStatisticsChartContainer">--}}
    {{--                                    <canvas id="postStatisticsChart" width="1025" height="400"></canvas>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    <!-- Posts Statistics chart ends -->
        <!-- Weekly users bar chart starts -->
    {{--                        <div class="col-lg-4 col-md-6 col-sm-12">--}}
    {{--                            <div class="card border">--}}
    {{--                                <div class="card-header justify-content-between">--}}
    {{--                                    <h4>{{ __('messages.admin_dashboard.weekly_users') }}</h4>--}}
    {{--                                </div>--}}
    {{--                                <div class="card-body p-0 mt-0" id="weeklyUserBarChartContainer">--}}
    {{--                                    <canvas id="weeklyUserBarChart" width="515" height="400"></canvas>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    <!-- Weekly users bar chart ends -->
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="row">--}}
    {{--            <!-- recent registered candidates starts -->--}}
    {{--            <div class="col-lg-6 col-md-6 col-sm-12">--}}
    {{--                <div class="card">--}}
    {{--                    <div class="card-header">--}}
    {{--                        <h4>{{ __('messages.admin_dashboard.recent_candidates') }}</h4>--}}
    {{--                        <div class="card-header-action">--}}
    {{--                            <a href="{{ route('candidates.index') }}"--}}
    {{--                               class="btn btn-info">{{ __('messages.common.view_more') }} <i--}}
    {{--                                        class="fas fa-chevron-right"></i></a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="card-body p-0 mt-0">--}}
    {{--                        <div class="table-responsive table-invoice table-bordered">--}}
    {{--                            <table class="table table-row-dashed align-middle fs-6 gy-5 no-footer w-100 dataTable table-responsive-sm"--}}
    {{--                                   id="candidateTbl">--}}
    {{--                                <thead>--}}
    {{--                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
    {{--                                    <th class="ms-5">{{ __('messages.common.name') }}</th>--}}
    {{--                                    <th>{{ __('messages.common.created_date') }}</th>--}}
    {{--                                    <th class="text-center">{{ __('messages.candidate.immediate_available') }}</th>--}}
    {{--                                    <th class="text-center">{{ __('messages.candidate.is_verified') }}</th>--}}
    {{--                                </tr>--}}
    {{--                                </thead>--}}
    {{--                                <tbody class="text-gray-600 fw-bold">--}}
    {{--                                </tbody>--}}
    {{--                                --}}{{--                                @forelse($data['registerCandidatesData'] as $registeredCandidates)--}}
    {{--                                --}}{{--                                    <tr>--}}
    {{--                                --}}{{--                                        <td>--}}
    {{--                                --}}{{--                                            <a href="{{ route('candidates.show', $registeredCandidates->id) }}">{{ $registeredCandidates->user->full_name }}</a>--}}
    {{--                                --}}{{--                                        </td>--}}
    {{--                                --}}{{--                                        <td>{{ $registeredCandidates->created_at->diffForhumans() }}</td>--}}
    {{--                                --}}{{--                                        <td class="text-center">--}}
    {{--                                --}}{{--                                            <i class="{{ ($registeredCandidates->immediate_available) ? 'fas fa-check-circle text-success' : 'fas fa-times-circle text-danger' }}"></i>--}}
    {{--                                --}}{{--                                        </td>--}}
    {{--                                --}}{{--                                        <td class="text-center">--}}
    {{--                                --}}{{--                                            <i class="{{ ($registeredCandidates->user->is_verified) && ($registeredCandidates->user->email_verified_at) ? 'fas fa-check-circle text-success' : 'fas fa-times-circle text-danger' }}"></i>--}}
    {{--                                --}}{{--                                        </td>--}}
    {{--                                --}}{{--                                    </tr>--}}
    {{--                                --}}{{--                                @empty--}}
    {{--                                --}}{{--                                    <tr>--}}
    {{--                                --}}{{--                                        <td colspan="6"--}}
    {{--                                --}}{{--                                            class="text-center">{{ __('messages.employer_menu.no_data_available') }}.--}}
    {{--                                --}}{{--                                        </td>--}}
    {{--                                --}}{{--                                    </tr>--}}
    {{--                                --}}{{--                                @endforelse--}}
    {{--                                --}}{{--                                </thead>--}}
    {{--                            </table>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <!-- recent registered candidates ends -->--}}

    {{--            <!-- recent registered employers starts -->--}}
    {{--            <div class="col-lg-6 col-md-6 col-sm-12">--}}
    {{--                <div class="card">--}}
    {{--                    <div class="card-header">--}}
    {{--                        <h4>{{ __('messages.admin_dashboard.recent_employers') }}</h4>--}}
    {{--                        <div class="card-header-action">--}}
    {{--                            <a href="{{ route('company.index') }}"--}}
    {{--                               class="btn btn-info">{{ __('messages.common.view_more') }} <i--}}
    {{--                                        class="fas fa-chevron-right"></i></a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="card-body p-0 mt-0">--}}
    {{--                        <div class="table-responsive table-invoice table-bordered">--}}
    {{--                            <table class="table table-row-dashed align-middle fs-6 gy-5 no-footer w-100 dataTable table-responsive-sm"--}}
    {{--                                   id="companiesTbl">--}}
    {{--                                <thead>--}}
    {{--                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
    {{--                                    <th>{{ __('messages.common.name') }}</th>--}}
    {{--                                    <th>{{ __('messages.common.created_date') }}</th>--}}
    {{--                                    <th>{{ __('messages.company.website') }}</th>--}}
    {{--                                    <th>{{ __('messages.company.location') }}</th>--}}
    {{--                                    <th class="text-center">{{ __('messages.company.is_featured') }}</th>--}}
    {{--                                </tr>--}}
    {{--                                </thead>--}}
    {{--                                <tbody class="text-gray-600 fw-bold">--}}
    {{--                                </tbody>--}}
    {{--                                --}}{{--                                @forelse($data['registerEmployersData'] as $registeredEmployers)--}}
    {{--                                --}}{{--                                    <tr>--}}
    {{--                                --}}{{--                                        <td>--}}
    {{--                                --}}{{--                                            <a href="{{ route('company.show', $registeredEmployers->id) }}">{{ $registeredEmployers->user->full_name }}</a>--}}
    {{--                                --}}{{--                                        </td>--}}
    {{--                                --}}{{--                                        <td>{{ $registeredEmployers->created_at->diffForhumans() }}</td>--}}
    {{--                                --}}{{--                                        <td>--}}
    {{--                                --}}{{--                                            @if($registeredEmployers->website !== null)--}}
    {{--                                --}}{{--                                                <a href="--}}{{--}}--}}
    {{--                                --}}{{--                                                    (!str_contains($registeredEmployers->website,'https://')--}}
    {{--                                --}}{{--                                                    ? 'https://'.$registeredEmployers->website--}}
    {{--                                --}}{{--                                                    : $registeredEmployers->website) }}"--}}
    {{--                                --}}{{--                                                   target="_blank">{{ Str::limit($registeredEmployers->website,25,'...') }}</a>--}}
    {{--                                --}}{{--                                            @else--}}
    {{--                                --}}{{--                                                N/A--}}
    {{--                                --}}{{--                                            @endif--}}
    {{--                                --}}{{--                                        </td>--}}
    {{--                                --}}{{--                                        <td>--}}
    {{--                                --}}{{--                                            {{ $registeredEmployers->location != '' ? $registeredEmployers->location : 'N/A' }}--}}
    {{--                                --}}{{--                                        </td>--}}
    {{--                                --}}{{--                                        <td class="text-center">--}}
    {{--                                --}}{{--                                            <i class="{{ ($registeredEmployers->activeFeatured) ? 'fas fa-check-circle text-success' : 'fas fa-times-circle text-danger' }}"></i>--}}
    {{--                                --}}{{--                                        </td>--}}
    {{--                                --}}{{--                                    </tr>--}}
    {{--                                --}}{{--                                @empty--}}
    {{--                                --}}{{--                                    <tr>--}}
    {{--                                --}}{{--                                        <td colspan="6"--}}
    {{--                                --}}{{--                                            class="text-center">{{ __('messages.employer_menu.no_data_available') }}.--}}
    {{--                                --}}{{--                                        </td>--}}
    {{--                                --}}{{--                                    </tr>--}}
    {{--                                --}}{{--                                @endforelse--}}
    {{--                                --}}{{--                                </tbody>--}}
    {{--                            </table>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <!-- recent registered employers ends -->--}}
    {{--        </div>--}}

    {{--        <div class="row">--}}
    {{--            <!-- recent jobs starts -->--}}
    {{--            <div class="col-lg-12 col-md-12 col-sm-12">--}}
    {{--                <div class="card">--}}
    {{--                    <div class="card-header">--}}
    {{--                        <h4>{{ __('messages.admin_dashboard.recent_jobs') }}</h4>--}}
    {{--                        <div class="card-header-action">--}}
    {{--                            <a href="{{ route('admin.jobs.index') }}"--}}
    {{--                               class="btn btn-info">{{ __('messages.common.view_more') }} <i--}}
    {{--                                        class="fas fa-chevron-right"></i></a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="card-body p-0 mt-0">--}}
    {{--                        <div class="table-responsive table-invoice table-bordered">--}}
    {{--                            <table class="table table-row-dashed align-middle fs-6 gy-5 no-footer w-100 dataTable table-responsive-sm"--}}
    {{--                                   id="jobTbl">--}}
    {{--                                <thead>--}}
    {{--                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
    {{--                                    <th>{{ __('messages.job.job_title') }}</th>--}}
    {{--                                    <th>{{ __('messages.company.employer_name') }}</th>--}}
    {{--                                    <th>{{ __('messages.common.created_date') }}</th>--}}
    {{--                                    <th>{{ __('messages.job_category.job_category') }}</th>--}}
    {{--                                    <th>{{ __('messages.job.job_type') }}</th>--}}
    {{--                                    <th>{{ __('messages.job.job_shift') }}</th>--}}
    {{--                                    <th class="text-center">{{ __('messages.job.is_featured') }}</th>--}}
    {{--                                </tr>--}}
    {{--                                </thead>--}}
    {{--                                <tbody class="text-gray-600 fw-bold">--}}
    {{--                                </tbody>--}}
    {{--                                --}}{{--                                @forelse($data['recentJobsData'] as $recentJobs)--}}
    {{--                                --}}{{--                                    <tr>--}}
    {{--                                --}}{{--                                        <td>--}}
    {{--                                --}}{{--                                            <a href="{{ route('admin.jobs.show', $recentJobs->id) }}">{{ $recentJobs->job_title }}</a>--}}
    {{--                                --}}{{--                                        </td>--}}
    {{--                                --}}{{--                                        <td>--}}
    {{--                                --}}{{--                                            <a href="{{ route('company.show', $recentJobs->company_id) }}">{{ $recentJobs->company->user->full_name }}</a>--}}
    {{--                                --}}{{--                                        </td>--}}
    {{--                                --}}{{--                                        <td>{{ $recentJobs->created_at->diffForhumans() }}</td>--}}
    {{--                                --}}{{--                                        <td>{{ $recentJobs->jobCategory->name }}</td>--}}
    {{--                                --}}{{--                                        <td>{{ Str::limit($recentJobs->jobType->name,50,'...') }}</td>--}}
    {{--                                --}}{{--                                        <td>{{ (!empty($recentJobs->jobShift)) ? $recentJobs->jobShift->shift : 'N/A' }}</td>--}}
    {{--                                --}}{{--                                        <td class="text-center">--}}
    {{--                                --}}{{--                                            <i class="{{ ($recentJobs->activeFeatured) ? 'fas fa-check-circle text-success' : 'fas fa-times-circle text-danger' }}"></i>--}}
    {{--                                --}}{{--                                        </td>--}}
    {{--                                --}}{{--                                    </tr>--}}
    {{--                                --}}{{--                                @empty--}}
    {{--                                --}}{{--                                    <tr>--}}
    {{--                                --}}{{--                                        <td colspan="6"--}}
    {{--                                --}}{{--                                            class="text-center">{{ __('messages.employer_menu.no_data_available') }}.--}}
    {{--                                --}}{{--                                        </td>--}}
    {{--                                --}}{{--                                    </tr>--}}
    {{--                                --}}{{--                                @endforelse--}}
    {{--                                --}}{{--                                </tbody>--}}
    {{--                            </table>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <!-- recent jobs ends -->--}}
    {{--        </div>--}}
    {{--    </section>--}}
@endsection
@push('scripts')
    <script>
        let jobsUrl = "{{ route('admin.jobs.index') }}";
        let companiesUrl = "{{ route('company.index') }}";
        let candidateUrl = "{{ route('candidates.index') }}";
        let adminDashboardChartData = "{{ route('dashboard.chart.data') }}";
    </script>
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/admin-dashboard.js') }}"></script>
@endpush
