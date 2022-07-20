<div id="editModal" tabindex="-1" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{__('messages.branding_slider.edit_branding_slider')}}</h2>
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
            {{ Form::open(['id' => 'editForm', 'files' => true]) }}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('brandingSliderId', null, ['id' => 'brandingSliderId']) }}
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        <div class="row">
                            <div class="form-group col-sm-12 mb-5">
                                {{ Form::label('title', __('messages.candidate_profile.title').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                                {{ Form::text('title', null, ['class' => 'form-control form-control-solid', 'id' => 'editTitle', 'required', 'placeholder' =>  __('messages.candidate_profile.title')]) }}
                            </div>
                            <div class="form-group col-sm-12 mb-5">
                                <div class="row2">
                                    <div class="d-block">
                                        {{ Form::label('branding_slider', __('messages.image_slider.image').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                                        <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"
                                           data-bs-toggle="tooltip"
                                           data-placement="top"
                                           title="{{  __('messages.setting.image_validation') }}"></i>
                                    </div>
                                    <div class="image-input image-input-outline" data-kt-image-input="true">
                                        <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                                             id="editPreviewImage"
                                             style="background-image: url({{ asset('assets/img/infyom-logo.png') }})">
                                        </div>
                                        <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                                data-bs-original-title="Change image">
                                            <i class="fas fa-pencil-alt fs-7"></i>
                                            {{ Form::file('branding_slider',['id'=>'editBrandingSlider','class' => 'd-none', 'accept' => '.png, .jpg, .jpeg']) }}
                                            <input type="hidden" name="avatar_remove">
                                        </label>
                                        <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                                data-bs-original-title="Cancel image">
                                                                <i class="fas fa-times"></i></span>
                                    </div>
                                </div>
                            </div>
                            {{--                            <div class="form-group col-sm-12 mb-0 pt-1">--}}
                            {{--                                <a href="#" target="_blank" id="brandingSliderUrl"></a>--}}
                            {{--                            </div>--}}
                            <div class="form-group col-sm-6 mb-5">
                                <label
                                    class="form-label fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.common.status').':' }}</label>
                                <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm">
                                    <input type="checkbox" name="is_active" id="editIsActive" class="form-check-input"
                                           id="active">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit', 'class' => 'btn btn-primary me-3', 'id' => 'btnEditSave', 'data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light btn-active-light-primary me-2" data-bs-dismiss="modal">
                        {{ __('messages.common.cancel') }}
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
