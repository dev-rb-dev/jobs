{{--<div class="modal fade" tabindex="-1" role="dialog" id="scheduleInterviewModal">--}}
{{--    <div class="modal-dialog modal-lg" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header align-items-center mb-1">--}}
{{--                <h5 class="modal-title">{{ __('messages.job_stage.add_slots') }}</h5>--}}
{{--                <a href="javascript:void(0)" class="btn btn-primary form-btn add-slot">--}}
{{--                    {{ __('messages.job_stage.add_slots') }}--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            {{ Form::open(['id' => 'scheduleInterviewForm']) }}--}}
{{--            <div class="modal-body">--}}
{{--                <div class="alert alert-danger d-none" id="rejectSlotValidationErrorsBox"></div>--}}
{{--                <div class="slot-main-div">--}}
{{--                    <div class="slot-box mb-3">--}}
{{--                        <div class="row p-3">--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label name="date"><?php echo __('messages.job_stage.date').':' ?></label>--}}
{{--                                    <span class="text-danger">*</span>--}}
{{--                                    <a href="javascript:void(0)" aria-label="Close" class="close text-danger delete-schedule-slot mobile-close">×</a>--}}
{{--                                    <input type="text" class="form-control date" name="date[1]" id="date[1]" required>--}}
{{--                                </div>--}}
{{--                                <div class="form-group mb-0">--}}
{{--                                    <label name="time"><?php echo __('messages.job_stage.time').':' ?></label>--}}
{{--                                    <span class="text-danger">*</span>--}}
{{--                                    <input type="text" class="form-control time" name="time[1]" id="time[1]" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-sm-6 mb-0 mt-25">--}}
{{--                                <label name="notes" class="d-flex justify-content-between"><?php echo __('messages.company.notes').':' ?>--}}
{{--                                    <a href="javascript:void(0)" aria-label="Close" class="close text-danger delete-schedule-slot desktop-close">×</a>--}}
{{--                                </label>--}}
{{--                                <textarea class="form-control textarea-sizing" name="notes[1]"></textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div id="historyMainDiv" class="d-none">--}}
{{--                    <h3>{{ __('messages.job_stage.history') }}</h3>--}}
{{--                    <div id="historyDiv">--}}
{{--                        --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="text-right mt-4">--}}
{{--                    {{ Form::button(__('messages.job_stage.send_slots'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'scheduleInterviewBtnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}--}}
{{--                    <button type="button" id="scheduleInterviewBtnCancel" class="btn btn-light ml-1"--}}
{{--                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            {{ Form::close() }}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


<div id="scheduleInterviewModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.job_stage.add_slots') }}</h2>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary form-btn add-slot">
                    <i class="fas fa-plus"></i>{{ __('messages.job_stage.add_slots') }}
                </a>
            </div>
            {{ Form::open(['id'=>'scheduleInterviewForm']) }}

            <div class="modal-body mx-xl-3 mb-7">
                <div class="alert alert-danger d-none" id="rejectSlotValidationErrorsBox"></div>

                <div class="slot-main-div">
                    <div class="slot-box rounded shadow mb-5">
                        <div class="row p-5">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label name="date"
                                           class="form-label fs-6 fw-bolder text-gray-700 mb-3 required"><?php echo __('messages.job_stage.date') . ':' ?></label>
                                    <input type="text" class="form-control form-control-solid date" name="date[1]"
                                           id="date[1]" required>
                                </div>
                                <div class="form-group mb-0 mt-3">
                                    <label name="time" class="form-label fs-6 fw-bolder text-gray-700 mb-3 required"><?php echo __('messages.job_stage.time').':' ?></label>
                                    <input type="text" class="form-control form-control-solid time" name="time[1]" id="time[1]" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 mb-0 mt-25">
                                <label name="notes" class="d-flex justify-content-between form-label fs-6 fw-bolder text-gray-700 mb-3"><?php echo __('messages.company.notes').':' ?>
                                </label>
                                <textarea class="form-control textarea-sizing form-control-solid" name="notes[1]"
                                          rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="historyMainDiv" class="d-none">
                    <h3>{{ __('messages.job_stage.history') }}</h3>
                    <div id="historyDiv">

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
