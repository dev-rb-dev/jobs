{{--<div id="addJobStageModal" class="modal fade" role="dialog">--}}
{{--    <div class="modal-dialog">--}}
{{--        <!-- Modal content-->--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="JobStageHeader">{{ __('messages.job_stage.new_job_stage') }}</h5>--}}
{{--                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>--}}
{{--            </div>--}}
{{--            {{ Form::open(['id'=>'addJobStageForm']) }}--}}
{{--            <div class="modal-body">--}}
{{--                <div class="alert alert-danger d-none" id="jobStageValidationErrorsBox"></div>--}}
{{--                <div class="row">--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        {{ Form::label('name',__('messages.job_tag.name').':') }}<span class="text-danger">*</span>--}}
{{--                        {{ Form::text('name', null, ['class' => 'form-control','required']) }}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        {{ Form::label('description',__('messages.job_tag.description').':') }}--}}
{{--                        {{ Form::textarea('description', null, ['class' => 'form-control','id' => 'jobStageDescription', 'rows' => '3']) }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="text-right">--}}
{{--                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'jobStageBtnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}--}}
{{--                    <button type="button" id="jobStageBtnCancel" class="btn btn-light ml-1"--}}
{{--                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            {{ Form::close() }}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div id="addJobStageModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.job_stage.new_job_stage') }}</h2>
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
            {{ Form::open(['id'=>'addJobStageForm']) }}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger display-none hide d-none" id="maritalStatusValidationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('name',__('messages.job_tag.name').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::text('name', null, ['id'=>'jobStageName','class' => 'form-control form-control-solid','required','placeholder' => __('messages.job_tag.name')]) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('description', __('messages.marital_status.description').(':'),['class' => 'required form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <div id="jobStageDescription"></div>
                        {{ Form::hidden('description', null, ['id' => 'job_stage_desc']) }}
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-3','id' => 'jobStageBtnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light btn-active-light-primary me-2"
                            id="jobStageBtnCancel"
                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

