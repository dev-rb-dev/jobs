{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">--}}
{{--    <title>@yield('title') | {{config('app.name')}} </title>--}}
{{--    <link rel="shortcut icon" href="{{ getSettingValue('favicon') }}" type="image/x-icon">--}}

{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--    <!-- General CSS Files -->--}}
{{--    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">--}}
{{--    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/css/inttel/css/intlTelInput.css') }}">--}}
{{--    <!-- CSS Libraries -->--}}

{{--    <link rel="stylesheet" href="{{ getBrandTypeUrl("favicon") ?? asset('favicon.ico') }}">--}}
{{--@stack('css')--}}
{{--<!-- Template CSS -->--}}
{{--    <link rel="stylesheet" href="{{ asset('web/backend/css/style.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('web/backend/css/components.css')}}">--}}
{{--    <link href="{{ mix('assets/css/infy-loader.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--    --}}{{--    @yield('css')--}}
{{--</head>--}}
{{--<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">--}}
{{--<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">--}}
{{--    <div class="infy-loader" id="overlay-screen-lock">--}}
{{--        @include('loader')--}}
{{--    </div>--}}
{{--    <div id="kt_content_container" class="container-xxl">--}}

{{--        <div class="navbar-bg"></div>--}}
{{--        <nav class="navbar navbar-expand-lg main-navbar">--}}
{{--            @include('layouts.header')--}}
{{--            @include('user_profile.edit_profile_modal')--}}
{{--            @include('user_profile.change_password_modal')--}}
{{--        </nav>--}}
{{--        <div class="main-sidebar">--}}
{{--            @include('layouts.sidebar')--}}
{{--        </div>--}}
{{--        <!-- Main Content -->--}}
{{--        <div class="main-wrapper main-wrapper-1">--}}
{{--            @yield('content')--}}
{{--        </div>--}}
{{--        <footer class="main-footer">--}}
{{--            @include('layouts.footer')--}}
{{--        </footer>--}}
{{--    </div>--}}
{{--</div>--}}
{{--metronics--}}
{{--<script>let hostUrl = "assets/";</script>--}}
{{--<!--begin::Javascript-->--}}
{{--<!--begin::Global Javascript Bundle(used by all pages)-->--}}
{{--<script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}"></script>--}}
{{--<script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>--}}
{{--<!--end::Global Javascript Bundle-->--}}
{{--<!--begin::Page Custom Javascript(used by this page)-->--}}
{{--<script src="{{ asset('assets/js/custom/widgets.js')}}"></script>--}}
{{--<script src="{{ asset('assets/js/custom/apps/chat/chat.js')}}"></script>--}}
{{--<script src="{{ asset('assets/js/custom/modals/create-app.js')}}"></script>--}}
{{--<script src="{{ asset('assets/js/custom/modals/upgrade-plan.js')}}"></script>--}}
{{--metronics--}}


{{--<script src="{{ asset('messages.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/popper.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/jquery.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/iziToast.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/select2.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/inttel/js/intlTelInput.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/inttel/js/utils.min.js') }}"></script>--}}

{{--<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>--}}
{{--<script src="{{ asset('web/backend/js/stisla.js') }}"></script>--}}
{{--<script src="{{ asset('web/backend/js/scripts.js') }}"></script>--}}
{{--<script src="{{ mix('assets/js/custom/custom.js') }}"></script>--}}
{{--<script>--}}
{{--    (function ($) {--}}
{{--        let currentLocale = "{{ Config::get('app.locale') }}";--}}
{{--        Lang.setLocale(currentLocale);--}}
{{--        $.fn.button = function (action) {--}}
{{--            if (action === 'loading' && this.data('loading-text')) {--}}
{{--                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);--}}
{{--            }--}}
{{--            if (action === 'reset' && this.data('original-text')) {--}}
{{--                this.html(this.data('original-text')).prop('disabled', false);--}}
{{--            }--}}
{{--        };--}}
{{--    }(jQuery));--}}
{{--    $(document).ready(function () {--}}
{{--        $('.alert').delay(5000).slideUp(300);--}}
{{--    });--}}
{{--    $('[data-dismiss=modal]').on('click', function (e) {--}}
{{--        var $t = $(this),--}}
{{--            target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];--}}

{{--        $(target).modal("hide");--}}
{{--    });--}}
{{--    let utilsScript = "{{asset('assets/js/inttel/js/utils.min.js')}}";--}}
{{--</script>--}}
{{--@stack('scripts')--}}
{{--<script>--}}
{{--    let profileUrl = "{{ url('admin/profile') }}";--}}
{{--    let profileUpdateUrl = "{{ url('admin/profile-update') }}";--}}
{{--    let profilePhoneNo = "{{ old('region_code').old('phone') }}";--}}
{{--    let updateLanguageURL = "{{ url('update-language')}}";--}}
{{--    let changePasswordUrl = "{{ url('admin/change-password') }}";--}}
{{--    let loggedInUserId = "{{ getLoggedInUserId() }}";--}}
{{--    let currentUrlName = "{{ Request::url() }}";--}}
{{--    let readAllNotifications = "{{ url('admin/read-all-notification') }}";--}}
{{--    let readNotification = "{{ url('admin/notification') }}";--}}
{{--    let ajaxCallIsRunning = false;--}}
{{--</script>--}}
{{--<script src="{{ mix('assets/js/user_profile/user_profile.js') }}"></script>--}}
{{--<script src="{{ asset('js/currency.js') }}"></script>--}}
{{--</body>--}}
{{--</html>--}}

    <!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>
    <base href="../">
    <title>@yield('title') | {{config('app.name')}}</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ getSettingValue('favicon') }}"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
@stack('css')
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link href="{{ asset('backend/css/datatables.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/inttel/css/intlTelInput.css') }}">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css"/>

    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
      style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">

        <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
             data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
             data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
             data-kt-drawer-toggle="#kt_aside_mobile_toggle">
            @include('layouts.sidebar')
        </div>

        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        @include('layouts.header')
        @include('user_profile.edit_profile_modal')
        @include('user_profile.change_password_modal')
        <!--begin::Content-->
            <div class="content content-padding d-flex flex-column flex-column-fluid" id="kt_content">
                @yield('header_toolbar')
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <div id="kt_content_container" class="container-xxl">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
        @include('layouts.footer')
        <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->
<!--begin::Scrolltop-->
{{--<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">--}}
{{--    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->--}}
{{--    <span class="svg-icon">--}}
{{--				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
{{--					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />--}}
{{--					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />--}}
{{--				</svg>--}}
{{--			</span>--}}
{{--    <!--end::Svg Icon-->--}}
{{--</div>--}}
<!--end::Scrolltop-->
<!--end::Main-->
<script>let hostUrl = "assets/";</script>

<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/plugins.bundle.js')}}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>
<script src="{{ asset('backend/js/datatables.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('assets/js/custom/widgets.js')}}"></script>
<script src="{{ asset('assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{ asset('assets/js/custom/modals/create-app.js')}}"></script>
<script src="{{ asset('assets/js/custom/modals/upgrade-plan.js')}}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>
<script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('messages.js') }}"></script>
<script src="{{ asset('assets/js/inttel/js/intlTelInput.min.js') }}"></script>
<script src="{{ mix('assets/js/sidebar_menu_search/sidebar_menu_search.js') }}"></script>
{{--<script src="{{ asset('assets/js/inttel/js/utils.min.js') }}"></script>--}}
<script>
    (function ($) {
        let currentLocale = "{{ Config::get('app.locale') }}";
        Lang.setLocale(currentLocale);
        $.fn.button = function (action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
    }(jQuery));
    $(document).ready(function () {
        $('.alert').delay(5000).slideUp(300);
    });
    $('[data-dismiss=modal]').on('click', function (e) {
        var $t = $(this),
            target = $t[0].href || $t.data('target') || $t.parents('.modal') || [];

        $(target).modal('hide');
    });
    // $(document).on('select2:open', () => {
    //     document.querySelector('.select2-container--bootstrap5 .select2-dropdown .select2-search .select2-search__field').focus();
    // });
    let utilsScript = "{{asset('assets/js/inttel/js/utils.min.js')}}";
</script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
@stack('scripts')
<script>
    let profileUrl = "{{ url('admin/profile') }}";
    let profileUpdateUrl = "{{ url('admin/profile-update') }}";
    let profilePhoneNo = "{{ old('region_code').old('phone') }}";
    let updateLanguageURL = "{{ url('update-language')}}";
    let changePasswordUrl = "{{ url('admin/change-password') }}";
    let loggedInUserId = "{{ getLoggedInUserId() }}";
    let currentUrlName = "{{ Request::url() }}";
    let readAllNotifications = "{{ url('admin/read-all-notification') }}";
    let readNotification = "{{ url('admin/notification') }}";
    let ajaxCallIsRunning = false;
</script>
<script src="{{ mix('assets/js/user_profile/user_profile.js') }}"></script>
<script src="{{ asset('js/currency.js') }}"></script>
</body>
<!--end::Body-->
</html>
