{{--<div id="addEducationModal" class="modal fade" role="dialog">--}}
{{--    <div class="modal-dialog">--}}
{{--        <!-- Modal content-->--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title">{{ __('messages.candidate_profile.add_education') }}</h5>--}}
{{--                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>--}}
{{--            </div>--}}
{{--            {{ Form::open(['id'=>'addNewEducationForm']) }}--}}
{{--            <div class="modal-body">--}}
{{--                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>--}}
{{--                <div class="row">--}}
{{--                    <div class="form-group col-sm-6">--}}
{{--                        {{ Form::label('degree_level_id', __('messages.candidate_profile.degree_level').':') }}<span--}}
{{--                                class="text-danger">*</span>--}}
{{--                        {{ Form::select('degree_level_id', $data['degreeLevels'], null, ['class' => 'form-control','required','id' => 'degreeLevelId','placeholder'=>'Select Degree Level']) }}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-6">--}}
{{--                        {{ Form::label('degree_title', __('messages.candidate_profile.degree_title').':') }}<span--}}
{{--                                class="text-danger">*</span>--}}
{{--                        {{ Form::text('degree_title', null, ['class' => 'form-control']) }}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-6">--}}
{{--                        {{ Form::label('country', __('messages.company.country').':') }}<span--}}
{{--                                class="text-danger">*</span>--}}
{{--                        {{ Form::select('country_id', $data['countries'], null, ['id'=>'educationCountryId','class' => 'form-control','placeholder' => 'Select Country', 'data-modal-type' => 'education']) }}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-6">--}}
{{--                        {{ Form::label('state', __('messages.company.state').':') }}--}}
{{--                        {{ Form::select('state_id', [], null, ['id'=>'educationStateId','class' => 'form-control','placeholder' => 'Select State', 'data-modal-type' => 'education']) }}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-6">--}}
{{--                        {{ Form::label('city', __('messages.company.city').':') }}--}}
{{--                        {{ Form::select('city_id', [], null, ['id'=>'educationCityId','class' => 'form-control','placeholder' => 'Select City']) }}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-6">--}}
{{--                        {{ Form::label('institute',__('messages.candidate_profile.institute').':') }}<span--}}
{{--                                class="text-danger">*</span>--}}
{{--                        {{ Form::text('institute', null, ['class' => 'form-control','required']) }}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-6">--}}
{{--                        {{ Form::label('result', __('messages.candidate_profile.result').':') }}<span--}}
{{--                                class="text-danger">*</span>--}}
{{--                        {{ Form::text('result', null, ['class' => 'form-control', 'required']) }}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-6">--}}
{{--                        {{ Form::label('year', __('messages.candidate_profile.year').':') }}<span--}}
{{--                                class="text-danger">*</span>--}}
{{--                        {{ Form::selectYear('year', date('Y'), 2000, null, ['class' => 'form-control']) }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="text-right">--}}
{{--                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEducationSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}--}}
{{--                    <button type="button" id="btnEducationCancel" class="btn btn-light ml-1 text-dark"--}}
{{--                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            {{ Form::close() }}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}





<div id="addEducationModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.candidate_profile.add_education')  }}</h2>
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
            {{ Form::open(['id'=>'addNewEducationForm']) }}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger display-none hide d-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('degree_level_id', __('messages.candidate_profile.degree_level').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::select('degree_level_id', $data['degreeLevels'], null ,['class' => 'form-select form-select-solid','required','id' => 'degreeLevelId','placeholder'=>'Select Degree Level']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">

                        {{ Form::label('degree_title', __('messages.candidate_profile.degree_title').(':'),['class' => 'form-label fs-6 fw-bolder required text-gray-700 mb-3',]) }}
                        {{ Form::text('degree_title', null, ['class' => 'form-control form-control-solid','required', 'placeholder'=>'Degree Title']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('country', __('messages.company.country').(':'),['class' => 'form-label fs-6 fw-bolder required text-gray-700 mb-3']) }}
                        {{ Form::select('country_id',$data['countries'], null, ['id'=>'educationCountryId','class' => 'form-select  form-select-solid','data-modal-type' => 'education','placeholder' => 'Select Country']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('state', __('messages.company.state').(':'),['class' => 'form-label fs-6 fw-bolder  text-gray-700 mb-3']) }}
                        {{ Form::select('state_id', [], null, ['id'=>'educationStateId','class' => 'form-select form-select-solid','placeholder' => 'Select State']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('city', __('messages.company.city').(':'),['class' => 'form-label fs-6 fw-bolder  text-gray-700 mb-3']) }}
                        {{ Form::select('city_id', [], null, ['id'=>'educationCityId','class' => 'form-select form-select-solid','placeholder' => 'Select City']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('institute', __('messages.candidate_profile.institute').(':'),['class' => 'form-label fs-6 fw-bolder required text-gray-700 mb-3']) }}
                        {{ Form::text('institute', null,['class' => 'form-control form-control-solid','placeholder'=>'Institute']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('result',__('messages.candidate_profile.result').(':'),['class' => 'form-label fs-6 fw-bolder required text-gray-700 mb-3']) }}
                        {{ Form::text('result',  null, ['class' => 'form-control form-control-solid','placeholder'=>'Result']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('year', __('messages.candidate_profile.year').(':'),['class' => 'form-label fs-6 fw-bolder required text-gray-700 mb-3']) }}
                        {{ Form::selectRange('year', date('Y'), 2000, null, ['id'=>'educationYearId','class' => 'form-select form-select-solid','data-modal-type' => 'education','placeholder' => 'Select Year'])}}
                    </div>
                    <div class="text-right">
                        {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-3','id' => 'btnEducationSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                        <button type="button" class="btn btn-light btn-active-light-primary me-2"
                                id="btnEducationCancel"
                                data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
