@extends('layouts.app')
@section('title')
    {{ __('messages.functional_areas') }}
@endsection
@push('css')
{{--       @livewireStyles--}}
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
                            <a class="btn btn-primary addFunctionalAreaModal">
                                <i class="fas fa-plus"></i>
                                {{ __('messages.common.add') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                    <div class="table-responsive">
                        @include('functional_areas.table')
                    </div>
                </div>
            </div>
            @include('functional_areas.add_modal')
            @include('functional_areas.edit_modal')
            @include('functional_areas.templates.templates')
        </div>
    </div>
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.functional_areas') }}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="#" class="btn btn-primary form-btn addFunctionalAreaModal back-btn-right">{{ __('messages.common.add') }}--}}
{{--                    <i class="fas fa-plus"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @livewire('functional-areas')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
@endsection
@push('scripts')
{{--    @livewireScripts--}}
    <script>
        let functionalAreaUrl = "{{ route('functionalArea.index') }}";
        let functionalAreaSaveUrl = "{{ route('functionalArea.store') }}";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/functional_areas/functional_areas.js')}}"></script>
@endpush
