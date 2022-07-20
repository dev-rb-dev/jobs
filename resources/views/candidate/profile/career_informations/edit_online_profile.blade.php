{{ Form::open(['id'=>'editOnlineProfileForm']) }}
<div class="row">
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label(__('messages.company.facebook_url'), __('messages.company.facebook_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            <div class="input-group-text border-0">
                <i class="fab fa-facebook-f facebook-fa-icon"></i>
            </div>
            {{ Form::text('facebook_url',$user->facebook_url, ['class' => 'form-control form-control-solid','id'=>'facebookId','placeholder'=>'https://www.facebook.com']) }}
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label(__('messages.company.twitter_url'), __('messages.company.twitter_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            <div class="input-group-text border-0">
                <i class="fab fa-twitter twitter-fa-icon"></i>
            </div>
            {{ Form::text('twitter_url', $user->twitter_url , ['class' => 'form-control form-control-solid','id'=>'twitterId','placeholder'=>'https://www.twitter.com']) }}
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label(__('messages.company.linkedin_url'), __('messages.company.linkedin_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            <div class="input-group-text border-0">
                <i class="fab fa-linkedin-in linkedin-fa-icon"></i>
            </div>
            {{ Form::text('linkedin_url', $user->linkedin_url, ['class' => 'form-control form-control-solid','id'=>'linkedinId','placeholder'=>'https://www.linkedin.com']) }}
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label(__('messages.company.google_plus_url'), __('messages.company.google_plus_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            <div class="input-group-text border-0">
                <i class="fab fa-google-plus-g google-plus-fa-icon"></i>
            </div>
            {{ Form::text('google_plus_url', $user->google_plus_url, ['class' => 'form-control form-control-solid','id'=>'googlePlusId','placeholder'=>'https://www.plus.google.com']) }}
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label(__('messages.company.pinterest_url'), __('messages.company.pinterest_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            <div class="input-group-text border-0">
                <i class="fab fa-pinterest-p pinterest-fa-icon"></i>
            </div>
            {{ Form::text('pinterest_url', $user->pinterest_url, ['class' => 'form-control form-control-solid','id'=>'pinterestId','placeholder'=>'https://www.pinterest.com']) }}
        </div>
    </div>
</div>
<div class="d-flex mt-5">
    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary me-3','id'=>'btnOnlineProfileSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
    <button type="button" id="btnOnlineProfileCancel"
            class="btn btn-light btn-active-light-primary me-2">{{ __('messages.common.cancel') }}</button>
</div>
{{ Form::close() }}
