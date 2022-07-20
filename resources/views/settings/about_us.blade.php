@extends('settings.index')
@section('title')
    {{ __('messages.setting.about_us') }}
@endsection
@section('section')
    {{ Form::open(['route' => 'settings.update', 'id' => 'aboutUsForm']) }}
    {{ Form::hidden('sectionName', $sectionName) }}
    <div class="row mt-3">
        <div class="form-group col-sm-12 my-0">
            {{ Form::label('about_us', __('messages.about_us').':', ['class' => 'required fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{--            {{ Form::textarea('about_us', $setting['about_us'], ['class' => 'form-control h-75', 'id' => 'aboutUs', 'rows' => '5']) }}--}}
            <div id="aboutUs"></div>
            {{ Form::hidden('about_us', null, ['id' => 'aboutUsData']) }}
        </div>
    </div>
    <div class="row mt-4 mb-5">
        <div class="form-group col-sm-12">
            {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3', 'id' => 'btnAboutUs']) }}
            <a href="{{ route('settings.index', ['section' => 'about_us']) }}" class="btn btn-light btn-active-light-primary me-2">{{__('messages.common.cancel')}}</a>
        </div>
    </div>
    {{ Form::close() }}
@endsection
@push('scripts')
    <script>
        let aboutUsData = `{{$setting['about_us']}}`;
    </script>
@endpush
