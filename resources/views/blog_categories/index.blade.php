@extends('layouts.app')
@section('title')
    {{ __('messages.post_category.post_categories') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.post_category.post_categories') }}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="#" class="btn btn-primary form-btn addBlogCategoryModal back-btn-right">{{ __('messages.common.add') }}--}}
{{--                    <i class="fas fa-plus"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @livewire('blog-categories')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('blog_categories.templates.templates')--}}
{{--        @include('blog_categories.add_modal')--}}
{{--        @include('blog_categories.edit_modal')--}}
{{--        @include('blog_categories.show_modal')--}}
{{--    </section>--}}

@include('flash::message')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-6">
                @include('layouts.search-component')
                <div class="card-toolbar">
                    <div class="d-flex align-items-center py-1">
                        <a class="btn btn-primary addBlogCategoryModal"><i
                                class="fas fa-plus"></i>{{ __('messages.marital_status.add') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                <div class="table-responsive">
                    @include('blog_categories.table')
                </div>
            </div>
        </div>
        @include('blog_categories.templates.templates')
        @include('blog_categories.add_modal')
        @include('blog_categories.edit_modal')
        @include('blog_categories.show_modal')
    </div>
</div>
@endsection
@push('scripts')
    @livewireScripts
    <script>
        let blogCategoryUrl = "{{ route('post-categories.index') }}/";
        let blogCategorySaveUrl = "{{ route('post-categories.store') }}";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
{{--    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>--}}
    <script src="{{mix('assets/js/blog_categories/blog_categories.js')}}"></script>
@endpush
