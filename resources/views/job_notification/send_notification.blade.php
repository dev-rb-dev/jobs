<div class="row mainJobNotification">
    <div class="form-group col-xl-3 col-md-3 col-sm-12 select-candidate-width">
        {{ Form::label('candidate_id', __('messages.front_home.candidates').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{Form::select('candidate_id[]',$candidates, null, ['class' => 'form-select form-select-solid status-filter select2-hidden-accessible data-allow-clear="true"','id'=>'candidateId','multiple'=>true,'required', 'data-placeholder'=>'Select Candidate'])}}

        <div class="my-5">
            {{--            <label>{{__('messages.job_notification.select_all_jobs')}}: </label>--}}
            {{--            <input type="checkbox" class="form-group ml-2 notification_select_all" id="ckbCheckAll">--}}
            <div class="form-check form-switch form-check-custom form-check-solid form-switch-sm">
                <input type="checkbox" id="ckbCheckAll"
                       class="form-check-input notification_select_all"
                       value="">
                <span class="custom-switch-indicator"></span>

                <label class="form-check-label fs-6 fw-bolder text-gray-700" for="ckbCheckAll">
                    {{__('messages.job_notification.select_all_jobs')}}
                </label>
            </div>
        </div>
    </div>

    <div class="form-group col-xl-9 col-md-9 col-sm-12">
        <ul class="list-unstyled job-notification-ul ml-5">
            @forelse($jobs as $key => $job)
                <li class="media mt-4 notification rounded shadow p-4">
                    <div class="form-group col-md-4 col-sm-12 mb-0 pt-1">
                        <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm">
                            <input type="checkbox" name="job_id[]"
                                   class="form-check-input notification__checkbox jobCheck"
                                   value="{{$job->id}}">
                            <span class="custom-switch-indicator"></span>
                            <a href="{{ route('admin.jobs.show',$job->id) }}" target="_blank"
                               class="media-title mb-1 notification__title form-check-label ms-5">{{ $job->job_title }}</a>
                        </label>
                        <div class="text-time form-check-label ms-15">{{ $job->created_at->diffForHumans() }}</div>
                    </div>
                </li>
            @empty
                <h4 class="text-center mt-9">{{__('messages.job_notification.no_jobs_available')}}.</h4>
            @endforelse
{{--            <li class="no-job-available"><h4--}}
{{--                    class="text-center mt-9">{{__('messages.job_notification.no_jobs_available')}}.</h4></li>--}}
        </ul>
    </div>

    <!-- Submit Field -->
    <div class="d-flex">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3','name' => 'save', 'id' => 'saveJobNotification']) }}
        <a href="{{ route('job-notification.index') }}"
           class="btn btn-light btn-active-light-primary me-2">{{__('messages.common.cancel')}}</a>
    </div>
</div>

