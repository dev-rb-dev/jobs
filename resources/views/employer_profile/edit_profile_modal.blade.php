{{--<div id="editProfileModal" class="modal fade" role="dialog" tabindex="-1">--}}
{{--    <div class="modal-dialog">--}}
{{--        <!-- Modal content-->--}}
{{--        <div class="modal-content left-margin">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title">{{ __('messages.user.edit_profile') }}</h5>--}}
{{--                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>--}}
{{--            </div>--}}
{{--            {{ Form::open(['id'=>'editProfileForm','files'=>true]) }}--}}
{{--            <div class="modal-body">--}}
{{--                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>--}}
{{--                {{ Form::hidden('user_id',null,['id'=>'editUserId']) }}--}}
{{--                {{ Form::hidden('company_id',null,['id'=>'companyId']) }}--}}
{{--                {{csrf_field()}}--}}
{{--                <div class="row">--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        {{ Form::label('first_name', __('messages.company.employer_name').':') }}<span--}}
{{--                                class="required">*</span>--}}
{{--                        {{ Form::text('first_name', null, ['id'=>'firstName','class' => 'form-control','required']) }}--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        {{ Form::label('email', __('messages.company.email').':') }}<span class="required">*</span>--}}
{{--                        {{ Form::email('email', null, ['id'=>'editEmail','class' => 'form-control','disabled' => true,]) }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-4 col-sm-4 col-xl-3">--}}
{{--                        <div class="form-group">--}}
{{--                            {{ Form::label('company_logo', __('messages.company.company_logo').':') }}--}}
{{--                            <label class="image__file-upload"> {{ __('messages.setting.choose') }}--}}
{{--                                {{ Form::file('image',['id'=>'employerImage','class' => 'd-none']) }}--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-3">--}}
{{--                        <img id='previewImage' class="img-thumbnail thumbnail-preview"--}}
{{--                             src="">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="text-right">--}}
{{--                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnPrEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}--}}
{{--                    <button type="button" class="btn btn-light left-margin"--}}
{{--                            data-dismiss="modal">{{ __('messages.common.cancel') }}--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            {{ Form::close() }}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div id="editProfileModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.user.edit_profile') }}</h2>
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
            {{ Form::open(['id'=>'editProfileForm','files'=>true]) }}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger d-none" id="validationErrorsBoxCandidate"></div>
                {{ Form::hidden('user_id',null,['id'=>'editUserId']) }}
                {{ Form::hidden('company_id',null,['id'=>'companyId']) }}
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6 mb-5">

                        {{ Form::label('first_name', __('messages.candidate.first_name').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::text('first_name', null, ['id'=>'firstName','class' => 'form-control form-control-solid','required', 'placeholder' => __('messages.candidate.first_name')]) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('email', __('messages.candidate.email').(':'),['class' => 'required form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::text('email', null, ['id'=>'editEmail','class' => 'form-control form-control-solid','required', 'placeholder' => __('messages.candidate.email')]) }}
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <div class="d-block">
                            {{ Form::label('', __('messages.candidate.profile').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                            <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"
                               data-bs-toggle="tooltip"
                               data-placement="top"
                               title="{{  __('messages.setting.image_validation') }}"></i>
                        </div>
                        <div class="image-input image-input-outline" data-kt-image-input="true">
                            <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                                 id='profilePicturePreview'
                                 style="background-image: url({{ asset('assets/img/infyom-logo.png') }})">
                            </div>
                            <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="Change profile picture">
                                <i class="fas fa-pencil-alt fs-7"></i>
                                {{ Form::file('image',['id'=>'profilePicture','class' => 'd-none', 'accept' => '.png, .jpg, .jpeg']) }}
                                <input type="hidden" name="avatar_remove">
                            </label>
                            <span
                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Cancel Profile">
                                        <i class="fas fa-times"></i></span>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-3','id' => 'btnEditSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light btn-active-light-primary me-2"
                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

<div id="changeLanguageModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{  __('messages.user_language.change_language') }}</h2>
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
            {{ Form::open(['id'=>'changeLanguageForm']) }}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger display-none hide d-none" id="editProfileValidationErrorsBox"></div>
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('language',__('messages.user_language.language').(':'), ['class' => 'required form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::select('language', getUserLanguages(), getLoggedInUser()->language, ['id'=>'language','class' => 'form-select form-select-solid','required']) }}
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-3','id' => 'btnLanguageChange','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light btn-active-light-primary me-2"
                            id="btnEditCancel"
                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
