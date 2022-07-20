<div>
    @if(count($jobSchedules) > 0)
        @foreach($jobSchedules as $batch => $jobSchedule)
            <div class="slot-box-inner mb-3">
                <div class="slot-box-inner-heading p-5 d-flex justify-content-between align-items-center">
                    <h1>{{__('messages.job_stage.batch')}} {{$batch}}</h1>
                    @if($jobApplication->job_stage_id==$jobSchedule[0]->stage_id)
                        <a href="javascript:void(0)" class="btn btn-primary form-btn btn-sm float-right batch-slot"
                           data-batch="{{ $batch }}">
                            <i class="fas fa-plus"></i> {{ __('messages.common.add') }}
                        </a>
                    @endif
                </div>
                @foreach($jobSchedule as $key => $value)
                    <div
                        class="slot-data mb-5">
                        <input type="hidden"
                               class="{{$value->status == \App\Models\JobApplicationSchedule::STATUS_REJECTED ? 'slot-bg-danger' : ''}}{{$value->status == \App\Models\JobApplicationSchedule::STATUS_SEND ? 'slot-bg-success' : ''}}"
                               value="{{$value->id}}">
                        <div
                            class="row shadow-sm py-9 px-5 rounded {{$value->status == \App\Models\JobApplicationSchedule::STATUS_REJECTED ? 'slot-bg-danger' : ''}}{{$value->status == \App\Models\JobApplicationSchedule::STATUS_SEND ? 'slot-bg-success' : ''}}">
                            <div class="col-sm-1 d-flex justify-content-center align-items-center">
                                <h6>{{$loop->iteration}}.</h6>
                            </div>
                            <div class="col-sm-5 mb-3">
                                <div class="form-group">
                                    <label name="date"
                                           class="form-label fs-6 fw-bolder text-gray-700 mb-3 required">{{ __('messages.job_stage.date').':' }}</label>
                                    <input type="text" class="form-control form-control-solid" name=""
                                           value="{{ $value->date }}" disabled required>
                                </div>
                                <div class="form-group mb-0 mt-3">
                                    <label name="time" class="form-label fs-6 fw-bolder text-gray-700 mb-3 required">{{ __('messages.job_stage.time').':' }}</label>
                                    <input type="text" class="form-control form-control-solid" name=""
                                           value="{{ $value->time }}" disabled required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 mb-0">
                                <label name="notes"
                                       class="d-flex justify-content-between form-label fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.job.notes').':' }}
                                    <div class="h-100" style="margin-top: -10px;">
                                        @if($jobApplication->job_stage_id==$jobSchedule[0]->stage_id)
                                            @if(!($value->status == \App\Models\JobApplicationSchedule::STATUS_SEND) && !($value->status == \App\Models\JobApplicationSchedule::STATUS_REJECTED))
                                                <a title="{{ __('messages.common.edit') }}"
                                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit-btn"
                                                   href="javascript:void(0)" data-id="{{$value->id}}">
                                                    <span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
            <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
            </svg>
        </span>
                                                </a>
                                            @endif
                                        @endif
                                        <a title="{{ __('messages.common.delete') }}"
                                           class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1 action-btn delete-btn"
                                           data-id="{{$value->id}}" href="javascript:void(0)">
                                            <span class="svg-icon svg-icon-3"><i class="fa fa-trash"></i></span>
                                        </a>
                                    </div>
                                </label>
                                <textarea class="form-control form-control-solid textarea-sizing" name=""
                                          disabled rows="5">{{ $value->notes }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div
                        class="row shadow rounded mb-5 p-5 choose-slot-textarea {{ ($value->status == \App\Models\JobApplicationSchedule::STATUS_SEND) ? '' : 'd-none' }}">
                        {{ Form::label('candidate_slot', __('messages.job_stage.candidate_note').':',['class'=>'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <textarea name="choose_slot_notes" class="textarea-sizing form-control form-control-solid"
                                  readonly
                                  placeholder="Enter Notes...">{{ $value->rejected_slot_notes }}</textarea>
                        @if($isLastRecordStage == $value->stage_id)
                            {{ Form::label('candidate_slot', __('messages.job_stage.your_note').':', ['class' => 'mt-3 form-label fs-6 fw-bolder text-gray-700 required']) }}
                            <textarea name="cancel_slot_notes"
                                      class="textarea-sizing form-control form-control-solid cancel-slot-notes" required
                                      placeholder="Enter Cancel Reason..."></textarea>
                            <div class="text-center">
                                <a href="javascript:void(0)"
                                   class="btn btn-light-danger form-btn float-right cancel-slot mt-4 mx-auto"
                                   data-schedule="{{$value->id}}">{{ __('messages.job_stage.cancel_slot') }}</a>
                            </div>
                        @endif
                    </div>
                @endforeach

                <?php
                $candidateRejectedSlot = $jobSchedule->where('status',
                    App\Models\JobApplicationSchedule::STATUS_REJECTED)
                    ->where('employer_cancel_slot_notes', '==', null)->count();
                $employerRejectedSlot = $jobSchedule->where('status',
                    App\Models\JobApplicationSchedule::STATUS_REJECTED)
                    ->where('employer_cancel_slot_notes', '!=', null)->count();
                ?>
                @if($candidateRejectedSlot > 0)
                    <div class="row shadow-sm py-5 choose-slot-textarea
                                {{ ($value->status == \App\Models\JobApplicationSchedule::STATUS_REJECTED && empty($value->employer_cancel_slot_notes)) ? '' : 'd-none' }}">
                        <div class="col-sm-12 d-flex flex-column">
                            <span><b>Reason:-</b> {{ $value->rejected_slot_notes }}</span>
                            <span name="choose_slot_notes">
                                {{ $value->jobApplication->candidate->user->full_name . __('messages.job_stage.cancel_this_slot') }}
                            </span>
                        </div>
                    </div>
                @endif
                @if($employerRejectedSlot > 0 && !empty($value->rejected_slot_notes))
                    <div class="row shadow-sm py-5 choose-slot-textarea
{{ ($value->status == \App\Models\JobApplicationSchedule::STATUS_REJECTED && !empty($value->employer_cancel_slot_notes)) ? '' : 'd-none' }}">
                        <div class="col-sm-12 d-flex flex-column">
                            <span><b>Reason:-</b> {{ $value->employer_cancel_slot_notes }}</span>
                            <span name="choose_slot_notes">
                                You cancel this slot for date:- {{ $value->date }} and time:- {{ $value->time }}
                            </span>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    @else
        <div class="col-lg-12 col-md-12 d-flex justify-content-center">
            <h5>{{ __('messages.job_stage.no_slot_available') }} </h5>
        </div>
    @endif
</div>
