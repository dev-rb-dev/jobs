@extends('layouts.app')
@section('title')
    {{ __('messages.setting.notification_settings') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/header-padding.css') }}">
@endpush
@section('content')
    @include('flash::message')
            <div class="card mb-5 mb-xl-8">
                <div class="card-body fs-6 py-8 px-8  px-lg-10 text-gray-700">
                    {{ Form::open(['route' => 'notification.settings.update']) }}
                    @include('notification_settings.fields')
                    {{ Form::close() }}
                </div>
            </div>

@endsection

