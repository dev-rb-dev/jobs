<div class="modal fade" tabindex="-1" role="dialog" id="showModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.ownership_type.ownership_type_detail') }}</h2>
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
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('name',__('messages.common.name').':', ['class' => 'fw-bolder text-muted mb-3']) }}
                        <br>
                        <p id="showName" class="fw-bolder fs-6 text-gray-800"></p>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('description',__('messages.common.description').':', ['class' => 'fw-bolder text-muted mb-3']) }}
                        <br>
                        <div class="reported-note">
                            <p id="showDescription" class="fw-bolder fs-6 text-gray-800"></p>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
