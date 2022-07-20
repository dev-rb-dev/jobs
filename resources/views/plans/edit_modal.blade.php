{{--<div class="modal fade" tabindex="-1" role="dialog" id="editModal">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title">{{ __('messages.plan.edit_subscription_plan') }}</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            {!! Form::open(['id' => 'editForm']) !!}--}}
{{--            <div class="modal-body">--}}
{{--                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>--}}
{{--                {!! Form::hidden('planId',null,['id'=>'planId']) !!}--}}
{{--                <div class="row">--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        {!! Form::label('name', __('messages.inquiry.name').':') !!}<span class="text-danger">*</span>--}}
{{--                        {!! Form::text('name', null, ['id'=>'editName','class' => 'form-control','required']) !!}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        {!! Form::label('allowed_jobs', __('messages.plan.allowed_jobs').':') !!}<span--}}
{{--                                class="text-danger">*</span>--}}
{{--                        {!! Form::number('allowed_jobs', null, ['id'=>'editAllowedJobs', 'class' => 'form-control allowed-jobs', 'required', 'min' => '1', 'max' => '99999']) !!}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        {!! Form::label('currency', __('messages.plan.currency').':') !!}<span--}}
{{--                                class="text-danger">*</span>--}}
{{--                        {!! Form::select('salary_currency_id',[], null, ['id'=>'editCurrency','required','class' => 'form-control select2Selector','placeholder' => 'Select Currency','disabled']) !!}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        {!! Form::label('amount', __('messages.plan.amount').':') !!}<span class="text-danger">*</span>--}}
{{--                        {!! Form::text('amount', null, ['id'=>'editAmount','class' => 'form-control amount', 'required', 'min' => '1', 'max' => '99999', 'readonly', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) !!}--}}
{{--                        <span class="text-danger d-none"--}}
{{--                              id="planAmount">{{ __('messages.plan.plan_amount_cannot_be_changes') }}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="text-right">--}}
{{--                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}--}}
{{--                    <button type="button" id="btnEditCancel" class="btn btn-light ml-1"--}}
{{--                            data-dismiss="modal">{{ __('messages.common.cancel') }}--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            {!! Form::close() !!}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}



<div id="editModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.plan.edit_subscription_plan') }}</h2>
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
            {{ Form::open(['id'=>'editForm']) }}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
                {!! Form::hidden('planId',null,['id'=>'planId']) !!}
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('name', __('messages.inquiry.name').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::text('name', null, ['id'=>'editName','class' => 'form-control form-control-solid','required', 'placeholder' => __('messages.inquiry.name')]) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('allowed_jobs', __('messages.plan.allowed_jobs').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::number('allowed_jobs', null, ['id'=>'editAllowedJobs','class' => 'form-control form-control-solid  allowed-jobs','required', 'min' => '1', 'max' => '99999', 'placeholder' => __('messages.plan.allowed_jobs')]) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('plan_currency', __('messages.plan.currency').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {!! Form::select('salary_currency_id',[], null, ['id'=>'editCurrency','required','class' => 'form-select form-select-solid select2Selector','placeholder' => 'Select Currency']) !!}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('amount', __('messages.plan.amount').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::text('amount', null, ['id'=>'editAmount','class' => 'form-control form-control-solid amount','required', 'min' => '1', 'max' => '99999','readonly', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'placeholder' => __('messages.plan.amount')]) }}
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-3 quill-btn','id' => 'btnEditSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light btn-active-light-primary me-2 quill-btn"
                            id="planBtnCancel"
                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
