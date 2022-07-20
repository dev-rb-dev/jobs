<div class="row">
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('title',__('messages.post.title').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}<span
                class="text-danger">*</span>
        {{ Form::text('title', null, ['class' => 'form-control form-control-solid','required', 'placeholder' => __('messages.post.title')]) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('blog_category_id', __('messages.post_category.post_category').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }} <span class="text-danger">*</span>
        {{Form::select('blogCategories[]', $blogCategories, isset($post)?$selectedBlogCategories:null, ['class' => 'form-select form-select-solid','id'=>'blog_category_id','multiple'=>true,'required']) }}
    </div>
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-1 mb-5">--}}
{{--        <span id="validationErrorsBox" class="text-danger"></span>--}}
{{--        <div class="row">--}}
{{--            <div class="pl-3">--}}
{{--                {{ Form::label('image', __('messages.post.image').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--                <label class="image__file-upload text-white"> {{ __('messages.common.choose') }}--}}
{{--                    {{ Form::file('image',['id'=>'image','class' => 'd-none']) }}--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <div class="w-auto pl-3 mt-1">--}}
{{--                <img id='previewImage' class="thumbnail-preview"--}}
{{--                     src="{{ empty($post->blog_image_url)?asset('assets/img/infyom-logo.png'):$post->blog_image_url  }}" alt="blog image">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="form-group col-xl-6 col-md-6 col-sm-1 mb-5">
        <div class="row">
            <div class="form-group col-sm-6 mb-5">
                <div class="row2">
                    <div class="d-block">
                        {{ Form::label('category_image', __('messages.post.image').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"
                           data-toggle="tooltip"
                           data-placement="top"
                           title="{{  __('messages.setting.image_validation') }}"></i>
                    </div>
                    <div class="image-input image-input-outline" data-kt-image-input="true">
                        <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                             id="editPreviewImage"
                             style="background-image: url({{ !empty($post->blog_image_url) ? asset($post->blog_image_url) : asset('assets/img/infyom-logo.png') }})">
                        </div>
                        <label
                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                            data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                            data-bs-original-title="Change Image">
                            <i class="fas fa-pencil-alt"></i>
                            {{ Form::file('image',['id'=>'customerImage','class' => 'd-none', 'accept' => '.png, .jpg, .jpeg']) }}
                            <input type="hidden" name="avatar_remove">
                        </label>
                        <span
                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Cancel Image">
                    <i class="fas fa-times"></i></span>
                    </div>
                </div>
            </div>
            {{--                            <div class="pl-3">--}}
            {{--                                {{ Form::label('category_image', __('messages.common.category_image').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
            {{--                                <label class="image__file-upload" role="button"> {{ __('messages.setting.choose') }}--}}
            {{--                                    {{ Form::file('customer_image',['id'=>'customerImage','class' => 'd-none']) }}--}}
            {{--                                </label>--}}
            {{--                            </div>--}}
            {{--                            <div class="w-auto pl-3 mt-1">--}}
            {{--                                <img id='previewImage' class="img-thumbnail thumbnail-preview"--}}
            {{--                                     src="{{ asset('assets/img/infyom-logo.png') }}">--}}
            {{--                            </div>--}}
        </div>
    </div>
    <div class="form-group col-sm-12">
        {{ Form::label('description',__('messages.post.description').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}<span
                class="text-danger">*</span>
{{--        {{ Form::textarea('description', null, ['class' => 'form-control','id' => 'description', 'rows' => '5']) }}--}}
        <div id="details"></div>
        {{ Form::hidden('description', null, ['id' => 'postDescription']) }}
    </div>
</div>
<div class="d-flex mt-5 quill-container">
{{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2','name' => 'save', 'id' => 'saveJob']) }}
<a href="{{ route('posts.index') }}"
   class="btn btn-light btn-active-light-primary text-dark me-2">{{__('messages.common.cancel')}}</a>
</div>
{{--<div class="text-left">--}}
{{--    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) }}--}}
{{--    <a href="{{ route('posts.index') }}" class="btn btn-secondary text-dark">{{__('messages.common.cancel')}}</a>--}}
{{--</div>--}}
