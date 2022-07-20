<div id="showCandidateModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.candidate.reported_candidate_detail') }}</h2>
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
            {{ Form::open(['id' => 'showForm']) }}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger display-none hide d-none" id="maritalStatusValidationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('employer_name', __('messages.company.candidate_name').':', ['class' => 'fw-bolder text-muted mb-3']) }}
                        <p id="showReportedCandidate" class="fw-bolder fs-6 text-gray-800"></p>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('employer_name', __('messages.post.image').':', ['class' => 'fw-bolder text-muted mb-3']) }}
                        <p id="showImage"></p>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('reported_by', __('messages.company.reported_by').':',['class' => 'fw-bolder text-muted mb-3']) }}
                        <p id="showReportedBy" class="fw-bolder fs-6 text-gray-800"></p>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('reported_on', __('messages.company.reported_on').':',['class' => 'fw-bolder text-muted mb-3']) }}
                        <br>
                        <p id="showReportedWhen" class="fw-bolder fs-6 text-gray-800"></p>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('notes', __('messages.company.notes').':',['class' => 'fw-bolder text-muted mb-3']) }}
                        <p id="showReportedNote" class="fw-bolder fs-6 text-gray-800"></p>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
