{{--<div class="row mt-3">--}}
{{--    <div class="form-group col-sm-6">--}}
{{--        {{ Form::label('home_title', __('messages.cms_service.home_title').':') }}<span--}}
{{--                class="text-danger">*</span>--}}
{{--        {{ Form::text('home_title', $cmsServices['home_title'], ['class' => 'form-control', '']) }}--}}
{{--    </div>--}}
{{--    <div class="form-group col-sm-12 my-0">--}}
{{--        {{ Form::label('home_description', __('messages.cms_service.home_description').':') }}<span--}}
{{--                class="text-danger">*</span>--}}
{{--        {{ Form::textarea('home_description', $cmsServices['home_description'], ['class' => 'form-control h-75', '']) }}--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--    <!-- Logo Field -->--}}
{{--    <div class="form-group col-sm-4">--}}
{{--        <div class="row">--}}
{{--            <div class="px-3">--}}
{{--                {{ Form::label('home_banner', __('messages.cms_service.home_banner').':') }}<span class="text-danger">*</span>--}}
{{--                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" data-toggle="tooltip"--}}
{{--                   data-placement="top" title="Upload 90 x 60 logo to get best user experience."></i>--}}
{{--                <label class="image__file-upload"> {{ __('messages.cms_service.choose') }}--}}
{{--                    {{ Form::file('home_banner',['id'=>'home_banner','class' => 'd-none']) }}--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <div class="w-auto pl-3 mt-1">--}}
{{--                <img id='homeBannerPreview' class="img-thumbnail thumbnail-preview"--}}
{{--                     src="{{($cmsServices['home_banner']) ? asset($cmsServices['home_banner']) : asset('web_front/images/resource/home_banner.png')}}">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="row mt-4">--}}
{{--    <!-- Submit Field -->--}}
{{--    <div class="form-group col-sm-12">--}}
{{--        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) }}--}}
{{--        <a href="" class="btn btn-secondary hover-text-dark text-dark">{{__('messages.common.cancel')}}</a>--}}
{{--    </div>--}}
{{--</div>--}}


<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
    <div class="alert alert-danger display-none hide d-none" id="editValidationErrorsBox"></div>
    <div class="row">
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('home_title', __('messages.cms_service.home_title').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::text('home_title', $cmsServices['home_title'], ['class' => 'form-control form-control-solid','required', 'placeholder' => __('messages.cms_service.home_title')]) }}
        </div>
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('home_description', __('messages.cms_service.home_description').(':'),['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::textarea('home_description',$cmsServices['home_description'], ['class' => 'form-control form-control-solid','required', 'placeholder' => __('messages.cms_service.home_description')]) }}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-4 mb-5">
            <div class="d-block">
                {{ Form::label('home_banner', __('messages.cms_service.home_banner').':', ['class' => ' required     form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"
                   data-bs-toggle="tooltip"
                   data-placement="top"
                   title="{{  __('messages.setting.image_validation') }}"></i>
            </div>
            <div class="image-input image-input-outline" data-kt-image-input="true">
                <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                     id='homeBannerPreview'
                     style="  background-image: url({{ ($cmsServices['home_banner']) ? asset($cmsServices['home_banner']) : asset('web_front/images/resource/home_banner.png') }})">
                </div>
                <label
                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                        data-bs-original-title="Change home banner">
                    <i class="fas fa-pencil-alt fs-7"></i>
                    {{ Form::file('home_banner',['id'=>'home_banner','class' => 'd-none', 'accept' => '.png, .jpg, .jpeg']) }}
                    <input type="hidden" name="avatar_remove">
                </label>
                <span
                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                    data-bs-original-title="Cancel home banner">
                    <i class="fas fa-times"></i></span>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <!-- Submit Field -->
        <div class="d-flex">
            {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3']) }}
{{--            <a class="btn btn-light btn-active-light-primary me-2">{{__('messages.common.cancel')}}</a>--}}
        </div>
    </div>
</div>




