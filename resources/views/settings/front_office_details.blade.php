@extends('settings.index')
@section('title')
    {{ __('messages.footer_settings') }}
@endsection
@section('section')
    {{ Form::open(['route' => 'settings.update','id'=>'editFrontSettingForm']) }}
    {{ Form::hidden('sectionName', $sectionName) }}
    <div class="row mt-3">
        <div class="form-group col-sm-12 my-0">
            {{ Form::label('address', __('messages.setting.address').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::textarea('address', $setting['address'], ['class' => 'form-control h-75 form-control-solid', 'required','placeholder' => __('messages.setting.address')]) }}
        </div>
        <div class="form-group col-sm-6 mobile-itel-width">
            {{ Form::label('phone', __('messages.setting.phone').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            <br>
            {{ Form::tel('phone', $setting['phone'], ['class' => 'form-control form-control-solid','onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")' ,'required','id'=>'phoneNumber']) }}
            {{ Form::hidden('region_code',null,['id'=>'prefix_code']) }}
            <br>
            <span id="valid-msg" class="hide">✓ &nbsp; Valid</span>
            <span id="error-msg" class="hide"></span>
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('email', __('messages.setting.email').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
            {{ Form::email('email', $setting['email'], ['class' => 'form-control form-control-solid', 'required', 'placeholder' => __('messages.setting.email')]) }}
        </div>
    </div>
    <div class="row mt-4 mb-5">
        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3']) }}
            <a href="{{ route('settings.index', ['section' => 'front_office_details']) }}" class="btn btn-light btn-active-light-primary me-2">{{__('messages.common.cancel')}}</a>
        </div>
    </div>
    {{ Form::close() }}
@endsection
@push('scripts')
    {{--    <script src="{{ asset('assets/js/inttel/js/intlTelInput.min.js') }}"></script>--}}
    {{--    <script src="{{ asset('assets/js/inttel/js/utils.min.js') }}"></script>--}}
    {{--    <script>--}}
    {{--        let utilsScript = "{{asset('assets/js/inttel/js/utils.min.js')}}";--}}
    {{--        let phoneNo = "{{ old('region_code').old('phone') }}";--}}
    {{--        let isEdit = true;--}}
    {{--    </script>--}}
    {{--    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>--}}

    <script>
        let isEdit = true;
        let phoneNo = "{{ old('region_code').old('phone') }}";
    </script>
    <script src="{{ asset('assets/js/inttel/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/inttel/js/utils.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/phone-number-country-code.js') }}"></script>
@endpush
