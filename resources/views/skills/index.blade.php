@extends('layouts.app')
@section('title')
    {{ __('messages.skills') }}
@endsection
@push('css')
    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.skills') }}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="#" class="btn btn-primary form-btn addSkillModal back-btn-right">{{ __('messages.skill.add') }}--}}
{{--                    <i class="fas fa-plus"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @livewire('skills')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('skills.add_modal')--}}
{{--        @include('skills.edit_modal')--}}
{{--        @include('skills.show_modal')--}}
{{--    </section>--}}
@include('flash::message')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-6">
                @include('layouts.search-component')
                <div class="card-toolbar">
                    <div class="d-flex align-items-center py-1">
                        <a class="btn btn-primary addSkillModal"><i
                                class="fas fa-plus"></i>{{ __('messages.skill.add') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                <div class="table-responsive">
                    @include('skills.table')
                </div>
            </div>
        </div>
        @include('skills.templates.templates')
        @include('skills.add_modal')
        @include('skills.edit_modal')
        @include('skills.show_modal')
    </div>
</div>
@endsection
@push('scripts')
    <script>
        let skillUrl = "{{ route('skills.index') }}";
        let skillSaveUrl = "{{ route('skills.store') }}";
    </script>
{{--    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>--}}
    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/skills/skills.js')}}"></script>
@endpush
