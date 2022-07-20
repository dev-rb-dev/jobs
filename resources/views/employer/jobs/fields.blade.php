<div class="row">
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('job_title', __('messages.job.job_title').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('job_title', null, ['class' => 'form-control form-control-solid','required', 'placeholder' => __('messages.job.job_title')]) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('job_type_id', __('messages.job.job_type').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('job_type_id', $data['jobType'],null, ['id'=>'jobTypeId','class' => 'form-select form-select-solid','placeholder' => 'Select Job Type','required']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('job_category_id', __('messages.job_category.job_category').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('job_category_id', $data['jobCategory'],null, ['id'=>'jobCategoryId','class' => 'form-select form-select-solid','placeholder' => 'Select Job Category','required']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('skill_id', __('messages.job.job_skill').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{Form::select('jobsSkill[]',$data['jobSkill'], null, ['class' => 'form-select form-select-solid','id'=>'SkillId','multiple'=>true,'required'])}}
    </div>
    <div class="form-group col-xl-12 col-md-12 col-sm-12 mb-5">
        {{ Form::label('description', __('messages.job.description').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div id="details"></div>
        {{ Form::hidden('description', null, ['id' => 'job_desc']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('no_preference', __('messages.candidate.gender').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('no_preference', $data['preference'], null, ['id'=>'preferenceId','class' => 'form-select form-select-solid','placeholder' => 'Select Gender']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('job_expiry_date', __('messages.job.job_expiry_date').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            <div class="input-group-text border-0">
                <i class="fas fa-calendar-alt"></i>
            </div>
            {{ Form::text('job_expiry_date', isset($job->job_expiry_date) ? $job->job_expiry_date : null, ['class' => 'form-control form-control-solid expiryDatepicker', 'required', 'autocomplete' => 'off', 'placeholder' => __('messages.job.job_expiry_date')]) }}
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('salary_from', __('messages.job.salary_from').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('salary_from', null, ['class' => 'form-control form-control-solid salary', 'id' => 'fromSalary', 'required', 'placeholder' => __('messages.job.salary_from')]) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('salary_to', __('messages.job.salary_to').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('salary_to', null, ['class' => 'form-control form-control-solid salary', 'id' => 'toSalary', 'required', 'placeholder' =>__('messages.job.salary_to')]) }}
        <span id="salaryToErrorMsg" class="text-danger"></span>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('currency_id', __('messages.job.currency').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('currency_id', $data['currencies'], null,
                ['id'=>'currencyId','class' => 'form-select form-select-solid','placeholder' => 'Select Currency','required']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('salary_period_id', __('messages.job.salary_period').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('salary_period_id', $data['salaryPeriods'], null, ['id'=>'salaryPeriodsId','class' => 'form-select form-select-solid','placeholder' => 'Select Salary Period','required']) }}
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('country', __('messages.company.country').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('country_id', $data['countries'], null, ['id'=>'countryId','class' => 'form-select form-select-solid','placeholder' => 'Select Country','required']) }}
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('state', __('messages.company.state').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('state_id', [], null, ['id'=>'stateId','class' => 'form-select form-select-solid','placeholder' => 'Select State','required']) }}
    </div>
    <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-5">
        {{ Form::label('city', __('messages.company.city').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('city_id', [], null, ['id'=>'cityId','class' => 'form-select form-select-solid','placeholder' => 'Select City','required']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('career_level_id', __('messages.job.career_level').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('career_level_id', $data['careerLevels'],null, ['id'=>'careerLevelsId','class' => 'form-select form-select-solid','placeholder' => 'Select Career Level']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('job_shift_id', __('messages.job.job_shift').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('job_shift_id', $data['jobShift'], null, ['id'=>'jobShiftId','class' => 'form-select form-select-solid','placeholder' => 'Select Job Shift']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('tagId', __('messages.job_tag.show_job_tag').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{Form::select('jobTag[]',$data['jobTag'], null, ['class' => 'form-select form-select-solid','id'=>'tagId','multiple'=>true])}}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('degree_level_id', __('messages.job.degree_level').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('degree_level_id', $data['requiredDegreeLevel'], null, ['id'=>'requiredDegreeLevelId','class' => 'form-select form-select-solid','placeholder' => 'Select Degree Level']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('functional_area_id', __('messages.job.functional_area').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('functional_area_id', $data['functionalArea'], null, ['id'=>'functionalAreaId','class' => 'form-select form-select-solid','placeholder' => 'Select Functional Area','required']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('position', __('messages.job.position').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::number('position',  null, ['id'=>'positionId','class' => 'form-control form-control-solid','placeholder' => 'Select Position','required', 'min' => 0, 'max' => 255, 'placeholder' => __('messages.job.position')]) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('experience', __('messages.job_experience.job_experience').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::number('experience',  null, ['id'=>'experienceId','class' => 'form-control form-control-solid','placeholder' => 'Enter experience In Year','required', 'min' => 0, 'max' => 255, 'placeholder' => __('messages.job_experience.job_experience')]) }}
    </div>
    <div class="form-group col-xl-3 col-md-3 col-sm-12 mb-5">
        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.job.hide_salary').':' }}</label><br>
        <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm">
            <input type="checkbox" name="hide_salary" class="form-check-input"
                   value="1"
                   id="salary">
            <span class="custom-switch-indicator"></span>
        </label>
    </div>
    <div class="form-group col-xl-3 col-md-3 col-sm-12 mb-5">
        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.job.is_freelance').':' }}</label><br>
        <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm">
            <input type="checkbox" name="is_freelance" class="form-check-input"
                   value="1"
                   id="freelance">
            <span class="custom-switch-indicator"></span>
        </label>
    </div>
    <!-- Submit Field -->
    <div class="d-flex mt-5">
        {{ Form::button(__('messages.common.save_as_draft'), ['type' => 'submit', 'value'=>1, 'name' => 'saveDraft', 'class' => 'btn btn-primary me-3 saveDraft','id' => 'Draft','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
        {{ Form::button(__('messages.common.save'), ['type' => 'submit', 'name' => 'save','value'=>1, 'class' => 'btn btn-primary me-3','id' => 'Save','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
        <a href="{{ route('job.index') }}" class="btn btn-light btn-active-light-primary me-2">{{__('messages.common.cancel')}}</a>
    </div>

</div>
