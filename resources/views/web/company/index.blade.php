@extends('web.layouts.app')
@section('title')
    {{ __('messages.company.company_listing') }}
@endsection
@section('page_css')
    @if(\Illuminate\Support\Facades\App::getLocale() == 'ar')
        <style>
            .job-post-wrapper ul.pagination {
                direction: rtl;
            }
        </style>
    @endif
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/header-span.css') }}">
@endsection
@section('content')
    @livewire('company-search', ['isFeatured' => Request::get('is_featured')])
@endsection
@section('scripts')
    <script src="{{mix('assets/js/companies/front/companies.js')}}"></script>
@endsection
