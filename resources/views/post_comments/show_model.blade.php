{{--<div class="modal fade" tabindex="-1" role="dialog" id="showModal">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title">{{ __('messages.post_comment.post_comment_details') }}</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            {{ Form::open(['id' => 'showForm']) }}--}}
{{--            <div class="modal-body">--}}
{{--                <div class="row details-page">--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        {{ Form::label('title',__('messages.post.post').':') }}<br>--}}
{{--                        <span id="postTitle"></span>--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        {{ Form::label('comment',__('messages.post.comment').':') }}<br>--}}
{{--                        <div class="reported-note">--}}
{{--                            <span id="postComment"></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        {{ Form::label('title',__('messages.user.user_name').':') }}<br>--}}
{{--                        <span id="postUser"></span>--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        {{ Form::label('title',__('messages.common.email').':') }}<br>--}}
{{--                        <span id="postEmail"></span>--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-sm-12">--}}
{{--                        {{ Form::label('title',__('messages.common.created_on').':') }}<br>--}}
{{--                        <span id="postCreatedOn"></span>--}}
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
                <h2>{{ __('messages.post_comment.post_comment_details') }}</h2>
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
                        {{ Form::label('title',__('messages.post.post').(':'), ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <p id="postTitle"></p>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('comment',__('messages.post.comment').(':'),['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <p id="postComment"></p>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('username',__('messages.user.user_name').(':'),['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <p id="postUser"></p>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('email',__('messages.common.email').(':'),['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <p id="postEmail"></p>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('title',__('messages.common.created_on').(':'),['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <p id="postCreatedOn"></p>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

