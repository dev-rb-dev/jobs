@extends('layouts.app')
@section('title')
    {{ __('messages.candidate.reported_candidates') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
    <section class="section">
        {{--        <div class="section-header flex-wrap">--}}
        {{--            <h1 class="mr-4 w-700">{{ __('messages.candidate.reported_candidates') }}</h1>--}}
        {{--            @if(count($reportedCandidate) > 0)--}}
        {{--                <div class="section-header-breadcrumb flex-center">--}}
        {{--                    <div class="row justify-content-end">--}}
        {{--                        <div class="mt-3 mt-md-0">--}}
        {{--                            <div class="card-header-action w-100">--}}
        {{--                                {!! Form::selectMonth('month', null, ['id' => 'filter_by_reported_date', 'class'=>'form-control w-100','placeholder' => 'Select Month']) !!}--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            @endif--}}
        {{--        </div>--}}
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('layouts.search-component')
                    {{--                    @livewire('reported-candidate')--}}
                    @include('candidate.reported_candidate.reported_candidate_table')
                </div>
            </div>
        </div>
        @include('candidate.reported_candidate.templates.templates')
        @include('candidate.reported_candidate.reported_candidate_show_modal')
    </section>
@endsection
@push('scripts')
    <script>
        let reportedCandidatesUrl = "{{ route('reported.candidates') }}";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/candidate/reported_candidates.js')}}"></script>
@endpush

