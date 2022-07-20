{{--<div class="row mt-3">--}}
{{--    <div class="col-md-3">--}}
{{--        <div class="card">--}}
{{--            <div class="card-body px-0 py-0">--}}
{{--                <ul class="nav nav-pills flex-column">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('candidate.profile',['section' => 'general']) }}"--}}
{{--                           class="nav-link {{ (isset($data['sectionName']) && $data['sectionName'] == 'general') ? 'active' : ''}}">--}}
{{--                            {{ __('messages.general') }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('candidate.profile',['section' => 'resumes']) }}"--}}
{{--                           class="nav-link {{ (isset($data['sectionName']) && $data['sectionName'] == 'resumes') ? 'active' : ''}}">--}}
{{--                            {{ __('messages.apply_job.resume') }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('candidate.profile',['section' => 'career_informations']) }}"--}}
{{--                           class="nav-link {{ (isset($data['sectionName']) && $data['sectionName'] == 'career_informations') ? 'active' : ''}}">--}}
{{--                            {{ __('messages.career_informations') }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('candidate.profile',['section' => 'cv_builder']) }}"--}}
{{--                           class="nav-link {{ (isset($data['sectionName']) && $data['sectionName'] == 'cv_builder') ? 'active' : ''}}">--}}
{{--                            {{ __('messages.cv_builder') }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


<div class="card">
    <div class="card-body pt-9 pb-0">
        <div class="d-flex overflow-auto h-55px">
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{ (isset($data['sectionName']) && $data['sectionName'] == 'general') ? 'active' : ''}}"
                       href=" {{ route('candidate.profile',['section' => 'general']) }}">{{ __('messages.general') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{ (isset($data['sectionName']) && $data['sectionName'] == 'resumes') ? 'active' : ''}}"
                       href="{{ route('candidate.profile',['section' => 'resumes']) }}">  {{ __('messages.apply_job.resume') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{( isset($data['sectionName']) && $data['sectionName'] == 'career_informations') ?  'active' : '' }}"
                       href="{{  route('candidate.profile',['section' => 'career_informations']) }}">  {{ __('messages.career_informations') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{ (isset($data['sectionName']) && $data['sectionName'] == 'cv_builder') ? 'active' : ''}}"
                       href="{{ route('candidate.profile',['section' => 'cv_builder']) }}"> {{  __('messages.cv_builder') }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>

{{--<div class="card">--}}
{{--    <div class="col-md-9">--}}
{{--        @yield('section')--}}
{{--    </div>--}}
{{--</div>--}}
{{--@include('candidate.profile.general')--}}
{{--@include('candidate.profile.career_informations')--}}
{{--@include('candidate.profile.resumes')--}}
{{--@include('candidate.profile.cv_builder')--}}







