{{--@extends('layouts.app')--}}
{{--@section('title')--}}
{{--    {{ __('messages.company_sizes') }}--}}
{{--@endsection--}}
{{--@push('css')--}}
{{--    @livewireStyles--}}
{{--@endpush--}}
{{--@section('content')--}}
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.company_sizes') }}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="#" class="btn btn-primary form-btn addCompanySizeModal back-btn-right">{{ __('messages.company_size.add') }}--}}
{{--                    <i class="fas fa-plus"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @livewire('company-sizes')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('layouts.action_template')--}}
{{--        @include('company_sizes.add_modal')--}}
{{--        @include('company_sizes.edit_modal')--}}
{{--    </section>--}}
{{--@endsection--}}
{{--@push('scripts')--}}
{{--    @livewireScripts--}}
{{--    <script>--}}
{{--        let companySizeUrl = "{{ route('companySize.index') }}/";--}}
{{--        let companySizeSaveUrl = "{{ route('companySize.store') }}";--}}
{{--    </script>--}}
{{--    <script src="{{mix('assets/js/company_sizes/company_sizes.js')}}"></script>--}}
{{--@endpush--}}

@extends('layouts.app')
@section('title')
    {{ __('messages.company_sizes') }}
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
                            <a class="btn btn-primary addCompanySizeModal"><i
                                    class="fas fa-plus"></i>{{ __('messages.marital_status.add') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                    <div class="table-responsive">
                        @include('company_sizes.table')
                    </div>
                </div>
            </div>
            @include('company_sizes.templates.templates')
            @include('company_sizes.add_modal')
            @include('company_sizes.edit_modal')
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let companySizeUrl = "{{ route('companySize.index') }}/";
        let companySizeSaveUrl = "{{ route('companySize.store') }}";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/company_sizes/company_sizes.js')}}"></script>
@endpush
