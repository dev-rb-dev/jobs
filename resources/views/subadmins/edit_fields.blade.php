<div class="row">
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('first_name',__('messages.candidate.first_name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('first_name', null, ['class' => 'form-control form-control-solid','required', 'placeholder' => __('messages.candidate.first_name')]) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('last_name',__('messages.candidate.last_name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('last_name', null, ['class' => 'form-control form-control-solid','required', 'placeholder' => __('messages.candidate.last_name')]) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('email',__('messages.candidate.email').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('email', null, ['class' => 'form-control form-control-solid','required', 'placeholder' => __('messages.candidate.email')]) }}
    </div>

    {{-- <div class="form-group col-sm-6 mb-5">
        {{ Form::label('password',__('messages.candidate.password').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::password('password', ['class' => 'form-control form-control-solid','required','min' => '6','max' => '10', 'placeholder' => __('messages.candidate.password')]) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('password_confirmation',__('messages.candidate.conform_password').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::password('password_confirmation', ['class' => 'form-control form-control-solid','required','min' => '6','max' => '10', 'placeholder' => __('messages.candidate.conform_password')]) }}
    </div> --}}
    {{-- <div class="form-group col-sm-12 col-md-6 mb-5">
        {{ Form::label('address', __('messages.candidate.address').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::textarea('address', null, ['class' => 'form-control form-control-solid address-height', 'rows' => '5','placeholder' => __('messages.candidate.address')]) }}
    </div> --}}
    <div class="d-flex mt-5">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3']) }}
        <a href="{{ route('subadmins.index') }}"
           class="btn btn-light btn-active-light-primary me-2">{{__('messages.common.cancel')}}</a>
    </div>
</div>
