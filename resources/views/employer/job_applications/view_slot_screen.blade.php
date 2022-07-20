{{--@extends('employer.layouts.app')--}}
{{--@section('title')--}}
{{--    {{ __('messages.job_stage.slots') }}--}}
{{--@endsection--}}
{{--@push('css')--}}
{{--    @livewireStyles--}}
{{--    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">--}}
{{--@endpush--}}
{{--@section('content')--}}
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.job_stage.slots') }}</h1>--}}
{{--            <div class="section-header-breadcrumb slot-screen">--}}
{{--                @if(isset($lastStage) && $jobStage->isNotEmpty())--}}
{{--                    <div class="pl-3 pr-md-3 pr-0 py-1 grid-width-100 pl-mobile-0">--}}
{{--                        {{ Form::select('stage_id', $jobStage, $lastStage->stage_id, ['id' => 'stages', 'class' => 'form-control status-filter w-100']) }}--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                @if($isSelectedRejectedSlot > 0 || $isStageMatch)--}}
{{--                    <a href="javascript:void(0)"--}}
{{--                       class="ml-4 btn btn-primary form-btn float-right schedule-interview">{{ __('messages.common.add') }}</a>--}}
{{--                @endif--}}
{{--                <a href="{{ url('employer/jobs/'.request()->route('jobId').'/applications') }}"--}}
{{--                   class="ml-3 btn btn-primary form-btn">{{ __('messages.common.back') }}</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            @include('layouts.errors')--}}
{{--            <div class="card">--}}
{{--                <div class="card-body mt-0 p-4">--}}
{{--                    @livewire('view-slot-screen',['applicationId'=>$applicationId])--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('employer.job_applications.schedule_interview_modal')--}}
{{--        @include('employer.job_applications.templates.templates')--}}
{{--        @include('employer.job_applications.add_batch_slot_modal')--}}
{{--        @include('employer.job_applications.edit_batch_slot_modal')--}}
{{--    </section>--}}
{{--@endsection--}}
{{--@push('scripts')--}}
{{--    @livewireScripts--}}
{{--    <script>--}}
{{--        let interviewSlotStoreUrl = "{{ route('interview.slot.store', ['jobId' => request()->route('jobId')]) }}";--}}
{{--        let batchSlotStoreUrl = "{{ route('batch.slot.store', ['jobId' => request()->route('jobId')]) }}";--}}
{{--        let uniqueId = 1;--}}
{{--        let JobApplicationId = "{{ request()->route('jobApplicationId') }}";--}}
{{--        let getScheduleHistory = "{{ route('get.schedule.history', ['jobId' => request()->route('jobId')]) }}";--}}
{{--        let cancelSlotUrl = "{{ route('cancel.selected.slot', ['jobId' => request()->route('jobId')]) }}";--}}
{{--        let jobApplicationUrl = "{{url('employer/jobs/'.request()->route('jobId').'/applications')}}";--}}
{{--    </script>--}}
{{--    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/js/job_applications/job_slots.js') }}"></script>--}}
{{--@endpush--}}



@extends('employer.layouts.app')
@section('title')
    {{ __('messages.job_stage.slots') }}
@endsection
@push('css')
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
@endpush
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            </div>
            <div class="d-flex">
                @if(isset($lastStage) && $jobStage->isNotEmpty())
                    <div class="w-150px">
                        {{ Form::select('stage_id', $jobStage, $lastStage->stage_id, ['id' => 'stages', 'class' => 'form-select form-select-solid status-filter w-100']) }}
                    </div>
                @endif
                @if($isSelectedRejectedSlot > 0 || $isStageMatch)
                    <div>
                        <a href="javascript:void(0)"
                           class="btn btn-primary btn-sm form-btn schedule-interview ms-3"><i
                                class="fas fa-plus"></i>{{ __('messages.common.add') }}</a>
                    </div>
                @endif
                <div>
                    <a href="{{ url('employer/jobs/'.request()->route('jobId').'/applications') }}"
                       class="btn btn-sm btn-light btn-active-light-primary pull-right ms-3">{{ __('messages.common.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @include('flash::message')
    <div class="d-flex flex-column flex-lg-row">
        <div class="flex-lg-row-fluid mb-10 mb-lg-0">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                </div>
            </div>
            <div class="card">
                <div class="card-body p-12">
                    @livewire('view-slot-screen',['applicationId'=>$applicationId])
                </div>
            </div>
            @include('employer.job_applications.schedule_interview_modal')
            @include('employer.job_applications.templates.templates')
            @include('employer.job_applications.add_batch_slot_modal')
            @include('employer.job_applications.edit_batch_slot_modal')
        </div>
    </div>
@endsection
@push('scripts')
    @livewireScripts
    <script>
        let interviewSlotStoreUrl = "{{ route('interview.slot.store', ['jobId' => request()->route('jobId')]) }}";
        let batchSlotStoreUrl = "{{ route('batch.slot.store', ['jobId' => request()->route('jobId')]) }}";
        let uniqueId = 1;
        let JobApplicationId = "{{ request()->route('jobApplicationId') }}";
        let getScheduleHistory = "{{ route('get.schedule.history', ['jobId' => request()->route('jobId')]) }}";
        let cancelSlotUrl = "{{ route('cancel.selected.slot', ['jobId' => request()->route('jobId')]) }}";
        let jobApplicationUrl = "{{url('employer/jobs/'.request()->route('jobId').'/applications')}}";
    </script>
{{--    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>--}}
    <script src="{{ asset('assets/js/job_applications/job_slots.js') }}"></script>
@endpush



{{--@section('content')--}}
{{--    <section class="section">--}}
{{--        <div class="section-body">--}}
{{--            @include('layouts.errors')--}}
{{--            <div class="card">--}}
{{--                <div class="card-body mt-0 p-4">--}}
{{--                    @livewire('view-slot-screen',['applicationId'=>$applicationId])--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </section>--}}
{{--@endsection--}}

