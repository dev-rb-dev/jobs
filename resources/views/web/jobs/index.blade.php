@extends('web.layouts.app')
@section('title')
    {{ __('web.job_menu.search_job') }}
@endsection
@section('css')
    <link href="{{ asset('assets/css/ion.rangeSlider.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/header-span.css') }}">
@endsection
@section('page_css')
    @if(\Illuminate\Support\Facades\App::getLocale() == 'ar')
        <style>
            .job-post-wrapper ul.pagination {
                direction: rtl;
            }
        </style>
    @endif
    <style>
        .job-post-wrapper ul.pagination {
            margin-top: 30px !important;
        }
    </style>
@endsection
@section('content')
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>{{ __('web.web_jobs.find_jobs') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('front.home') }}">{{ __('web.home') }}</a></li>
                    <li>{{ __('web.jobs') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Listing Section -->
    <section class="ls-section">
        <div class="auto-container">
            <div class="filters-backdrop"></div>

            <div class="row">
                {{--                <!-- Filters Column -->--}}
                <div class="filters-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="filters-outer">
                            <button type="button" class="theme-btn close-filters">X</button>
                            <!-- Filter Block -->
                            <div class="filter-block d-flex justify-content-between">
                                <div>
                                    <h4>{{ __('web.web_jobs.search_by_keywords') }}</h4>
                                </div>
                                <div>
                                    <button class="theme-btn small btn-style-eight reset-filter">{{ __('web.reset_filter') }}</button>
                                </div>
                            </div>
                            <div class="filter-block">
                                <div class="form-group">
                                    <input type="search" name="listing-search" id="searchByLocation" placeholder="@lang(('web.web_home.job_title_keywords_company'))">
                                    <span class="icon flaticon-search-3"></span>
                                </div>
                            </div>
                            <div class="filter-block">
                                <h4>{{ __('web.post_menu.categories') }}</h4>
                                <div class="form-group">
                                    @if($jobCategories->isNotEmpty())
                                        <select class="chosen-select" data-live-search="true" data-size="5" name="search-categories" id="searchCategories">
                                            <option value="">{{ __('web.job_menu.none') }}</option>
                                            @foreach($jobCategories as $key => $value)
                                                <option value="{{ $key }}" {{ (request()->get('categories') == $key) ? 'selected' : '' }}>
                                                    {{ html_entity_decode($value) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                    <span class="icon flaticon-briefcase"></span>
                                </div>
                            </div>
                            <div class="filter-block">
                                <h4>{{ __('messages.candidate.candidate_skill') }}</h4>
                                <div class="form-group">
                                    @if($jobSkills->isNotEmpty())
                                        <select class="chosen-select" data-live-search="true" data-size="5" name="search-skills" id="searchSkill">
                                            <option value="">{{ __('web.job_menu.none') }}</option>
                                            @foreach($jobSkills as $key => $value)
                                                <option value="{{ $key }}">
                                                    {{ html_entity_decode($value) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                    <span class="icon flaticon-briefcase"></span>
                                </div>
                            </div>
                            <div class="filter-block">
                                <h4>{{ __('messages.candidate.gender') }}</h4>
                                <div class="form-group">
                                    <select class="chosen-select" data-live-search="true" data-size="5" name="search-gender" id="searchGender">
                                        <option value="">{{ __('web.job_menu.none') }}</option>
                                        @foreach($genders as $key => $value)
                                            <option value="{{ $key }}">
                                                {{ html_entity_decode($value) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="icon flaticon-briefcase"></span>
                                </div>
                            </div>
                            <div class="filter-block">
                                <h4>{{ __('messages.job.career_level') }}</h4>
                                <div class="form-group">
                                    @if($careerLevels->isNotEmpty())
                                        <select class="chosen-select" data-live-search="true" data-size="5" name="search-career-level" id="searchCareerLevel">
                                            <option value="">{{ __('web.job_menu.none') }}</option>
                                            @foreach($careerLevels as $key => $value)
                                                <option value="{{ $key }}">
                                                    {{ html_entity_decode($value) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="icon flaticon-briefcase"></span>
                                    @endif
                                </div>
                            </div>
                            <div class="filter-block">
                                <h4>{{ __('messages.job.functional_area') }}</h4>
                                <div class="form-group">
                                    @if($functionalAreas->isNotEmpty())
                                        <select class="chosen-select" data-live-search="true" data-size="5" name="search-functional-area" id="searchFunctionalArea">
                                            <option value="">{{ __('web.job_menu.none') }}</option>
                                            @foreach($functionalAreas as $key => $value)
                                                <option value="{{ $key }}">
                                                    {{ html_entity_decode($value) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="icon flaticon-briefcase"></span>
                                    @endif
                                </div>
                            </div>
                            @if($jobTypes->isNotEmpty())
                                <div class="switchbox-outer">
                                    <h4>{{ __('web.job_menu.type') }}</h4>
                                    <ul class="switchbox">
                                        @foreach($jobTypes as $jobType)
                                            @if($jobType->jobs_count > 0)
                                                <li>
                                                    @if(Str::length($jobType->name) < 50)
                                                        <label class="switch" for="{{ $jobType->id }}">
                                                            <input type="checkbox" name="job-type" id="{{ $jobType->id }}" class="jobType" value="{{ $jobType->id }}">
                                                            <span class="slider round"></span>
                                                            <span class="title">{{ html_entity_decode($jobType->name)}} {{ ($jobType->jobs_count > 0)? '('.$jobType->jobs_count.')':'' }}</span>
                                                        </label>
                                                    @else
                                                        <label class="switch" for="{{ $jobType->id }}" data-toggle="tooltip" data-placement="bottom" title="{{$jobType->name}}">
                                                            <input type="checkbox" name="job-type" id="{{ $jobType->id }}" class="jobType" value="{{ $jobType->id }}">
                                                            <span class="slider round"></span>
                                                            <span class="title">{{ html_entity_decode(Str::limit($jobType->name,50,'...')) }}</span>
                                                        </label>
                                            @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="filter-block">
                                <ul>
                                    <label class="text-dark">{{ __('web.job_menu.salary_from') }}:</label>
                                    <li class="full-width-li">
                                        <input type="text" id="salaryFrom" autocomplete="off">
                                    </li>
                                    <label class="text-dark mt10">{{ __('web.job_menu.salary_to') }}
                                        :</label>
                                    <li class="full-width-li">
                                        <input type="text" id="salaryTo" autocomplete="off">
                                    </li>
                                    <label class="text-dark mt10">{{ __('messages.candidate.experience') }}
                                        :</label>
                                    <li class="full-width-li">
                                        <input type="text" id="jobExperience" autocomplete="off">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="job-advert mt30">
                            <img src="{{ isset($advertise_image->value)?$advertise_image->value: asset('assets/img/infyom-logo.png')}}" class="img-responsive" alt="">
                        </div>
                    </div>
                </div>
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <div class="ls-outer">
                        @livewire('job-search')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('page_scripts')
@endsection
@section('scripts')
    <script>
        let input = JSON.parse('@json($input)');
    </script>
    <script src="{{ asset('assets/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ mix('assets/js/jobs/front/job_search.js') }}"></script>
@endsection
