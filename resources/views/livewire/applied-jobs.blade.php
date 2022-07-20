<div>
    <div class="section gray padding-bottom-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <div class="col-lg-12 col-md-12">
                    @if(count($appliedJobs) > 0 || $searchByAppliedJob != '' || $jobApplicationStatus != '')
                        <div class="row mb-3 justify-content-end">
                            <div class="col-md-3">
                                {{ Form::select('job-application-status', $jobApplicationStatusArr, null, ['class' => 'form-control','id'=>'jobApplicationStatus','placeholder' => 'All', 'wire:model' => "jobApplicationStatus"]) }}
                            </div>
                            <div class="col-md-3">
                                <input wire:model.debounce.100ms="searchByAppliedJob" type="search"
                                       id="searchByAppliedJob"
                                       placeholder="{{ __('web.job_menu.search_applied_job') }}"
                                       class="form-control search-box-placeholder">
                            </div>
                        </div>
                    @endif
                    @if(count($appliedJobs) > 0)
                        <div class="content1 with-padding">
                            <div class="row mt-5 position-relative">
                                @foreach($appliedJobs as $appliedJob)
                                       <div class="col-12 col-sm-6 col-md-6 col-xl-6 mb-4">
                                        <div class="h-100 p-5 shadow rounded">
                                            <div class="text-end">
                                                <a href="javascript:void(0)" data-bs-toggle="dropdown"
                                                   class="notification-toggle action-dropdown position-xs-bottom"
                                                   aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v action-toggle-mr"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <div class="dropdown-list-content dropdown-list-icons">
                                                        <a href="javascript:void(0)"
                                                           class="dropdown-item dropdown-item-desc apply-job-note"
                                                           data-id="{{ $appliedJob->id }}">
                                                            <span class="btn btn-icon btn-bg-primary btn-sm me-2"><i
                                                                    class="fas fa-eye text-white"></i></span>{{ __('messages.common.view') }}
                                                        </a>
                                                        @if(\App\Models\JobApplicationSchedule::whereJobApplicationId($appliedJob->id)->exists() && !($appliedJob->status == \App\Models\JobApplication::REJECTED) && !($appliedJob->status == \App\Models\JobApplication::STATUS_APPLIED) && !($appliedJob->status == \App\Models\JobApplication::COMPLETE))
                                                            <a href="javascript:void(0)"
                                                               class="dropdown-item dropdown-item-desc schedule-slot-book"
                                                               data-id="{{ $appliedJob->id }}">
                                                                <span class="btn btn-icon btn-bg-dark btn-sm me-2"><i
                                                                        class="fas fa-user-clock text-white"></i></span>
                                                                {{ __('messages.job_stage.slots') }}
                                                            </a>
                                                        @endif
                                                        <a class="dropdown-item dropdown-item-desc delete-btn remove-applied-jobs"
                                                           data-id="{{ $appliedJob->id }}">
                                                            <span class="btn btn-icon btn-bg-danger btn-sm me-2 "><i
                                                                    class="fas fa-trash text-white delete-btn"></i></span>{{ __('messages.common.delete') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="d-flex">
                                                    <div class="mb-auto w-100">
                                                        <h3>
                                                            <i class="fas fa-briefcase fs-3 me-1"></i> &nbsp;<a
                                                                href="{{ route('front.job.details',$appliedJob->job->job_id) }}"
                                                                target="_blank">{{ Str::limit($appliedJob->job->job_title,25,'...') }}</a>
                                                            <div
                                                                class="ms-2 badge badge-light-{{ \App\Models\JobApplication::STATUS_COLOR[$appliedJob->status] }}">
                                                                {{ \App\Models\JobApplication::STATUS[$appliedJob->status] }}
                                                            </div>
                                                        </h3>
                                                        <h3>
                                                            <i class="far fa-clock fs-3 me-1"></i>
                                                            &nbsp;<label
                                                                class="w-bolder text-muted mb-3">{{ __('messages.common.applied_on') }}
                                                                :</label>
                                                            {{ (!empty($appliedJob->created_at)) ? $appliedJob->created_at->format('dS M ,Y')  : __('messages.common.n/a') }}
                                                        </h3>
                                                        <h3>
                                                            <i class="fas fa-money-check-alt fs-3 me-1"></i>
                                                            &nbsp;{{ (!empty($appliedJob->expected_salary)) ? number_format($appliedJob->expected_salary)   : __('messages.common.n/a') }} {{ $appliedJob->job->currency->currency_icon }}
                                                        </h3>
                                                        @isset($appliedJob->jobStage->name)
                                                            <h3>
                                                                <i class="fab fa-usps fs-3 me-1"></i>
                                                                &nbsp;{{ $appliedJob->jobStage->name }}
                                                            </h3>
                                                        @endisset
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="float-right my-2">
                                @if($appliedJobs->count() > 0)
                                    {{ $appliedJobs->links() }}
                                @endif
                            </div>
                        </div>
                        @else
                            @if($searchByAppliedJob == null || empty($searchByAppliedJob))
                            <div class="col-lg-12 col-md-12 d-flex justify-content-center my-9">
                                <h5>{{ __('messages.job.no_applied_job_found') }} </h5>
                                </div>
                            @else
                            <div class="col-lg-12 col-md-12 d-flex justify-content-center my-9">
                                <h5>{{ __('messages.job.applies_job_not_found') }} </h5>
                                </div>
                            @endif
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
