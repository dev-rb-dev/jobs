{{--@extends('layouts.app')--}}
{{--@section('title')--}}
{{--    {{ __('messages.post.posts') }}--}}
{{--@endsection--}}
{{--@push('css')--}}
{{--    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="{{ asset('assets/css/stretchy-navigation.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--    @livewireStyles--}}
{{--@endpush--}}
{{--@section('content')--}}
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.post.posts') }}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="{{ route('posts.create') }}" class="btn btn-primary form-btn back-btn-right">{{ __('messages.common.add') }}--}}
{{--                    <i class="fas fa-plus"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            @include('flash::message')--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @livewire('blog-post')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('blogs.templates.templates')--}}
{{--    </section>--}}
{{--@endsection--}}
{{--@push('scripts')--}}
{{--    @livewireScripts--}}
{{--    <script>--}}
{{--        let blogUrl = "{{ route('posts.index') }}";--}}
{{--    </script>--}}
{{--    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/js/select2.min.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/blogs/blogs.js') }}"></script>--}}
{{--@endpush--}}


@extends('layouts.app')
@section('title')
    {{ __('messages.post.posts') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
    @include('flash::message')
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-6">
                    @include('layouts.search-component')
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center py-1">
                            <a class="btn btn-primary" href="{{ route('posts.create') }}"><i
                                    class="fas fa-plus"></i>{{ __('messages.common.add') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                    <div class="table-responsive">
                        @include('blogs.table')
                    </div>
                </div>
            </div>
            @include('blogs.templates.templates')
@endsection
@push('scripts')
    <script>
        blogUrl = "{{ route('posts.index') }}";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ mix('assets/js/blogs/blogs.js') }}"></script>

@endpush
