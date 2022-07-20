@extends('layouts.app')
@section('title')
    {{ __('messages.career_levels') }}
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
    @include('flash::message')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-6">
                    @include('layouts.search-component')
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center py-1">
                            <a class="btn btn-primary addCareerLevelModal">
                                <i class="fas fa-plus"></i>
                                {{ __('messages.common.add') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                    <div class="table-responsive">
                        @include('career_levels.table')
                    </div>
                </div>
            </div>
            @include('career_levels.add_modal')
            @include('career_levels.edit_modal')
            @include('career_levels.templates.templates')
        </div>
    </div>
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.career_levels') }}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="#" class="btn btn-primary form-btn addCareerLevelModal back-btn-right">{{ __('messages.common.add') }}--}}
{{--                    <i class="fas fa-plus"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @livewire('career-levels')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('career_levels.templates.templates')--}}
{{--        @include('career_levels.add_modal')--}}
{{--        @include('career_levels.edit_modal')--}}
{{--    </section>--}}
@endsection
@push('scripts')
    <script>
        let careerLevelUrl = "{{ route('careerLevel.index') }}";
        let careerLevelSaveUrl = "{{ route('careerLevel.store') }}";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/career_levels/career_levels.js')}}"></script>
@endpush
