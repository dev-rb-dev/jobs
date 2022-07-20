{{--@extends('layouts.app')--}}
{{--@section('title')--}}
{{--    {{ __('messages.transactions') }}--}}
{{--@endsection--}}
{{--@push('css')--}}
{{--    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--@endpush--}}
{{--@section('content')--}}
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.transactions') }}</h1>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @include('transactions.table')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('transactions.templates.templates')--}}
{{--    </section>--}}
{{--@endsection--}}
{{--@push('scripts')--}}
{{--    <script>--}}
{{--        let transactionUrl = "{{ route('transactions.index') }}";--}}
{{--        let invoiceUrl = "{{ url('admin/invoices') }}/";--}}
{{--    </script>--}}
{{--    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>--}}
{{--    <script src="{{ asset('js/currency.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/transactions/transactions.js')}}"></script>--}}
{{--@endpush--}}


@extends('layouts.app')
@section('title')
    {{ __('messages.transactions') }}
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
                </div>
                <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                    <div class="table-responsive">
                        @include('transactions.table')
                    </div>
                </div>
            </div>
            @include('transactions.templates.templates')
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let transactionUrl = "{{ route('transactions.index') }}";
        let invoiceUrl = "{{ url('admin/invoices') }}/";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('js/currency.js') }}"></script>
    <script src="{{mix('assets/js/transactions/transactions.js')}}"></script>
@endpush
