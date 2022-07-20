@extends('layouts.app')
@section('title')
    {{ __('messages.ownership_types') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.ownership_types') }}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="#" class="btn btn-primary form-btn addOwnerShipTypeModal back-btn-right">{{ __('messages.common.add') }}--}}
{{--                    <i class="fas fa-plus"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @livewire('ownership-types')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--</section>--}}
@include('flash::message')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-6">
                @include('layouts.search-component')
                <div class="card-toolbar">
                    <div class="d-flex align-items-center py-1">
                        <a class="btn btn-primary addOwnerShipTypeModal"><i
                                class="fas fa-plus"></i>{{ __('messages.common.add') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                <div class="table-responsive">
                    @include('ownership_types.table')
                </div>
            </div>
        </div>
        @include('ownership_types.templates.templates')
        @include('ownership_types.add_modal')
        @include('ownership_types.edit_modal')
        @include('ownership_types.show_modal')
    </div>
</div>
@endsection
@push('scripts')
    <script>
        let ownerShipTypeUrl = "{{ route('ownerShipType.index') }}/";
        let ownerShipTypeSaveUrl = "{{ route('ownerShipType.store') }}";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/ownership_types/ownership_types.js')}}"></script>
@endpush
