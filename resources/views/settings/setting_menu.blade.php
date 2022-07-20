{{--<div class="row">--}}
{{--    <div class="col-md-3">--}}
{{--        <div class="card">--}}
{{--            <div class="card-body px-0">--}}
{{--                <ul class="nav nav-pills flex-column">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('settings.index', ['section' => 'general']) }}"--}}
{{--                           class="nav-link {{ (isset($sectionName) && $sectionName == 'general') ? 'active' : ''}}">--}}
{{--                            {{ __('messages.general') }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('settings.index', ['section' => 'front_office_details']) }}"--}}
{{--                           class="nav-link {{ (isset($sectionName) && $sectionName == 'front_office_details') ? 'active' : ''}}">--}}
{{--                            {{ __('messages.footer_settings') }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('settings.index', ['section' => 'social_settings']) }}"--}}
{{--                           class="nav-link {{ (isset($sectionName) && $sectionName == 'social_settings') ? 'active' : ''}}">--}}
{{--                            {{ __('messages.social_settings') }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('settings.index', ['section' => 'about_us']) }}"--}}
{{--                           class="nav-link {{ (isset($sectionName) && $sectionName == 'about_us') ? 'active' : ''}}">--}}
{{--                            {{ __('messages.about_us') }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('settings.index', ['section' => 'env_setting']) }}"--}}
{{--                           class="nav-link {{ (isset($sectionName) && $sectionName == 'env_setting') ? 'active' : ''}}">--}}
{{--                            {{ __('messages.env') }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="col-md-9">--}}
{{--        @yield('section')--}}
{{--    </div>--}}
{{--</div>--}}


<div class="card">
    <div class="card-body pt-9 pb-0">
        <div class="d-flex overflow-auto h-55px">
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{ (isset($sectionName) && $sectionName == 'general' || Request::is('settings*')) ? 'active' : ''}}"
                       href="{{ route('settings.index', ['section' => 'general']) }}">{{ __('messages.general') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{ (isset($sectionName) && $sectionName == 'front_office_details') ? 'active' : ''}}"
                           href="{{ route('settings.index', ['section' => 'front_office_details']) }}">  {{ __('messages.footer_settings') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{ (isset($sectionName) && $sectionName == 'social_settings') ? 'active' : ''}}"
                       href="{{ route('settings.index', ['section' => 'social_settings']) }}">  {{ __('messages.social_settings') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{ (isset($sectionName) && $sectionName == 'about_us') ? 'active' : ''}}"
                       href="{{ route('settings.index', ['section' => 'about_us']) }}"> {{ __('messages.about_us') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{ (isset($sectionName) && $sectionName == 'env_setting') ? 'active' : ''}}"
                       href="{{ route('settings.index', ['section' => 'env_setting']) }}"> {{ __('messages.env') }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>



