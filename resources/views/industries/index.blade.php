{{--@extends('layouts.app')--}}
{{--@section('title')--}}
{{--    {{ __('messages.industries') }}--}}
{{--@endsection--}}
{{--@push('css')--}}
{{--    @livewireStyles--}}
{{--    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--@endpush--}}
{{--@section('content')--}}
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.industries') }}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="#" class="btn btn-primary form-btn addIndustryModal back-btn-right">{{ __('messages.industry.add') }}--}}
{{--                    <i class="fas fa-plus"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @livewire('industries')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('layouts.action_template')--}}
{{--        @include('industries.add_modal')--}}
{{--        @include('industries.edit_modal')--}}
{{--        @include('industries.show_modal')--}}
{{--    </section>--}}
{{--@endsection--}}
{{--@push('scripts')--}}
{{--    @livewireScripts--}}
{{--    <script>--}}
{{--        let industryUrl = "{{ route('industry.index') }}/";--}}
{{--        let industrySaveUrl = "{{ route('industry.store') }}";--}}
{{--    </script>--}}
{{--    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/industries/industries.js')}}"></script>--}}
{{--@endpush--}}


@extends('layouts.app')
@section('title')
    {{ __('messages.industries') }}
@endsection
@push('css')
    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>
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
                            <a class="btn btn-primary addIndustryModal"><i
                                    class="fas fa-plus"></i>{{ __('messages.industry.add') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                    <div class="table-responsive">
                        @include('industries.table')
                    </div>
                </div>
            </div>
            @include('industries.templates.templates')
            @include('industries.add_modal')
            @include('industries.edit_modal')
            @include('industries.show_modal')
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let industryUrl = "{{ route('industry.index') }}/";
        let industrySaveUrl = "{{ route('industry.store') }}";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>
    <script src="{{mix('assets/js/industries/industries.js')}}"></script>
@endpush
