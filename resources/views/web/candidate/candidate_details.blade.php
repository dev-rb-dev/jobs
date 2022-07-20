@extends('web.layouts.app')
@section('title')
    {{ __('messages.candidate.candidate_details') }}
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/header-span.css') }}">
@endsection
@section('content')
    <section class="candidate-detail-section">
        <div class="upper-box">
            <div class="auto-container">
                <div class="candidate-block-five">
                    <div class="inner-box">
                        <div class="content">
                            <figure class="image"><img src="{{ $candidateDetails->user->avatar }}" alt=""></figure>
                            <h4 class="name">
                                <a href="#">{{ html_entity_decode($candidateDetails->user->full_name) }}</a></h4>
                            <ul class="candidate-info">
                                @if($candidateDetails->functionalArea)
                                    <li>
                                        <span class="icon flaticon-briefcase"></span>{{ $candidateDetails->functionalArea->name}}
                                    </li>
                                @endif
                                @if(!empty($candidateDetails->user->country_name))
                                    <li>
                                        <span class="icon flaticon-map-locator"></span>
                                        <span>{{$candidateDetails->user->country_name}}
                                            @if(!empty($candidateDetails->user->state_name))
                                                ,{{$candidateDetails->user->state_name }}
                                            @endif
                                            @if(!empty($candidateDetails->user->city_name))
                                                ,{{$candidateDetails->user->city_name}}</span>
                                        @endif
                                    </li>
                                @endif
                                <li><span class="icon flaticon-envelope"></span>{{$candidateDetails->user->email}}</li>
                                @if($candidateDetails->user->dob)
                                    <li>
                                        <span class="icon flaticon-royal-crown-of-elegant-vintage-design"></span> {{ date('jS M, Y', strtotime($candidateDetails->user->dob))}}
                                    </li>
                                @endif
                            </ul>
                            @auth
                                @role('Employer')
                                <ul class="post-tags mt-2">
                                    <a href="#reportToCandidateModal" class="theme-btn btn-style-eight reportToCompany  reportToCandidate" {{ ($isReportedToCandidate) ? 'style=pointer-events:none;' : '' }}rel="modal:open">{{ __('messages.candidate.reporte_to_candidate') }}</a>
                                </ul>
                                @endrole
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="candidate-detail-outer">
            <div class="auto-container">
                <div class="row">
                    <div class="content-column col-lg-8 col-md-12 col-sm-12">
                        <div class="job-detail">
                            <div class="resume-outer">
                                <div class="upper-title">
                                    <h4>Education</h4>
                                </div>
                                @forelse($candidateEducations as $candidateEducation)
                                    <div class="resume-block">
                                        <div class="inner">

                                            <span class="name">{{ucfirst($candidateEducation->institute[0])}}</span>
                                            <div class="title-box">
                                                <div class="info-box">
                                                    <h3>{{$candidateEducation->degreeLevel->name}}</h3>
                                                    <span> {{ucfirst($candidateEducation->institute)}}</span>
                                                </div>
                                                <div class="edit-box">
                                                    <span class="year">{{ $candidateEducation->year }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <h4 class="text-center">{{ __('messages.candidate.education_not_found') }}</h4>
                                @endforelse
                            </div>
                            <div class="resume-outer theme-blue">
                                <div class="upper-title">
                                    <h4>Work & Experience</h4>
                                </div>
                                @forelse($candidateExperiences as $candidateExperience)
                                    <div class="resume-block">
                                        <div class="inner">
                                            <span class="name">{{ucfirst($candidateExperience->company[0])}}</span>
                                            <div class="title-box">
                                                <div class="info-box">
                                                    <h3>{{$candidateExperience->experience_title}}</h3>
                                                    <span>{{ucfirst($candidateExperience->company)}}</span>
                                                </div>
                                                <div class="edit-box">
                                                    <span class="year">  {{ \Carbon\Carbon::parse($candidateExperience->start_date)->format('Y') }} - {{($candidateExperience->currently_working) ? 'present' : \Carbon\Carbon::parse($candidateExperience->end_date)->format('Y') }}</span>
                                                </div>
                                            </div>
                                            @if(!empty($candidateExperience->description))
                                                <div class="text">{!! Str::limit(nl2br($candidateExperience->description),300,'...') !!}</div>
                                            @endif
                                        </div>
                                    </div>
                                @empty
                                    <h4 class="text-center">{{ __('messages.candidate.experience_not_found') }}</h4>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                        @include('web.candidate.candidate_detail_sidebar')
                    </div>
                </div>
            </div>
        </div>
    </section>
    @role('Employer')
    @include('web.candidate.report_to_candidate_modal')
    @endrole
@endsection
@section('scripts')
    <script>
        let reportToCandidateUrl = "{{ route('report.to.candidate') }}";
    </script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ mix('assets/js/candidate/front/candidate-details.js') }}"></script>
@endsection

