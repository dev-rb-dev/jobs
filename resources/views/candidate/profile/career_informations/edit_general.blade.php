{{ Form::open(['id'=>'editGeneralForm']) }}
<div class="row">
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('first_name',__('messages.candidate.first_name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('first_name', null, ['class' => 'form-control form-control-solid','required','id'=> 'first_name','placeholder'=> __('messages.candidate.first_name')]) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('last_name',__('messages.candidate.last_name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('last_name', null, ['class' => 'form-control form-control-solid','required','id'=>'last_name','placeholder'=> __('messages.candidate.last_name')]) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('email',__('messages.candidate.email').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('email', null, ['class' => 'form-control form-control-solid','required','id'=>'email','disabled']) }}
    </div>
{{--    <div class="form-group col-sm-6 mb-5">--}}
{{--        {{ Form::label('phone',__('messages.candidate.phone').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        {{ Form::tel('phone', null, ['class' => 'form-control form-control-solid','id'=>'phone','placeholder'=>__('messages.candidate.phone')]) }}--}}
{{--    </div>--}}  
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('phone',__('messages.candidate.phone').(':'),['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="form-group col-sm-12 mb-5">
            {{ Form::tel('phone',  null, ['class' => 'form-control form-control-solid','onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','id'=>'phone','placeholder'=>__('messages.candidate.phone')]) }}
        </div>
    </div>
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('skillId',__('messages.candidate.candidate_skill').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{Form::select('candidateSkills[]',$data['skills'], (count($candidateSkills) > 0)?$candidateSkills:null, ['class' => 'form-select form-select-solid ','id'=>'skillId','multiple'=>true,'required'])}}
    </div>
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('country', __('messages.company.country').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('country_id', $data['countries'], null, ['id'=>'candidateCountryId','class' => 'form-select form-select-solid','placeholder' => 'Select Country','required']) }}
    </div>
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('state', __('messages.company.state').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('state_id', [], null, ['id'=>'candidateStateId','class' => 'form-select form-select-solid','placeholder' => 'Select State']) }}
    </div>
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('city', __('messages.company.city').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('city_id', [], null, ['id'=>'candidateCityId','class' => 'form-select form-select-solid','placeholder' => 'Select City']) }}
    </div>
</div>
<div class="d-flex">
    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary me-3','id'=>'btnEditGeneralSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
    <button type="button" id="btnGeneralCancel"
            class="btn btn-light btn-active-light-primary me-2">{{ __('messages.common.cancel') }}</button>
</div>
{{ Form::close() }}
