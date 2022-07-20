@extends('candidate.layouts.app')
@section('title')
    {{ __('messages.candidate.dashboard') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/candidate-dashboard.css') }}">
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
{{--    <section class="section">--}}
{{--        @include('flash::message')--}}
{{--        <div class="section-body">--}}
{{--            <div class="tickets dashboard">--}}
{{--                <div class="ticket-content w-100">--}}
{{--                    <div class="row mx-1">--}}
{{--                        <div class="ticket-sender-picture  user-profile col-md-2 col-xl-2 col-sm-12 p-0">--}}
{{--                            <img class="profile-image"--}}
{{--                                     src="{{ getCompanyLogo() }}"--}}
{{--                                 alt="company logo">--}}
{{--                        </div>--}}
{{--                        <div class="ticket-detail col-md-6 col-xl-7 col-sm-12 ">--}}
{{--                            <div class="ticket-title">--}}
{{--                                <h2 class="text-primary">{{ html_entity_decode($user->full_name) }}</h2>--}}
{{--                            </div>--}}
{{--                            <div class="ticket-info">--}}
{{--                                <h6 class="location"><i--}}
{{--                                            class="fa fa-map-marker"></i>&nbsp;{{ !empty($candidate->city_name) ?  $candidate->city_name. ', '. $candidate->state_name . ', ' . $candidate->country_name : (!empty($candidate->country_id) ? $candidate->country_name : __('messages.candidate_dashboard.location_information')) }}--}}
{{--                                </h6>--}}
{{--                            </div>--}}
{{--                            <div class="font-weight-600 cell-phone">--}}
{{--                                <p class="mb-0 text-warning"><i--}}
{{--                                            class="fa fa-phone"></i>&nbsp;{{ !empty($user->phone) ?  $user->phone : __('messages.candidate_dashboard.no_not_available') }}--}}
{{--                                </p>--}}
{{--                                <p class="text-red"><i class="fa fa-envelope"></i>&nbsp;{{ $user->email }}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4 col-xl-3 col-sm-12 pr-md-0">--}}
{{--                            <a href="{{ route('candidate.profile') }}"--}}
{{--                               class="btn btn-outline-primary float-md-right">--}}
{{--                                {{ __('messages.user.edit_profile') }}--}}
{{--                            </a>--}}
{{--                            <br><br>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row mt-5">--}}
{{--                <div class="col-12 col-md-4 col-lg-4">--}}
{{--                    <div class="pricing">--}}
{{--                        <div class="pricing-padding">--}}
{{--                            <h3><i class="fa fa-eye"></i></h3>--}}
{{--                            <div class="pricing-price">--}}
{{--                                <div>{{ $user->profile_views }}</div>--}}
{{--                                <div>{{ __('messages.candidate_dashboard.profile_views') }}</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12 col-md-4 col-lg-4">--}}
{{--                    <div class="pricing pricing-highlight-candidate">--}}
{{--                        <div class="pricing-padding">--}}
{{--                            <h3><i class="fa fa-users"></i></h3>--}}
{{--                            <div class="pricing-price">--}}
{{--                                <div>{{$followings}}</div>--}}
{{--                                <div>{{ __('messages.candidate_dashboard.followings') }}</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12 col-md-4 col-lg-4">--}}
{{--                    <div class="pricing">--}}
{{--                        <div class="pricing-padding">--}}
{{--                            <h3><i class="fa fa-briefcase"></i></h3>--}}
{{--                            <div class="pricing-price">--}}
{{--                                <div>{{ $resumes }}</div>--}}
{{--                                <div>{{ __('messages.apply_job.resume') }}</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
@include('flash::message')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-10">
            <div class="card-body pt-9 pb-0">
                <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                    <div class="me-7 mb-4">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                            <img src="{{ getCompanyLogo()}}" alt="image">
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <div class="d-flex flex-column">
                                <div class="align-items-center mb-2">
                                    <a class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ html_entity_decode($user->full_name) }}</a>
                                </div>
                                <div class=" flex-wrap fw-bold fs-6 mb-4 pe-2">
                                    <a class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        <i class="fa fa-phone"></i>&nbsp;{{ !empty($user->phone) ?  $user->phone : __('messages.candidate_dashboard.no_not_available') }}
                                    </a>
                                    <a class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        <span class="svg-icon svg-icon-4 me-1">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black"></path>
																	<path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black"></path>
																</svg>
															</span>
                                        {{ !empty($candidate->city_name) ?  $candidate->city_name. ', '. $candidate->state_name . ', ' . $candidate->country_name : (!empty($candidate->country_id) ? $candidate->country_name : __('messages.candidate_dashboard.location_information')) }}
                                    </a>
                                    <a class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                        <span class="svg-icon svg-icon-4 me-1">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
																	<path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
																</svg>
															</span>
                                        {{ $user->email}}</a>
                                </div>
                            </div>
                            <div class="d-flex my-4">
                                <a href="{{ route('candidate.profile') }}" class="btn btn-sm btn-primary me-2">
                                    {{ __('messages.user.edit_profile') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5 g-xl-8">
            <div class="col-xl-4">
                <a class="card bg-success hoverable card-xl-stretch mb-xl-8 cursor-default">
                    <div class="card-body">
                        <i class="fa fa-eye text-white fa-4x"></i>
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $user->profile_views }}</div>
                        <div class="fw-bold text-white">{{ __('messages.candidate_dashboard.profile_views') }}</div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4">
                <a class="card bg-dark hoverable card-xl-stretch mb-xl-8 cursor-default">
                    <div class="card-body">
                        <i class="fas fa-users text-white fa-4x"></i>
                        <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5"> {{$followings}}</div>
                        <div class="fw-bold text-gray-100">{{ __('messages.candidate_dashboard.followings') }}</div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4">
                <a class="card bg-warning hoverable card-xl-stretch mb-xl-8 cursor-default">
                    <div class="card-body">
                        <i class="fa fa-briefcase text-white fa-4x"></i>
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $resumes }}</div>
                        <div class="fw-bold text-white">{{ __('messages.apply_job.resume') }}</div>
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
    </div>
</div>
@endsection
