@extends('employer.layouts.app')
@section('title')
    {{ __('messages.transactions') }}
@endsection
@section('header_toolbar')
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.transactions') }}</h1>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @include('employer.transactions.table')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('employer.transactions.templates.templates')--}}
{{--    </section>--}}

<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
             data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
             class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
        </div>
    </div>
</div>
@endsection
@section('content')
    @include('flash::message')
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-6">
            @include('layouts.search-component')
        </div>
        <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
            <div class="table-responsive">
                @include('employer.transactions.table')
            </div>
        </div>
        @include('employer.transactions.templates.templates')
    </div>
@endsection
@push('scripts')
    <script>
        let transactionUrl = "{{ route('transaction.index') }}";
        let invoiceUrl = "{{ url('employer/invoices') }}/";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('js/currency.js') }}"></script>
    <script src="{{mix('assets/js/employer_transactions/transactions.js')}}"></script>
@endpush

