<div class="row">
    @foreach($notificationSetting as $type => $settings)
        <div class="form-group col-md-12 col-lg-4 col-sm-12">
            <h5>{{ __('messages.notification_settings.'.$type) }}</h5>
            <div class="separator my-3"></div>
            <div class="form-group ml-sm-0 mt-4 notification-setting">
                <div class="custom-switches-stacked">
                    @foreach($settings as $key => $value)
                        <div
                            class="col-lg-12 col-md-6 mb-5 d-flex justify-content-start form-check form-switch form-check-custom">
                            <label class="custom-switch switch-label mt-2 row">
                                <input type="checkbox" name="{{ $value->key }}"
                                       class="custom-switch-input form-check-input"
                                       {{ ($value->value == 1) ? 'checked' : '' }} value="{{ $value->key }}">
                                <span class="custom-switch-indicator switch-span"></span>
                            </label>
                            <span class="custom-switch-description font-weight-bold mt-2 menu-title fs-6 fw-bolder text-gray-700">{{ __('messages.notification_settings.'.$value->key) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@endforeach
<!-- Submit Field -->
    <div class="separator my-5"></div>
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3', 'id' => 'saveJob']) }}
        <a href="{{ route('notification.settings.index') }}"
           class="btn btn-light btn-active-light-primary me-2">{{__('messages.common.cancel')}}</a>
    </div>
</div>
