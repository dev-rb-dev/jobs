@extends('employer.layouts.app')
@section('title')
    {{ __('messages.jobs') }}
@endsection
@push('css')
    {{--    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>--}}
    {{--    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>--}}
@endpush
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            </div>
            <div class="col-lg-3 d-lg-flex justify-content-lg-end align-items-lg-center">
                <div class="pl-3 py-1 grid-width-100 grid-add-end">
                    <a href="{{ route('job.create') }}"
                           class="btn btn-primary btn-sm form-btn"><i
                                class="fas fa-plus"></i>{{ __('messages.common.add') }}
                        </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @include('flash::message')
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-6">
            @include('layouts.search-component')
            <div class="card-toolbar">
                <div class="d-flex align-items-center py-1">
                    <div class="pl-3 pr-md-3 pr-0 py-1 grid-width-100 me-4">
                        {{ Form::select('is_featured', $featured, null, ['id' => 'filter_featured', 'class' => 'form-select form-select-solid status-filter', 'placeholder' => 'Select Featured Job']) }}
                    </div>
                    <div class="pl-3 pr-md-3 pr-0 py-1 grid-width-100">
                        {{ Form::select('status', $statusArray, null, ['id' => 'filter_status', 'class' => 'form-select form-select-solid status-filter', 'placeholder' => 'Select Status']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
            <div class="table-responsive">
                @include('employer.jobs.table')
            </div>
        </div>
    </div>
    @include('employer.jobs.templates.templates')
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
    <script src="https://js.stripe.com/v3/"></script>
    <script>
          $(document).on('click', '.openremarks', function() {
             var jobid =   $(this).data("jobid")
             //alert(jobid)
              let jobsUrl = "{{ route('job.index') }}";
               $.get( jobsUrl + '/remarks/'+ jobid, function(data, status){
                // alert("Data: " + data + "\nStatus: " + status);
                $("#remarkdetails").html('<textarea class="form-control"  readonly >' + data + '</textarea>' );
              });
          $('#myModal').modal('show');
         });
        let adminStatus = JSON.parse('@json($admin_approved)');

        let jobsUrl = "{{ route('job.index') }}";
        let frontJobDetail = "{{ route('front.job.details') }}";
        let jobStatusUrl = "{{  url('employer/job') }}/";
        let statusArray = JSON.parse('@json($statusArray)');
        let isFeaturedEnable = "{{ ($isFeaturedEnable == 1) ? true : false }}";
        let isFeaturedAvilabal = "{{ $isFeaturedAvilabal }}";
        let stripe = Stripe('{{ config('services.stripe.key') }}');
        let jobStripePaymentUrl = '{{ url('job-stripe-charge') }}';

        //console.log(approved);



    </script>

    {{--    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>--}}
    {{--    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>--}}
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/jobs/jobs.js')}}"></script>
    <script src="{{mix('assets/js/jobs/jobs_stripe_payment.js')}}"></script>
    <script>
        $("#filter_status").val('{{$jobStatus}}');
        // if(status == "0" ) {
        //     JobDraft= true;
        //     } else (status == "1" ) {
        //         JobClosed= true;
        //     }

    </script>
@endpush
