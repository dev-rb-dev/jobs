{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">--}}
{{--    <title>@yield('title') | {{ config('app.name') }}</title>--}}

{{--    <!-- General CSS Files -->--}}
{{--    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">--}}

{{--    <!-- Template CSS -->--}}
{{--    <link rel="stylesheet" href="{{ asset('web/backend/css/style.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('web/backend/css/components.css')}}">--}}
{{--</head>--}}

{{--<body>--}}
{{--<div id="app">--}}
{{--    <section class="section">--}}
{{--        <div class="container mt-5">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-6 offset-md-3">--}}
{{--                    <div class="login-brand">--}}
{{--                        <img src="{{ asset(getSettingValue('logo')) }}" alt="logo" width="100"--}}
{{--                             class="shadow-light">--}}
{{--                    </div>--}}
{{--                    @yield('content')--}}
{{--                    <div class="row mx-0 text-center">--}}
{{--                        <div class="col-md-12">--}}
{{--                            {{ __('messages.all_rights_reserved') }} &copy;{{ date('Y') }}--}}
{{--                            <a href="{{ getSettingValue('company_url') }}">{{ html_entity_decode(getSettingValue('application_name')) }}</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--</div>--}}

{{--<!-- General JS Scripts -->--}}
{{--<script src="{{ asset('assets/js/jquery.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/popper.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}

{{--<!-- JS Libraies -->--}}

{{--<!-- Template JS File -->--}}
{{--<script src="{{ asset('web/backend/js/stisla.js') }}"></script>--}}
{{--<script src="{{ asset('web/backend/js/scripts.js') }}"></script>--}}
{{--<!-- Page Specific JS File -->--}}
{{--</body>--}}
{{--</html>--}}
    <!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <base href="../../../">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="{{ getSettingValue('favicon') }}" type="image/x-icon">
    <!--begin::Fonts-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="bg-body">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    <div
        class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
        style="background-image: url({{asset('assets/media/illustrations/sketchy-1/14.png')}}">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <!--begin::Logo-->
            <a href="{{ url('/') }}" class="mb-12">
                <img alt="Logo" src="{{ asset(getSettingValue('logo')) }}" class="h-40px"/>
            </a>
            <!--end::Logo-->
            @yield('content')
        </div>
    </div>
</div>
<!--end::Main-->
{{--<script>var hostUrl = "assets/";</script>--}}
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/plugins.bundle.js')}}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
{{--<script src="{{ asset('assets/js/custom/authentication/sign-in/general.js')}}"></script>--}}
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
<script>
    $(document).ready(function () {
        $('.alert').delay(5000).slideUp(300);
        $('#loginBtn').click(function (){
            $(this).addClass('disabled');
           $(this).attr("data-kt-indicator", "on");
        });
    });
</script>
</body>
<!--end::Body-->
</html>
