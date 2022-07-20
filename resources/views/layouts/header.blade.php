@php($notifications = getNotification(\App\Models\Notification::ADMIN))
@php($notificationCount = $notifications->count())
<div id="kt_header" style="" class="header align-items-stretch">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <!--begin::Menu wrapper-->
                <div class="header-menu align-items-stretch {{ (!Request::is('admin/dashboard*')) ? 'd-none' : '' }}"
                     data-kt-drawer="true" data-kt-drawer-name="header-menu"
                     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                     data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                     data-kt-swapper-mode="prepend"
                     data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <!--begin::Menu-->
                    <div
                        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item me-lg-1 {{ Request::is('admin/dashboard*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('admin.dashboard')}}">
                                <span class="menu-title">{{ __('messages.dashboard') }}</span>
                            </a>
                        </div>

                    </div>
                    <!--end::Menu-->
                </div>
                <div
                    class="header-menu align-items-stretch {{ (!Request::is('admin/companies*','admin/reported-company*')) ? 'd-none' : '' }}"
                    data-kt-drawer="true" data-kt-drawer-name="header-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <div
                        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item me-lg-1 {{ Request::is('admin/companies*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('company.index')}}">
                                <span class="menu-title">{{ __('messages.employers') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/reported-company*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('reported.companies')}}">
                                <span class="menu-title">{{ __('messages.company.reported_employers') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="header-menu align-items-stretch {{ (!Request::is('admin/candidates*','admin/required-degree-level*','admin/reported-candidate*','admin/resumes*','admin/selected-candidate*')) ? 'd-none' : '' }}"
                    data-kt-drawer="true" data-kt-drawer-name="header-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <div
                        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item me-lg-1 {{ Request::is('admin/candidates*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('candidates.index')}}">
                                <span class="menu-title">{{ __('messages.candidates') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/required-degree-level*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{ route('requiredDegreeLevel.index') }}">
                                <span class="menu-title">{{ __('messages.required_degree_levels') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/reported-candidate*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{ route('reported.candidates') }}">
                                <span class="menu-title">{{ __('messages.candidate.reported_candidates') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/resumes*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{ route('resumes.index') }}">
                                <span class="menu-title">{{ __('messages.all_resumes') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/selected-candidate*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{ route('selected.candidate') }}">
                                <span class="menu-title">{{ __('messages.selected_candidate') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="header-menu align-items-stretch {{ (!Request::is('admin/jobs*','admin/job-published*','admin/job-categories*','admin/job-types*','admin/job-tags*','admin/job-shifts*','admin/reported-jobs*','admin/job-notification*','admin/job-expired*')) ? 'd-none' : '' }}"
                    data-kt-drawer="true" data-kt-drawer-name="header-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <div
                        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item me-lg-1 {{ Request::is('admin/jobs*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('admin.jobs.index')}}">
                                <span class="menu-title">{{ __('messages.jobs') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/job-published*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{ route('admin.job-published.index') }}">
                                <span class="menu-title">{{ __('messages.job_published') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/job-categories*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{ route('job-categories.index') }}">
                                <span class="menu-title">{{ __('messages.job_categories') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/job-types*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{ route('jobType.index') }}">
                                <span class="menu-title">{{ __('messages.job_types') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/job-tags*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{ route('jobTag.index') }}">
                                <span class="menu-title">{{ __('messages.job_tags') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/job-shifts*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{ route('jobShift.index') }}">
                                <span class="menu-title">{{ __('messages.job_shifts') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/reported-jobs*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{ route('reported.jobs') }}">
                                <span class="menu-title">{{ __('messages.reported_jobs') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/job-notification*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{ route('job-notification.index') }}">
                                <span class="menu-title">{{ __('messages.job_notification.job_notifications') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/job-expired*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{ route('admin.jobs.expiredJobs') }}">
                                <span class="menu-title">{{ __('messages.expired_jobs') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="header-menu align-items-stretch {{ (!Request::is('admin/post-categories*','admin/posts*','admin/post-comments*')) ? 'd-none' : '' }}"
                    data-kt-drawer="true" data-kt-drawer-name="header-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <div
                        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item me-lg-1 {{ Request::is('admin/post-categories*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('post-categories.index')}}">
                                <span class="menu-title">{{ __('messages.post_category.post_categories') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/posts*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{ route('posts.index') }}">
                                <span class="menu-title">{{ __('messages.post.posts') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/post-comments*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{ route('post.comments') }}">
                                <span class="menu-title">{{ __('messages.post_comments') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="header-menu align-items-stretch {{ (!Request::is('admin/plans*','admin/transactions*')) ? 'd-none' : '' }}"
                    data-kt-drawer="true" data-kt-drawer-name="header-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <div
                        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item me-lg-1 {{ Request::is('admin/plans*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('plans.index')}}">
                                <span class="menu-title">{{ __('messages.subscriptions_plans') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/transactions*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{ route('transactions.index') }}">
                                <span class="menu-title">{{ __('messages.transactions') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="header-menu align-items-stretch {{ (!Request::is('admin/subscribers*')) ? 'd-none' : '' }}"
                    data-kt-drawer="true" data-kt-drawer-name="header-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <div
                        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item me-lg-1 {{ Request::is('admin/subscribers*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('subscribers.index')}}">
                                <span class="menu-title">{{ __('messages.subscribers') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="header-menu align-items-stretch {{ (!Request::is('admin/countries*','admin/states*','admin/cities*')) ? 'd-none' : '' }}"
                    data-kt-drawer="true" data-kt-drawer-name="header-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <div
                        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item me-lg-1 {{ Request::is('admin/countries*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('countries.index')}}">
                                <span class="menu-title">{{ __('messages.country.countries') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/states*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('states.index')}}">
                                <span class="menu-title">{{ __('messages.state.states') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/cities*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('cities.index')}}">
                                <span class="menu-title">{{ __('messages.city.cities') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="header-menu align-items-stretch {{ (!Request::is('admin/marital-status*','admin/skills*','admin/salary-periods*','admin/industries*','admin/company-sizes*','admin/functional-area*','admin/career-levels*','admin/salary-currencies*','admin/ownership-types*','admin/languages*')) ? 'd-none' : '' }}"
                    data-kt-drawer="true" data-kt-drawer-name="header-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <div
                        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item me-lg-1 {{ Request::is('admin/marital-status*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('maritalStatus.index')}}">
                                <span class="menu-title">{{ __('messages.marital_statuses') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/skills*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('skills.index')}}">
                                <span class="menu-title">{{ __('messages.skills') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/salary-periods*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('salaryPeriod.index')}}">
                                <span class="menu-title">{{ __('messages.salary_periods') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/industries*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('industry.index')}}">
                                <span class="menu-title">{{ __('messages.industries') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/company-sizes*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('companySize.index')}}">
                                <span class="menu-title">{{ __('messages.company_sizes') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/functional-area*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('functionalArea.index')}}">
                                <span class="menu-title">{{ __('messages.functional_areas') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/career-levels*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('careerLevel.index')}}">
                                <span class="menu-title">{{ __('messages.career_levels') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/salary-currencies*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('salaryCurrency.index')}}">
                                <span class="menu-title">{{ __('messages.salary_currencies') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/ownership-types*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('ownerShipType.index')}}">
                                <span class="menu-title">{{ __('messages.ownership_types') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/languages*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('languages.index')}}">
                                <span class="menu-title">{{ __('messages.languages') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="header-menu align-items-stretch {{ (!Request::is('admin/noticeboards*','admin/faqs*','admin/inquires*','admin/notification-settings*','admin/privacy-policy*','admin/front-settings*','admin/translation-manager*','admin/email-template*','admin/settings*')) ? 'd-none' : '' }}"
                    data-kt-drawer="true" data-kt-drawer-name="header-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <div
                        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item me-lg-1 {{ Request::is('admin/noticeboards*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('noticeboards.index')}}">
                                <span class="menu-title">{{ __('messages.noticeboards') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/faqs*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('faqs.index')}}">
                                <span class="menu-title">{{ __('messages.faq.faq') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/inquires*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('inquires.index')}}">
                                <span class="menu-title">{{ __('messages.inquires') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/notification-settings*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('notification.settings.index')}}">
                                <span class="menu-title">{{ __('messages.setting.notification_settings') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/privacy-policy*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('privacy.policy.index')}}">
                                <span class="menu-title">{{ __('messages.setting.privacy_policy') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/front-settings*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('front.settings.index')}}">
                                <span class="menu-title">{{ __('messages.setting.front_settings') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/translation-manager*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('translation-manager.index')}}">
                                <span class="menu-title">{{ __('messages.translation_manager') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/email-template*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('email.template.index')}}">
                                <span class="menu-title">{{ __('messages.email_templates') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/settings*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('settings.index')}}">
                                <span class="menu-title">{{ __('messages.settings') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                        class="header-menu align-items-stretch {{ (!Request::is('admin/testimonials*','admin/branding-sliders*','admin/header-sliders*','admin/image-sliders*')) ? 'd-none' : '' }}"
                        data-kt-drawer="true" data-kt-drawer-name="header-menu"
                        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                        data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                        data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                        data-kt-swapper-mode="prepend"
                        data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <div
                            class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                            id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item me-lg-1 {{ Request::is('admin/testimonials*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('testimonials.index')}}">
                                <span class="menu-title">{{ __('messages.testimonials') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/branding-sliders*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('branding.sliders.index')}}">
                                <span class="menu-title">{{ __('messages.branding_sliders') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/header-sliders*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('header.sliders.index')}}">
                                <span class="menu-title">{{ __('messages.header_sliders') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/image-sliders*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('image-sliders.index')}}">
                                <span class="menu-title">{{ __('messages.image_sliders') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="header-menu align-items-stretch {{ (!Request::is('admin/cms-services*','admin/cms-about-us*')) ? 'd-none' : '' }}"
                    data-kt-drawer="true" data-kt-drawer-name="header-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <div
                        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item me-lg-1 {{ Request::is('admin/cms-services*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('cms.services.index')}}">
                                <span class="menu-title">{{ __('messages.cms_services') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1 {{ Request::is('admin/cms-about-us*') ? 'show' : '' }}">
                            <a class="menu-link py-3" href="{{route('cms.about-us.service')}}">
                                <span class="menu-title">{{ __('messages.about_us_services') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!--end::Menu wrapper-->
            </div>
            <!--end::Navbar-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                <div class="d-flex align-items-stretch flex-shrink-0">
                    <div class="d-flex align-items-center ms-1 ms-lg-3">
                        <div class="d-flex align-items-stretch">
                            <div class="topbar-item position-relative p-8 d-flex align-items-center hoverable"
                                 data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
                                 data-kt-menu-flip="bottom">
                                <i class="far fa-bell fs-3"></i>
                                    <span
                                        class="badge bg-primary badge-circle position-absolute notification-count translate-middle d-flex justify-content-center align-items-center end-0"
                                        id="counter">{{ ($notificationCount) }}</span>
                            </div>
                            <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px overflow-auto h-400px"
                                 data-kt-menu="true">
                                <div class="d-flex justify-content-between bgi-no-repeat rounded-top sticky-top"
                                     style="background-color:#009ef7;">
                                    <h3 class="text-white fw-bold px-9 mt-7 mb-5">{{__('messages.notification.notifications')}}</h3>
                                @if($notificationCount > 0)
                                    <span class="mt-5 mb-5 px-5">
                                    <a href="#" class="read-all-notification btn btn-sm btn-success text-white" id="readAllNotification">
                                    {{ __('messages.notification.mark_all_as_read') }}</a>
                                    </span>
                                    @endif
                                </div>
                                <div class="dropdown-list-content dropdown-list-icons force-scroll">
                                    @if($notificationCount > 0)
                                        @foreach($notifications as $notification)
                                            <a href="#" data-id="{{ $notification->id }}"
                                               class="readNotification text-hover-primary" id="readNotification">
                                                <div class="scroll-y mh-325px my-5 px-5">
                                                    <div class="d-flex flex-stack py-4">
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-35px me-4">
                                                <span class="symbol-label bg-light-primary">
                                                  <i class="{{ getNotificationIcon($notification->type) }}"></i>
                                                </span>
                                                            </div>
                                                            <div class="mb-0 me-2 text-hover-primary">
                                                                <span class="fs-6 text-gray-800 fw-bold text-hover-primary">{{ $notification->title }}</span>
                                                            </div>
                                                        </div>
                                                        <span class="badge badge-light fs-8">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans(null, true)}}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    @else
                                        <div class="empty-state fs-6 text-gray-800 fw-bold text-center mt-5" data-height="400">
                                            <p>{{ __('messages.notification.empty_notifications') }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="empty-state empty-notification d-none fs-6 text-gray-800 fw-bold text-center mt-5"
                                     data-height="400">
                                    <p>{{ __('messages.notification.empty_notifications') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--begin::User-->
                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                        <!--begin::Menu wrapper-->
                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
                             data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                            <img src="{{ getLoggedInUser()->avatar }}" class="object-fit-cover" alt="user"/>
                        </div>
                        <!--begin::Menu-->
                        <div
                            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                        <img alt="Logo" src="{{ getLoggedInUser()->avatar }}"/>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                        <div
                                            class="fw-bolder d-flex align-items-center fs-5">{{\Illuminate\Support\Facades\Auth::user()->full_name}}</div>
                                        <a class="fw-bold text-muted text-hover-primary fs-7">{{\Illuminate\Support\Facades\Auth::user()->email}}</a>
                                    </div>
                                    <!--end::Username-->
                                </div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="javascript:void(0)" class="menu-link px-5 editProfileModal"
                                   data-id="{{ getLoggedInUserId() }}"><i
                                        class="fa fa-user me-2"></i>{{ __('messages.user.edit_profile') }}</a>
                            </div>
                            <div class="menu-item px-5">
                                <a href="javascript:void(0)" class="menu-link px-5 changePasswordModal"
                                   data-id="{{ getLoggedInUserId() }}"><i
                                        class="fa fa-lock me-2"> </i>{{ (Str::limit(__('messages.user.change_password'),20,'...')) }}
                                </a>
                            </div>
                            <div class="menu-item px-5">
                                <a href="javascript:void(0)" class="menu-link px-5 changeLanguageModal"
                                   data-id="{{ getLoggedInUserId() }}"><i
                                        class="fa fa-language me-2"> </i>{{ (Str::limit(__('messages.user_language.change_language'),20,'...')) }}
                                </a>
                            </div>
                            <div class="menu-item px-5">
                                <a href="{{ url('logout') }}" class="menu-link px-5"
                                   onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i> {{ __('messages.user.logout') }}</a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::User -->
                    <!--begin::Heaeder menu toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
                        <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                             id="kt_header_menu_mobile_toggle">
                            <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
                            <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
                            fill="black"/>
                        <path opacity="0.3"
                              d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z"
                              fill="black"/>
                    </svg>
                </span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end::Heaeder menu toggle-->
                </div>
                <!--end::Toolbar wrapper-->
            </div>
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>

{{--<div class="toolbar" id="kt_toolbar">--}}
{{--    <!--begin::Container-->--}}
{{--    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">--}}
{{--        <!--begin::Page title-->--}}
{{--        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">--}}
{{--            <!--begin::Title-->--}}
{{--            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Tables</h1>--}}
{{--            <!--end::Title-->--}}
{{--            <!--begin::Separator-->--}}
{{--            <span class="h-20px border-gray-200 border-start mx-4"></span>--}}
{{--            <!--end::Separator-->--}}
{{--            <!--begin::Breadcrumb-->--}}
{{--            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">--}}
{{--                <!--begin::Item-->--}}
{{--                <li class="breadcrumb-item text-muted">--}}
{{--                    <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>--}}
{{--                </li>--}}
{{--                <!--end::Item-->--}}
{{--                <!--begin::Item-->--}}
{{--                <li class="breadcrumb-item">--}}
{{--                    <span class="bullet bg-gray-200 w-5px h-2px"></span>--}}
{{--                </li>--}}
{{--                <!--end::Item-->--}}
{{--                <!--begin::Item-->--}}
{{--                <li class="breadcrumb-item text-muted">Widgets</li>--}}
{{--                <!--end::Item-->--}}
{{--                <!--begin::Item-->--}}
{{--                <li class="breadcrumb-item">--}}
{{--                    <span class="bullet bg-gray-200 w-5px h-2px"></span>--}}
{{--                </li>--}}
{{--                <!--end::Item-->--}}
{{--                <!--begin::Item-->--}}
{{--                <li class="breadcrumb-item text-dark">Tables</li>--}}
{{--                <!--end::Item-->--}}
{{--            </ul>--}}
{{--            <!--end::Breadcrumb-->--}}
{{--        </div>--}}
{{--        <!--end::Page title-->--}}
{{--        <!--begin::Actions-->--}}
{{--        <div class="d-flex align-items-center py-1">--}}
{{--            <!--begin::Wrapper-->--}}
{{--            <div class="me-4">--}}
{{--                <!--begin::Menu-->--}}
{{--                <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">--}}
{{--                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->--}}
{{--                    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">--}}
{{--											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
{{--												<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />--}}
{{--											</svg>--}}
{{--										</span>--}}
{{--                    <!--end::Svg Icon-->Filter</a>--}}
{{--                <!--begin::Menu 1-->--}}
{{--                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_618d2f6a56518">--}}
{{--                    <!--begin::Header-->--}}
{{--                    <div class="px-7 py-5">--}}
{{--                        <div class="fs-5 text-dark fw-bolder">Filter Options</div>--}}
{{--                    </div>--}}
{{--                    <!--end::Header-->--}}
{{--                    <!--begin::Menu separator-->--}}
{{--                    <div class="separator border-gray-200"></div>--}}
{{--                    <!--end::Menu separator-->--}}
{{--                    <!--begin::Form-->--}}
{{--                    <div class="px-7 py-5">--}}
{{--                        <!--begin::Input group-->--}}
{{--                        <div class="mb-10">--}}
{{--                            <!--begin::Label-->--}}
{{--                            <label class="form-label fw-bold">Status:</label>--}}
{{--                            <!--end::Label-->--}}
{{--                            <!--begin::Input-->--}}
{{--                            <div>--}}
{{--                                <select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_618d2f6a56518" data-allow-clear="true">--}}
{{--                                    <option></option>--}}
{{--                                    <option value="1">Approved</option>--}}
{{--                                    <option value="2">Pending</option>--}}
{{--                                    <option value="2">In Process</option>--}}
{{--                                    <option value="2">Rejected</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <!--end::Input-->--}}
{{--                        </div>--}}
{{--                        <!--end::Input group-->--}}
{{--                        <!--begin::Input group-->--}}
{{--                        <div class="mb-10">--}}
{{--                            <!--begin::Label-->--}}
{{--                            <label class="form-label fw-bold">Member Type:</label>--}}
{{--                            <!--end::Label-->--}}
{{--                            <!--begin::Options-->--}}
{{--                            <div class="d-flex">--}}
{{--                                <!--begin::Options-->--}}
{{--                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5">--}}
{{--                                    <input class="form-check-input" type="checkbox" value="1" />--}}
{{--                                    <span class="form-check-label">Author</span>--}}
{{--                                </label>--}}
{{--                                <!--end::Options-->--}}
{{--                                <!--begin::Options-->--}}
{{--                                <label class="form-check form-check-sm form-check-custom form-check-solid">--}}
{{--                                    <input class="form-check-input" type="checkbox" value="2" checked="checked" />--}}
{{--                                    <span class="form-check-label">Customer</span>--}}
{{--                                </label>--}}
{{--                                <!--end::Options-->--}}
{{--                            </div>--}}
{{--                            <!--end::Options-->--}}
{{--                        </div>--}}
{{--                        <!--end::Input group-->--}}
{{--                        <!--begin::Input group-->--}}
{{--                        <div class="mb-10">--}}
{{--                            <!--begin::Label-->--}}
{{--                            <label class="form-label fw-bold">Notifications:</label>--}}
{{--                            <!--end::Label-->--}}
{{--                            <!--begin::Switch-->--}}
{{--                            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">--}}
{{--                                <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />--}}
{{--                                <label class="form-check-label">Enabled</label>--}}
{{--                            </div>--}}
{{--                            <!--end::Switch-->--}}
{{--                        </div>--}}
{{--                        <!--end::Input group-->--}}
{{--                        <!--begin::Actions-->--}}
{{--                        <div class="d-flex justify-content-end">--}}
{{--                            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>--}}
{{--                            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>--}}
{{--                        </div>--}}
{{--                        <!--end::Actions-->--}}
{{--                    </div>--}}
{{--                    <!--end::Form-->--}}
{{--                </div>--}}
{{--                <!--end::Menu 1-->--}}
{{--                <!--end::Menu-->--}}
{{--            </div>--}}
{{--            <!--end::Wrapper-->--}}
{{--            <!--begin::Button-->--}}
{{--            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">Create</a>--}}
{{--            <!--end::Button-->--}}
{{--        </div>--}}
{{--        <!--end::Actions-->--}}
{{--    </div>--}}
{{--    <!--end::Container-->--}}
{{--</div>--}}
