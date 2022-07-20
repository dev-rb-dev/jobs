{{--<div class="modal fade" tabindex="-1" role="dialog" id="batchSlotModal">--}}
{{--    <div class="modal-dialog modal-lg" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header align-items-center mb-1">--}}
{{--                <h5 class="modal-title">{{ __('messages.job_stage.add_slot') }}</h5>--}}
{{--            </div>--}}
{{--            {{ Form::open(['id' => 'batchSlotForm']) }}--}}
{{--            <div class="modal-body">--}}
{{--                <div class="alert alert-danger d-none" id="batchSlotValidationErrorsBox"></div>--}}
{{--                <input type="hidden" id="batchSlotId">--}}
{{--                <div class="add-slot-main-div">--}}
{{--                    <div class="slot-box mb-3">--}}
{{--                        <div class="row p-3">--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label name="date"><?php echo __('messages.job_stage.date').':' ?></label>--}}
{{--                                    <span class="text-danger">*</span>--}}
{{--                                    <input type="text" class="form-control" name="date" id="date" required>--}}
{{--                                </div>--}}
{{--                                <div class="form-group mb-0">--}}
{{--                                    <label name="time"><?php echo __('messages.job_stage.time').':' ?></label>--}}
{{--                                    <span class="text-danger">*</span>--}}
{{--                                    <input type="text" class="form-control" name="time" id="time" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-sm-6 mb-0">--}}
{{--                                <label name="notes" class="d-flex justify-content-between"><?php echo __('messages.company.notes').':' ?>--}}
{{--                                </label>--}}
{{--                                <textarea class="form-control textarea-sizing" name="notes"></textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="text-right mt-4">--}}
{{--                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'batchSlotBtnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}--}}
{{--                    <button type="button" id="batchSlotBtnCancel" class="btn btn-light ml-1"--}}
{{--                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            {{ Form::close() }}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


<div id="batchSlotModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.job_stage.add_slot') }}</h2>
                <button type="button" aria-label="Close" class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
						<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
								<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"/>
								<rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1"/>
							</g>
						</svg>
					</span>
                </button>
            </div>
            {{ Form::open(['id'=>'batchSlotForm']) }}
            <div class="modal-body mx-xl-3 mb-7">
                <div class="alert alert-danger d-none" id="batchSlotValidationErrorsBox"></div>
                <input type="hidden" id="batchSlotId">
                <div class="add-slot-main-div">
                    <div class="slot-box rounded shadow mb-5">
                        <div class="row p-5">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label name="date" class="form-label required fs-6 fw-bolder text-gray-700 mb-3"><?php echo __('messages.job_stage.date').':' ?></label>
                                    <input type="text" class="form-control form-control-solid" name="date" id="date" required>
                                </div>
                                <div class="form-group mb-0 mt-3">
                                    <label name="time" class="form-label fs-6 fw-bolder text-gray-700 mb-3 required"><?php echo __('messages.job_stage.time').':' ?></label>
                                    <input type="text" class="form-control form-control-solid" name="time" id="time" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 mb-0">
                                <label name="notes" class="form-label fs-6 fw-bolder text-gray-700 mb-3"><?php echo __('messages.company.notes').':' ?>
                                </label>
                                <textarea class="form-control form-control-solid textarea-sizing" name="notes"
                                          rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-3','id' => 'batchSlotBtnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light btn-active-light-primary me-2" id="batchSlotBtnCancel" data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
