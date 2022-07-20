{{ Form::open(['id'=>'addNewExperienceForm']) }}
<div class="alert alert-danger d-none" id="validationErrorsBox"></div>
<div class="row">
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('experience_title',__('messages.candidate_profile.experience_title').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('experience_title', null, ['class' => 'form-control form-control-solid','required','placeholder'=>__('messages.candidate_profile.experience_title')]) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('company',__('messages.candidate_profile.company').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('company', null, ['class' => 'form-control form-control-solid','required','placeholder'=>__('messages.candidate_profile.company')]) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('country', __('messages.company.country').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('country_id', $data['countries'], null, ['id'=>'countryId','required','class' => 'form-select form-select-solid','placeholder' => 'Select Country', 'data-modal-type' => 'experience']) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('state', __('messages.company.state').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('state_id', [], null, ['id'=>'stateId','class' => 'form-select form-select-solid','placeholder' => 'Select State', 'data-modal-type' => 'experience']) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('city', __('messages.company.city').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('city_id', [], null, ['id'=>'cityId','class' => 'form-select form-select-solid','placeholder' => 'Select City']) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('start_date', __('messages.candidate_profile.start_date').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('start_date', null, ['class' => 'form-control form-control-solid','id' => 'startDate','autocomplete' => 'off', 'required',
'placeholder' => __('messages.candidate_profile.start_date')]) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('end_date', __('messages.candidate_profile.end_date').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <span
            class="required" id="requiredText"></span>
        {{ Form::text('end_date', null, ['class' => 'form-control form-control-solid','id' => 'endDate','autocomplete' => 'off', 'required','placeholder' => __('messages.candidate_profile.end_date')]) }}
    </div>
    <div class="form-group col-sm-6 mb-0 pt-3">
        <label
            class='form-label fs-6 fw-bolder text-gray-700 mb-3'>{{ __('messages.candidate_profile.currently_working') }}</label>
        <div class="col-6 pl-0">
            <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm">
                <input type="checkbox" name="currently_working" class="form-check-input"
                       value="1" id="default">
                <span class="custom-switch-indicator"></span>
            </label>
        </div>
    </div>
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('description', __('messages.candidate_profile.description').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::textarea('description', null, ['class' => 'form-control form-control-solid textarea-sizing','rows'=>'5','placeholder'=>__('messages.candidate_profile.description')]) }}
    </div>
</div>
<div class="d-flex mt-5">
    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary me-3','id'=>'btnExperienceSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
    <button type="button" id="btnCancel"
            class="btn btn-light btn-active-light-primary me-2">{{ __('messages.common.cancel') }}</button>
</div>
{{ Form::close() }}
