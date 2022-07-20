<div id="addJobCategoryModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.job_category.new_job_category') }}</h2>
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
            {{ Form::open(['id'=>'addJobCategoryForm']) }}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger d-none" id="jobCategoryValidationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('name',__('messages.job_category.name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::text('name', null, ['class' => 'form-control form-control-solid','required', 'placeholder' => __('messages.job_category.name')]) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5 h-100">
                        {{ Form::label('description',__('messages.job_category.description').':', ['class' =>'required form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
{{--                        {{ Form::textarea('description', null, ['class' => 'form-control','id' => 'jobCategoryDescription', 'rows' => '5']) }}--}}
                        <div id="jobCategoryDescription" class="job-category-description"></div>
                        {{ Form::hidden('description', null, ['id' => 'jobCategoryDescriptionValue']) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        <div class="row">
                            <div class="form-group col-sm-6 mb-5">
                                <div class="row2">
                                    <div class="d-block">
                                        {{ Form::label('category_image', __('messages.common.category_image').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                                        <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"
                                           data-bs-toggle="tooltip"
                                           title="{{  __('messages.setting.image_validation') }}"></i>
                                    </div>
                                    <div class="image-input image-input-outline" data-kt-image-input="true">
                                        <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                                             id="previewImage"
                                             style="background-image: url({{ asset('assets/img/default-user.png') }})">
                                        </div>
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                            data-bs-original-title="Change Image">
                                            <i class="fas fa-pencil-alt fs-7"></i>
                                            {{ Form::file('customer_image',['id'=>'customerImage','class' => 'd-none', 'accept' => '.png, .jpg, .jpeg']) }}
                                            <input type="hidden" name="avatar_remove">
                                        </label>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                            data-bs-original-title="Cancel Image">
                                            <i class="fas fa-times"></i></span>
                                    </div>
                                </div>
                            </div>
                            {{--                            <div class="pl-3">--}}
                            {{--                                {{ Form::label('category_image', __('messages.common.category_image').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
                            {{--                                <label class="image__file-upload" role="button"> {{ __('messages.setting.choose') }}--}}
                            {{--                                    {{ Form::file('customer_image',['id'=>'customerImage','class' => 'd-none']) }}--}}
                            {{--                                </label>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="w-auto pl-3 mt-1">--}}
                            {{--                                <img id='previewImage' class="img-thumbnail thumbnail-preview"--}}
                            {{--                                     src="{{ asset('assets/img/infyom-logo.png') }}">--}}
                            {{--                            </div>--}}
                            {{--                            <div class="form-group col-sm-6 mb-5">--}}
                            {{--                                <div class="form-check form-check-custom form-check-solid">--}}
                            {{--                                    <input name="is_featured" class="form-check-input"  type="checkbox" value="1"  id="featured"/>--}}
                            {{--                                    <label class="form-check-label fs-6 fw-bolder text-gray-700 mb-3" for="featured">--}}
                            {{--                                        {{__('messages.job_category.is_featured')}}--}}
                            {{--                                    </label>--}}
                            {{--                                </div>--}}

                            {{--                                <label--}}
                            {{--                                    class="form-label fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.job_category.is_featured').':' }}</label>--}}
                            {{--                                <label class="custom-switch pl-0 col-12">--}}
                            {{--                                    <input type="checkbox" name="is_featured" class="custom-switch-input"--}}
                            {{--                                           value="1" id="featured">--}}
                            {{--                                    <span class="custom-switch-indicator"></span>--}}
                            {{--                                </label>--}}
                            {{--                            </div>--}}
                            <div class="form-group col-xl-3 col-md-3 col-sm-12 mb-5">
                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.job_category.is_featured').':' }}</label>
                                <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm">
                                    <input type="checkbox" name="is_featured" class="form-check-input"
                                           id="1">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary me-3','id'=>'jobCategoryBtnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="jobCategoryBtnCancel" class="btn btn-light btn-active-light-primary me-2"
                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
