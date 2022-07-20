@extends('layouts.app')
@section('title')
    {{ __('messages.testimonial.testimonials') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
    @include('flash::message')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-6">
                    @include('layouts.search-component')
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center py-1">
                            <a class="btn btn-primary addTestimonialModal">
                                <i class="fas fa-plus"></i>{{ __('messages.common.add') }}
                            </a>
                        </div>
                    </div>
                </div>
                {{--                                @livewire('testimonials')--}}
                <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                    <div class="table-responsive">
                        @include('testimonial.table')
                    </div>
                </div>
            </div>
            @include('testimonial.templates.templates')
            @include('testimonial.add_modal')
            @include('testimonial.edit_modal')
            @include('testimonial.show_modal')
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let testimonialUrl = "{{ route('testimonials.index') }}/";
        let testimonialSaveUrl = "{{ route('testimonials.store') }}";
        let testimonialImageSaveUrl = "{{ route('download.image') }}";
        let defaultDocumentImageUrl = "{{ asset('assets/img/infyom-logo.png') }}";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/testimonial/testimonial.js')}}"></script>
@endpush
