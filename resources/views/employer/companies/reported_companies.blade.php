@extends('layouts.app')
@section('title')
    {{ __('messages.company.reported_employers') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
    <section class="section">
        {{--        <div class="section-header flex-wrap">--}}
        {{--            <h1 class="mr-4 w-700">{{ __('messages.company.reported_employers') }}</h1>--}}
        {{--            @if(count($reportedEmployee) > 0)--}}
        {{--                <div class="section-header-breadcrumb flex-center">--}}
        {{--                    <div class="row justify-content-end">--}}
        {{--                        <div class="mt-3 mt-md-0">--}}
        {{--                            <div class="card-header-action w-100">--}}
        {{--                                {!! Form::selectMonth('month', null, ['id' => 'filter_reported_date', 'class'=>'form-control w-100','placeholder' => 'Select Month']) !!}--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            @endif--}}
        {{--        </div>--}}
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('layouts.search-component')
                    @include('employer.companies.reported_companies_table')
                </div>
            </div>
        </div>
        @include('employer.companies.templates.templates')
        @include('employer.companies.reported_companies_show_modal')
    </section>
@endsection
@push('scripts')
    <script>
        let reportedCompaniesUrl = "{{ route('reported.companies') }}";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/companies/front/reported_companies.js')}}"></script>
@endpush

