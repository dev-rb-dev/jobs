@extends('layouts.app')
@section('title')
    {{ __('messages.all_resumes') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
    <section class="section">
        {{--        <div class="section-header">--}}
        {{--            <h1>{{ __('messages.all_resumes') }}</h1>--}}
        {{--        </div>--}}
        <div class="section-body">
            <div class="card">
                <div class="card-body">
{{--                    @include('layouts.search-component')--}}
                    {{--                                        @livewire('candidate-resume')--}}
                    @include('resumes.table')
                </div>
            </div>
        </div>
    </section>
    @include('resumes.show_modal')
    @include('resumes.templates.templates')
@endsection
@push('scripts')
    <script>
        let resumesUrl = "{{ route('resumes.index') }}/";
        let downloadresumesUrl = "{{ route('download.all-resume') }}";
        let deleteresumesUrl = "{{ route('delete.resume') }}/";
    </script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/candidate/resumes.js')}}"></script>
@endpush
