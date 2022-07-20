{{--<aside id="sidebar-wrapper">--}}
{{--    <div class="sidebar-brand admin-sidebar-brand">--}}
{{--        <a href="{{ url('/') }}">--}}
{{--            <img src="{{ getLogoUrl() }}" width="100px" class="navbar-brand-full"/>--}}
{{--        </a>--}}
{{--        <div class="input-group px-3">--}}
{{--            <input type="text" class="form-control searchTerm" id="searchText" placeholder="Search Menu"--}}
{{--                   autocomplete="off">--}}
{{--            <div class="input-group-append">--}}
{{--                <div class="input-group-text">--}}
{{--                    <i class="fas fa-search search-sign"></i>--}}
{{--                    <i class="fas fa-times close-sign"></i>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="no-results mt-3 ml-1">No matching records found</div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="sidebar-brand sidebar-brand-sm">--}}
{{--        <a href="{{ url('/') }}" class="small-sidebar-text">--}}
{{--            <img class="navbar-brand-full" src="{{ getLogoUrl() }}" alt="{{config('app.name')}}"/>--}}
{{--        </a>--}}
{{--    </div>--}}
{{--    <ul class="sidebar-menu mt-3">--}}
{{--        <ul class="sidebar-menu ">--}}
{{--            <li class="side-menus {{ Request::is('admin/dashboard*') ? 'active' : '' }}">--}}
{{--                <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa fa-digital-tachograph"></i>--}}
{{--                    <span>{{ __('messages.dashboard') }}</span></a></li>--}}
{{--        </ul>--}}
{{--        <li class="nav-item dropdown side-menus">--}}
{{--            <a class="nav-link has-dropdown" href="#"><i class="fas fa-user-tie"></i>--}}
{{--                <span>{{ __('messages.employers') }}</span>--}}
{{--            </a>--}}
{{--            <ul class="dropdown-menu side-menus">--}}
{{--                <li class="side-menus {{ Request::is('admin/companies*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('company.index') }}">--}}
{{--                        <i class="fas fa-user-friends"></i>--}}
{{--                        <span>{{ __('messages.employers') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/reported-company*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('reported.companies') }}">--}}
{{--                        <i class="fas fa-file-signature"></i>--}}
{{--                        <span> {{ __('messages.company.reported_employers') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown side-menus">--}}
{{--            <a class="nav-link has-dropdown" href="#"><i class="fas fa-users"></i>--}}
{{--                <span>{{ __('messages.candidates') }}</span>--}}
{{--            </a>--}}
{{--            <ul class="dropdown-menu side-menus">--}}
{{--                <li class="side-menus {{ Request::is('admin/candidates*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('candidates.index') }}">--}}
{{--                        <i class="fas fa-user-circle"></i>--}}
{{--                        <span>{{ __('messages.candidates') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/required-degree-level*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('requiredDegreeLevel.index') }}">--}}
{{--                        <i class="fas fa-user-graduate"></i>--}}
{{--                        <span>{{ __('messages.required_degree_levels') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/reported-candidate*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('reported.candidates') }}">--}}
{{--                        <i class="fas fa-file-signature"></i>--}}
{{--                        <span>{{ __('messages.candidate.reported_candidates') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/resumes*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('resumes.index') }}">--}}
{{--                        <i class="fas fa-file-pdf"></i>--}}
{{--                        <span>{{ __('messages.all_resumes') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/selected-candidate*') ? 'active' : ''  }}">--}}
{{--                    <a class="nav-link" href="{{ route('selected.candidate') }}">--}}
{{--                        <i class="fas fa-user-check"></i>--}}
{{--                        <span>{{ __('messages.selected_candidate') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item side-menus dropdown">--}}
{{--            <a class="nav-link has-dropdown" href="#"><i class="fas fa-briefcase"></i>--}}
{{--                <span>{{ __('messages.jobs') }}</span>--}}
{{--            </a>--}}
{{--            <ul class="dropdown-menu side-menus">--}}
{{--                <li class="side-menus {{ Request::is('admin/jobs*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('admin.jobs.index') }}">--}}
{{--                        <i class="fas fa-briefcase"></i>--}}
{{--                        <span>{{ __('messages.jobs') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/job-categories*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('job-categories.index') }}">--}}
{{--                        <i class="fas fa-sitemap"></i>--}}
{{--                        <span>{{ __('messages.job_categories') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/job-types*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('jobType.index') }}">--}}
{{--                        <i class="fas fa-list-alt"></i>--}}
{{--                        <span>{{ __('messages.job_types') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/job-tags*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('jobTag.index') }}">--}}
{{--                        <i class="fas fa-tags"></i>--}}
{{--                        <span>{{ __('messages.job_tags') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/job-shifts*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('jobShift.index') }}">--}}
{{--                        <i class="fas fa-clock"></i>--}}
{{--                        <span>{{ __('messages.job_shifts') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/reported-jobs*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('reported.jobs') }}">--}}
{{--                        <i class="fab fa-r-project"></i>--}}
{{--                        <span>{{ __('messages.reported_jobs') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/job-notification*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('job-notification.index') }}">--}}
{{--                        <i class="fas fa-envelope-open-text"></i>--}}
{{--                        <span>{{ __('messages.job_notification.job_notifications') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/job-expired*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('admin.jobs.expiredJobs') }}">--}}
{{--                        <i class="fas fa-calendar-times"></i>--}}
{{--                        <span>{{ __('messages.expired_jobs') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item side-menus dropdown">--}}
{{--            <a class="nav-link has-dropdown" href="#"><i class="fab fa-usps"></i>--}}
{{--                <span>{{ __('messages.post.blog') }}</span>--}}
{{--            </a>--}}
{{--            <ul class="dropdown-menu side-menus">--}}
{{--                <li class="side-menus {{ Request::is('admin/post-categories*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('post-categories.index') }}">--}}
{{--                        <i class="far fa-list-alt"></i>--}}
{{--                        <span> {{ __('messages.post_category.post_categories') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/posts*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('posts.index') }}">--}}
{{--                        <i class="fas fa-blog"></i>--}}
{{--                        <span> {{ __('messages.post.posts') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/post-comments*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('post.comments') }}">--}}
{{--                        <i class="fas fa-comments"></i>--}}
{{--                        <span> {{ __('messages.post_comments') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item side-menus dropdown">--}}
{{--            <a class="nav-link has-dropdown" href="#"><i class="fas fa-solar-panel"></i>--}}
{{--                <span>{{ __('messages.plan.subscriptions') }}</span>--}}
{{--            </a>--}}
{{--            <ul class="dropdown-menu side-menus">--}}
{{--                <li class="side-menus {{ Request::is('admin/plans*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('plans.index') }}">--}}
{{--                        <i class="fab fa-bandcamp"></i>--}}
{{--                        <span>{{ __('messages.subscriptions_plans') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/transactions*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('transactions.index') }}">--}}
{{--                        <i class="fas fa-money-bill-wave"></i>--}}
{{--                        <span>{{ __('messages.transactions') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="side-menus {{ Request::is('admin/subscribers*') ? 'active' : '' }}">--}}
{{--            <a class="nav-link" href="{{ route('subscribers.index') }}">--}}
{{--                <i class="fas fa-bell"></i>--}}
{{--                <span>{{ __('messages.subscribers') }}</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item side-menus dropdown">--}}
{{--            <a class="nav-link has-dropdown" href="#"><i class="fas fa-globe-americas"></i>--}}
{{--                <span>{{ __('messages.country.countries') }}</span>--}}
{{--            </a>--}}
{{--            <ul class="dropdown-menu side-menus">--}}
{{--                <li class="side-menus {{ Request::is('admin/countries*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('countries.index') }}">--}}
{{--                        <i class="fas fa-globe-americas"></i>--}}
{{--                        <span>{{ __('messages.country.countries') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/states*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('states.index') }}">--}}
{{--                        <i class="fas fa-flag"></i>--}}
{{--                        <span>{{ __('messages.state.states') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/cities*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('cities.index') }}">--}}
{{--                        <i class="fas fa-city"></i>--}}
{{--                        <span>{{ __('messages.city.cities') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown side-menus">--}}
{{--            <a class="nav-link has-dropdown" href="#"><i class="fas fa-cogs"></i>--}}
{{--                <span>{{ __('messages.general') }}</span>--}}
{{--            </a>--}}
{{--            <ul class="dropdown-menu side-menus">--}}
{{--                <li class="side-menus {{ Request::is('admin/marital-status*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('maritalStatus.index') }}">--}}
{{--                        <i class="fas fa-life-ring"></i>--}}
{{--                        <span>{{ __('messages.marital_statuses') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/skills*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('skills.index') }}">--}}
{{--                        <i class="fas fa-clipboard-list"></i>--}}
{{--                        <span>{{ __('messages.skills') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/salary-periods*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('salaryPeriod.index') }}">--}}
{{--                        <i class="fas fa-calendar-alt"></i>--}}
{{--                        <span>{{ __('messages.salary_periods') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/industries*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('industry.index') }}">--}}
{{--                        <i class="fas fa-landmark"></i>--}}
{{--                        <span>{{ __('messages.industries') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/company-sizes*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('companySize.index') }}">--}}
{{--                        <i class="fas fa-list-ol"></i>--}}
{{--                        <span>{{ __('messages.company_sizes') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/functional-area*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('functionalArea.index') }}">--}}
{{--                        <i class="fas fa-chart-pie"></i>--}}
{{--                        <span>{{ __('messages.functional_areas') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/career-levels*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('careerLevel.index') }}">--}}
{{--                        <i class="fas fa-level-up-alt"></i>--}}
{{--                        <span>{{ __('messages.career_levels') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/salary-currencies*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('salaryCurrency.index') }}">--}}
{{--                        <i class="fas fa-money-bill"></i>--}}
{{--                        <span>{{ __('messages.salary_currencies') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/ownership-types*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('ownerShipType.index') }}">--}}
{{--                        <i class="fas fa-universal-access"></i>--}}
{{--                        <span>{{ __('messages.ownership_types') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/languages*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('languages.index') }}">--}}
{{--                        <i class="fas fa-language"></i>--}}
{{--                        <span>{{ __('messages.languages') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown side-menus">--}}
{{--            <a class="nav-link has-dropdown" href="#"><i class="fas fa-users-cog"></i>--}}
{{--                <span>{{ __('messages.cms') }}</span>--}}
{{--            </a>--}}
{{--            <ul class="dropdown-menu side-menus">--}}
{{--                <li class="side-menus {{ Request::is('admin/testimonials*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('testimonials.index') }}">--}}
{{--                        <i class="fas fa-sticky-note"></i>--}}
{{--                        <span>{{ __('messages.testimonials') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/branding-sliders*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('branding.sliders.index') }}">--}}
{{--                        <i class="far fa-clone"></i>--}}
{{--                        <span>{{ __('messages.branding_sliders') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/header-sliders*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('header.sliders.index') }}">--}}
{{--                        <i class="far fa-image"></i>--}}
{{--                        <span>{{ __('messages.header_sliders') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/image-sliders*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('image-sliders.index') }}">--}}
{{--                        <i class="far fa-images"></i>--}}
{{--                        <span>{{ __('messages.image_sliders') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/noticeboards*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('noticeboards.index') }}">--}}
{{--                        <i class="fas fa-clipboard"></i>--}}
{{--                        <span>{{ __('messages.noticeboards') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/faqs*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('faqs.index') }}">--}}
{{--                        <i class="fas fa-question-circle"></i>--}}
{{--                        <span> {{ __('messages.faq.faq') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/inquires*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('inquires.index') }}">--}}
{{--                        <i class="fab fa-linkedin"></i>--}}
{{--                        <span> {{ __('messages.inquires') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/notification-settings*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('notification.settings.index') }}">--}}
{{--                        <i class="fas fa-compass"></i>--}}
{{--                        <span>{{ __('messages.setting.notification_settings') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/privacy-policy*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('privacy.policy.index') }}">--}}
{{--                        <i class="fas fa-user-secret"></i>--}}
{{--                        <span>{{ __('messages.setting.privacy_policy') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/front-settings*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('front.settings.index') }}">--}}
{{--                        <i class="fas fa-cog"></i>--}}
{{--                        <span>{{ __('messages.setting.front_settings') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/translation-manager*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('translation-manager.index') }}">--}}
{{--                        <i class="fas fa-language"></i>--}}
{{--                        <span>{{ __(__('messages.translation_manager')) }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/email-template*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('email.template.index') }}">--}}
{{--                        <i class="fas fa-envelope"></i>--}}
{{--                        <span>{{ __(__('messages.email_templates')) }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/settings*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('settings.index') }}">--}}
{{--                        <i class="fas fa-sliders-h"></i>--}}
{{--                        <span>{{ __('messages.settings') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown side-menus">--}}
{{--            <a class="nav-link has-dropdown" href="#"><i class="fas fa-users-cog"></i>--}}
{{--                <span>{{ __('Front CMS') }}</span>--}}
{{--            </a>--}}
{{--            <ul class="dropdown-menu side-menus">--}}
{{--                <li class="side-menus {{ Request::is('admin/cms-services*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('cms.services.index') }}">--}}
{{--                        <i class="fas fa-sticky-note"></i>--}}
{{--                        <span>{{ __('messages.cms_services') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="side-menus {{ Request::is('admin/cms.about-us.service*') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('cms.about-us.service') }}">--}}
{{--                        <i class="fas fa-sticky-note"></i>--}}
{{--                        <span>{{ __('About Us Services') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</aside>--}}
{{--<script src="{{ asset('assets/js/jquery.min.js') }}"></script>--}}
{{--<script src="{{ mix('assets/js/sidebar_menu_search/sidebar_menu_search.js') }}"></script>--}}









<!--begin::Brand-->
<div class="aside-logo flex-column-auto" id="kt_aside_logo">
    <!--begin::Logo-->
    <a href="{{ url('/') }}">
        <img alt="{{config('app.name')}}" src="{{ getLogoUrl() }}" class="h-25px logo"/>
        <span class="text-white fs-4 text-primary ms-3 logo">{{ getAppName() }}</span>
    </a>
    <!--end::Logo-->
    <!--begin::Aside toggler-->
    <div id="kt_aside_toggle"
         class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle sidebar-aside-toggle"
         data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
         data-kt-toggle-name="aside-minimize">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
        <span class="svg-icon svg-icon-1 rotate-180">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none">
                                        <path opacity="0.5"
                                              d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                                              fill="black"/>
                                        <path
                                            d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                                            fill="black"/>
                                    </svg>
                                </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Aside toggler-->
</div>
<!--end::Brand-->
<!--begin::Aside menu-->
<div class="aside-menu flex-column-fluid">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
         data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
         data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
         data-kt-scroll-offset="0">
        <!--begin::Menu-->
        <div
            class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
            id="#kt_aside_menu" data-kt-menu="true">
            <div class="position-relative mb-5 mx-3 mt-2 sidebar-search-box">
    <span class="svg-icon svg-icon-1 svg-icon-primary position-absolute top-50 translate-middle ms-9">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="17.0365" y="15.1223"
                                                                      width="8.15546" height="2" rx="1"
                                                                      transform="rotate(45 17.0365 15.1223)"
                                                                      fill="black"></rect>
                                                                <path
                                                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                                    fill="black"></path>
                                                            </svg>
                                                        </span>
                <input type="text" class="form-control form-control-lg form-control-solid ps-15" id="menuSearch"
                       name="search"
                       value="" placeholder="Search" style="background-color: #2A2B3A;border: none;color: #FFFFFF"
                       autocomplete="off">
            </div>
            <div class="no-record text-white text-center d-none">No matching records found</div>
            <div class="menu-item">
                <a class="menu-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}"
                   href="{{ route('admin.dashboard') }}">
                                                            <span class="menu-icon">
                                                     <i class="fas fa fa-digital-tachograph"></i>
                                                          </span>
                    <span class="menu-title">{{ __('messages.dashboard') }}</span>
                </a>
            </div>
            <div class="menu-item sidebar-dropdown">
                <a class="menu-link {{ Request::is('admin/companies*','admin/reported-company*') ? 'active' : '' }}"
                   href="{{ route('company.index') }}">
                                                            <span class="menu-icon">
                                                     <i class="fas fa-user-friends"></i>
                                                          </span>
                    <span class="menu-title">{{ __('messages.employers') }}</span>
                    <span class="d-none">{{ __('messages.company.reported_employers') }}</span>
                </a>
                <ul class="ps-md-0 hoverable-dropdown list-unstyled shadow">
                    <li class="{{ Request::is('admin/companies*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('company.index') }}">
                            <span class="menu-title {{ Request::is('admin/companies*') ? 'text-primary' : '' }}">{{ __('messages.employers') }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/reported-company*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('reported.companies') }}">
                            <span class="menu-title {{ Request::is('admin/reported-company*') ? 'text-primary' : '' }}">{{ __('messages.company.reported_employers')}}</span>
                        </a>
                    </li>
                    </ul>
            </div>
             <!---subadmin   start-------->
             @role('Admin')
             <div class="menu-item sidebar-dropdown">
                <a class="menu-link {{ Request::is('admin/subadmins*') ? 'active' : '' }}"
                   href="{{ route('subadmins.index') }}">
                                                            <span class="menu-icon">
                                                      <i class="fas fa-user-circle"></i>
                                                          </span>
                    <span class="menu-title">{{ __('messages.subadmins') }}</span>


                </a>
                <ul class="ps-md-0 hoverable-dropdown list-unstyled shadow">
                    <li class="{{ Request::is('admin/subadmins*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('subadmins.index') }}">
                            <span class="menu-title {{ Request::is('admin/subadmins*') ? 'text-primary' : '' }}">{{__('messages.subadmins')  }}</span>
                        </a>
                    </li>

                </ul>
            </div>

@endrole
            <div class="menu-item sidebar-dropdown">
                <a class="menu-link {{ Request::is('admin/candidates*','admin/required-degree-level*','admin/reported-candidate*','admin/resumes*','admin/selected-candidate*') ? 'active' : '' }}"
                   href="{{ route('candidates.index') }}">
                                                            <span class="menu-icon">
                                                      <i class="fas fa-user-circle"></i>
                                                          </span>
                    <span class="menu-title">{{ __('messages.candidates') }}</span>
                    <span class="d-none">{{ __('messages.required_degree_levels') }}</span>
                    <span class="d-none">{{ __('messages.candidate.reported_candidates') }}</span>
                    <span class="d-none">{{ __('messages.all_resumes') }}</span>
                    <span class="d-none">{{ __('messages.selected_candidate') }}</span>
                </a>
                <ul class="ps-md-0 hoverable-dropdown list-unstyled shadow">
                    <li class="{{ Request::is('admin/candidates*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('candidates.index') }}">
                            <span class="menu-title {{ Request::is('admin/candidates*') ? 'text-primary' : '' }}">{{__('messages.candidates')  }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/required-degree-level*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('requiredDegreeLevel.index') }}">
                            <span class="menu-title {{ Request::is('admin/required-degree-level*') ? 'text-primary' : '' }}">{{ __('messages.required_degree_levels')}}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/reported-candidate*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('reported.candidates') }}">
                            <span class="menu-title {{ Request::is('admin/reported-candidate*') ? 'text-primary' : '' }}">{{ __('messages.candidate.reported_candidates')}}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/resumes*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('resumes.index') }}">
                            <span class="menu-title {{ Request::is('admin/resumes*') ? 'text-primary' : '' }}">{{ __('messages.all_resumes') }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/selected-candidate*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('selected.candidate') }}">
                            <span class="menu-title {{ Request::is('admin/selected-candidate*') ? 'text-primary' : '' }}">{{ __('messages.selected_candidate')}}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu-item sidebar-dropdown">
                <a class="menu-link {{ Request::is('admin/jobs*','admin/job-categories*','admin/job-types*','admin/job-tags*','admin/job-shifts*','admin/reported-jobs*','admin/job-notification*','admin/job-expired*') ? 'active' : '' }}"
                   href="{{ route('admin.jobs.index') }}">
                                                            <span class="menu-icon">
                                                     <i class="fas fa-briefcase"></i>
                                                          </span>
                    <span class="menu-title">{{ __('messages.jobs') }}</span>
                    <span class="d-none">{{ __('messages.job_categories') }}</span>
                    <span class="d-none">{{ __('messages.job_types') }}</span>
                    <span class="d-none">{{ __('messages.job_tags') }}</span>
                    <span class="d-none">{{ __('messages.job_shifts') }}</span>
                    <span class="d-none">{{ __('messages.reported_jobs') }}</span>
                    <span class="d-none">{{ __('messages.job_notification.job_notifications') }}</span>
                    <span class="d-none">{{ __('messages.expired_jobs') }}</span>
                </a>
                <ul class="ps-md-0 hoverable-dropdown list-unstyled shadow">
                    <li class="{{ Request::is('admin/jobs*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('admin.jobs.index') }}">
                            <span class="menu-title {{ Request::is('admin/jobs*') ? 'text-primary' : '' }}">{{ __('messages.jobs') }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/job-published*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('admin.job-published.index') }}">
                            <span class="menu-title {{ Request::is('admin/job-published*') ? 'text-primary' : '' }}">{{ __('messages.job_published')}}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/job-categories*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('job-categories.index') }}">
                            <span class="menu-title {{ Request::is('admin/job-categories*') ? 'text-primary' : '' }}">{{ __('messages.job_categories')}}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/job-types*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('jobType.index') }}">
                            <span class="menu-title {{ Request::is('admin/job-types*') ? 'text-primary' : '' }}">{{ __('messages.job_types') }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/job-tags*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('jobTag.index') }}">
                            <span class="menu-title {{ Request::is('admin/job-tags*') ? 'text-primary' : '' }}">{{ __('messages.job_tags')}}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/job-shifts*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('jobShift.index') }}">
                            <span class="menu-title {{ Request::is('admin/job-shifts*') ? 'text-primary' : '' }}">{{ __('messages.job_shifts')}}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/reported-jobs*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('reported.jobs') }}">
                            <span class="menu-title {{ Request::is('admin/reported-jobs*') ? 'text-primary' : '' }}">{{ __('messages.reported_jobs')}}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/job-notification*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('job-notification.index') }}">
                            <span class="menu-title {{ Request::is('admin/job-notification*') ? 'text-primary' : '' }}">{{ __('messages.job_notification.job_notifications')}}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/job-expired*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('admin.jobs.expiredJobs') }}">
                            <span class="menu-title {{ Request::is('admin/job-expired*') ? 'text-primary' : '' }}">{{ __('messages.expired_jobs')}}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu-item sidebar-dropdown">
                <a class="menu-link {{ Request::is('admin/post-categories*','admin/posts*','admin/post-comments*') ? 'active' : '' }}"
                   href="{{ route('post-categories.index') }}">
                                                            <span class="menu-icon">
                                                      <i class="far fa-list-alt"></i>
                                                          </span>
                    <span class="menu-title">{{ __('messages.post.blog') }}</span>
                    <span class="d-none">{{ __('messages.post_category.post_categories') }}</span>
                    <span class="d-none">{{ __('messages.post.posts') }}</span>
                    <span class="d-none">{{ __('messages.post_comments') }}</span>

                </a>
                <ul class="ps-md-0 hoverable-dropdown list-unstyled shadow">
                    <li class="{{ Request::is('admin/post-categories*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('post-categories.index') }}">
                            <span class="menu-title {{ Request::is('admin/post-categories*') ? 'text-primary' : '' }}">{{ __('messages.post_category.post_categories')}}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/posts*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('posts.index') }}">
                            <span class="menu-title {{ Request::is('admin/posts*') ? 'text-primary' : '' }}">{{ __('messages.post.posts')}}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/post-comments*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('post.comments') }}">
                            <span class="menu-title {{ Request::is('admin/post-comments*') ? 'text-primary' : '' }}">{{ __('messages.post_comments')}}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu-item  sidebar-dropdown">
                <a class="menu-link {{ Request::is('admin/plans*','admin/transactions*') ? 'active' : '' }}"
                   href="{{ route('plans.index') }}">
                                                            <span class="menu-icon">
                                                     <i class="fab fa-bandcamp"></i>
                                                          </span>
                    <span class="menu-title">{{ __('messages.plan.subscriptions') }}</span>
                    <span class="d-none">{{ __('messages.subscriptions_plans') }}</span>
                    <span class="d-none">{{ __('messages.transactions') }}</span>
                </a>
                <ul class="ps-md-0 hoverable-dropdown list-unstyled shadow">
                    <li class="{{ Request::is('admin/plans*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('plans.index') }}">
                            <span class="menu-title {{ Request::is('admin/plans*') ? 'text-primary' : '' }}">{{ __('messages.subscriptions_plans') }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/transactions*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('transactions.index') }}">
                            <span class="menu-title {{ Request::is('admin/transactions*') ? 'text-primary' : '' }}">{{ __('messages.transactions') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu-item sidebar-dropdown">
                <a class="menu-link {{ Request::is('admin/subscribers*') ? 'active' : '' }}"
                   href="{{ route('subscribers.index') }}">
                                                            <span class="menu-icon">
                                                     <i class="fas fa-bell"></i>
                                                          </span>
                    <span class="menu-title">{{ __('messages.subscribers') }}</span>
                </a>
            </div>
            <div class="menu-item sidebar-dropdown">
                <a class="menu-link {{ Request::is('admin/countries*','admin/states*','admin/cities*') ? 'active' : '' }}"
                   href="{{ route('countries.index') }}">
                                                            <span class="menu-icon">
                                                   <i class="fas fa-globe-americas"></i>
                                                          </span>
                    <span class="menu-title">{{ __('messages.country.countries') }}</span>
                    <span class="d-none">{{ __('messages.state.states') }}</span>
                    <span class="d-none">{{ __('messages.city.cities') }}</span>
                </a>
                <ul class="ps-md-0 hoverable-dropdown list-unstyled shadow">
                    <li class="{{ Request::is('admin/countries*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('countries.index') }}">
                            <span class="menu-title {{ Request::is('admin/countries*') ? 'text-primary' : '' }}">{{ __('messages.country.countries')  }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/states*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('states.index') }}">
                            <span class="menu-title {{ Request::is('admin/states*') ? 'text-primary' : '' }}">{{ __('messages.state.states')  }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/cities*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('cities.index') }}">
                            <span class="menu-title {{ Request::is('admin/cities*') ? 'text-primary' : '' }}">{{ __('messages.city.cities')  }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu-item  sidebar-dropdown">
                <a class="menu-link {{ Request::is('admin/marital-status*','admin/skills*','admin/salary-periods*','admin/industries*','admin/company-sizes*','admin/functional-area*','admin/career-levels*','admin/salary-currencies*','admin/ownership-types*','admin/languages*') ? 'active' : '' }}"
                   href="{{ route('maritalStatus.index') }}">
                                                            <span class="menu-icon">
                                                  <i class="fas fa-life-ring"></i>
                                                          </span>
                    <span class="menu-title">{{ __('messages.general') }}</span>
                    <span class="d-none">{{ __('messages.marital_statuses') }}</span>
                    <span class="d-none">{{ __('messages.skills') }}</span>
                    <span class="d-none">{{ __('messages.salary_periods') }}</span>
                    <span class="d-none">{{ __('messages.industries') }}</span>
                    <span class="d-none">{{ __('messages.company_sizes') }}</span>
                    <span class="d-none">{{ __('messages.functional_areas') }}</span>
                    <span class="d-none">{{ __('messages.career_levels') }}</span>
                    <span class="d-none">{{ __('messages.salary_currencies') }}</span>
                    <span class="d-none">{{ __('messages.ownership_types') }}</span>
                    <span class="d-none">{{ __('messages.languages') }}</span>
                </a>
                <ul class="ps-md-0 hoverable-dropdown list-unstyled shadow">
                    <li class="{{ Request::is('admin/marital-status*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('maritalStatus.index') }}">
                            <span class="menu-title {{ Request::is('admin/marital-status*') ? 'text-primary' : '' }}">{{ __('messages.marital_statuses')  }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/skills*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('skills.index') }}">
                            <span class="menu-title {{ Request::is('admin/skills*') ? 'text-primary' : '' }}">{{ __('messages.skills')  }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/salary-periods*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('salaryPeriod.index') }}">
                            <span class="menu-title {{ Request::is('admin/salary-periods*') ? 'text-primary' : '' }}">{{ __('messages.salary_periods')  }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/industries*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('industry.index') }}">
                            <span class="menu-title {{ Request::is('admin/industries*') ? 'text-primary' : '' }}">{{ __('messages.industries')  }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/company-sizes*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('companySize.index') }}">
                            <span class="menu-title {{ Request::is('admin/company-sizes*') ? 'text-primary' : '' }}">{{ __('messages.company_sizes')  }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/functional-area*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('functionalArea.index') }}">
                            <span class="menu-title {{ Request::is('admin/functional-area*') ? 'text-primary' : '' }}">{{ __('messages.functional_areas')  }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/career-levels*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('careerLevel.index') }}">
                            <span class="menu-title {{ Request::is('admin/career-levels*') ? 'text-primary' : '' }}">{{ __('messages.career_levels')  }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/salary-currencies*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('salaryCurrency.index') }}">
                            <span class="menu-title {{ Request::is('admin/salary-currencies*') ? 'text-primary' : '' }}">{{ __('messages.salary_currencies')  }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/ownership-types*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('ownerShipType.index') }}">
                            <span class="menu-title {{ Request::is('admin/ownership-types*') ? 'text-primary' : '' }}">{{ __('messages.ownership_types') }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/languages*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('languages.index') }}">
                            <span class="menu-title {{ Request::is('admin/languages*') ? 'text-primary' : '' }}">{{ __('messages.languages')  }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu-item sidebar-dropdown">
                <a class="menu-link {{ Request::is('admin/noticeboards*','admin/faqs*','admin/inquires*','admin/notification-settings*','admin/privacy-policy*','admin/front-settings*','admin/translation-manager*','admin/email-template*','admin/settings*') ? 'active' : '' }}"
                   href="{{ route('noticeboards.index') }}">
                                                            <span class="menu-icon">
                                                      <i class="fas fa-sticky-note"></i>
                                                          </span>
                    <span class="menu-title">{{ __('messages.cms') }}</span>
                    <span class="d-none">{{ __('messages.noticeboards') }}</span>
                    <span class="d-none">{{ __('messages.faq.faq') }}</span>
                    <span class="d-none">{{ __('messages.inquires') }}</span>
                    <span class="d-none">{{ __('messages.setting.notification_settings') }}</span>
                    <span class="d-none">{{ __('messages.setting.privacy_policy') }}</span>
                    <span class="d-none">{{ __('messages.setting.front_settings') }}</span>
                    <span class="d-none">{{ __('messages.translation_manager') }}</span>
                    <span class="d-none">{{ __('messages.email_templates') }}</span>
                    <span class="d-none">{{ __('messages.settings') }}</span>
                </a>
                <ul class="ps-md-0 hoverable-dropdown list-unstyled shadow">
                    <li class="{{ Request::is('admin/noticeboards*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('noticeboards.index') }}">
                            <span class="menu-title {{ Request::is('admin/noticeboards*') ? 'text-primary' : '' }}">{{ __('messages.noticeboards')  }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/faqs*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('faqs.index') }}">
                            <span class="menu-title {{ Request::is('admin/faqs*') ? 'text-primary' : '' }}">{{ __('messages.faq.faq')  }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/inquires*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('inquires.index') }}">
                            <span class="menu-title {{ Request::is('admin/inquires*') ? 'text-primary' : '' }}">{{ __('messages.inquires')  }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/notification-settings*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('notification.settings.index') }}">
                            <span class="menu-title {{ Request::is('admin/notification-settings*') ? 'text-primary' : '' }}">{{ __('messages.setting.notification_settings') }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/privacy-policy*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('privacy.policy.index') }}">
                            <span class="menu-title {{ Request::is('admin/privacy-policy*') ? 'text-primary' : '' }}">{{ __('messages.setting.privacy_policy')  }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/front-settings*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('front.settings.index') }}">
                            <span class="menu-title {{ Request::is('admin/front-settings*') ? 'text-primary' : '' }}">{{ __('messages.setting.front_settings')  }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/translation-manager*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('translation-manager.index') }}">
                            <span class="menu-title {{ Request::is('admin/translation-manager*') ? 'text-primary' : '' }}">{{  __('messages.translation_manager') }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/email-template*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('email.template.index') }}">
                            <span class="menu-title {{ Request::is('admin/email-template*') ? 'text-primary' : '' }}">{{ __('messages.email_templates')  }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/settings*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('settings.index') }}">
                            <span class="menu-title {{ Request::is('admin/settings*') ? 'text-primary' : '' }}">{{ __('messages.settings') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu-item sidebar-dropdown">
                <a class="menu-link {{ Request::is('admin/testimonials*','admin/branding-sliders*','admin/header-sliders*','admin/image-sliders*') ? 'active' : '' }}"
                   href="{{ route('testimonials.index') }}">
                                                            <span class="menu-icon">
                                                      <i class="fas fa-sticky-note"></i>
                                                          </span>
                    <span class="menu-title">{{ __('messages.cms_sliders') }}</span>
                    <span class="d-none">{{ __('messages.testimonials') }}</span>
                    <span class="d-none">{{ __('messages.branding_sliders') }}</span>
                    <span class="d-none">{{ __('messages.header_sliders') }}</span>
                    <span class="d-none">{{ __('messages.image_sliders') }}</span>

                </a>
                <ul class="ps-md-0 hoverable-dropdown list-unstyled shadow">
                    <li class="{{ Request::is('admin/testimonials*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('testimonials.index') }}">
                            <span class="menu-title {{ Request::is('admin/testimonials*') ? 'text-primary' : '' }}">{{ __('messages.testimonials')  }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/branding-sliders*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('branding.sliders.index') }}">
                            <span class="menu-title {{ Request::is('admin/branding-sliders*') ? 'text-primary' : '' }}">{{ __('messages.branding_sliders') }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/header-sliders*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('header.sliders.index') }}">
                            <span class="menu-title {{ Request::is('admin/header-sliders*') ? 'text-primary' : '' }}">{{ __('messages.header_sliders')   }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/image-sliders*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('image-sliders.index') }}">
                            <span class="menu-title {{ Request::is('admin/image-sliders*') ? 'text-primary' : '' }}">{{ __('messages.image_sliders')  }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu-item sidebar-dropdown">
                <a class="menu-link {{ Request::is('admin/cms-services*','admin/cms-about-us*') ? 'active' : '' }}"
                   href="{{ route('cms.services.index') }}">
                                                            <span class="menu-icon">
                                                       <i class="fas fa-sticky-note"></i>
                                                          </span>
                    <span class="menu-title">{{ __('messages.front_cms') }}</span>
                    <span class="d-none">{{ __('messages.cms_services') }}</span>
                    <span class="d-none">{{ __('messages.about_us_services') }}</span>

                </a>
                <ul class="ps-md-0 hoverable-dropdown list-unstyled shadow">
                    <li class="{{ Request::is('admin/cms-services*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('cms.services.index') }}">
                            <span class="menu-title {{ Request::is('admin/cms-services*') ? 'text-primary' : '' }}">{{ __('messages.cms_services')   }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/cms-about-us*') ? 'menu-li-hover-color' : '' }}">
                        <a class="menu-link py-3" href="{{ route('cms.about-us.service') }}">
                            <span class="menu-title {{ Request::is('admin/cms-about-us*') ? 'text-primary' : '' }}">{{ __('messages.about_us_services')}}</span>
                        </a>
                    </li>
                    </ul>
            </div>
            <div class="menu-item ">
                <a class="menu-link {{ Request::is('admin/notice-boards*') ? 'active' : '' }}"
                   href="{{ route('admin-notice-boards.index') }}">
                   <span class="menu-icon"> <i class="fas fa-sticky-note"></i></span>
                    <span class="menu-title">{{ __('messages.notice_board') }}</span>
                </a>
              </div>
              {{-- <div class="menu-item ">
                <a class="menu-link {{ Request::is('admin/noticeboards*') ? 'active' : '' }}"
                   href="{{ route('noticeboards.index') }}">
                   <span class="menu-icon"> <i class="fas fa-sticky-note"></i></span>
                    <span class="menu-title">{{ __('messages.notice_board') }}</span>
                </a>
              </div> --}}
        </div>
    </div>
</div>

