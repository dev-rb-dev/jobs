@extends('web.layouts.app')
@section('title')
    {{ __('web.home') }}
@endsection
@section('content')
    <section class="banner-section-three">
    @if($settings->value)
        @if(count($headerSliders) > 0)
            <!-- Testimonial Carousel -->
                <div class="banner-carousel owl-carousel owl-theme default-nav">
                    @foreach($headerSliders as $headerSlider)
                        <div class="slide-item bg-image" style="background-image: url({{ $headerSlider->header_slider_url }});"></div>
                    @endforeach
                </div>
            @endif
        @endif
        <div class="auto-container">
            <div class="row">
                <div class="content-column {{($settings->value==1 && count($headerSliders) > 0)?'col-lg-12':'col-lg-7'}} col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="title-box wow fadeInUp">
                            <h3>{{ __('web.home_menu.home_title') }}</h3>
                            <div class="text text-dark">{{ __('web.home_menu.home_description') }}</div>
                        </div>
                        <!-- Job Search Form -->
                        <div class="job-search-form-two wow fadeInUp" data-wow-delay="500ms">
                            <form action="{{ route('front.search.jobs') }}" method="get">
                                <div class="row">
                                    <div class="form-group col-lg-5 col-md-12 col-sm-12">
                                        <label class="title">{{ __('web.home_menu.keywords') }}</label>
                                        <span class="icon flaticon-search-1"></span>
                                        <input type="text" name="keywords" id="search-keywords" placeholder="@lang('web.web_home.job_title_keywords_company')" autocomplete="off">
                                    </div>
                                    <div id="jobsSearchResults" class="position-absolute w100 job-search"></div>
                                    <!-- Form Group -->
                                    <div class="form-group col-lg-4 col-md-12 col-sm-12 location">
                                        <label class="title">{{ __('web.common.location') }}</label>
                                        <span class="icon flaticon-map-locator"></span>
                                        <input type="text" name="location" id="search-location" placeholder="@lang('web.web_home.city_or_postcode')" autocomplete="off">
                                    </div>
                                    <!-- Form Group -->
                                    <div class="form-group col-lg-3 col-md-12 col-sm-12 btn-box">
                                        <button type="submit" class="theme-btn btn-style-one"><span class="btn-title">{{ __('web.web_home.find_jobs') }}</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @if($settings->value==0)
                    <div class="image-column col-lg-5 col-md-12">
                        <div class="image-box">
                            <figure class="main-image wow fadeInRight" data-wow-delay="1500ms">
                                <img class="home-banner" src="{{ $cmsServices['home_banner']?asset($cmsServices['home_banner']) : asset('web_front/images/resource/home_banner.png')}}" alt="">
                            </figure>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    @if(count($imageSliders) > 0 && $imageSliderActive->value)
        <div class="{{ ($slider->value == 0) ? 'container' : ' ' }} mt-5">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($imageSliders as $key=>$imageSlider)
                        <div class="carousel-item {{($key==0)?'active':''}}">
                            <img class="d-block w-100 slider-img" src="{{ $imageSlider->image_slider_url }}" alt="First slide">
                            @if($imageSlider->description)
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{!! Str::limit($imageSlider->description, 495, ' ...') !!}</h5>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    @endif
    <!--Clients Section-->
    @if(count($branding) > 0)
        <section class="clients-section-two">
            <div class="sponsors-outer wow fadeInUp touch-none">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    @foreach($branding as $brand)
                        <li class="slide-item">
                            <figure class="image-box">
                                <img src="{{ $brand->branding_slider_url }}" alt="Branding Slider">
                            </figure>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif
    <!-- End Clients Section-->
    @if(count($jobCategories) > 0)
        <!-- Job Categories -->
        <section class="job-categories">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2>{{ __('web.web_home.popular_job_categories') }}</h2>
                </div>
                <div class="row wow fadeInUp justify-content-center">
                    <!-- Category Block -->
                    @foreach($jobCategories as $jobCategory)
                        <div class="category-block-two col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="content">
                                    <img class="icon job-category-avatar" src="{{ $jobCategory->image_url}}" alt="Job Category Image">
                                    <h4>
                                        <a href="{{ route('front.search.jobs',array('categories'=> $jobCategory->id)) }}">{{ html_entity_decode($jobCategory->name) }}</a>
                                    </h4>

                                    <p>{{ '('.(($jobCategory->jobs_count) ? $jobCategory->jobs_count : 0) .' open positions)'}}</p>
                                </div>
                                @if($jobCategory->is_featured)
                                    <button class="bookmark-btn"><i class="fas fa-bookmark featured"></i></button>
                                @endif
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- End Job Categories -->
    @if(count($latestJobs) > 0)
        <section class="job-section">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2>{{ __('web.home_menu.latest_jobs') }}</h2>
                </div>
                <div class="row wow fadeInUp justify-content-center">
                    @if(count($latestJobs) > 0)
                        @if(\Illuminate\Support\Facades\Auth::check() && isset(auth()->user()->country_name) && isset($latestJobsEnable)?$latestJobsEnable->value:'')
                            @if(in_array(auth()->user()->country_name, array_column($latestJobs->toArray(),'country_name')))
                                @foreach($latestJobs as $job)
                                    @if($job->country_name == auth()->user()->country_name)
                                        @include('web.common.job_card')
                                    @endif
                                @endforeach
                                <div class="col-md-12 text-center">
                                    <a href="{{ route('front.search.jobs') }}" class="theme-btn btn-style-three">{{ __('web.common.browse_all') }}</a>
                                </div>
                            @else
                                <div class="col-md-12 text-center">
                                    <h5>{{ __('web.home_menu.latest_job_not_available') }}</h5>
                                </div>
                            @endif
                        @else
                            @foreach($latestJobs as $job)
                                @include('web.common.job_card')
                            @endforeach
                            <div class="col-md-12 text-center">
                                <a href="{{ route('front.search.jobs') }}" class="theme-btn btn-style-one bg-blue">{{ __('web.common.browse_all') }}</a>
                            </div>
                        @endif
                    @else
                        <div class="col-md-12 text-center">
                            <h5>{{ __('web.home_menu.latest_job_not_available') }}</h5>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    <!-- Job Section -->
    @if(count($featuredJobs) > 0)
        <section class="job-section padding-0">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2>{{ __('web.home_menu.featured_jobs') }}</h2>
                    <div class="text">Know your worth and find the job that qualify your life</div>
                </div>

                <div class="row wow fadeInUp">
                    @foreach($featuredJobs as $job)
                        @include('web.common.job_card')
                    @endforeach
                    <div class="col-md-12 text-center">
                        <a href="{{ route('front.search.jobs',['is_featured' => true]) }}" class="theme-btn btn-style-one bg-blue">{{ __('web.common.browse_all') }}</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- End Job Section -->
    <!-- App Section -->
    <!-- ===== Start of Notices Section ===== -->
    @if(count($notices) > 0)
        <section class="app-section p-0 notice-div">
            <div class="auto-container">
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
                                            <div class="d-flex justify-content-between mb-2"><span>{{ html_entity_decode($notice->title) }} | {{ $notice->created_at->diffForHumans() }}</span>
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
    <!-- ===== End of Notices Section ===== -->-
    <!-- End App Section -->
    <!-- ===== Start of Testimonial Section ===== -->
    @if(count($testimonials) > 0)
        @include('web.home.testimonials')
    @endif
    @if(count($recentBlog) > 0)
        <section class="news-section">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2>{{ __('messages.recent_blog') }}</h2>
                </div>

                <div class="row wow fadeInUp justify-content-center">
                    <!-- News Block -->
                    @foreach($recentBlog as $post)
                        <div class="news-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box h-100">
                                <div class="image-box">
                                    <figure class="image">
                                        <img src="{{ empty($post->blog_image_url) ? asset('assets/img/article-image.png') : $post->blog_image_url }}" alt=""/>
                                    </figure>
                                </div>
                                <div class="lower-content">
                                    <ul class="post-meta">
                                        <li>
                                            <a href="#">{{ \Carbon\Carbon::parse($post->created_at)->isoFormat('MMM Do YYYY')}}</a>
                                        </li>
                                        <li><a href="#">{{  $post->comments_count }} Comment</a></li>
                                    </ul>
                                    <h3>
                                        <a href="{{ route('front.posts.details',$post->id) }}">{{ html_entity_decode($post->title) }}</a>
                                    </h3>
                                    <p class="text"> {!! !empty($post->description) ? Str::limit(strip_tags($post->description),100,'...') : __('messages.common.n/a') !!}</p>
                                    <a href="{{ route('front.posts.details',$post->id) }}" class="read-more">{{ __('web.post_menu.read_more') }}
                                        <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- ===== End of Testimonial Section ===== -->
    <!-- Top Companies -->
    @if(count($featuredCompanies) > 0)
        <section class="top-companies">
            <div class="auto-container">
                <div class="sec-title">
                    <h2>{{ __('web.home_menu.featured_companies') }}</h2>
                </div>
                <div class="carousel-outer wow fadeInUp">
                    <div class="companies-carousel owl-carousel owl-theme default-dots mb-3">
                        <!-- Company Block -->
                        @foreach($featuredCompanies as $company)
                            <div class="job-block-three company-block">
                                <div class="inner-box">
                                    <figure class="image">
                                        <img class="h-100 w-100 home-banner" src="{{$company->company_url}}" alt="">
                                    </figure>
                                    <h4 class="name">
                                        <a href="{{ route('front.company.details', $company->unique_id) }}">{{$company->user->full_name}}</a>
                                    </h4>
                                    @if(!empty($company->location) || !empty($company->location2))
                                        <div class="location"><i class="flaticon-map-locator"></i>
                                            {{ (isset($company->location)) ? html_entity_decode(Str::limit($company->location,40,'...')) : __('messages.common.n/a') }}
                                        </div>
                                    @else
                                        <div class="location">
                                            <i class="flaticon-map-locator"></i>
                                            <span>{{ __('web.web_home.no_location_added') }}</span>
                                        </div>
                                    @endif
                                    <a href="{{route('front.company.details', $company->unique_id)}}" class="theme-btn btn-style-three">{{ $company->jobs_count }} {{ __('web.web_home.open_position') }}</a>
                                    @if($company->activeFeatured)
                                        <button class="bookmark-btn"><i class="fas fa-bookmark featured"></i></button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-12 text-center">
                        <a href="{{ route('front.company.lists',['is_featured' => true]) }}" class="theme-btn btn-style-one bg-blue">{{ __('web.common.browse_all') }}</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- End Top Companies -->
    <section class="about-section-three countdown-background ">
        <div class="fun-fact-section">
            <div class="row">
                <!--Column-->
                <div class="counter-column col-lg-3 col-md-3 col-sm-12 wow fadeInUp">
                    <div class="count-box text-blue"><span class="count-text" data-speed="3000" data-stop="{{ $dataCounts['candidates'] }}">0</span>
                    </div>
                    <h4 class="counter-title">{{ __('messages.front_home.candidates') }}</h4>
                </div>
                <!--Column-->
                <div class="counter-column col-lg-3 col-md-3 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                    <div class="count-box text-blue"><span class="count-text" data-speed="3000" data-stop="{{ $dataCounts['jobs'] }}"></span>
                    </div>
                    <h4 class="counter-title">{{ __('messages.front_home.jobs') }}</h4>
                </div>

                <!--Column-->
                <div class="counter-column col-lg-3 col-md-3 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                    <div class="count-box text-blue">
                        <span class="count-text" data-speed="3000" data-stop="{{ $dataCounts['resumes'] }}"></span>
                    </div>
                    <h4 class="counter-title">{{ __('messages.front_home.resumes') }}</h4>
                </div>
                <!--Column-->
                <div class="counter-column col-lg-3 col-md-3 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                    <div class="count-box text-blue">
                        <span class="count-text" data-speed="3000" data-stop="{{ $dataCounts['companies'] }}"></span>
                    </div>
                    <h4 class="counter-title">{{ __('messages.front_home.companies') }}</h4>
                </div>
            </div>
        </div>
    </section>
    @if(count($plans) > 0)
        <!-- Pricing Sectioin -->
        <section class="pricing-section">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2>{{ __('web.web_home.pricing_packages') }}</h2>
                </div>
                <!--Pricing Tabs-->
                <div class="pricing-tabs tabs-box wow fadeInUp">
                    <!--Tab Btns-->
                    <!--Tabs Container-->
                    <div class="tabs-content">
                        <!--Tab / Active Tab-->
                        <div class="tab active-tab" id="monthly">
                            <div class="content">
                                <div class="row justify-content-center">
                                    @foreach($plans as $plan)
                                        <div class="pricing-table col-lg-4 col-md-6 col-sm-12">
                                            <div class="inner-box">
                                                <div class="title">{{ html_entity_decode( Str::limit($plan->name, 50, '...') ) }}</div>
                                                <div class="price">{{empty($plan->salaryCurrency->currency_icon)?'$':$plan->salaryCurrency->currency_icon}}{{ $plan->amount }}
                                                    <span class="duration"><label class="font-weight-bolder ">/{{ __('web.web_home.monthly') }}</label></span>
                                                </div>
                                                <div class="table-content">
                                                    <ul>
                                                        <li>
                                                            <span>  {{ $plan->allowed_jobs.' '.($plan->allowed_jobs > 1 ? __('messages.plan.jobs_allowed') : __('messages.plan.job_allowed')) }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="table-footer">
                                                    @if(Auth::check() && Auth::user()->hasRole('Candidate'))
                                                        <a href="#" class="theme-btn btn-style-three d-none">{{ __('messages.pricing_table.get_started') }}</a>
                                                    @elseif(Auth::check() && Auth::user()->hasRole('Employer'))
                                                        <a href="{{ route('manage-subscription.index') }}" class="theme-btn btn-style-three">{{ __('messages.pricing_table.get_started') }}</a>
                                                    @elseif(Auth::check() && Auth::user()->hasRole('Admin'))
                                                        <a href="#" class="theme-btn btn-style-three d-none">{{ __('messages.pricing_table.get_started') }}</a>
                                                    @else
                                                        <a href="{{ route('employer.register') }}" class="theme-btn btn-style-three">{{ __('messages.pricing_table.get_started') }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- End Pricing Section -->
@endsection
@section('page_scripts')
    <script>
        var availableLocation = [];
        let jobsSearchUrl = "{{ route('get.jobs.search') }}";
        @foreach(getCountries() as $county)
        availableLocation.push("{{ $county  }}");
        @endforeach

        let color = @json($color);
        $.each(color, function (key, val) {
            $('.color' + key).css({ 'border-left': '5px solid' + val, 'border-bottom': '5px solid' + val });
            $('.date-color' + key).css({ 'background-color': val });
        });
    </script>
    <script src="{{mix('assets/js/home/home.js')}}"></script>
@endsection

