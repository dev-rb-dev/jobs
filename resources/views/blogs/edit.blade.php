{{--@extends('layouts.app')--}}
{{--@section('title')--}}
{{--    {{ __('messages.post.edit_post') }}--}}
{{--@endsection--}}
{{--@push('css')--}}
{{--    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--@endpush--}}
{{--@section('content')--}}
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.post.edit_post') }}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="{{ route('posts.index') }}"--}}
{{--                   class="btn btn-primary form-btn float-right">{{ __('messages.common.back') }}</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            @include('layouts.errors')--}}
{{--            <div class="card mt-2">--}}
{{--                <div class="card-body">--}}
{{--                    {{ Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put', 'id' => 'editBlogForm', 'files' => 'true']) }}--}}

{{--                    @include('blogs.fields')--}}

{{--                    {{ Form::close() }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}
{{--@push('scripts')--}}
{{--    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/blogs/create-edit.js')}}"></script>--}}
{{--    <script src="{{ asset('assets/js/select2.min.js') }}"></script>--}}
{{--@endpush--}}


@extends('layouts.app')
@section('title')
    {{ __('messages.post.edit_post') }}
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
                <a href="{{ route('posts.index') }}"
                   class="btn btn-sm btn-light btn-active-light-primary pull-right">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="d-flex flex-column flex-lg-row">
        <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                </div>
            </div>
            <div class="card">
                <div class="card-body p-12">
                    {{ Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put', 'id' => 'editBlogForm', 'files' => 'true']) }}

                    @include('blogs.fields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let blogDescription = '{{$post->description}}';
    </script>
    <script src="{{mix('assets/js/blogs/create-edit.js')}}"></script>
@endpush

