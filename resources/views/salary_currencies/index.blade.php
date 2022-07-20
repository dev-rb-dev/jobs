@extends('layouts.app')
@section('title')
    {{ __('messages.salary_currencies') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.salary_currencies') }}</h1>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @livewire('salary-currencies')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

@include('flash::message')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-6">
                @include('layouts.search-component')
                <div class="card-toolbar">
                    <div class="d-flex align-items-center py-1">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                <div class="table-responsive">
                    @include('salary_currencies.table')
                </div>
            </div>
        </div>
        @include('marital_status.templates.templates')
    </div>
</div>
@endsection
@push('scripts')
    <script>
        let salaryCurrencyUrl = "{{ route('salaryCurrency.index') }}/";
    </script>
    <script src="{{mix('assets/js/salary_currencies/salary_currencies.js')}}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endpush
