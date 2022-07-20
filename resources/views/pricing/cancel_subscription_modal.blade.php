<div id="cancelSubscriptionModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.plan.cancel_subscription') }}</h2>
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
            {!! Form::open(['id'=>'cancelSubscriptionForm']) !!}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-0">
                        {!! Form::label('cancellation_reason', __('messages.plan.cancel_reason').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) !!}
                        {!! Form::textarea('cancellation_reason', null, ['id'=>'reason','class' => 'form-control form-control-solid textarea-height','required','placeholder' => __('messages.plan.cancel_reason')]) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-start">
                {!! Form::button('Save', ['type'=>'submit','class' => 'btn btn-primary me-3','id'=>'btnCancelSave']) !!}
                <button type="button" class="btn btn-light btn-active-light-primary me-2" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span>{{ __('messages.common.cancel') }}</span>
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
