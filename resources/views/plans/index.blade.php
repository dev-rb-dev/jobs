{{--@extends('layouts.app')--}}
{{--@section('title')--}}
{{--    {{ __('messages.subscriptions_plans') }}--}}
{{--@endsection--}}
{{--@push('css')--}}
{{--    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--@endpush--}}
{{--@section('content')--}}
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.subscriptions_plans') }}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="#" class="btn btn-primary form-btn addPlanModal back-btn-right">{{ __('messages.skill.add') }}--}}
{{--                    <i class="fas fa-plus"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @include('plans.table')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('plans.templates.templates')--}}
{{--        @include('plans.add_modal')--}}
{{--        @include('plans.edit_modal')--}}
{{--    </section>--}}
{{--@endsection--}}
{{--@push('scripts')--}}
{{--    <script>--}}
{{--        let planUrl = "{{ route('plans.index') }}";--}}
{{--        let planSaveUrl = "{{ route('plans.store') }}";--}}
{{--        let planCurrencies = JSON.parse('@json($currency)');--}}
{{--        let planCurrencySymbols = JSON.parse('@json($currencyIcon)');--}}
{{--    </script>--}}
{{--    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>--}}
{{--    <script src="{{ asset('js/currency.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/plans/plans.js')}}"></script>--}}
{{--    <script src="{{ asset('assets/js/autonumeric/autoNumeric.min.js') }}"></script>--}}
{{--@endpush--}}


@extends('layouts.app')
@section('title')
    {{ __('messages.subscriptions_plans') }}
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
                            <a class="btn btn-primary addPlanModal"><i
                                    class="fas fa-plus"></i>{{ __('messages.skill.add') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                    <div class="table-responsive">
                        @include('plans.table')
                    </div>
                </div>
            </div>
            @include('plans.templates.templates')
            @include('plans.add_modal')
            @include('plans.edit_modal')
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let planUrl = "{{ route('plans.index') }}";
        let planSaveUrl = "{{ route('plans.store') }}";
        let planCurrencies = JSON.parse('@json($currency)');
        let planCurrencySymbols = JSON.parse('@json($currencyIcon)');
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('js/currency.js') }}"></script>
    <script src="{{mix('assets/js/plans/plans.js')}}"></script>
    <script src="{{ asset('assets/js/autonumeric/autoNumeric.min.js') }}"></script>
@endpush
