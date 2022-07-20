{{--<div id="editModal" class="modal fade" tabindex="-1" role="dialog">--}}
{{--    <div class="modal-dialog">--}}
{{--        <!-- Modal content-->--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="headerSlider">{{__('messages.header_slider.edit_header_slider')}}</h5>--}}
{{--                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>--}}
{{--            </div>--}}
{{--            {{ Form::open(['id'=>'editForm','files'=>true]) }}--}}
{{--            <div class="modal-body">--}}
{{--                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>--}}
{{--                {{ Form::hidden('headerSliderId',null,['id'=>'headerSliderId']) }}--}}
{{--                <div class="row">--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        <div class="row">--}}
{{--                            <div class="px-3">--}}
{{--                                {{ Form::label('image_slider', __('messages.image_slider.image').':') }}<span--}}
{{--                                        class="text-danger">*</span>--}}
{{--                                <span><i class="fas fa-question-circle ml-1"--}}
{{--                                         data-toggle="tooltip"--}}
{{--                                         data-placement="top"--}}
{{--                                         title="{{ __('messages.header_slider.image_title_text') }}"></i></span>--}}
{{--                                <label class="image__file-upload"> {{ __('messages.setting.choose') }}--}}
{{--                                    {{ Form::file('image_slider',['id'=>'editHeaderSlider','class' => 'd-none']) }}--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <div class="col-6 w-auto pl-3 mt-1">--}}
{{--                                <img id='editPreviewImage' class="img-thumbnail thumbnail-preview"--}}
{{--                                     src="{{ asset('assets/img/infyom-logo.png') }}">--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-sm-12 mb-0 pt-1">--}}
{{--                                <a href="#" target="_blank" id="imageSliderUrl"></a>--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-sm-4 mb-0 pt-1">--}}
{{--                                <label>{{ __('messages.common.status').':' }}</label><br>--}}
{{--                                <label class="custom-switch pl-0">--}}
{{--                                    <input type="checkbox" name="is_active" class="custom-switch-input"--}}
{{--                                           value="1" id="editIsActive" checked>--}}
{{--                                    <span class="custom-switch-indicator"></span>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="text-right mt-2 pt-2">--}}
{{--                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}--}}
{{--                    <button type="button" id="btnCancel" class="btn btn-light ml-1"--}}
{{--                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            {{ Form::close() }}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div id="editModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.header_slider.edit_header_slider') }}</h2>
                <button type="button" aria-label="Close" class="btn btn-sm btn-icon btn-active-color-primary"
                        data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
						<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                             version="1.1">
							<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                               fill="#000000">
								<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"/>
								<rect fill="#000000" opacity="0.5"
                                      transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                      x="0" y="7" width="16" height="2" rx="1"/>
							</g>
						</svg>
					</span>
                </button>
            </div>
            {{ Form::open(['id'=>'editForm','files'=>true]) }}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger display-none hide d-none" id="maritalStatusValidationErrorsBox"></div>
                {{ Form::hidden('headerSliderId',null,['id'=>'headerSliderId']) }}
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">

                        <div class="d-block">
                            {{ Form::label('header_slider', __('messages.image_slider.image').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                            <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"
                               data-toggle="tooltip"
                               data-placement="top"
                               title="{{__('messages.header_slider.image_title_text') }}"></i>
                        </div>
                        <div class="image-input image-input-outline" data-kt-image-input="true">
                            <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                                 id="editPreviewImage"
                                 style="background-image: url({{ asset('assets/img/infyom-logo.png') }})">
                            </div>
                            <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="Change Image">
                                <i class="fas fa-pencil-alt"></i>
                                {{ Form::file('image_slider',['id'=>'editHeaderSlider','class' => 'd-none', 'accept' => '.png, .jpg, .jpeg']) }}
                                <input type="hidden" name="avatar_remove">
                            </label>
                            <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="Cancel Image">
                    <i class="fas fa-times"></i></span>
                        </div>

                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('status', __('messages.common.status').(':'),['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-35px h-20px" name="is_active" type="checkbox"
                                   value="1" id="editIsActive" checked>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-3','id'=>'btnEditSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light btn-active-light-primary me-2"
                            id="btnCancel"
                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
