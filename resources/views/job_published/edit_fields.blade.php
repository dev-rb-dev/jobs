<div class="row">
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('company_id', __('messages.company.company_name').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}<span class="text-danger">*</span>
        {{ Form::select('company_id', $data['companies'],null, ['id'=>'companyId','class' => 'form-select form-select-solid','placeholder' => 'Select Company','required']) }}
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('job_title', __('messages.job.job_title').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}<span class="text-danger">*</span>
        {{ Form::text('job_title', null, ['class' => 'form-control form-control-solid','required', 'placeholder' => __('messages.job.job_title')]) }}
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('job_type_id', __('messages.job.job_type').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}<span class="text-danger">*</span>
        <div class="input-group">
            {{ Form::select('job_type_id', $data['jobType'],null, ['id'=>'jobTypeId','class' => 'form-select form-select-solid','placeholder' => 'Select Job Type','required']) }}
            <div class="input-group-append plus-icon-height">
                <div class="input-group-text  border-0">
                    <a href="javascript:void(0)" class="fw-bolder text-gray-500 addJobTypeModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('job_category_id', __('messages.job_category.job_category').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}<span
                class="text-danger">*</span>
        <div class="input-group">
            {{ Form::select('job_category_id', $data['jobCategory'],null, ['id'=>'jobCategoryId','class' => 'form-select form-select-solid','placeholder' => 'Select Job Category','required']) }}
            <div class="input-group-append plus-icon-height">
                <div class="input-group-text t border-0">
                    <a href="javascript:void(0)" class="fw-bolder text-gray-500 addJobCategoryModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('skill_id', __('messages.job.job_skill').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }} <span class="text-danger">*</span>
        <div class="input-group">
            {{Form::select('jobsSkill[]',$data['jobSkill'], null, ['class' => 'form-select form-select form-select-solid custom-select2','id'=>'SkillId','multiple'=>true,'required','data-control'=>"select2" ])}}
{{--            <div class="input-group-append">--}}
                <div class="input-group-text border-0">
                    <a href="javascript:void(0)" class="fw-bolder text-gray-500 addSkillModal"><i class="fa fa-plus"></i></a>
                </div>
{{--            </div>--}}
        </div>
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('no_preference', __('messages.candidate.gender').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('no_preference', $data['preference'], null, ['id'=>'preferenceId','class' => 'form-select form-select-solid','placeholder' => 'Select Gender']) }}
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 custom-datepicker mb-5">
        {{ Form::label('job_expiry_date', __('messages.job.job_expiry_date').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }} <span class="text-danger">*</span>

        <div class="input-group">
{{--            <div class="input-group-prepend">--}}
                <div class="input-group-text border-0">
                    <i class="fas fa-calendar-alt"></i>
                </div>
{{--            </div>--}}
            {{ Form::text('job_expiry_date', isset($job->job_expiry_date) ? $job->job_expiry_date : null, ['class' => 'form-control form-control-solid expiryDatepicker', 'required', 'autocomplete' => 'off', 'placeholder' => __('messages.job.job_expiry_date')]) }}
        </div>
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('salary_from', __('messages.job.salary_from').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}<span class="text-danger">*</span>
        {{ Form::text('salary_from', null, ['class' => 'form-control form-control-solid salary', 'id' => 'fromSalary', 'required', 'placeholder' => __('messages.job.salary_from')]) }}
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('salary_to', __('messages.job.salary_to').':',  ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}<span class="text-danger">*</span>
        {{ Form::text('salary_to', null, ['class' => 'form-control form-control-solid salary', 'id' => 'toSalary', 'required', 'placeholder' => __('messages.job.salary_to')]) }}
        <span id="salaryToErrorMsg" class="text-danger"></span>
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('currency_id', __('messages.job.currency').':',  ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}<span class="text-danger">*</span>
        {{ Form::select('currency_id', $data['currencies'], null, ['id'=>'currencyId','class' => 'form-select form-select-solid','placeholder' => 'Select Currency','required']) }}
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('salary_period_id', __('messages.job.salary_period').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}<span class="text-danger">*</span>
        <div class="input-group">
            {{ Form::select('salary_period_id', $data['salaryPeriods'], null, ['id'=>'salaryPeriodsId','class' => 'form-select form-select-solid','placeholder' => 'Select Salary Period','required']) }}
            <div class="input-group-append plus-icon-height">
                <div class="input-group-text border-0">
                    <a href="javascript:void(0)" class="addSalaryPeriodModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('country', __('messages.company.country').':',  ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}<span class="text-danger">*</span>
        <div class="input-group">
            {{ Form::select('country_id', $data['countries'], null, ['id'=>'countryId','class' => 'form-select form-select-solid','placeholder' => 'Select Country','required']) }}
            <div class="input-group-append plus-icon-height">
                <div class="input-group-text border-0">
                    <a href="javascript:void(0)" class="addCountryModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('state', __('messages.company.state').':',  ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}<span class="text-danger">*</span>
        <div class="input-group">
            {{ Form::select('state_id', (isset($states) && $states!=null?$states:[]), null, ['id'=>'stateId','class' => 'form-select form-select-solid','placeholder' => 'Select State']) }}
            <div class="input-group-append plus-icon-height">
                <div class="input-group-text border-0">
                    <a href="javascript:void(0)" class="addStateModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('city', __('messages.company.city').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}<span class="text-danger">*</span>
        <div class="input-group">
            {{ Form::select('city_id', (isset($cities) && $cities!=null?$cities:[]), null, ['id'=>'cityId','class' => 'form-select form-select-solid','placeholder' => 'Select City','required']) }}
            <div class="input-group-append plus-icon-height">
                <div class="input-group-text border-0">
                    <a href="javascript:void(0)" class="addCityModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('career_level_id', __('messages.job.career_level').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            {{ Form::select('career_level_id', $data['careerLevels'],null, ['id'=>'careerLevelsId','class' => 'form-select form-select-solid','placeholder' => 'Select Career Level']) }}
            <div class="input-group-append plus-icon-height">
                <div class="input-group-text border-0">
                    <a href="javascript:void(0)" class="addCareerLevelModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('job_shift_id', __('messages.job.job_shift').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            {{ Form::select('job_shift_id', $data['jobShift'], null, ['id'=>'jobShiftId','class' => 'form-select form-select-solid','placeholder' => 'Select Job Shift']) }}
            <div class="input-group-append plus-icon-height">
                <div class="input-group-text border-0">
                    <a href="javascript:void(0)" class="addJobShiftModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('tagId', __('messages.job_tag.show_job_tag').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            {{Form::select('jobTag[]',$data['jobTag'], (count($data['jobTags']) > 0)?$data['jobTags']:null, ['class' => 'form-select form-select-solid custom-select2','id'=>'tagId','multiple'=>true])}}
{{--            <div class="input-group-append plus-icon-height">--}}
                <div class="input-group-text border-0">
                    <a href="javascript:void(0)" class="addJobTagModal"><i class="fa fa-plus"></i></a>
                </div>
{{--            </div>--}}
        </div>
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('degree_level_id', __('messages.job.degree_level').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            {{ Form::select('degree_level_id', $data['requiredDegreeLevel'], null, ['id'=>'requiredDegreeLevelId','class' => 'form-select form-select-solid','placeholder' => 'Select Degree Level']) }}
            <div class="input-group-append plus-icon-height">
                <div class="input-group-text border-0">
                    <a href="javascript:void(0)" class="addRequiredDegreeLevelTypeModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('functional_area_id', __('messages.job.functional_area').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}<span
                class="text-danger">*</span>
        <div class="input-group">
            {{ Form::select('functional_area_id', $data['functionalArea'], null, ['id'=>'functionalAreaId','class' => 'form-select form-select-solid','placeholder' => 'Select Functional Area','required']) }}
            <div class="input-group-append plus-icon-height">
                <div class="input-group-text border-0">
                    <a href="javascript:void(0)" class="addFunctionalAreaModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('position', __('messages.job.position').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}<span class="text-danger">*</span>
        {{ Form::number('position',  null, ['id'=>'positionId','class' => 'form-control form-control-solid','placeholder' => 'Select Position','required', 'min' => 0, 'max' => 255]) }}
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('experience', __('messages.job_experience.job_experience').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}<span
                class="text-danger">*</span>
        {{ Form::number('experience',  null, ['id'=>'experienceId','class' => 'form-control form-control-solid','placeholder' => 'Enter Experience In Year','required', 'min' => 0, 'max' => 255]) }}
    </div>
    <div class="form-group col-xl-12 col-md-12 col-sm-12 mb-5">
        {{ Form::label('description', __('messages.job.description').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}<span class="text-danger">*</span>
        <div id="editDetails"></div>
        {{ Form::hidden('description', $job->description, ['id' => 'editJobDescription']) }}
{{--        {{ Form::textarea('description', null, ['class' => 'form-control' , 'id' => 'details', 'rows' => '5']) }}--}}
    </div>
{{--    <div class="form-group col-xl-3 col-md-3 col-sm-12 mb-5">--}}
{{--        <label>{{ __('messages.job.hide_salary').':' }}</label>--}}
{{--        <label class="custom-switch pl-0 col-12">--}}
{{--            <input type="checkbox" name="hide_salary" class="custom-switch-input"--}}
{{--                   id="salary" value="1" {{$job->hide_salary == 1? 'checked' : ''}}>--}}
{{--            <span class="custom-switch-indicator"></span>--}}
{{--        </label>--}}
{{--    </div>--}}

    <div class="form-group col-xl-3 col-md-3 col-sm-12 mb-5 quill-container">
        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.job.hide_salary').':' }}</label>
        <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm">
            <input type="checkbox" name="hide_salary" class="form-check-input"
                   id="salary"  value="1"  {{$job->hide_salary == 1? 'checked' : ''}}>
            <span class="custom-switch-indicator"></span>
        </label>
    </div>
{{--    <div class="form-group col-xl-3 col-md-3 col-sm-12 mb-5">--}}
{{--        <label>{{ __('messages.job.is_freelance').':' }}</label>--}}
{{--        <label class="custom-switch pl-0 col-12">--}}
{{--            <input type="checkbox" name="is_freelance" class="custom-switch-input"--}}
{{--                   id="freelance" value="1" {{$job->is_freelance == 1? 'checked' : ''}}>--}}
{{--            <span class="custom-switch-indicator"></span>--}}
{{--        </label>--}}
{{--    </div>--}}
    <div class="form-group col-xl-3 col-md-3 col-sm-12 mb-5 quill-container">
        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.job.is_freelance').':' }}</label>
        <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm">
            <input type="checkbox" name="is_freelance" class="form-check-input"
                   id="freelance" value="1" {{$job->is_freelance == 1? 'checked' : ''}}>
            <span class="custom-switch-indicator"></span>
        </label>
    </div>

    <!-- Submit Field -->
    <div class="d-flex">
        {{ Form::submit(__('messages.common.pending'), ['class' => 'btn btn-info me-3','name' => 'pending', 'id' => 'savePending']) }}
        {{ Form::submit(__('messages.common.decline'), ['class' => 'btn btn-danger me-3','name' => 'decline', 'id' => 'saveDecline']) }}
        {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-3','id' => 'editBtnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
        <a href="{{ route('admin.job_published.index') }}"
           class="btn btn-light btn-active-light-primary me-2">{{__('messages.common.cancel')}}</a>
    </div>
</div>
