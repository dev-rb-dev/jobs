@extends('layouts.app')
@section('title')
    {{ __('messages.candidate.candidate_details') }}
@endsection
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('candidates.edit',$candidate->id) }}"
                   class="btn btn-sm btn-light btn-primary pull-right me-2">{{ __('messages.common.edit') }}</a>
                <a href="{{ route('candidates.index') }}"
                   class="btn btn-sm btn-light btn-active-light-primary pull-right">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    {{--    <section class="section">--}}
    {{--        <div class="section-header">--}}
    {{--            <h1>{{ __('messages.candidate.candidate_details') }}</h1>--}}
    {{--            <div class="section-header-breadcrumb">--}}
    {{--                <a href="{{ route('candidates.edit',$candidate->id) }}"--}}
    {{--                   class="btn btn-warning form-btn float-right mr-2">{{ __('messages.common.edit') }}</a>--}}
    {{--                <a href="{{ route('candidates.index') }}"--}}
    {{--                   class="btn btn-primary form-btn">{{ __('messages.common.back') }}</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="section-body">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-body">--}}
    {{--                    @include('candidates.show_fields')--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}

    <div class="d-flex flex-column flex-lg-row">
        <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                </div>
            </div>
            <div class="card">
                <div class="card-body p-12">
                    @include('candidates.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
