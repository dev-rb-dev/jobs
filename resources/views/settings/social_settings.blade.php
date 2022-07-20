@extends('settings.index')
@section('title')
    {{ __('messages.setting.social_settings') }}
@endsection
@section('section')
    {{ Form::open(['route' => 'settings.update','id'=>'editForm']) }}
    {{ Form::hidden('sectionName', $sectionName) }}
    <div class="row mt-3">
        <div class="form-group col-sm-6 mt-5">
            {{ Form::label('facebook_url', __('messages.setting.facebook_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
            <div class="input-group">
                <div class="input-group-text border-0">
                    <i class="fab fa-facebook-f facebook-fa-icon text-primary"></i>
                </div>
                {{ Form::text('facebook_url', $setting['facebook_url'], ['class' => 'form-control form-control-solid','id'=>'facebookUrl','placeholder' => __('messages.setting.facebook_url')]) }}
            </div>
        </div>
        <div class="form-group col-sm-6 mt-5">
            {{ Form::label('twitter_url', __('messages.setting.twitter_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
            <div class="input-group">
                <div class="input-group-text border-0">
                    <i class="fab fa-twitter twitter-fa-icon text-primary"></i>
                </div>
                {{ Form::text('twitter_url', $setting['twitter_url'], ['class' => 'form-control form-control-solid','id'=>'twitterUrl', 'placeholder' => __('messages.setting.twitter_url')]) }}
            </div>
        </div>
        <div class="form-group col-sm-6 mt-5">
            {{ Form::label('google_plus_url', __('messages.setting.google_plus_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
            <div class="input-group">
                <div class="input-group-text border-0">
                    <i class="fab fa-google-plus-g google-plus-fa-icon text-danger"></i>
                </div>
                {{ Form::text('google_plus_url', $setting['google_plus_url'], ['class' => 'form-control form-control-solid','id'=>'googlePlusUrl', 'placeholder' => __('messages.setting.google_plus_url')]) }}
            </div>
        </div>
        <div class="form-group col-sm-6 mt-5">
            {{ Form::label('linkedIn_url', __('messages.setting.linkedIn_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
            <div class="input-group">
                <div class="input-group-text border-0">
                    <i class="fab fa-linkedin-in linkedin-fa-icon text-primary"></i>
                </div>
                {{ Form::text('linkedIn_url', $setting['linkedIn_url'], ['class' => 'form-control form-control-solid','id'=>'linkedInUrl', 'placeholder' => __('messages.setting.linkedIn_url')]) }}
            </div>
        </div>
    </div>
    <div class="row mt-4 mb-5">
        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3','id'=>'submitId']) }}
            <a href="{{ route('settings.index', ['section' => 'social_settings']) }}" class="btn btn-light btn-active-light-primary me-2">{{__('messages.common.cancel')}}</a>
        </div>
    </div>
    {{ Form::close() }}
@endsection
