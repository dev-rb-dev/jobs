@extends('web.layouts.app')
@section('title')
    {{ __('web.job_seekers') }}
@endsection
@section('page_css')
    @if(\Illuminate\Support\Facades\App::getLocale() == 'ar')
        <style>
            .candidate-main ul.pagination {
                direction: rtl;
            }
        </style>
    @endif
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/header-span.css') }}">
@endsection
@section('content')
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>{{ __('web.job_seekers') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('front.home') }}">{{ __('web.home') }}</a></li>
                    <li>{{ __('web.job_seekers') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="find-candidate ptb80 custom-ptb-30">
        @livewire('candidate-search')
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $(document).on('click', '#btnReset', function () {
                $('#All').prop('checked', true);
                $('#searchBy').prop('selectedIndex', 0);
            });
            window.livewire.hook('message.processed', () => {
                $(window).scrollTop(0);
            });
            $('#searchByCandidate, .search-by-location').val('');
        });
    </script>
@endsection
