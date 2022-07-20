<div class="row">
    <div class="form-group col-md-3 col-sm-12">
        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.front_settings.featured_jobs_enable') }}</label>
        <label class="custom-switch pl-0 col-12 form-check form-switch form-check-custom">
            <input type="checkbox" name="featured_jobs_enable"
                   class="custom-switch-input form-check-input featured-job-active"
                   data-id="{{ ($frontSettings['featured_jobs_enable'] == 1) ? 1 : 0 }}"
                    {{ ($frontSettings['featured_jobs_enable'] == 1) ? 'checked' : '' }} >
            <span class="custom-switch-indicator"></span>
        </label>
    </div>
    <div class="form-group col-xl-3 col-md-3 col-sm-12">
        {{ Form::label('currency', __('messages.front_settings.featured_listing_currency').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('currency', $currencies, (isset($frontSettings['currency']) && $frontSettings['currency'])?$frontSettings['currency']:null ,['id'=>'currency','class' => 'form-select form-select-solid','placeholder' => 'Select Currency','required']) }}
    </div>
    <div class="form-group col-md-3 col-sm-12">
        <label name="featured_jobs_price"
               class="form-label required fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.front_settings.featured_jobs_price').':' }}</label>
        {{ Form::number('featured_jobs_price', !empty($frontSettings['featured_jobs_price']) ? $frontSettings['featured_jobs_price'] : 0, ['class' => 'form-control salary form-control-solid', 'required','min' => 0, 'max' => '50000','placeholder' => __('messages.front_settings.featured_jobs_price')]) }}
    </div>
    <div class="form-group col-md-3 col-sm-12">
        <label name="featured_jobs_days"
               class="form-label required fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.front_settings.featured_jobs_due_days').':' }}</label>
        {{ Form::number('featured_jobs_days', $frontSettings['featured_jobs_days'], ['class' => 'form-control salary form-control-solid', 'required','min' => 0, 'max' => '20', 'placeholder' => __('messages.front_settings.featured_jobs_due_days')]) }}
    </div>

    <div class="form-group col-xl-3 col-md-3 col-sm-12 mt-5 mb-5">
        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.front_settings.featured_companies_enable') }}</label>
        <label class="custom-switch pl-0 col-12 form-check form-switch form-check-custom">
            <input type="checkbox" name="featured_companies_enable"
                   class="custom-switch-input form-check-input featured-company-active"
                    {{ ($frontSettings['featured_companies_enable'] == 1) ? 'checked' : '' }}>
            <span class="custom-switch-indicator"></span>
        </label>
    </div>
    <div class="form-group col-md-3 col-sm-12 mt-5 mb-5">
        <label name="featured_jobs_quota"
               class="form-label required fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.front_settings.featured_jobs_quota').':' }}</label>
        {{ Form::number('featured_jobs_quota', $frontSettings['featured_jobs_quota'], ['class' => 'form-control salary form-control-solid', 'required','min' => 0, 'max' => '20', 'placeholder' => __('messages.front_settings.featured_jobs_quota')]) }}
    </div>
    <div class="form-group col-md-3 col-sm-12 mt-5 mb-5">
        <label name="featured_companies_price"
               class="form-label required fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.front_settings.featured_companies_price').':' }}</label>
        {{ Form::number('featured_companies_price', $frontSettings['featured_companies_price'], ['class' => 'form-control form-control-solid salary', 'required','min' => 0, 'max' => '50000', 'placeholder' => __('messages.front_settings.featured_companies_price')]) }}
    </div>
    <div class="form-group col-md-3 col-sm-12 mt-5 mb-5">
        <label name="featured_companies_days"
               class="form-label required fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.front_settings.featured_companies_due_days').':' }}</label>
        {{ Form::number('featured_companies_days', $frontSettings['featured_companies_days'], ['class' => 'form-control form-control-solid salary', 'required','min' => 0, 'max' => '20', 'placeholder' =>__('messages.front_settings.featured_companies_due_days') ]) }}
    </div>

    <div class="form-group col-xl-3 col-md-3 col-sm-12">
        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.front_settings.latest_jobs_enable') }}
            <span><i class="fas fa-question-circle ml-1" data-toggle="tooltip" data-placement="top"
                     title="{{ __('messages.front_settings.latest_jobs_enable_message') }}"></i></span></label>
        <label class="custom-switch pl-0 col-12 form-check form-switch form-check-custom">
            <input type="checkbox" name="latest_jobs_enable"
                   class="custom-switch-input form-check-input job-country-active"
                    {{ (isset($frontSettings['latest_jobs_enable']) && $frontSettings['latest_jobs_enable'] == 1) ? 'checked' : '' }}>
            <span class="custom-switch-indicator"></span>
        </label>
    </div>
    <div class="form-group col-md-3 col-sm-12">
        <label name="featured_companies_quota"
               class="form-label required fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.front_settings.featured_companies_quota').':' }}</label>
        {{ Form::number('featured_companies_quota', $frontSettings['featured_companies_quota'], ['class' => 'form-control form-control-solid salary', 'required','min' => 0, 'max' => '20', 'placeholder' => __('messages.front_settings.featured_companies_quota')]) }}
    </div>
    <div class="form-group col-md-6 col-sm-12">
        {{--        <div class="row">--}}
        {{--            <div class="px-3">--}}
        {{--                {{ Form::label('favicon', __('web.job_menu.advertise_image').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
        {{--                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" data-toggle="tooltip"--}}
        {{--                   data-placement="top"--}}
        {{--                   title="The image must be of pixel 450 X 630."></i>--}}
        {{--                <label class="image__file-upload"> {{ __('messages.setting.choose') }}--}}
        {{--                    {{ Form::file('advertise_image',['id'=>'advertiseImage','class' => 'd-none','accept'=>'.jpg, .jpeg, .png']) }}--}}
        {{--                </label>--}}
        {{--            </div>--}}
        {{--            <div class="w-auto pl-3 mt-1">--}}
        {{--                <img id='advertisePreview' class="img-thumbnail thumbnail-preview"--}}
        {{--                     src="{{(isset($frontSettings['advertise_image']) && $frontSettings['advertise_image'])?asset($frontSettings['advertise_image']):asset('assets/img/infyom-logo.png')}}">--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <div class="d-block">
            {{ Form::label('favicon', __('web.job_menu.advertise_image').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
            <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"
               data-toggle="tooltip"
               data-placement="top"
               title="The image must be of pixel 450 X 630."></i>
        </div>
        <div class="image-input image-input-outline" data-kt-image-input="true">
            <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                 id="previewImage"
                 style="background-image: url({{ !empty($frontSettings['advertise_image']) ? $frontSettings['advertise_image'] : asset('assets/img/infyom-logo.png') }})">
            </div>
            <label
                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                    data-bs-original-title="Change Image">
                <i class="fas fa-pencil-alt"></i>
                {{ Form::file('advertise_image',['id'=>'advertiseImage','class' => 'd-none', 'accept' => '.png, .jpg, .jpeg']) }}
                <input type="hidden" name="avatar_remove">
            </label>
            <span
                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                    data-bs-original-title="Cancel Image">
                    <i class="fas fa-times"></i></span>
        </div>
    </div>

    <!-- Submit Field -->
    <div class="d-flex">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3','name' => 'save', 'id' => 'saveJob']) }}
        <a href="{{ route('front.settings.index') }}"
           class="btn btn-light btn-active-light-primary me-2">{{__('messages.common.cancel')}}</a>
    </div>

</div>
