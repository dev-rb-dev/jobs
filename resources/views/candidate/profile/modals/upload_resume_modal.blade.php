{{--<div id="uploadModal" class="modal fade" role="dialog">--}}
{{--    <div class="modal-dialog">--}}
{{--        <!-- Modal content-->--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title">{{ __('messages.candidate_profile.upload_resume') }}</h5>--}}
{{--                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>--}}
{{--            </div>--}}
{{--            {{ Form::open(['id'=>'addNewForm']) }}--}}
{{--            <div class="modal-body">--}}
{{--                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>--}}
{{--                <div class="row">--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        {{ Form::label('title', __('messages.candidate_profile.title').':') }}<span class="text-danger">*</span>--}}
{{--                        <input type="text" class="form-control" name="title" required maxlength="150" id="uploadResumeTitle">--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        <div class="custom-file">--}}
{{--                            <input type="file" class="custom-file-input" id="customFile" name="file" required>--}}
{{--                            <label class="custom-file-label text-truncate"--}}
{{--                                   for="customFile">{{ __('messages.common.choose_file') }}</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-6 mb-0 pt-1">--}}
{{--                        <label>{{ __('messages.job_experience.is_default') }}</label>--}}
{{--                        <label class="custom-switch pl-0 col-12">--}}
{{--                            <input type="checkbox" name="is_default" class="custom-switch-input"--}}
{{--                                   value="1" id="default">--}}
{{--                            <span class="custom-switch-indicator"></span>--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="text-right">--}}
{{--                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}--}}
{{--                    <button type="button" id="btnCancel" class="btn btn-light ml-1 text-dark"--}}
{{--                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            {{ Form::close() }}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}





<div id="uploadModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.candidate_profile.upload_resume') }}</h2>
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
            {{ Form::open(['id'=>'addNewForm']) }}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger display-none hide d-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('title',__('messages.candidate_profile.title').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::text('title', null, [ 'id'=>"uploadResumeTitle",'class' => 'form-control form-control-solid','required','maxlength'=>'150','placeholder'=>__('messages.candidate_profile.title')]) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('customFile',__('messages.common.choose_file').(':'), ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <input type="file" class="custom-file-input" id="customFile" name="file" required>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('is_default', __('messages.job_experience.is_default').':', ['class' => 'form-label  fs-6 fw-bolder text-gray-700 mb-3']) }}    <br>

                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-35px h-20px" name="is_default" type="checkbox"
                                   value="1"  id="default">
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-3','id' => 'btnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light btn-active-light-primary me-2"
                            id="btnCancel"
                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
                    </div>
                </div>
            </div>
</div>
            {{ Form::close() }}

