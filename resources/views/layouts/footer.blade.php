{{--<div class="row mx-0">--}}
{{--    <div class="col-md-8">--}}
{{--        {{ __('messages.all_rights_reserved') }} &copy;{{ date('Y') }}--}}
{{--        <a href="{{ getSettingValue('company_url') }}">{{ html_entity_decode(getSettingValue('application_name')) }}</a>--}}
{{--    </div>--}}
{{--    <div class="col-md-4">--}}
{{--        <span class="float-right">{{ getCurrentVersion() }}</span>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">--}}
{{--    <!--begin::Container-->--}}
{{--    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">--}}
{{--        <!--begin::Copyright-->--}}
{{--        <div class="text-dark order-2 order-md-1">--}}
{{--            <span class="text-muted fw-bold me-1">{{ __('messages.all_rights_reserved') }} &copy;{{ date('Y') }}</span>--}}
{{--            <a href="{{ getSettingValue('company_url') }}" target="_blank"--}}
{{--               class="text-gray-800 text-hover-primary">{{ html_entity_decode(getSettingValue('application_name')) }}</a>--}}
{{--        </div>--}}
{{--        <!--end::Copyright-->--}}
{{--        <!--begin::Menu-->--}}
{{--        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">--}}
{{--            <li class="text-muted fw-bold me-1">{{ getCurrentVersion() }}</li>--}}
{{--        </ul>--}}
{{--        <!--end::Menu-->--}}
{{--    </div>--}}
{{--    <!--end::Container-->--}}
{{--</div>--}}

<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-bold me-1">{{ __('messages.all_rights_reserved') }} &copy;{{ date('Y') }}</span>
            <a href="{{ getSettingValue('company_url') }}" target="_blank"
               class="text-gray-800 text-hover-primary">{{ html_entity_decode(getSettingValue('application_name')) }}</a>
        </div>
        <!--end::Copyright-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
            <li class="menu-item">
                <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">{{ getCurrentVersion() }}</a>
            </li>
        </ul>
    </div>
    <!--end::Container-->
</div>
