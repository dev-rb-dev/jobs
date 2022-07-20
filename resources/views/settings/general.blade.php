@extends('settings.index')
@section('title')
    {{ __('messages.setting.general') }}
@endsection
@section('section')
    {{ Form::open(['route' => 'settings.update', 'files' => true, 'id'=>'editGeneralForm']) }}
    {{ Form::hidden('sectionName', $sectionName) }}
    <div class="row mt-3">
        <div class="form-group col-sm-6">
            {{ Form::label('application_name', __('messages.setting.application_name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::text('application_name', $setting['application_name'], ['class' => 'form-control form-control-solid', 'required','placeholder'=>__('messages.setting.application_name')]) }}
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('application_name', __('messages.setting.company_url').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::text('company_url', $setting['company_url'], ['class' => 'form-control form-control-solid', 'required', 'id' => 'companyUrl','placeholder' => __('messages.setting.company_url')]) }}
        </div>
        <div class="form-group col-sm-12 my-0 mt-5">
            {{ Form::label('company_description', __('messages.setting.company_description').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::textarea('company_description', $setting['company_description'], ['class' => 'form-control form-control-solid h-75', 'required','placeholder' => __('messages.setting.company_description')]) }}
        </div>
    </div>
    <div class="row">
        <!-- Logo Field -->
        {{--        <div class="form-group col-sm-4">--}}
        {{--            <div class="row">--}}
        {{--                <div class="px-3">--}}
        {{--                    {{ Form::label('app_logo', __('messages.setting.logo').':') }}<span class="text-danger">*</span>--}}
        {{--                    <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" data-toggle="tooltip"--}}
        {{--                       data-placement="top" title="Upload 90 x 60 logo to get best user experience."></i>--}}
        {{--                    <label class="image__file-upload"> {{ __('messages.setting.choose') }}--}}
        {{--                        {{ Form::file('logo',['id'=>'logo','class' => 'd-none form-control-solid']) }}--}}
        {{--                    </label>--}}
        {{--                </div>--}}
        {{--                <div class="w-auto pl-3 mt-1">--}}
        {{--                    <img id='logoPreview' class="img-thumbnail thumbnail-preview"--}}
        {{--                         src="{{($setting['logo']) ? asset($setting['logo']) : asset('assets/img/infyom-logo.png')}}">--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <div class="form-group col-sm-12 mb-5">
            <div class="row">
                <div class="form-group col-lg-4 col-sm-6 mb-5">
                    <div class="row2">
                        <div class="d-block">
                            {{ Form::label('app_logo', __('messages.setting.logo').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                            <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"
                               data-bs-toggle="tooltip"
                               data-bs-placement="top"
                               title="Upload 90 x 60 logo to get best user experience."></i>
                        </div>
                        <div class="image-input image-input-outline" data-kt-image-input="true">
                            <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                                 id="logoPreview"
                                 style="background-image: url('{{ !empty($setting['logo']) ? $setting['logo'] : asset('assets/img/infyom-logo.png') }}')">
                            </div>
                            <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="Change app logo">
                                <i class="fas fa-pencil-alt fs-7"></i>
                                {{ Form::file('logo',['id'=>'logo','class' => 'd-none', 'accept' => '.png, .jpg, .jpeg']) }}
                                <input type="hidden" name="avatar_remove">
                            </label>
                            <span
                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Cancel app logo">
                    <i class="fas fa-times"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-4 col-sm-6 mb-5">
                    <div class="row2">
                        <div class="d-block">
                            {{ Form::label('app_footer_logo', __('Footer Logo').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                            <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"
                               data-bs-toggle="tooltip"
                               data-bs-placement="top"
                               title="Upload 90 x 60 logo to get best user experience."></i>
                        </div>
                        <div class="image-input image-input-outline" data-kt-image-input="true">
                            <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                                 id="footerLogoPreview"
                                 style="background-image: url('{{ !empty($setting['footer_logo']) ? $setting['footer_logo'] : asset('assets/img/infyom-logo.png') }}')">
                            </div>
                            <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="Change footer logo">
                                <i class="fas fa-pencil-alt fs-7"></i>
                                {{ Form::file('footer_logo',['id'=>'footerLogo','class' => 'd-none', 'accept' => '.png, .jpg, .jpeg']) }}
                                <input type="hidden" name="avatar_remove_footer">
                            </label>
                            <span
                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Cancel footer logo">
                    <i class="fas fa-times"></i></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-lg-4 col-sm-6 mb-5">
                    <div class="row2">
                        <div class="d-block">
                            {{ Form::label('favicon', __('messages.setting.favicon').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                            <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"
                               data-bs-toggle="tooltip"
                               data-bs-placement="top"
                               title="The image must be of pixel 16 x 16 and 32 x 32."></i>
                        </div>
                        <div class="image-input image-input-outline" data-kt-image-input="true">
                            <div class="image-input-wrapper w-60px h-60px bgi-position-center"
                                 id="faviconPreview"
                                 style="background-image: url('{{ !empty($setting['favicon']) ? $setting['favicon'] : asset('assets/img/infyom-logo.png') }}')">
                            </div>
                            <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="Change favicon logo">
                                <i class="fas fa-pencil-alt fs-7"></i>
                                {{ Form::file('favicon',['id'=>'favicon','class' => 'd-none']) }}
                                <input type="hidden" name="avatar_remove_favicon">
                            </label>
                            <span
                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Cancel favicon logo">
                    <i class="fas fa-times"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--        <div class="form-group col-sm-4">--}}
        {{--            <div class="row">--}}
        {{--                <div class="px-3">--}}
        {{--                    {{ Form::label('app_footer_logo','Footer Logo:') }}<span class="text-danger">*</span>--}}
        {{--                    <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" data-toggle="tooltip"--}}
        {{--                       data-placement="top" title="Upload 90 x 60 logo to get best user experience."></i>--}}
        {{--                    <label class="image__file-upload"> {{ __('messages.setting.choose') }}--}}
        {{--                        {{ Form::file('footer_logo',['id'=>'footerLogo','class' => 'd-none']) }}--}}
        {{--                    </label>--}}
        {{--                </div>--}}
        {{--                <div class="w-auto pl-3 mt-1">--}}
        {{--                    <img id='footerLogoPreview' class="img-thumbnail thumbnail-preview"--}}
        {{--                         src="{{($setting['footer_logo']) ? asset($setting['footer_logo']) : asset('assets/img/infyom-logo.png')}}">--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="form-group col-sm-4">--}}
        {{--            <div class="row">--}}
        {{--                <div class="px-3">--}}
        {{--                    {{ Form::label('favicon', __('messages.setting.favicon').':') }}--}}
        {{--                    <span class="text-danger">*</span><i class="fas fa-question-circle ml-1 mt-1 general-question-mark"--}}
        {{--                                                         data-toggle="tooltip" data-placement="top"--}}
        {{--                                                         title="The image must be of pixel 16 x 16 and 32 x 32."></i>--}}
        {{--                    <label class="image__file-upload"> {{ __('messages.setting.choose') }}--}}
        {{--                        {{ Form::file('favicon',['id'=>'favicon','class' => 'd-none']) }}--}}
        {{--                    </label>--}}
        {{--                </div>--}}
        {{--                <div class="w-auto pl-3 mt-1">--}}
        {{--                    <img id='faviconPreview' class="img-thumbnail thumbnail-preview mt-4 width-40px"--}}
        {{--                         src="{{($setting['favicon']) ? asset($setting['favicon']) : asset('assets/img/infyom-logo.png')}}">--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="form-group col-lg-12 col-md-12 d-flex justify-content-start">--}}
        {{--            <label class="custom-switch switch-label row mt-0 pl-0">--}}
        {{--                <input type="checkbox" name="enable_google_recaptcha" class="custom-switch-input form-check-input"--}}
        {{--                       {{ ($setting['enable_google_recaptcha']) ? 'checked' : '' }} value="1">--}}
        {{--                <span class="custom-switch-indicator switch-span"></span>--}}
        {{--            </label>--}}
        {{--            <span class="custom-switch-description font-weight-bold fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.setting.enable_google_recaptcha') }}</span>--}}
        {{--        </div>--}}
        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('status', __('messages.setting.enable_google_recaptcha'), ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
            <br>
            <div class="form-check form-switch form-check-custom form-check-solid">
                <input class="form-check-input w-35px h-20px" name="enable_google_recaptcha" type="checkbox"
                       value="1" {{ ($setting['enable_google_recaptcha']) ? 'checked' : '' }} placeholder="{{__('messages.setting.enable_google_recaptcha')}}">
            </div>
        </div>
    </div>
    <div class="row mt-4 mb-5">
        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3']) }}
            <a href="{{ route('settings.index', ['section' => 'general']) }}" class="btn btn-light btn-active-light-primary me-2">{{__('messages.common.cancel')}}</a>
        </div>
    </div>
    {{ Form::close() }}
@endsection
