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
    @include('flash::message')
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
        <!--begin::Col-->
        @foreach($plans as $plan)
            <div class="col-md-4">
                <!--begin::Card-->
                <div class="card card-shadow card-flush h-md-100">
                    <div class="card-header justify-content-center">
                        <div class="card-title">
                            <h1> {{ html_entity_decode($plan->name) }}</h1>
                        </div>
                    </div>
                    <div class="card-body py-1">
                        <!--begin::Users-->
                        <div class="fw-bolder text-primary m-2 text-center">
                            <span
                                class="fs-4x">{{ empty($plan->salaryCurrency->currency_icon)?'$':$plan->salaryCurrency->currency_icon }}{{ $plan->amount }}</span>
                            <br>
                            <span class="fs-4">{{ __('messages.plan.per_month') }}</span>
                        </div>
                        @if(isset($subscription) && $subscription->plan_id == $plan->id)
                            @if($subscription->stripe_status != 'trialing')
                                <div class="py-4 fw-bold fs-2 font-weight-bold text-center">
                                    @if(isset($subscription->ends_at))
                                        {{ __('messages.plan.ends_at').': '.\Carbon\Carbon::parse($subscription->ends_at)->format('jS M,Y') }}
                                    @else
                                        {{ __('messages.plan.renews_on').': '.\Carbon\Carbon::parse($subscription->current_period_end)->format('jS M,Y') }}
                                    @endif
                                </div>
                            @endif
                        @endif
                        <div class="separator mb-7 w-100"></div>
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <div class="fw-bolder text-muted mb-3 fs-5">
                                <div class="mb-2">
                                    <i class="fas fa-check text-primary me-3"></i>{{ $plan->allowed_jobs.' '.($plan->allowed_jobs > 1 ? __('messages.plan.jobs_allowed') : __('messages.plan.job_allowed')) }}
                                </div>
                                <div class="mb-2">
                                    @if($plan->is_trial_plan)
                                        <i class="fas fa-check text-primary me-3"></i>
                                    @else
                                        <i class="fas fa-times text-danger me-3"></i>
                                    @endif
                                    {{ __('messages.plan.is_trial_plan') }}
                                </div>
                                <div class="mb-2">
                                    @if(isset($subscription) && $subscription->plan_id == $plan->id)
                                        <i class="fas fa-briefcase text-primary me-3"></i>
                                        {{ $jobsCount.' '.($jobsCount > 1 ? __('messages.plan.jobs_used') : __('messages.plan.job_used'))}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between pt-0">
                        @if(isset($subscription) && $subscription->plan_id == $plan->id)
                            @if($subscription->current_period_end <= date('Y-m-d H:i:s'))
                                <a href="{{ route('payment-method-screen', $plan->id) }}"
                                   data-id="{{ $plan->id }}"
                                   class="btn rounded-pill btn-warning">
                                    {{ __('messages.plan.upgrade') }}
                                </a>
                            @else
                                <a href="javascript:void(0)"
                                   class="btn rounded-pill btn-success">{{ __('messages.plan.current_plan') }} </a>
                            @endif
                            @if($subscription->ststripe_statu != 'trialing')
                                @if(isset($subscription->ends_at))
                                    <a href="javascript:void(0)"
                                       class="btn rounded-pill btn-danger subscription">{{ __('messages.plan.subscription_cancelled') }}</a>
                                @else
                                    <a href="javascript:void(0)"
                                       class="btn rounded-pill btn-danger cancel-subscription">{{ __('messages.plan.cancel_subscription') }}</a>
                                @endif
                            @endif
                        @else
                            @if($plan->is_trial_plan)
                                <a href="javascript:void(0)" data-id="{{ $plan->id }}"
                                   class="btn btn-info w-100 rounded-pill my-1 me-2"
                                   style="pointer-events: none;">{{ __('messages.plan.is_trial_plan') }} </a>
                            @else
                                @if($activePlanId !== $plan->id)
                                    <a href="{{ route('payment-method-screen', $plan->id) }}"
                                       data-id="{{ $plan->id }}"
                                       class="btn btn-info w-100 rounded-pill my-1 me-2"> {{ __('messages.plan.purchase') }}</a>
                                @endif
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        @include('pricing.cancel_subscription_modal')
    </div>
    {{--    @if(isset($subscription) && $subscription->plan_id == $plan->id)--}}
    {{--        <a href="javascript:void(0)" class="btn btn-lg btn-info">{{ __('messages.plan.current_plan') }} </a>--}}
    {{--        @if($subscription->ststripe_statu != 'trialing')--}}
    {{--            @if(isset($subscription->ends_at))--}}
    {{--                <a href="javascript:void(0)"--}}
    {{--                   class="btn d-block btn-danger">{{ __('messages.plan.subscription_cancelled') }}</a>--}}
    {{--            @else--}}
    {{--                <a href="javascript:void(0)"--}}
    {{--                   class="btn d-block btn-danger">{{ __('messages.plan.cancel_subscription') }}</a>--}}
    {{--            @endif--}}
    {{--        @endif--}}
    {{--    @else--}}
    {{--        @if($plan->is_trial_plan)--}}
    {{--            <a href="javascript:void(0)" data-id="{{ $plan->id }}"--}}
    {{--               class="btn d-block btn-info h-70px me-2"--}}
    {{--               style="pointer-events: none;">{{ __('messages.plan.is_trial_plan') }} </a>--}}

    {{--        @else--}}
    {{--            @if($activePlanId !== $plan->id)--}}
    {{--                <a href="{{ route('payment-method-screen', $plan->id) }}"--}}
    {{--                   data-id="{{ $plan->id }}"--}}
    {{--                   class="btn btn-info d-block h-70px me-2"> {{ __('messages.plan.purchase') }}</a>--}}
    {{--            @else--}}
    {{--                <a href="{{ route('payment-method-screen', $plan->id) }}"--}}
    {{--                   data-id="{{ $plan->id }}"--}}
    {{--                   class="btn d-block btn-warning">--}}
    {{--                    {{ __('messages.plan.upgrade') }}--}}
    {{--                </a>--}}
    {{--            @endif--}}
    {{--        @endif--}}
    {{--    @endif--}}




    {{--    <section class="section">--}}
    {{--        <div class="section-body">--}}
    {{--            <div class="card-body">--}}
    {{--                <div class="row justify-content-around d-flex mt-xl-0 mt-5">--}}
    {{--                    <div class="col-md-12">--}}
    {{--                        @include('flash::message')--}}
    {{--                    </div>--}}
    {{--                    @foreach($plans as $plan)--}}
    {{--                        <div class="col-12 col-md-6 col-lg-4 col-xl-4">--}}
    {{--                            <div class="pricing {{ isset($subscription) && $subscription->plan_id == $plan->id && $subscription->stripe_status == 'trialing' ? 'pricing-highlight pricing-margin-bottom' : '' }} {{ isset($subscription) && $subscription->plan_id == $plan->id ? 'pricing-highlight' : '' }}">--}}
    {{--                                <div class="pricing-title">--}}
    {{--                                    {{ html_entity_decode($plan->name) }}--}}
    {{--                                </div>--}}
    {{--                                <div class="pricing-padding h-317">--}}
    {{--                                    <div class="pricing-price">--}}
    {{--                                        <div>{{ empty($plan->salaryCurrency->currency_icon)?'$':$plan->salaryCurrency->currency_icon }}{{ $plan->amount }}</div>--}}
    {{--                                        <div>{{ __('messages.plan.per_month') }}</div>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="pricing-details">--}}
    {{--                                        <div class="pricing-item">--}}
    {{--                                            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>--}}
    {{--                                            <div class="pricing-item-label">{{ $plan->allowed_jobs.' '.($plan->allowed_jobs > 1 ? __('messages.plan.jobs_allowed') : __('messages.plan.job_allowed')) }}</div>--}}
    {{--                                        </div>--}}
    {{--                                        <div class="pricing-item">--}}
    {{--                                            @if($plan->is_trial_plan)--}}
    {{--                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>--}}
    {{--                                            @else--}}
    {{--                                                <div class="pricing-item-icon bg-danger text-white"><i--}}
    {{--                                                            class="fas fa-times"></i></div>--}}
    {{--                                            @endif--}}
    {{--                                            <div class="pricing-item-label">{{ __('messages.plan.is_trial_plan') }}</div>--}}
    {{--                                        </div>--}}
    {{--                                        @if(isset($subscription) && $subscription->plan_id == $plan->id)--}}
    {{--                                            <div class="pricing-item">--}}
    {{--                                                <div class="pricing-item-icon"><i class="fas fa-briefcase"></i></div>--}}
    {{--                                                <div class="pricing-item-label">{{ $jobsCount.' '.($jobsCount > 1 ? __('messages.plan.jobs_used') : __('messages.plan.job_used'))}}</div>--}}
    {{--                                            </div>--}}
    {{--                                            @if($subscription->stripe_status != 'trialing')--}}
    {{--                                                @if(isset($subscription->ends_at))--}}
    {{--                                                    <div class="pricing-item">--}}
    {{--                                                        <div class="pricing-item-icon"><i class="fas fa-clock"></i>--}}
    {{--                                                        </div>--}}
    {{--                                                        <div class="pricing-item-label">{{ __('messages.plan.ends_at').': '.\Carbon\Carbon::parse($subscription->ends_at)->format('jS M,Y') }}</div>--}}
    {{--                                                    </div>--}}
    {{--                                                @else--}}
    {{--                                                    <div class="pricing-item">--}}
    {{--                                                        <div class="pricing-item-icon"><i class="fas fa-clock"></i>--}}
    {{--                                                        </div>--}}
    {{--                                                        <div class="pricing-item-label">{{ __('messages.plan.renews_on').': '.\Carbon\Carbon::parse($subscription->current_period_end)->format('jS M,Y') }}</div>--}}
    {{--                                                    </div>--}}
    {{--                                                @endif--}}
    {{--                                            @endif--}}
    {{--                                        @endif--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="pricing-cta">--}}
    {{--                                    @if(isset($subscription) && $subscription->plan_id == $plan->id)--}}
    {{--                                        <a href="javascript:void(0)" class="current-subscription">{{ __('messages.plan.current_plan') }} </a>--}}
    {{--                                        @if($subscription->ststripe_statu != 'trialing')--}}
    {{--                                            @if(isset($subscription->ends_at))--}}
    {{--                                                <a href="javascript:void(0)"--}}
    {{--                                                   class="subscription">{{ __('messages.plan.subscription_cancelled') }}</a>--}}
    {{--                                            @else--}}
    {{--                                                <a href="javascript:void(0)"--}}
    {{--                                                   class="cancel-subscription">{{ __('messages.plan.cancel_subscription') }}</a>--}}
    {{--                                            @endif--}}
    {{--                                        @endif--}}
    {{--                                    @else--}}
    {{--                                        @if($plan->is_trial_plan)--}}
    {{--                                            <a href="javascript:void(0)" data-id="{{ $plan->id }}"--}}
    {{--                                               class="purchase-subscription"--}}
    {{--                                               style="pointer-events: none;">{{ __('messages.plan.is_trial_plan') }} </a>--}}
    {{--                                        @else--}}
    {{--                                            @if($activePlanId !== $plan->id)--}}
    {{--                                                <a href="{{ route('payment-method-screen', $plan->id) }}"--}}
    {{--                                                   data-id="{{ $plan->id }}"--}}
    {{--                                                   class="purchase-subscription"> {{ __('messages.plan.purchase') }}</a>--}}
    {{--                                            @else--}}
    {{--                                                <a href="{{ route('payment-method-screen', $plan->id) }}"--}}
    {{--                                                   data-id="{{ $plan->id }}"--}}
    {{--                                                   class="current-subscription">--}}
    {{--                                                    {{ __('messages.plan.upgrade') }}--}}
    {{--                                                </a>--}}
    {{--                                            @endif--}}
    {{--                                        @endif--}}
    {{--                                    @endif--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    @endforeach--}}
    {{--                </div>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
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
