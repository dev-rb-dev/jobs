{{--@extends('privacy_policy.index')--}}
{{--@section('title')--}}
{{--    {{ __('messages.setting.privacy_policy') }}--}}
{{--@endsection--}}
{{--@section('section')--}}
{{ Form::open(['route' => 'privacy.policy.update', 'id' => 'policyTerms']) }}
<div class="row">
    <div class="form-group col-sm-12 my-6">
        {{ Form::label('privacy_policy', __('messages.setting.privacy_policy').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{--        {{ Form::textarea('privacy_policy', $privacyPolicy['privacy_policy'], ['class' => 'form-control h-75', 'id' => 'descriptionPolicy']) }}--}}
        <div id="privacyPolicyId"></div>
        {{ Form::hidden('privacy_policy', null, ['id' => 'privacyData']) }}
        <br>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12 my-6">
        {{ Form::label('terms_conditions', __('messages.setting.terms_conditions').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{--        {{ Form::textarea('terms_conditions', $privacyPolicy['terms_conditions'], ['class' => 'form-control h-75', 'id' => 'descriptionTerms']) }}--}}
        <div id="termConditionId"></div>
        {{ Form::hidden('terms_conditions', null, ['id' => 'termData']) }}
    </div>
</div>
<div class="row mt-4 mb-5">
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) }}
    </div>
</div>
{{ Form::close() }}
{{--@endsection--}}
