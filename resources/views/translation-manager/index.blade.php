{{--@extends('layouts.app')--}}
{{--@section('title')--}}
{{--    {{__('messages.translation_manager')}}--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--    <section class="section">--}}
{{--        <div class="section-header flex-wrap">--}}
{{--            <h1 class="mb-2">{{__('messages.translation_manager')}}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="javascript:void(0)" class="btn btn-primary addLanguageModal back-btn-right">--}}
{{--                    {{ __('messages.common.add') }} <i class="fas fa-plus "></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            @include('flash::message')--}}
{{--            @include('error')--}}
{{--            <div class="card">--}}
{{--                {{ Form::open(['route' => 'translation-manager.update','method'=>'post']) }}--}}
{{--                @include('translation-manager.fields')--}}
{{--                {{ Form::close() }}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('translation-manager.create')--}}
{{--    </section>--}}
{{--@endsection--}}
{{--@push('scripts')--}}
{{--    <script>--}}
{{--        let languageCreateURL = "{{route('translation-manager.store')}}";--}}
{{--        let languageName = "{{ $selectedLang }}";--}}
{{--        let fileName = "{{ $selectedFile }}";--}}
{{--    </script>--}}
{{--    <script src="{{mix('assets/js/language_translate/language_translate.js')}}"></script>--}}
{{--@endpush--}}


@extends('layouts.app')
@section('title')
    {{ __('messages.translation_manager') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
    @include('flash::message')
            @include('flash::message')
            @include('error')
            <div class="card mb-5 mb-xl-8">
{{--                <div class="card-header border-0">--}}
{{--                    @include('layouts.search-component')--}}
{{--                    <div class="card-toolbar">--}}
{{--                        <div class="d-flex align-items-center py-1">--}}
{{--                            <a class="btn btn-primary addLanguageModal"><i--}}
{{--                                    class="fas fa-plus"></i>{{ __('messages.common.add') }}</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                    {{ Form::open(['route' => 'translation-manager.update','method'=>'post']) }}
                    @include('translation-manager.fields')
                    {{ Form::close() }}
                </div>
            </div>
            @include('translation-manager.create')
@endsection
@push('scripts')
    <script>
        let languageCreateURL = "{{route('translation-manager.store')}}";
        let languageName = "{{ $selectedLang }}";
        let fileName = "{{ $selectedFile }}";
    </script>
    <script src="{{mix('assets/js/language_translate/language_translate.js')}}"></script>
@endpush

