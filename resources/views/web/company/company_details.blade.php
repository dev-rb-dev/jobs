@extends('web.layouts.app')
@section('title')
    {{ html_entity_decode($companyDetail->user->full_name) }}
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/header-span.css') }}">
@endsection
@section('content')
    <section class="job-detail-section">
        <div class="upper-box">
            <div class="auto-container">
                <div class="job-block-three">
                    <div class="inner-box">
                        <div class="content">
                            <span class="company-logo"><img src="{{ (!empty($companyDetail->company_url)) ? $companyDetail->company_url : asset('assets/img/infyom-logo.png') }}" alt="" class="job_detail_logo"></span>
                            <h4><a href="#">{{ html_entity_decode($companyDetail->user->full_name) }} </a></h4>
                            <ul class="job-info overflow-ellipsis">
                                <li>
                                    <span class="icon flaticon-briefcase"></span>{{!empty($companyDetail->industry->name)? $companyDetail->industry->name : __('messages.common.n/a')}}
                                </li>
                                @if(!empty($companyDetail->user->city_id) || (!empty($companyDetail->user->state_id)) || (!empty($companyDetail->user->country_id)))
                                    <li>
                                        <span class="icon flaticon-map-locator"></span> {{ (!empty($companyDetail->user->city_id)) ? $companyDetail->user->city_name.', ' : '' }}
                                        {{ (!empty($companyDetail->user->state_id)) ? $companyDetail->user->state_name.', ' : '' }}
                                        {{ (!empty($companyDetail->user->country_id)) ? $companyDetail->user->country_name : '' }}
                                    </li>
                                @endif
                                @isset($companyDetail->user->phone)
                                    <li><span class="icon flaticon-telephone-1"></span>{{$companyDetail->user->phone}}
                                    </li>
                                @endisset
                                <li><span class="icon flaticon-mail"></span>{{$companyDetail->user->email}}</li>
                            </ul>
                            <ul class="job-other-info">
                                <li class="time">Open Jobs – {{$jobDetails->count()}}</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="btn-box flex-sm-row flex-column">
                                @auth
                                    @role('Candidate')
                                    <a href="javascript:void(0)" class="theme-btn btn-style-one mb-sm-0 mb-3 mr-sm-3" data-favorite-user-id="{{ (getLoggedInUserId() !== null) ? getLoggedInUserId() : null }}" data-favorite-company_id="{{ $companyDetail->id }}" id="addToFavourite">
                                        <div class="company-follow-text">
                                            <i class="fa fa-star text-white"></i>
                                            <span class="favouriteText text-white"></span>
                                        </div>
                                    </a>
                                    <a href="#reportToCompanyModal" class="theme-btn btn-style-eight reportToCompanyBtn {{ ($isReportedToCompany) ? 'disabled' : '' }}" rel="modal:open" {{ ($isReportedToCompany) ? 'style=pointer-events:none;' : '' }}>{{ __('messages.company.report_to_company') }}
                                    </a>
                                    @endrole
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="job-detail-outer">
            <div class="auto-container">
                <div class="row">
                    <div class="content-column col-lg-8 col-md-12 col-sm-12">
                        <div class="job-detail">
                            <h4>About Company</h4>
                            {!! nl2br($companyDetail->details) !!}
                        </div>
                        <div class="related-jobs mt-3">
                            <div class="title-box">
                                <h3> {{ ($jobDetails->count() > 0 ) ? __('web.company_details.our_latest_jobs')  : __('web.home_menu.latest_job_not_available')}}</h3>
                            </div>
                            @foreach($jobDetails as $job)
                                <div class="job-block-three col-lg-12 col-md-12 col-sm-12 p-0">
                                    <div class="inner-box">
                                        <div class="content">
                                            <span class="company-logo"><img src="{{ $job->company->company_url }}" alt=""></span>
                                            <div class="d-flex">
                                                <h4>
                                                    @if(Str::length($job->job_title) < 35)
                                                        <a href="{{ route('front.job.details',$job->job_id) }}">
                                                            {{ html_entity_decode($job->job_title) }}</a>
                                                    @else
                                                        <a href="{{ route('front.job.details',$job->job_id) }}" data-toggle="tooltip" data-placement="bottom" class="hover-color" title="{{ html_entity_decode($job->job_title) }}">
                                                            {{ Str::limit(html_entity_decode($job->job_title),30,'...') }}</a>
                                                    @endif
                                                </h4>
                                            </div>
                                            <ul class="job-info">
                                                <li>
                                                    <span class="icon flaticon-briefcase"></span>{{$job->jobCategory->name}}
                                                </li>
                                                @if(!empty($job->country_name))
                                                    <li><span class="icon flaticon-map-locator"></span>
                                                        @if(Str::length($job->full_location) < 45)
                                                            {{ $job->full_location }}
                                                        @else
                                                            <span data-toggle="tooltip" data-placement="bottom" title="{{$job->full_location}}">
                                                        {{ Str::limit($job->full_location,45,'...') }}</span>
                                                        @endif
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <ul class="job-other-info">
                                            @foreach($job->jobsSkill->take(1) as $skills)
                                                <li class="time">{{$skills->name}}</li>
                                                @if(count($job->jobsSkill) -1 > 0)
                                                    <li class="green">{{'+'.(count($job->jobsSkill) - 1)}}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        @if($job->activeFeatured)
                                            <button class="bookmark-btn"><i class="fas fa-bookmark featured"></i>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            @if(($jobDetails->count() > 0 ))
                                <div class="row mt30">
                                    <div class="col-md-12 text-center">
                                        <a href="{{ route('front.search.jobs',array('company'=> $companyDetail->id)) }}" class="theme-btn btn-style-one">{{ __('web.common.show_all') }}</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                        <aside class="sidebar">
                            <div class="sidebar-widget company-widget">
                                <div class="widget-content">
                                    <ul class="company-info mt-0">
                                        <li>{{ __('web.web_company.ownership') }}:
                                            <span>{{!empty($companyDetail->ownerShipType->name)? $companyDetail->ownerShipType->name : __('messages.common.n/a')}}</span>
                                        </li>
                                        <li>{{ __('web.web_company.company_size') }}:
                                            <span>
                                                {{!empty($companyDetail->companySize->size)? $companyDetail->companySize->size : __('messages.common.n/a')}}</span>
                                        </li>
                                        <li>{{ __('web.web_jobs.founded_in') }}:
                                            <span>{{!empty($companyDetail->established_in)? $companyDetail->established_in : __('messages.common.n/a')}}</span>
                                        </li>
                                        @if(!$companyDetail->user->phone)
                                            <li>{{ __('web.web_jobs.phone') }}:
                                                <span>{{$companyDetail->user->phone}}</span></li>
                                        @endif
                                        @if(!$companyDetail->user->email)
                                        <li >{{ __('web.common.email') }}:
                                            <span >{{$companyDetail->user->email}}</span></li>
                                            @endif
                                        <li>{{ __('web.common.location') }}:
                                            <span>
{{ (isset($companyDetail->location)) ? html_entity_decode(Str::limit($companyDetail->location,12,'...')) : __('messages.common.n/a') }} {{ (isset($companyDetail->location2)) ? ','.html_entity_decode(Str::limit($companyDetail->location2,12,'...')) : '' }}
                                                   </span>
                                        </li>
                                        @if(isset($companyDetail->user->facebook_url) || isset($companyDetail->user->twitter_url) || isset($companyDetail->user->pinterest_url) || isset($companyDetail->user->google_plus_url) || isset($companyDetail->user->linkedin_url))
                                            <li>Social media:
                                                <div class="social-links">
                                                    @if(isset($companyDetail->user->facebook_url))
                                                        <a href="{{ (isset($companyDetail->user->facebook_url)) ? addLinkHttpUrl($companyDetail->user->facebook_url) : 'javascript:void(0)' }}"><i class="fab fa-facebook-f"></i></a>
                                                    @endif
                                                    @if(isset($companyDetail->user->twitter_url))
                                                        <a href="{{ (isset($companyDetail->user->twitter_url)) ? addLinkHttpUrl($companyDetail->user->twitter_url) : 'javascript:void(0)' }}"><i class="fab fa-twitter"></i></a>
                                                    @endif
                                                    @if(isset($companyDetail->user->pinterest_url))
                                                        <a href="{{ (isset($companyDetail->user->pinterest_url)) ? addLinkHttpUrl($companyDetail->user->pinterest_url) : 'javascript:void(0)' }}"><i class="fab fa-pinterest"></i></a>
                                                    @endif
                                                    @if(isset($companyDetail->user->google_plus_url))
                                                        <a href="{{ (isset($companyDetail->user->google_plus_url)) ? addLinkHttpUrl($companyDetail->user->google_plus_url) : 'javascript:void(0)' }}"><i class="fab fa-google-plus-g"></i></a>
                                                    @endif
                                                    @if(isset($companyDetail->user->linkedin_url))
                                                        <a href="{{ (isset($companyDetail->user->linkedin_url)) ? addLinkHttpUrl($companyDetail->user->linkedin_url) : 'javascript:void(0)' }}"><i class="fab fa-linkedin-in"></i></a>
                                                    @endif
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                    @isset($companyDetail->website)
                                        <div class="btn-box">
                                            <a href="{{ (isset($companyDetail->website)) ?
                                                                                        (!str_contains($companyDetail->website,'https://')
                                                                                        ? 'https://'.$companyDetail->website
                                                                                        : $companyDetail->website)
                                                                                    : 'javascript:void(0)' }}" class="theme-btn btn-style-three">  {{ (isset($companyDetail->website)) ? preg_replace("(^https?://www.)", "", $companyDetail->website) : 'N/A' }}</a>
                                        </div>
                                    @endisset
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        @auth
            @role('Candidate')
            @include('web.company.report_to_company_modal')
            @endrole
        @endauth
    </section>
@endsection
@section('scripts')
    <script>
        let addCompanyFavouriteUrl = "{{ route('save.favourite.company') }}";
        let isCompanyAddedToFavourite = "{{ $isCompanyAddedToFavourite }}";
        let reportToCompanyUrl = "{{ route('report.to.company') }}";
        let followText = "{{ __('web.company_details.follow') }}";
        let unfollowText = "{{ __('web.company_details.unfollow') }}";
    </script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ mix('assets/js/companies/front/company-details.js') }}"></script>
@endsection
