@extends('employer.layouts.app')
@section('title')
    {{ __('messages.company.edit_employer') }}
@endsection
@push('css')
    {{--    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>--}}
    {{--    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>--}}
    <link rel="stylesheet" href="{{ asset('assets/css/inttel/css/intlTelInput.css') }}">
@endpush
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            </div>
            @if($isFeaturedEnable)
                @if($company->activeFeatured)
                    <div class="badge badge-info d-inline-block rounded">
                        {{ __('messages.front_settings.featured') }}
                        {{ __('messages.front_settings.exipre_on') }}
                        {{ (new Carbon\Carbon($company->activeFeatured->end_time))->format('d/m/y') }}</div>
                @else
                    @if($isFeaturedAvilabal)
                        <button class="btn btn-info btn-sm"
                                id="makeFeatured">{{ __('messages.front_settings.make_featured') }}</button>
                    @else
                        <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="{{ __('messages.front_settings.featured_employer_not_available') }}">
                            {{ __('messages.front_settings.make_featured') }}</button>
                    @endif
                @endif
            @endif
        </div>
    </div>
@endsection
@section('content')
    <div class="d-flex flex-column flex-lg-row">
        <div class="flex-lg-row-fluid mb-10 mb-lg-0">
            <div class="row">
                <div class="col-12">
                    @include('flash::message')
                    @include('layouts.errors')
                </div>
            </div>
            <div class="card">
                <div class="card-body p-12">
                    {{ Form::model($user, ['route' => ['company.update.form', $company->id], 'method' => 'put','id'=>'editCompanyForm']) }}
                    @include('employer.companies.edit_fields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        let employerDetail = `{{$company->details}}`;
        let companyStateUrl = "{{ route('states-list') }}";
        let companyCityUrl = "{{ route('cities-list') }}";
        let employerPanel = true;
        let isEdit = true;
        let utilsScript = "{{asset('assets/js/inttel/js/utils.min.js')}}";
        let phoneNo = "{{ old('region_code').old('phone') }}";
        let countryId = '{{$company->user->country_id}}';
        let stateId = '{{$company->user->state_id}}';
        let cityId = '{{$company->user->city_id}}';
        let companyID = '{{ $company->id }}';
        let stripe = Stripe('{{ config('services.stripe.key') }}');
        let companyStripePaymentUrl = '{{ url('company-stripe-charge') }}';
    </script>
    {{--    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>--}}
    <script src="{{mix('assets/js/companies/create-edit.js')}}"></script>
    {{--    <script src="{{ asset('assets/js/select2.min.js') }}"></script>--}}
    <script src="{{ asset('assets/js/companies/companies_stripe_payment.js') }}"></script>
    <script src="{{ asset('assets/js/inttel/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/inttel/js/utils.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>
@endpush
