@extends('layouts.app')
@section('title')
    {{ __('messages.cms_services') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.cms_services') }}</h1>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            @include('flash::message')--}}
{{--            @include('layouts.errors')--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    {{ Form::open(['route' => 'cms.services.update','files' => true]) }}--}}
{{--                    @include('cms_services.fields')--}}
{{--                    {{ Form::close() }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

@include('flash::message')
@include('layouts.errors')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl p-0">
        <div class="card mb-5 mb-xl-8">
            <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                <div class="card-body">
                    {{ Form::open(['route' => 'cms.services.update','files' => true]) }}
                    @include('cms_services.fields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{asset('assets/js/front_cms/front_cms_setting.js')}}"></script>
@endpush

