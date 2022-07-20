{{--<div class="row details-page">--}}
{{--    <div class="form-group col-sm-3">--}}
{{--        {{ Form::label('name', __('messages.inquiry.name').':') }}--}}
{{--        <p>{{ html_entity_decode($inquiry->name) }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-sm-3">--}}
{{--        {{ Form::label('email', __('messages.inquiry.email').':') }}--}}
{{--        <p>{{ $inquiry->email }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-sm-3">--}}
{{--        {{ Form::label('phone_no', __('messages.inquiry.phone_no').':') }}--}}
{{--        <p>{{ (isset($inquiry->phone_no)) ? $inquiry->phone_no : __('messages.common.n/a') }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-sm-3">--}}
{{--        {{ Form::label('subject', __('messages.inquiry.subject').':') }}--}}
{{--        <p>{{ $inquiry->subject }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-sm-3">--}}
{{--        {{ Form::label('created_at', __('messages.common.created_on').':') }}--}}
{{--        <p>{{ $inquiry->created_at->diffForHumans() }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-sm-3">--}}
{{--        {{ Form::label('updated_at', __('messages.common.last_updated').':') }}--}}
{{--        <p>{{ $inquiry->updated_at->diffForHumans() }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-sm-12">--}}
{{--        {{ Form::label('message', __('messages.inquiry.message').':') }}--}}
{{--        <p>{!! nl2br($inquiry->message) !!} </p>--}}
{{--    </div>--}}
{{--</div>--}}


{{--    <div class="form-group col-sm-3">--}}
{{--        {{ Form::label('name', __('messages.inquiry.name').(':'), ['class' => 'fw-bolder text-muted mb-3']) }}--}}
{{--        <p  class="fw-bolder fs-6 text-gray-800">{{ html_entity_decode($inquiry->name) }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-sm-3">--}}
{{--        {{ Form::label('email', __('messages.inquiry.email').(':'), ['class' => 'fw-bolder text-muted mb-3']) }}--}}
{{--        <p class="fw-bolder fs-6 text-gray-800">{{ $inquiry->email }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-sm-3">--}}
{{--        {{ Form::label('phone_no', __('messages.inquiry.phone_no').(':'), ['class' => 'fw-bolder text-muted mb-3']) }}--}}
{{--        <p class="fw-bolder fs-6 text-gray-800">{{ (isset($inquiry->phone_no)) ? $inquiry->phone_no : __('messages.common.n/a') }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-sm-3">--}}
{{--        {{ Form::label('subject', __('messages.inquiry.subject').(':'), ['class' => 'fw-bolder text-muted mb-3']) }}--}}
{{--        <p class="fw-bolder fs-6 text-gray-800">{{ $inquiry->subject }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-sm-3">--}}
{{--        {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'fw-bolder text-muted mb-3']) }}--}}
{{--        <p class="fw-bolder fs-6 text-gray-800">{{ $inquiry->created_at->diffForHumans() }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-sm-3">--}}
{{--        {{ Form::label('updated_at', __('messages.common.last_updated').(':'), ['class' => 'fw-bolder text-muted mb-3']) }}--}}
{{--        <p class="fw-bolder fs-6 text-gray-800">{{ $inquiry->updated_at->diffForHumans() }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-sm-12">--}}
{{--        {{ Form::label('message',__('messages.inquiry.message').(':'), ['class' => 'fw-bolder text-muted mb-3']) }}--}}
{{--        <p class="fw-bolder fs-6 text-gray-800">{!! nl2br($inquiry->message) !!} </p>--}}
{{--    </div>--}}


<div id="showModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.inquiry.inquiry_details') }}</h2>
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
            {{ Form::open(['id' => 'inquiryShowForm']) }}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger display-none hide d-none" id="inquiryShowValidationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('name', __('messages.inquiry.name').(':'), ['class' => 'fw-bolder text-muted mb-3']) }}
                        <br>
                        <p id="showName" class="fw-bolder fs-6 text-gray-800"></p>
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('email', __('messages.inquiry.email').(':'), ['class' => 'fw-bolder text-muted mb-3']) }}
                        <p id="showEmail" class="fw-bolder fs-6 text-gray-800"></p>
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('phone_no', __('messages.inquiry.phone_no').(':'), ['class' => 'fw-bolder text-muted mb-3']) }}
                        <p id="showPhoneNo" class="fw-bolder fs-6 text-gray-800"></p>
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('subject', __('messages.inquiry.subject').(':'), ['class' => 'fw-bolder text-muted mb-3']) }}
                        <p id="showSubject" class="fw-bolder fs-6 text-gray-800"></p>
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'fw-bolder text-muted mb-3']) }}
                        <p id="showCreatedAt" class="fw-bolder fs-6 text-gray-800"></p>
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('updated_at', __('messages.common.last_updated').(':'), ['class' => 'fw-bolder text-muted mb-3']) }}
                        <p id="showUpdatedAt" class="fw-bolder fs-6 text-gray-800"></p>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('message',__('messages.inquiry.message').(':'), ['class' => 'fw-bolder text-muted mb-3']) }}
                        <p id="showMessage" class="fw-bolder fs-6 text-gray-800"></p>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

