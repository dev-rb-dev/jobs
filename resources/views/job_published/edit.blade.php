{{--@extends('layouts.app')--}}
{{--@section('title')--}}
{{--    {{ __('messages.job.edit_job') }}--}}
{{--@endsection--}}
{{--@push('css')--}}
{{--    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--@endpush--}}
{{--@section('content')--}}
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.job.edit_job') }}</h1>--}}
{{--            <div class="section-header-breadcrumb">--}}
{{--                <a href="{!! URL::previous() !!}"--}}
{{--                   class="btn btn-primary form-btn float-right">{{ __('messages.common.back') }}</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            @include('layouts.errors')--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    {{ Form::model($job, ['route' => ['admin.job.update', $job->id], 'method' => 'put', 'id' => 'editJobForm']) }}--}}

{{--                    @include('jobs.edit_fields')--}}

{{--                    {{ Form::close() }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @include('job_types.add_modal')--}}
{{--            @include('job_categories.add_modal')--}}
{{--            @include('skills.add_modal')--}}
{{--            @include('salary_periods.add_modal')--}}
{{--            @include('countries.add_modal')--}}
{{--            @include('states.add_modal')--}}
{{--            @include('cities.add_modal')--}}
{{--            @include('career_levels.add_modal')--}}
{{--            @include('job_shifts.add_modal')--}}
{{--            @include('job_tags.add_modal')--}}
{{--            @include('required_degree_levels.add_modal')--}}
{{--            @include('functional_areas.add_modal')--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}
{{--@push('scripts')--}}
{{--    <script>--}}
{{--        let jobStateUrl = "{{ route('states-list') }}";--}}
{{--        let jobCityUrl = "{{ route('cities-list') }}";--}}
{{--        let employerPanel = false;--}}
{{--        let jobTypeSaveUrl = "{{ route('jobType.store') }}";--}}
{{--        let jobCategorySaveUrl = "{{ route('job-categories.store') }}";--}}
{{--        let skillSaveUrl = "{{ route('skills.store') }}";--}}
{{--        let salaryPeriodSaveUrl = "{{ route('salaryPeriod.store') }}";--}}
{{--        let countrySaveUrl = "{{ route('countries.store') }}";--}}
{{--        let stateSaveUrl = "{{ route('states.store') }}";--}}
{{--        let citySaveUrl = "{{ route('cities.store') }}";--}}
{{--        let careerLevelSaveUrl = "{{ route('careerLevel.store') }}";--}}
{{--        let jobShiftSaveUrl = "{{ route('jobShift.store') }}";--}}
{{--        let jobTagSaveUrl = "{{ route('jobTag.store') }}";--}}
{{--        let requiredDegreeLevelSaveUrl = "{{ route('requiredDegreeLevel.store') }}";--}}
{{--        let functionalAreaSaveUrl = "{{ route('functionalArea.store') }}";--}}
{{--    </script>--}}
{{--    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>--}}
{{--    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/jobs/create-edit.js')}}"></script>--}}
{{--    <script src="{{ asset('assets/js/select2.min.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/js/autonumeric/autoNumeric.min.js') }}"></script>--}}
{{--@endpush--}}


@extends('layouts.app')
@section('title')
    {{ __('messages.job.edit_job') }}
@endsection
@push('css')
    {{--    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>--}}
    {{--    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>--}}
    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="{!! URL::previous() !!}"
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
                    {{-- {{ Form::model($job, ['route' => ['admin.job_published.update', $job->id], 'method' => 'put', 'id' => 'editJobForm']) }} --}}

                    @include('job_published.edit_fields')

                    {{ Form::close() }}
                </div>
            </div>
            @include('job_types.add_modal')
            @include('job_categories.add_modal')
            @include('skills.add_modal')
            @include('salary_periods.add_modal')
            @include('countries.add_modal')
            @include('states.add_modal')
            @include('cities.add_modal')
            @include('career_levels.add_modal')
            @include('job_shifts.add_modal')
            @include('job_tags.add_modal')
            @include('required_degree_levels.add_modal')
            @include('functional_areas.add_modal')
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let jobStateUrl = "{{ route('states-list') }}";
        let jobCityUrl = "{{ route('cities-list') }}";
        let employerPanel = false;
        let isEdit = true;
        let jobTypeSaveUrl = "{{ route('jobType.store') }}";
        let jobCategorySaveUrl = "{{ route('job-categories.store') }}";
        let skillSaveUrl = "{{ route('skills.store') }}";
        let salaryPeriodSaveUrl = "{{ route('salaryPeriod.store') }}";
        let countrySaveUrl = "{{ route('countries.store') }}";
        let stateSaveUrl = "{{ route('states.store') }}";
        let citySaveUrl = "{{ route('cities.store') }}";
        let careerLevelSaveUrl = "{{ route('careerLevel.store') }}";
        let jobShiftSaveUrl = "{{ route('jobShift.store') }}";
        let jobTagSaveUrl = "{{ route('jobTag.store') }}";
        let requiredDegreeLevelSaveUrl = "{{ route('requiredDegreeLevel.store') }}";
        let functionalAreaSaveUrl = "{{ route('functionalArea.store') }}";
    </script>
    {{--    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>--}}
    {{--    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>--}}
    <script src="{{mix('assets/js/jobs/create-edit.js')}}"></script>
    {{--    <script src="{{ asset('assets/js/select2.min.js') }}"></script>--}}
    <script src="{{ asset('assets/js/autonumeric/autoNumeric.min.js') }}"></script>
@endpush
