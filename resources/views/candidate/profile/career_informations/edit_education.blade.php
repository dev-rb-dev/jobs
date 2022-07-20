{{ Form::open(['id'=>'editEducationForm']) }}
<div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
<input type="hidden" id="educationId">
<div class="row">
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('degree_level_id', __('messages.candidate_profile.degree_level').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('degree_level_id', $data['degreeLevels'], null, ['class' => 'form-select form-select-solid','required','id' => 'degreeLevelId','placeholder'=>'Select Degree Level','id' => 'editDegreeLevel']) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('degree_title', __('messages.candidate_profile.degree_title').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('degree_title', null, ['class' => 'form-control form-control-solid','id' => 'editDegreeTitle']) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('country', __('messages.company.country').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('country_id', $data['countries'], null, ['id'=>'editEducationCountry','class' => 'form-select form-select-solid','placeholder' => 'Select Country', 'data-modal-type' => 'education', 'data-is-edit' => 'true']) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('state', __('messages.company.state').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('state_id', [], null, ['id'=>'editEducationState','class' => 'form-select form-select-solid','placeholder' => 'Select State', 'data-modal-type' => 'education', 'data-is-edit' => 'true']) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('city', __('messages.company.city').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('city_id', [], null, ['id'=>'editEducationCity','class' => 'form-select form-select-solid','placeholder' => 'Select City', 'data-is-edit' => 'true']) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('institute',__('messages.candidate_profile.institute').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('institute', null, ['class' => 'form-control form-control-solid','required', 'id' => 'editInstitute']) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('result', __('messages.candidate_profile.result').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('result', null, ['class' => 'form-control form-control-solid', 'required', 'id' => 'editResult']) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('year', __('messages.candidate_profile.year').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::selectYear('year', date('Y'), 2000, null, ['class' => 'form-select form-select-solid', 'id' => 'editYear']) }}
    </div>
</div>
<div class="d-flex mt-5">
    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary me-3','id'=>'btnEditEducationSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
    <button type="button" id="btnEditEducationCancel"
            class="btn btn-light btn-active-light-primary me-2">{{ __('messages.common.cancel') }}</button>
</div>
{{ Form::close() }}
