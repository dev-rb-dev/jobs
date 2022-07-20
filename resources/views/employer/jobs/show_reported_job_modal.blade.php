{{--<div class="modal fade" tabindex="-1" role="dialog" id="showModal">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title">--}}
{{--                    <th scope="col">{{ __('messages.job.reported_jobs_detail') }}</th>--}}
{{--                </h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            {{ Form::open(['id' => 'showForm']) }}--}}
{{--            <div class="modal-body">--}}
{{--                <div class="row details-page">--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        <div class="employee-listing-details">--}}
{{--                            <div class="d-flex employee-listing-description align-items-center justify-content-center flex-column">--}}
{{--                                <div class="pl-0 mb-2 employee-avatar">--}}
{{--                                    <span id="showImage"></span>--}}
{{--                                </div>--}}
{{--                                <div class="mb-auto w-100 employee-data">--}}
{{--                                    <div class="d-flex justify-content-center align-items-center w-100">--}}
{{--                                        <div>--}}
{{--                                            <span class="text-decoration-none text-color-gray" id="showName"></span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="text-center">--}}
{{--                                        <label>{{ __('messages.company.reported_by') }} :</label>--}}
{{--                                        <span class="text-decoration-none text-color-gray" id="showReportedBy"></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="text-center">--}}
{{--                                        <label>{{ __('messages.company.reported_on') }} :</label>--}}
{{--                                        <span class="text-decoration-none text-color-gray" id="showReportedOn"></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="text-center">--}}
{{--                                        <div class="reported-note">--}}
{{--                                            <label>{{ __('messages.company.notes') }} :</label>--}}
{{--                                            <span id="showNote"></span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            {{ Form::close() }}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


<div id="showModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.job.reported_jobs_detail') }}</h2>
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
                <div class="row details-page">
                    <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('title', __('messages.company.title').':', ['class' => 'fw-bolder text-muted mb-3']) }}
                        <p class="fw-bolder fs-6 text-gray-800 showName"></p>
                    </div>
                        <div class="form-group col-sm-12 mb-5">
                            {{ Form::label('company_image', __('messages.company.image').':', ['class' => 'fw-bolder text-muted mb-3']) }}
                            <br>
                            <img src="" id="documentUrl" class="testimonial-modal-img">
                            <label id="noDocument">N/A</label>
                        </div>
                        <div class="form-group col-sm-12 mb-5">
                            {{ Form::label('reported_by',__('messages.company.reported_by').':', ['class' => 'fw-bolder text-muted mb-3']) }}
                            <p id="showReportedBy" class="fw-bolder fs-6 text-gray-800"></p>
                        </div>
                        <div class="form-group col-sm-12 mb-5">
                            {{ Form::label('reported_on',__('messages.company.reported_on').':', ['class' => 'fw-bolder text-muted mb-3']) }}
                            <p id="showReportedOn" class="fw-bolder fs-6 text-gray-800"></p>
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::label('notes',__('messages.company.notes').':', ['class' => 'fw-bolder text-muted mb-3']) }}
                            <p id="showNote" class="fw-bolder fs-6 text-gray-800"></p>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>




