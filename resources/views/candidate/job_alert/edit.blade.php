@extends('candidate.layouts.app')
@section('title')
    {{ __('messages.job.job_alert') }}
@endsection
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @include('flash::message')
    @include('layouts.errors')
    <div class="card mb-5 mb-xl-8">
        <div class="card-body py-0">
            {{ Form::open(['route' => 'candidate.job.alert.update']) }}
            <div class="form-group mb-1 d-flex mt-9">
                <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm px-3">
                    <input type="checkbox" name="job_alert" value="1"
                           class="form-check-input" {{ ($candidate->job_alert) ? 'checked' : '' }}>
                    <span class="custom-switch-indicator"></span>
                </label>
                <span class="fs-6 fw-bolder text-gray-700">{{ __('messages.candidate.job_alert_message') }}</span>
            </div>
            <div class="form-group ml-md-5 ml-sm-0 mt-9 ms-18">
                <div class="custom-switches-stacked">
                    @foreach($jobTypes as $jobType)
                        <div class="col-lg-12 col-md-6 d-flex justify-content-start">
                            <label
                                class="form-check form-switch form-check-custom form-check-solid form-switch-sm px-3">
                                <input type="checkbox" name="job_types[]" value="{{ $jobType->id }}"
                                       class="form-check-input" {{ in_array($jobType->id,$jobAlerts) ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                            <span
                                class="fs-6 fw-bolder text-gray-700 mt-2">{{ htmlspecialchars_decode($jobType->name) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Submit Field -->
            <div class="d-flex my-9 justify-content-start ms-20">
                {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3 btnSave']) }}
                {{--                <a class="btn btn-light btn-active-light-primary me-2">{{__('messages.common.cancel')}}</a>--}}
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
