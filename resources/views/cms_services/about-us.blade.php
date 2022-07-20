@extends('layouts.app')
@section('title')
    {{ __('messages.about_us_services')}}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
@include('flash::message')
@include('layouts.errors')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl p-0">
        <div class="card mb-5 mb-xl-8">
            <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                <div class="card-body">
                    {{ Form::open(['route' => 'cms.about-us.update','files' => true,]) }}
                    @include('cms_services.about-edit')
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
