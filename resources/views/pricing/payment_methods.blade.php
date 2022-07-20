@extends('employer.layouts.app')
@section('title')
    {{ __('messages.employer_menu.manage_subscriptions') }}
@endsection
@section('header_toolbar')
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
    <div class="card-body">
        <div class="row">
            <div class="col-12 offset-0 offset-md-2 col-md-8">
                <img src="{{ asset('assets/img/payment.png') }}" class="img-fluid">
            </div>
            <div class="col-12">
                <div class="row justify-content-lg-around">
                    <a class="btn btn-primary btn-lg mt-2 col-md-4 col-12 subscribe" href="javascript:void(0)"
                       data-id="{{ $plan->id }}">
                        {{ __('messages.plan.pay_with_stripe') }}
                            </a>
                            <a class="btn btn-primary btn-lg mt-2 col-md-4 col-12 pay-with-paypal"
                               href="{{ route('paypal-payment', $plan->id) }}">
                                {{ __('messages.plan.pay_with_paypal') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

@endsection
@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        let stripe = Stripe('{{ config('services.stripe.key') }}');
        let subscribeText = "{{ __('messages.plan.purchase') }}";
        let cancelSubscriptionUrl = "{{ route('cancel-subscription') }}";
        let purchaseTriaalSubscriptionUrl = "{{ route('purchase-trial-subscription') }}";
    </script>
    <script src="{{ mix('assets/js/subscription/subscription.js') }}"></script>
@endpush
