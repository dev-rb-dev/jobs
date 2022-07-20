@extends('layouts.app')
@section('title')
    {{ __('messages.languages') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.languages') }}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="#" class="btn btn-primary form-btn addLanguageModal back-btn-right">{{ __('messages.job_category.add') }}--}}
{{--                    <i class="fas fa-plus"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @livewire('languages')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('languages.templates.templates')--}}
{{--        @include('languages.add_modal')--}}
{{--        @include('languages.edit_modal')--}}
{{--    </section>--}}
@include('flash::message')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-6">
                @include('layouts.search-component')
                <div class="card-toolbar">
                    <div class="d-flex align-items-center py-1">
                        <a class="btn btn-primary addLanguageModal"><i
                                class="fas fa-plus"></i>{{ __('messages.job_category.add') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                <div class="table-responsive">
                    @include('languages.table')
                </div>
            </div>
        </div>
        @include('languages.templates.templates')
        @include('languages.add_modal')
        @include('languages.edit_modal')
{{--        @include('languages.show_modal')--}}
    </div>
</div>

@endsection
@push('scripts')
    <script>
        let languageUrl = "{{ route('languages.index') }}/";
        let languageSaveUrl = "{{ route('languages.store') }}";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>
    <script src="{{mix('assets/js/languages/languages.js')}}"></script>
@endpush
