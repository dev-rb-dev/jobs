@extends('layouts.app')
@section('title')
    {{ __('messages.email_template.edit_email_template') }}
@endsection
@push('css')
{{--    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>--}}
@endpush
{{--@section('content')--}}
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.email_template.edit_email_template') }}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="{{ route('email.template.index') }}"--}}
{{--                   class="btn btn-primary form-btn float-right">{{ __('messages.common.back') }}</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('layouts.errors')--}}
{{--        {{ Form::model($emailTemplate, ['route' => ['email.template.update', $emailTemplate->id], 'method' => 'put', 'id' => 'editEmailTemplateForm', 'files' => 'true']) }}--}}
{{--        <div class="section-body">--}}
{{--            <div class="card mt-2">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="form-group col-sm-12">--}}
{{--                            {{ Form::label('template_name',__('messages.email_template.template_name').':') }}--}}
{{--                            {{ Form::text('template_name', null, ['class' => 'form-control', 'readonly']) }}--}}
{{--                        </div>--}}
{{--                        <div class="form-group col-sm-12">--}}
{{--                            {{ Form::label('subject',__('messages.email_template.subject').':') }}<span--}}
{{--                                    class="text-danger">*</span>--}}
{{--                            {{ Form::text('subject', null, ['class' => 'form-control','required']) }}--}}
{{--                        </div>--}}
{{--                        <div class="form-group col-sm-12">--}}
{{--                            {{ Form::label('body',__('messages.email_template.body').':') }}<span--}}
{{--                                    class="text-danger">*</span>--}}
{{--                            {{ Form::textarea('body', null, ['class' => 'form-control', 'id' => 'body', 'rows' => '5']) }}--}}
{{--                        </div>--}}
{{--                        <div class="form-group col-sm-12">--}}
{{--                            {{ Form::label('variables',__('messages.email_template.short_code').':') }}--}}
{{--                            {{ Form::text('variables', null, ['class' => 'form-control', 'readonly']) }}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="text-left">--}}
{{--                        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) }}--}}
{{--                        <a href="{{ route('email.template.index') }}"--}}
{{--                           class="btn btn-secondary text-dark">{{__('messages.common.cancel')}}</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        {{ Form::close() }}--}}
{{--    </section>--}}
{{--@endsection--}}

@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="{!! URL::previous() !!}"
                   class="btn btn-sm btn-light btn-active-light-primary pull-right">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="d-flex flex-column flex-lg-row">
        <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                </div>
                {{ Form::model($emailTemplate, ['route' => ['email.template.update', $emailTemplate->id], 'method' => 'put', 'id' => 'editEmailTemplateForm', 'files' => 'true']) }}
                <div class="section-body">
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12 mb-5">
                                    {{ Form::label('template_name',__('messages.email_template.template_name').(':'), ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                                    {{ Form::text('template_name', null, ['id'=>'editEmailTemplate','class' => 'form-control form-control-solid','readonly']) }}
                                </div>
                                <div class="form-group col-sm-12 mb-5">
                                    {{ Form::label('subject',__('messages.email_template.subject').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                                    {{ Form::text('subject', null, ['id'=>'editSubject','class' => 'form-control form-control-solid','required','placeholder' => __('messages.email_template.subject')]) }}
                                </div>
                                <div class="form-group col-sm-12 mb-5">
                                    {{ Form::label('body', __('messages.email_template.body').(':'),['class' => 'required form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                                    <div id="editBody"></div>
                                    {{ Form::hidden('body', null, ['id' => 'editDescription']) }}
                                </div>
                                <div class="form-group col-sm-12 mb-5">
                                    {{ Form::label('variables',__('messages.email_template.short_code').(':'), ['class' => 'form-label  fs-6 fw-bolder text-gray-700 mb-3']) }}
                                    {{ Form::text('variables', null, ['class' => 'form-control form-control-solid','readonly']) }}
                                </div>

                                <div class="d-flex mt-5">
                                    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3']) }}
                                    <a href="{{ route('email.template.index') }}"
                                       class="btn btn-light btn-active-light-primary me-2">{{__('messages.common.cancel')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let emailBody = @json($emailTemplate->body);
    </script>
    <script src="{{mix('assets/js/email_templates/create-edit.js')}}"></script>
@endpush
