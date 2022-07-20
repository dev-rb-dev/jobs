<div class="modal fade" tabindex="-1" role="dialog" id="editModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{__('messages.testimonial.edit_testimonial')}}</h2>
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
            {{ Form::open(['id' => 'editForm']) }}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('testimonialId',null,['id'=>'testimonialId']) }}
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('customer_name', __('messages.testimonial.customer_name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::text('customer_name', null, ['class' => 'form-control form-control-solid','required' , 'id' => 'editCustomerName', 'placeholder' => __('messages.testimonial.customer_name')]) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        <div class="row2">
                            <div class="d-block">
                                {{ Form::label('customer_image', __('messages.testimonial.customer_image').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"
                                   data-bs-toggle="tooltip"
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
                                    data-bs-original-title="Change Image">
                                    <i class="fas fa-pencil-alt fs-7"></i>
                                    {{ Form::file('customer_image',['id'=>'editCustomerImage','class' => 'd-none', 'accept' => '.png, .jpg, .jpeg']) }}
                                    <input type="hidden" name="avatar_remove">
                                </label>
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="Cancel Image">
                                                               <i class="fas fa-times"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('description', __('messages.testimonial.description').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <div id="editDescription"></div>
                        {{ Form::hidden('description', null, ['id' => 'testimonial_edit_desc']) }}
                    </div>
                </div>
                <div class="d-flex">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary me-3','id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnEditCancel" class="btn btn-light btn-active-light-primary me-3"
                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
