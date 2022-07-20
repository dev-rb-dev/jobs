{{--<div id="editExperienceModal" class="modal fade" role="dialog">--}}
{{--    <div class="modal-dialog">--}}
{{--        <!-- Modal content-->--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title">{{ __('messages.candidate_profile.edit_experience') }}</h5>--}}
{{--                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>--}}
{{--            </div>--}}
{{--            {{ Form::open(['id'=>'editExperienceForm']) }}--}}
{{--            <div class="modal-body">--}}
{{--                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>--}}
{{--                <input type="hidden" id="experienceId">--}}
{{--                <div class="row">--}}
{{--                    <div class="form-group col-sm-6">--}}
{{--                        {{ Form::label('experience_title',__('messages.candidate_profile.experience_title').':') }}<span--}}
{{--                                class="text-danger">*</span>--}}
{{--                        {{ Form::text('experience_title', null, ['class' => 'form-control','required', 'id' => 'editTitle']) }}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-6">--}}
{{--                        {{ Form::label('company',__('messages.candidate_profile.company').':') }}<span--}}
{{--                                class="text-danger">*</span>--}}
{{--                        {{ Form::text('company', null, ['class' => 'form-control','required', 'id' => 'editCompany']) }}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-6">--}}
{{--                        {{ Form::label('country', __('messages.company.country').':') }}<span--}}
{{--                                class="text-danger">*</span>--}}
{{--                        {{ Form::select('country_id', $data['countries'], null, ['id'=>'editCountry','class' => 'form-control','placeholder' => 'Select Country', 'data-modal-type' => 'experience', 'data-is-edit' => 'true']) }}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-6">--}}
{{--                        {{ Form::label('state', __('messages.company.state').':') }}--}}
{{--                        {{ Form::select('state_id', [], null, ['id'=>'editState','class' => 'form-control','placeholder' => 'Select State', 'data-modal-type' => 'experience', 'data-is-edit' => 'true']) }}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-6">--}}
{{--                        {{ Form::label('city', __('messages.company.city').':') }}--}}
{{--                        {{ Form::select('city_id', [], null, ['id'=>'editCity','class' => 'form-control','placeholder' => 'Select City', 'data-is-edit' => 'true']) }}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-6">--}}
{{--                        {{ Form::label('start_date', __('messages.candidate_profile.start_date').':') }}<span--}}
{{--                                class="text-danger">*</span>--}}
{{--                        {{ Form::text('start_date', null, ['class' => 'form-control','id' => 'editStartDate','autocomplete' => 'off', 'required']) }}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-6">--}}
{{--                        {{ Form::label('end_date', __('messages.candidate_profile.end_date').':') }}<span--}}
{{--                                class="text-danger d-none" id="editRequiredText">*</span>--}}
{{--                        {{ Form::text('end_date', null, ['class' => 'form-control','id' => 'editEndDate','autocomplete' => 'off', 'required']) }}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-6 mb-0 pt-3">--}}
{{--                        <label>{{ __('messages.candidate_profile.currently_working') }}</label>--}}
{{--                        <label class="custom-switch pl-0 col-12">--}}
{{--                            <input type="checkbox" name="currently_working" class="custom-switch-input"--}}
{{--                                   value="1" id="editWorking">--}}
{{--                            <span class="custom-switch-indicator"></span>--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        {{ Form::label('description', __('messages.candidate_profile.description').':') }}--}}
{{--                        {{ Form::textarea('description', null, ['class' => 'form-control textarea-sizing','rows'=>'5','id' => 'editDescription']) }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="text-right">--}}
{{--                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditExperienceSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}--}}
{{--                    <button type="button" id="btnEditCancel" class="btn btn-light ml-1 text-dark"--}}
{{--                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            {{ Form::close() }}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}




<div id="editExperienceModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.candidate_profile.edit_experience') }}</h2>
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
            {{ Form::open(['id'=>'editExperienceForm']) }}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger display-none hide d-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('experienceId',null,['id'=>'experienceId']) }}
                <div class="row">
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('experience_title',__('messages.candidate_profile.experience_title').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::text('experience_title', null, ['class' => 'form-control form-control-solid','required','id' => 'editTitle','placeholder'=>'Experience Title']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('company',__('messages.candidate_profile.company').(':'),['class' => 'form-label fs-6 fw-bolder required text-gray-700 mb-3']) }}
                        {{ Form::text('company', null, ['class' => 'form-control form-control-solid','required', 'id' => 'editCompany','placeholder'=>'Company']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('country', __('messages.company.country').(':'),['class' => 'form-label fs-6 fw-bolder required text-gray-700 mb-3']) }}
                        {{ Form::select('country_id',$data['countries'], null, ['id'=>'editCountry','class' => 'form-select form-select-solid','placeholder' => 'Select Country','data-modal-type' => 'experience','data-is-edit' => 'true']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('state', __('messages.company.state').(':'),['class' => 'form-label fs-6 fw-bolder  text-gray-700 mb-3']) }}
                        {{ Form::select('state_id', [], null, ['id'=>'editState','class' => 'form-select form-select-solid','placeholder' => 'Select State', 'data-modal-type' => 'experience','data-is-edit' => 'true']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('city', __('messages.company.city').(':'),['class' => 'form-label fs-6 fw-bolder  text-gray-700 mb-3']) }}
                        {{ Form::select('city_id', [], null, ['class' => 'form-select form-select-solid','data-modal-type' => 'experience','id'=>'editCity','placeholder' => 'Select City','data-is-edit' => 'true']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('start_date', __('messages.candidate_profile.start_date').(':'),['class' => 'form-label fs-6 fw-bolder required text-gray-700 mb-3']) }}
                        {{ Form::text('start_date', null,['class' => 'form-control form-control-solid','id' => 'editStartDate','autocomplete' => 'off','placeholder'=>'Start Date']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('end_date', __('messages.candidate_profile.end_date').(':'),['class' => 'form-label fs-6 fw-bolder required text-gray-700 mb-3']) }}
                        {{ Form::text('end_date',  null, ['class' => 'form-control form-control-solid', 'data-modal-type' => 'experience','id' => 'editEndDate','autocomplete' => 'off','placeholder'=>'End Date']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('currently_working', __('messages.candidate_profile.currently_working').(':'),['class' => 'form-label fs-6 fw-bolder  text-gray-700 mb-3']) }}
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-35px h-20px" name="currently_working" type="checkbox"
                                   value="1"  id="editWorking">
                        </div>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('description', __('messages.candidate_profile.description').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::textarea('description',null, ['class' => 'form-control form-control-solid','rows'=>'5','id' => 'editDescription','placeholder'=>'Select Degree Level']) }}
                    </div>
                    <div class="text-right">
                        {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-3','id' => 'btnExperienceSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                        <button type="button" class="btn btn-light btn-active-light-primary me-2"
                                id="btnCancel"
                                data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
