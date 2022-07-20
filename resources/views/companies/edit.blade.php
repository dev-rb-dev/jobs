@extends('layouts.app')
@section('title')
    {{ __('messages.company.edit_employer') }}
@endsection
@push('css')
    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/inttel/css/intlTelInput.css') }}">
@endpush
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('company.index') }}"
                   class="btn btn-sm btn-light btn-active-light-primary pull-right">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="section">
        {{--        <div class="section-header">--}}
        {{--            <h1>{{ __('messages.company.edit_employer') }}</h1>--}}
        {{--            <div class="section-header-breadcrumb">--}}
        {{--                <a href="{{ route('company.index') }}"--}}
        {{--                   class="btn btn-primary form-btn float-right">{{ __('messages.common.back') }}</a>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="section-body">
            @include('layouts.errors')
            <div class="card">
                <div class="card-body">
                    {{ Form::model($user, ['route' => ['company.update', $company->id], 'method' => 'put', 'files' => 'true', 'id' => 'editCompanyForm']) }}

                    @include('companies.edit_fields')

                    {{ Form::close() }}
                </div>
            </div>
            @include('industries.add_modal')
            @include('ownership_types.add_modal')
            @include('countries.add_modal')
            @include('states.add_modal')
            @include('cities.add_modal')
            @include('company_sizes.add_modal')
        </div>
    </section>
@endsection
<script>
    let employerDetail = `{{$company->details}}`;
    let companyStateUrl = "{{ route('states-list') }}";
    let companyCityUrl = "{{ route('cities-list') }}";
    let employerPanel = false;
    let isEdit = true;
    let phoneNo = "{{ old('region_code').old('phone') }}";
    let countryId = '{{$company->user->country_id}}';
    let stateId = '{{$company->user->state_id}}';
    let cityId = '{{$company->user->city_id}}';
    let industrySaveUrl = "{{ route('industry.store') }}";
    let ownerShipTypeSaveUrl = "{{ route('ownerShipType.store') }}";
    let countrySaveUrl = "{{ route('countries.store') }}";
    let stateSaveUrl = "{{ route('states.store') }}";
    let citySaveUrl = "{{ route('cities.store') }}";
    let companySizeSaveUrl = "{{ route('companySize.store') }}";
</script>
@push('scripts')
    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/inttel/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/inttel/js/utils.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>
    <script src="{{mix('assets/js/companies/create-edit.js')}}"></script>
@endpush
