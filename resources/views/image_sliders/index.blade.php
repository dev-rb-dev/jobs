@extends('layouts.app')
@section('title')
    {{ __('messages.image_sliders') }}
@endsection
@push('css')
    {{--    @livewireStyles--}}
    {{--    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>--}}
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
    {{--    <section class="section">--}}
    {{--        <div class="section-header flex-wrap">--}}
    {{--            <h1 class="mb-2">{{ __('messages.image_sliders') }}</h1>--}}
    {{--            <div class="section-header-breadcrumb">--}}
    {{--                <div class="card-header-action grid-flex-end">--}}
    {{--                    {{  Form::select('is_active', $statusArr, null, ['id' => 'image_filter_status', 'class' => 'form-control status-filter w-100', 'placeholder' => __('messages.image_slider.select_status')]) }}--}}
    {{--                </div>--}}
    {{--                <a href="#"--}}
    {{--                   class="btn btn-primary form-btn addImageSliderModal ml-2 back-btn-right">{{ __('messages.common.add') }}--}}
    {{--                    <i class="fas fa-plus"></i></a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="section-body">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-body">--}}
    {{--                    <form method="post" id="searchIsActive">--}}
    {{--                        @csrf--}}
    {{--                        <div class="row">--}}
    {{--                            <div class="form-group col-lg-6 col-sm-12">--}}
    {{--                                <label class="custom-switch switch-label row">--}}
    {{--                                    <input type="checkbox" name="is_active"--}}
    {{--                                           class="custom-switch-input isFullSlider" {{ ($settings['is_full_slider'] == 1) ? 'checked' : '' }} >--}}
    {{--                                    <span class="custom-switch-indicator switch-span"></span>--}}
    {{--                                </label>--}}
    {{--                                <span class="custom-switch-description font-weight-bold position-absolute">{{ __('messages.image_slider.slider') }}--}}
    {{--                            <i class="fas fa-question-circle ml-1"--}}
    {{--                               data-toggle="tooltip" data-placement="top"--}}
    {{--                               title="{{ __('messages.image_slider.slider_title') }}"></i></span>--}}
    {{--                            </div>--}}
    {{--                            <div class="form-group col-lg-6 col-sm-12">--}}
    {{--                                <label class="custom-switch switch-label row">--}}
    {{--                                    <input type="checkbox" name="is_active"--}}
    {{--                                           class="custom-switch-input isSliderActive" {{ ($settings['is_slider_active'] == 1) ? 'checked' : '' }} >--}}
    {{--                                    <span class="custom-switch-indicator switch-span"></span>--}}
    {{--                                </label>--}}
    {{--                                <span class="custom-switch-description font-weight-bold position-absolute">{{ __('messages.image_slider.slider_active') }}--}}
    {{--                            <i class="fas fa-question-circle ml-1"--}}
    {{--                               data-toggle="tooltip" data-placement="top"--}}
    {{--                               title="{{ __('messages.image_slider.slider_active_title') }}"></i></span>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="section-body">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-body">--}}
    {{--                    @livewire('image-sliders')--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        @include('image_sliders.templates.templates')--}}
    {{--        @include('image_sliders.add_modal')--}}
    {{--        @include('image_sliders.edit_modal')--}}
    {{--        @include('image_sliders.show_modal')--}}
    {{--    </section>--}}


    @include('flash::message')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5 mb-xl-8 mt-5">
                <div class="card-header border-0 pt-6">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-8">
                                <form method="post" id="searchIsActive" class="d-lg-flex m-6">
                                    @csrf
                                    <div class="form-group col-lg-6 col-sm-12 form-check form-switch form-check-custom">
                                        <label class="custom-switch switch-label">
                                            <input type="checkbox" name="is_active"
                                                   class="custom-switch-input isFullSlider form-check-input" {{ ($settings['is_full_slider'] == 1) ? 'checked' : '' }} >
                                            <span class="custom-switch-indicator switch-span"></span>
                                        </label>
                                        <span
                                            class="custom-switch-description font-weight-bold fs-6 fw-bolder text-gray-700 mb-3 mx-3 mb-md-0">{{ __('messages.image_slider.slider') }}
                            <i class="fas fa-question-circle ml-1"
                               data-toggle="tooltip" data-placement="top"
                               title="{{ __('messages.image_slider.slider_title') }}"></i></span>
                                    </div>
                                    <div class="form-group col-lg-6 col-sm-12 form-check form-switch form-check-custom">
                                        <label class="custom-switch switch-label">
                                            <input type="checkbox" name="is_active"
                                                   class="custom-switch-input form-check-input isSliderActive" {{ ($settings['is_slider_active'] == 1) ? 'checked' : '' }} >
                                            <span class="custom-switch-indicator switch-span"></span>
                                        </label>
                                        <span
                                            class="custom-switch-description font-weight-bold fs-6 fw-bolder text-gray-700 mb-3 mb-md-0 mx-3">{{ __('messages.image_slider.slider_active') }}
                            <i class="fas fa-question-circle ml-1"
                               data-toggle="tooltip" data-placement="top"
                               title="{{ __('messages.image_slider.slider_active_title') }}"></i></span>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4">
                                <div class="card-toolbar justify-content-end">
                                    <div class="d-flex align-items-center py-1">
                                        <div class="me-4">
                                            <a href="#" class="btn btn-flex btn btn-light-primary btn-light fw-bolder"
                                               data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                               data-kt-menu-flip="top-end">
                                    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path
                                                        d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z"
                                                        fill="#000000"></path>
												</g>
											</svg>
										</span>
                                                {{ __('messages.common.filter') }}</a>
                                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                                                 id="kt_menu_6113c71822d0d">
                                                <div class="px-7 py-5">
                                                    <div
                                                            class="fs-5 text-dark fw-bolder">{{ __('messages.common.filter_options') }}</div>
                                                </div>
                                                <div class="separator border-gray-200"></div>
                                                <div class="px-7 py-5">
                                                    <div class="mb-5">
                                                        {{--                                        <label class="form-label fs-6 fw-bold">{{ __('messages.common.status').':' }}</label>--}}
                                                        {{ Form::select('is_active', $statusArr,null, ['id' => 'image_filter_status', 'data-control' =>'select2', 'class' => 'form-select form-select-solid status-filter select2-hidden-accessible data-allow-clear="true"','placeholder' => __('messages.image_slider.select_status')]) }}
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <button type="reset"
                                                                class="btn btn-sm fs-6 btn-light btn-active-light-primary"
                                                                id="resetFilter"
                                                                data-kt-menu-dismiss="true">{{ __('messages.common.reset') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-primary addImageSliderModal"><i
                                                    class="fas fa-plus"></i>{{ __('messages.image_slider.add') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                        <div class="table-responsive">
                            @include('image_sliders.table')
                    </div>
                </div>
            </div>
            @include('image_sliders.templates.templates')
            @include('image_sliders.add_modal')
            @include('image_sliders.edit_modal')
            @include('image_sliders.show_modal')
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    {{--    @livewireScripts--}}
    <script>
        let imageSliderUrl = "{{ route('image-sliders.index') }}/";
        let imageSliderSaveUrl = "{{ route('image-sliders.store') }}";
        let defaultDocumentImageUrl = "{{ asset('assets/img/infyom-logo.png') }}";
        let view = "{{ __('messages.common.view') }}";
        let imageSizeMessage = "{{ __('messages.image_slider.image_size_message') }}";
        let imageExtensionMessage = "{{ __('messages.image_slider.image_extension_message') }}";
    </script>
    {{--    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>--}}
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/image_slider/image_slider.js')}}"></script>
@endpush
