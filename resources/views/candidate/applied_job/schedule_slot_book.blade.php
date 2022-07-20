<div class="modal fade" tabindex="-1" role="dialog" id="scheduleSlotBookModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center mb-1">
                <h2>{{ __('messages.job_stage.choose_slots') }}</h2>
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
            {{ Form::open(['id' => 'scheduleSlotBookForm']) }}
            <div class="modal-body">
                <div class="alert-slot-msg alert-danger d-none rounded p-4"
                     id="scheduleSlotBookValidationErrorsBox"></div>
                <div class="alert-slot-msg alert-success d-none rounded p-4"
                     id="selectedSlotBookValidationErrorsBox"></div>
                <div class="slot-main-div mt-2">

                </div>
                <div class="row p-3 choose-slot-textarea d-none">
                    <textarea name="choose_slot_notes" class="textarea-sizing form-control form-control-solid" required
                              placeholder="Enter Notes..." rows="3"></textarea>
                </div>
                <div id="historyMainDiv" class="d-none mt-5">
                    <h3>{{ __('messages.job_stage.history') }}</h3>
                    <div id="historyDiv" class="scroll-history-div">

                    </div>
                </div>
                <div class="d-flex mt-9 justify-content-end">
                    {{ Form::button(__('messages.job_stage.send_slots'), ['type'=>'submit','class' => 'btn btn-primary me-3','id'=>'scheduleInterviewBtnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="submit" value="" class="btn btn-danger rejectSlot me-3" id="rejectSlotBtnSave"
                            name="rejectSlot">{{__('messages.job_stage.reject_all_slot')}}
                    </button>
                    <button type="button" id="scheduleInterviewBtnCancel"
                            class="btn btn-light btn-active-light-primary me-3"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
