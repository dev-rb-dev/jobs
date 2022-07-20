@extends('layouts.app')
@section('title')
    {{ __('messages.inquires') }}
@endsection
@push('css')
{{--    @livewireStyles--}}
{{--    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>--}}
@endpush
@section('content')
{{--    <section class="section">--}}
{{--        <div class="section-header">--}}
{{--            <h1>{{ __('messages.inquires') }}</h1>--}}
{{--        </div>--}}
{{--        <div class="section-body">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @include('inquires.table')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    @include('inquires.templates.templates')--}}

@include('flash::message')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-6">
                @include('layouts.search-component')
            </div>
            <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
                <div class="table-responsive">
                     @include('inquires.table')
                </div>
            </div>
        </div>
        @include('inquires.templates.templates')
        @include('inquires.show_modal')
    </div>
</div>   
    
@endsection
@push('scripts')
{{--    @livewireScripts--}}
    <script>
        let inquiresUrl = "{{ route('inquires.index') }}";
        let deleteInquiry = "{{ url('admin/inquires/') }}";
        let showInquiry = "{{ url('admin/inquires/') }}";
    </script>
{{--    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>--}}
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/inquires/inquires.js')}}"></script>
@endpush
