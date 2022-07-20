@extends('layouts.app')
@section('title')
    {{ __('messages.jobs') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
    {{--    <section class="section">--}}
    {{--        <div class="section-header flex-wrap">--}}
    {{--            <h1>{{ __('messages.jobs') }}</h1>--}}
    {{--            <div class="section-header-breadcrumb flex-content-center">--}}
    {{--                <div class="row justify-content-center">--}}
    {{--                    <div class="px-3 mt-md-1 grid-center">--}}
    {{--                        <input type="reset" class="btn btn-danger" id="reset-filter" value="{{ __('messages.common.reset') }}">--}}
    {{--                    </div>--}}
    {{--                    <div class="pl-3 mt-md-1 pad-x-15 grid-center">--}}
    {{--                        <a href="javascript:void(0)" class="btn btn-info w-auto"--}}
    {{--                           id="jobsFilters">{{__('messages.common.filters')}}</a>--}}
    {{--                    </div>--}}
    {{--                    <div class="pl-3 mt-1 pr-0 grid-center pad-x-15 d-sm-flex align-items-sm-center">--}}
    {{--                        <a href="{{ route('admin.job.create') }}"--}}
    {{--                           class="btn btn-primary form-btn">{{ __('messages.common.add') }}--}}
    {{--                            <i class="fas fa-plus"></i></a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="col-md-5 col-lg-4 col-xl-3 col-sm-12 col-12 d-none jobsFilter border border-light"--}}
    {{--                     id="jobsFiltersForm">--}}
    {{--                    <div class="mb-1">--}}
    {{--                        {{  Form::select('is_featured', $featured, null, ['id' => 'filter_featured', 'class' => 'form-control status-filter w-100', 'placeholder' => 'Select Featured Job']) }}--}}
    {{--                    </div>--}}
    {{--                    <div class="mb-1">--}}
    {{--                        {{  Form::select('is_suspended', $suspended, null, ['id' => 'filter_suspended', 'class' => 'form-control status-filter w-100', 'placeholder' => 'Select Suspended Job']) }}--}}
    {{--                    </div>--}}
    {{--                    <div class="mb-1">--}}
    {{--                        {{  Form::select('is_freelancer', $freelancer, null, ['id' => 'filter_freelancer', 'class' => 'form-control status-filter w-100', 'placeholder' => 'Select Freelancer Job']) }}--}}
    {{--                    </div>--}}
    {{--                    <div class="mb-1">--}}
    {{--                        {!! Form::selectMonth('month', null, ['id' => 'filter_expiry_date', 'class'=>'form-control status-filter w-100','placeholder' => 'Select Job Expiry Month']) !!}--}}
    {{--                    </div>--}}
    {{--                    <div class="mb-0">--}}
    {{--                        {{  Form::select('is_job_active', $jobsActiveExpire, null, ['id' => 'filter_job_active_expire', 'class' => 'form-control status-filter w-100', 'placeholder' => 'Select Job Status']) }}--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="section-body">--}}
    {{--            @include('flash::message')--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-body overflow-hidden">--}}
    @include('flash::message')
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-6">
                    @include('layouts.search-component')
                    <div class="card-toolbar">
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
                                            class="fs-5 text-dark fw-bolder">{{ __('messages.common.filter_options') }} </div>
                                    </div>
                                    <div class="separator border-gray-200"></div>
                                    <div class="px-7 py-5">
                                        <div class="mb-5">
                                            {{--                                        <label class="form-label fs-6 fw-bold">{{ __('messages.common.status').':' }}</label>--}}
                                            {{ Form::select('is_featured', $featured,null, ['id' => 'filter_featured', 'data-control' =>'select2', 'class' => 'form-select form-select-solid status-selector select2-hidden-accessible data-allow-clear="true"','placeholder' => 'Select Featured Job']) }}
                                        </div>
                                        <div class="mb-5">
                                            {{--                                        <label class="form-label fs-6 fw-bold">{{ __('messages.common.status').':' }}</label>--}}
                                            {{ Form::select('is_suspended', $suspended,null, ['id' => 'filter_suspended', 'data-control' =>'select2', 'class' => 'form-select form-select-solid status-selector select2-hidden-accessible data-allow-clear="true"','placeholder' => 'Select Suspended Job']) }}
                                        </div>
                                        <div class="mb-5">
                                            {{--                                        <label class="form-label fs-6 fw-bold">{{ __('messages.common.status').':' }}</label>--}}
                                            {{ Form::select('is_freelancer', $freelancer,null, ['id' => 'filter_freelancer', 'data-control' =>'select2', 'class' => 'form-select form-select-solid status-selector select2-hidden-accessible data-allow-clear="true"','placeholder' => 'Select Freelancer Job']) }}
                                        </div>
                                        <div class="mb-5">
                                            {{--                                        <label class="form-label fs-6 fw-bold">{{ __('messages.common.status').':' }}</label>--}}
                                            {{ Form::selectMonth('month', null, ['id' => 'filter_expiry_date', 'data-control' =>'select2', 'class' => 'form-select form-select-solid status-selector select2-hidden-accessible data-allow-clear="true"','placeholder' => 'Select Job Expiry Month']) }}
                                        </div>
                                        <div class="mb-5">
                                            {{--                                        <label class="form-label fs-6 fw-bold">{{ __('messages.common.status').':' }}</label>--}}
                                            {{ Form::select('is_job_active', $jobsActiveExpire,null, ['id' => 'filter_job_active_expire', 'data-control' =>'select2', 'class' => 'form-select form-select-solid status-selector select2-hidden-accessible data-allow-clear="true"','placeholder' => 'Select Job Status']) }}
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="reset"
                                                    class="btn btn-sm fs-6 btn-light btn-active-light-primary"
                                                    id="reset-filter"
                                                    data-kt-menu-dismiss="true">{{ __('messages.common.reset') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{  route('admin.job.create')}}" class="btn btn-primary"> <i
                                    class="fas fa-plus"></i>{{ __('messages.common.add') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                    <div class="table-responsive">

                        @include('jobs.table')
                    </div>
                </div>
            </div>
            @include('jobs.templates.templates')
    @endsection
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">{{ __('messages.common.remarks')}}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <div class="row">  <div class="form-group col-xl-12 col-md-12 col-sm-12 mb-5">
            <div id="remarkdetails"></div>
        </div></div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
        </div>

      </div>
    </div>
  </div>
   <!-- The Modal End -->

@push('scripts')
    <script>
         $(document).on('click', '.openremarks', function() {

         var jobid =   $(this).data("jobid")

         //alert(jobid)
         let jobsUrl = "{{ route('admin.jobs.index') }}";
         $.get( jobsUrl + '/remarks/'+ jobid, function(data, status){
            //alert("Data: " + data + "\nStatus: " + status);
            $("#remarkdetails").html('<textarea class="form-control"  readonly >' + data + '</textarea>' );
        });

        $('#myModal').modal('show');
        });
        let adminStatus = JSON.parse('@json($admin_approved)');
        let jobsUrl = "{{ route('admin.jobs.index') }}";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/jobs/job_datatable_admin.js')}}"></script>
@endpush

