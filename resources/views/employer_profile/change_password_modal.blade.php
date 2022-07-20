{{--<div id="changePasswordModal" class="modal fade" role="dialog" tabindex="-1">--}}
{{--    <div class="modal-dialog">--}}
{{--        <!-- Modal content-->--}}
{{--        <div class="modal-content border-radius">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title">{{ __('messages.user.change_password') }}</h5>--}}
{{--                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>--}}
{{--            </div>--}}
{{--            {{ Form::open(['id'=>'changePasswordForm']) }}--}}
{{--            <div class="modal-body">--}}
{{--                @if ($errors->any())--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        <ul>--}}
{{--                            @foreach ($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                <div class="alert alert-danger hide" id="editPasswordValidationErrorsBox"></div>--}}
{{--                    {{ Form::hidden('user_id',null,['id'=>'pfUserId']) }}--}}
{{--                {{ Form::hidden('is_active',1) }}--}}
{{--                {{csrf_field()}}--}}
{{--                <div class="row">--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        {{ Form::label('current password', __('messages.company.current_password').':') }}<span--}}
{{--                                class="required">*</span>--}}
{{--                        <div class="input-group">--}}
{{--                            <input class="form-control input-group__addon" id="pfCurrentPassword" type="password"--}}
{{--                                   name="password_current" required autofocus>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        {{ Form::label('password', __('messages.company.new_password').':') }}<span class="required">*</span>--}}
{{--                        <div class="input-group">--}}
{{--                            <input class="form-control input-group__addon" id="pfNewPassword" type="password"--}}
{{--                                   name="password" required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        {{ Form::label('password_confirmation', __('messages.company.confirm_password').':') }}<span--}}
{{--                                class="required">*</span>--}}
{{--                        <div class="input-group">--}}
{{--                            <input class="form-control input-group__addon" id="pfNewConfirmPassword" type="password"--}}
{{--                                   name="password_confirmation" required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="text-right">--}}
{{--                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnPrPasswordEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}--}}
{{--                    <button type="button" class="btn btn-light border-radius"--}}
{{--                            data-dismiss="modal">{{ __('messages.common.cancel') }}--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            {{ Form::close() }}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


<div id="changePasswordModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{  __('messages.user.change_password') }}</h2>
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
            {{ Form::open(['id'=>'changePasswordForm']) }}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="alert alert-danger display-none hide d-none" id="editPasswordValidationErrorsBox"></div>
                {{ Form::hidden('user_id',null,['id'=>'pfUserId']) }}
                {{ Form::hidden('is_active',1) }}
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('current password', __('messages.company.current_password').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <input class="form-control  form-control-solid" id="pfCurrentPassword" type="password" name="password_current" required>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('password', __('messages.company.new_password').(':'),['class' => 'required form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <input class="form-control  form-control-solid" id="pfNewPassword" type="password" name="password" required>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('password_confirmation', __('messages.company.confirm_password').(':'),['class' => 'required form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <input class="form-control form-control-solid" id="pfNewConfirmPassword" type="password"
                               name="password_confirmation" required>
                    </div>
                    <div class="text-right">
                        {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-3','id' => 'btnPrPasswordEditSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                        <button type="button" class="btn btn-light btn-active-light-primary me-2"
                                id="btnEditCancel"
                                data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
