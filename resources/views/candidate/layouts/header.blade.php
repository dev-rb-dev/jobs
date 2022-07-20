{{--<div class="navbar-bg"></div>--}}
{{--<nav class="navbar navbar-expand-lg main-navbar mb-0 pb-0">--}}
{{--    <a href="{{ route('front.home') }}" class="navbar-brand sidebar-gone-hide">--}}
{{--        <img src="{{ getLogoUrl() }}" width="70px" class="navbar-brand-full"/>&nbsp;&nbsp--}}
{{--        {{ config('app.name') }}--}}
{{--    </a>--}}
{{--    <div class="navbar-nav">--}}
{{--        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>--}}
{{--    </div>--}}
{{--    @php($notifications = getNotification(\App\Models\Notification::CANDIDATE))--}}
{{--    <ul class="navbar-nav navbar-right ml-auto">--}}
{{--        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" title="{{ __('messages.notification.notifications') }}"--}}
{{--                                                     class="nav-link notification-toggle nav-link-lg {{ count($notifications) > 0 ? 'beep' : '' }}"><i--}}
{{--                        class="far fa-bell"></i></a>--}}
{{--            <div class="dropdown-menu dropdown-list dropdown-menu-right">--}}
{{--                <div class="dropdown-header">{{ __('messages.notification.notifications') }}--}}
{{--                    <div class="float-right">--}}
{{--                        @if(count($notifications) > 0)--}}
{{--                            <a href="#" id="readAllNotification">{{ __('messages.notification.mark_all_as_read') }}--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="dropdown-list-content dropdown-list-icons notification-content">--}}
{{--                    @if(count($notifications) > 0)--}}
{{--                        @foreach($notifications as $notification)--}}
{{--                            <a href="#" data-id="{{ $notification->id }}"--}}
{{--                               class="dropdown-item dropdown-item-unread readNotification" id="readNotification">--}}
{{--                                <div class="dropdown-item-icon bg-primary text-white d-flex justify-content-center align-items-center">--}}
{{--                                    <i class="{{ getNotificationIcon($notification->type) }}"></i>--}}
{{--                                </div>--}}
{{--                                <div class="dropdown-item-desc">--}}
{{--                                    {{ $notification->title }}--}}
{{--                                    <div class="time text-primary"><span--}}
{{--                                                class="time notification-for-text badge badge-primary">&nbsp;{{ $notification->notification_for_text }}&nbsp;</span> {{ $notification->created_at->diffForHumans() }}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        @endforeach--}}
{{--                    @else--}}
{{--                        <div class="empty-state" data-height="250" style="height: 400px;">--}}
{{--                            <div class="empty-state-icon">--}}
{{--                                <i class="fas fa-question"></i>--}}
{{--                            </div>--}}
{{--                            <h2>{{ __('messages.notification.empty_notifications') }}</h2>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <div class="empty-state d-none" data-height="250" style="height: 400px;">--}}
{{--                        <div class="empty-state-icon">--}}
{{--                            <i class="fas fa-question"></i>--}}
{{--                        </div>--}}
{{--                        <h2>{{ __('messages.notification.empty_notifications') }}</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        @if(\Illuminate\Support\Facades\Auth::user())--}}
{{--            <li class="dropdown">--}}
{{--                <a href="#" data-toggle="dropdown"--}}
{{--                   class="nav-link dropdown-toggle nav-link-lg nav-link-user">--}}
{{--                    <img alt="image" src="{{ getLoggedInUser()->avatar }}"--}}
{{--                         class="rounded-circle mr-1 user-thumbnail image-stretching">--}}
{{--                    <div class="d-sm-none d-lg-inline-block">--}}
{{--                        {{ __('messages.common.hi') }}, {{\Illuminate\Support\Facades\Auth::user()->first_name}}</div>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-right profile-drp">--}}
{{--                    <div class="dropdown-title">--}}
{{--                        {{ __('messages.common.welcome') }}--}}
{{--                        , {{\Illuminate\Support\Facades\Auth::user()->full_name}}</div>--}}
{{--                    <a class="dropdown-item has-icon editProfileModal" href="#" data-id="{{ getLoggedInUserId() }}">--}}
{{--                        <i class="fa fa-user"></i>{{ __('messages.user.edit_profile') }}</a>--}}
{{--                    <a class="dropdown-item has-icon" href="{{ route('front.home') }}">--}}
{{--                        <i class="fa fa-home"></i>{{ __('messages.go_to_homepage') }}</a>--}}
{{--                    <a class="dropdown-item has-icon changePasswordModal" href="#"--}}
{{--                       data-id="{{ getLoggedInUserId() }}"><i--}}
{{--                                class="fa fa-lock"> </i>{{ (Str::limit(__('messages.user.change_password'),20,'...')) }}--}}
{{--                    </a>--}}
{{--                    <a class="dropdown-item has-icon changeLanguageModal" href="#"--}}
{{--                       data-id="{{ getLoggedInUserId() }}"><i--}}
{{--                                class="fa fa-language"> </i>{{ (Str::limit(__('messages.user_language.change_language'),20,'...')) }}--}}
{{--                    </a>--}}
{{--                    <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"--}}
{{--                       onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">--}}
{{--                        <i class="fas fa-sign-out-alt"></i> {{ __('messages.user.logout') }}--}}
{{--                    </a>--}}
{{--                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">--}}
{{--                        {{ csrf_field() }}--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--        @else--}}
{{--            <li class="dropdown"><a href="#" data-toggle="dropdown"--}}
{{--                                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">--}}
{{--                                    <img alt="image" src="#" class="rounded-circle mr-1">--}}
{{--                    <div class="d-sm-none d-lg-inline-block">{{ __('messages.common.hello') }}</div>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                    <div class="dropdown-title">{{ __('messages.common.login') }}--}}
{{--                        / {{ __('messages.common.register') }}</div>--}}
{{--                    <a href="{{ route('login') }}" class="dropdown-item has-icon">--}}
{{--                        <i class="fas fa-sign-in-alt"></i> {{ __('messages.common.login') }}--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="{{ route('register') }}" class="dropdown-item has-icon">--}}
{{--                        <i class="fas fa-user-plus"></i> {{ __('messages.common.register') }}--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--        @endif--}}
{{--    </ul>--}}
{{--</nav>--}}
{{--<nav class="navbar navbar-secondary navbar-expand-lg">--}}
{{--    <div class="container">--}}
{{--        <ul class="navbar-nav">--}}

{{--            <li class="nav-item {{ Request::is('candidate/dashboard*') ? 'active' : ''}}">--}}
{{--                <a href="{{ route('dashboard') }}"--}}
{{--                   class="nav-link {{ Request::is('candidate/dashboard*') ? 'active' : ''}}">--}}
{{--                    <i class="fab fa-dashcube"></i>--}}
{{--                    <span>{{ __('messages.candidate.dashboard') }}</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ Request::is('candidate/profile*') ? 'active' : ''}}">--}}
{{--                <a href="{{ route('candidate.profile') }}"--}}
{{--                   class="nav-link {{ Request::is('candidate/profile*') ? 'active' : ''}}">--}}
{{--                    <i class="far fa-user-circle"></i>--}}
{{--                    <span>{{ __('messages.profile') }}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ Request::is('candidate/favourite-jobs*') ? 'active' : ''}}">--}}
{{--                <a href="{{ route('favourite.jobs') }}"--}}
{{--                   class="nav-link {{ Request::is('candidate/favourite-jobs*') ? 'active' : ''}}">--}}
{{--                    <i class="far fa-star"></i>--}}
{{--                    <span>{{ __('messages.favourite_jobs') }}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ Request::is('candidate/favourite-companies*') ? 'active' : ''}}">--}}
{{--                <a href="{{ route('favourite.companies') }}"--}}
{{--                   class="nav-link {{ Request::is('candidate/favourite-companies*') ? 'active' : ''}}">--}}
{{--                    <i class="far fa-building"></i>--}}
{{--                    <span>{{ __('messages.favourite_companies') }}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ Request::is('candidate/applied-job*') ? 'active' : ''}}">--}}
{{--                <a href="{{ route('candidate.applied.job') }}"--}}
{{--                   class="nav-link {{ Request::is('candidate/applied-job*') ? 'active' : ''}}">--}}
{{--                    <i class="fas fa-briefcase"></i>--}}
{{--                    <span>{{ __('messages.applied_job.applied_jobs') }}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ Request::is('candidate/job-alert*') ? 'active' : ''}}">--}}
{{--                <a href="{{ route('candidate.job.alert') }}"--}}
{{--                   class="nav-link {{ Request::is('candidate/job-alert*') ? 'active' : ''}}">--}}
{{--                    <i class="far fa-bell"></i>--}}
{{--                    <span>{{ __('messages.job.job_alert') }}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</nav>--}}
@php($notifications = getNotification(\App\Models\Notification::CANDIDATE))
@php($notificationCount = $notifications->count())
<div id="kt_header" style="" class="header align-items-stretch">
    <!--begin::Container-->
    <div class="container-xxl d-flex align-items-stretch justify-content-between">
        <!--begin::Aside mobile toggle-->
        <!--end::Aside mobile toggle-->
        <!--begin::Logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
            <a href="{{ route('front.home') }}">
                <img alt="Logo" src="{{ getLogoUrl() }}" class="h-20px h-lg-30px"/>
                {{ config('app.name') }}
            </a>
        </div>
        <!--end::Logo-->
        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <!--begin::Menu wrapper-->
                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu"
                     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                     data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                     data-kt-swapper-mode="prepend"
                     data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <!--begin::Menu-->
                    <div
                        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item me-lg-1">
                            <a class="menu-link py-3 {{ Request::is('candidate/dashboard*') ? 'active' : ''}}"
                               href="{{ route('dashboard') }}">
                                <i class="fab fa-dashcube me-2 {{ Request::is('candidate/dashboard*') ? 'text-primary' : ''}}"></i><span
                                    class="menu-title">{{ __('messages.candidate.dashboard') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1">
                            <a class="menu-link py-3 {{ Request::is('candidate/profile*') ? 'active' : ''}}"
                               href="{{ route('candidate.profile') }}">
                                <i class="far fa-user-circle me-2 {{ Request::is('candidate/profile*') ? 'text-primary' : ''}}"></i><span
                                    class="menu-title">{{ __('messages.profile') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1">
                            <a class="menu-link py-3 {{ Request::is('candidate/favourite-jobs*') ? 'active' : ''}}"
                               href="{{ route('favourite.jobs') }}">
                                <i class="far fa-star me-2 {{ Request::is('candidate/favourite-jobs*') ? 'text-primary' : ''}}"></i><span
                                    class="menu-title">{{ __('messages.favourite_jobs') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1">
                            <a class="menu-link py-3 {{ Request::is('candidate/favourite-companies*') ? 'active' : ''}}"
                               href="{{ route('favourite.companies') }}">
                                <i class="far fa-building me-2 {{ Request::is('candidate/favourite-companies*') ? 'text-primary' : ''}}"></i><span
                                    class="menu-title">{{ __('messages.favourite_companies') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1">
                            <a class="menu-link py-3 {{ Request::is('candidate/applied-job*') ? 'active' : ''}}"
                               href="{{ route('candidate.applied.job') }}">
                                <i class="fas fa-briefcase me-2 {{ Request::is('candidate/applied-job*') ? 'text-primary' : ''}}"></i><span
                                    class="menu-title">{{ __('messages.applied_job.applied_jobs') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1">
                            <a class="menu-link py-3 {{ Request::is('candidate/job-alert*') ? 'active' : ''}}"
                               href="{{ route('candidate.job.alert') }}">
                                <i class="far fa-bell me-2 {{ Request::is('candidate/job-alert*') ? 'text-primary' : ''}}"></i><span
                                    class="menu-title">{{ __('messages.job.job_alert') }}</span>
                            </a>
                        </div>

                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu wrapper-->
            </div>
            <!--end::Navbar-->
            <!--begin::Topbar-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                <!--begin::Toolbar wrapper-->
                <div class="d-flex align-items-stretch flex-shrink-0">
                    <!--begin::Chat-->
                    <div class="d-flex align-items-center ms-1 ms-lg-3">
                        <!--begin::Menu wrapper-->
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
                        <!--end::Menu wrapper-->
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
                                   data-id="{{ getLoggedInUserId() }}"> <i
                                        class="fa fa-user me-2"></i>{{ __('messages.user.edit_profile') }}</a>
                            </div>
                            <div class="menu-item px-5">
                                <a href="{{ route('front.home') }}" class="menu-link px-5"><i
                                        class="fa fa-home me-2"></i>{{ __('messages.go_to_homepage') }}</a>
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
            <!--end::Topbar-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
