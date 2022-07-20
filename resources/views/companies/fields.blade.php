<div class="row">
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('name', __('messages.company.employer_name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('name', null, ['class' => 'form-control form-control-solid','required', 'placeholder' => __('messages.company.employer_name')]) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('email', __('messages.company.email').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::email('email', null, ['class' => 'form-control form-control-solid', 'required', 'placeholder' => __('messages.company.email')]) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mobile-itel-width mb-5">
        {{ Form::label('phone', __('messages.user.phone').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <br>
        {{ Form::tel('phone', null, ['class' => 'form-control form-control-solid', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','id'=>'phoneNumber','placeholder' => __('messages.inquiry.phone_no')]) }}
        {{ Form::hidden('region_code',null,['id'=>'prefix_code']) }}
        <br>
        <span id="valid-msg" class="hide">✓ &nbsp; Valid</span>
        <span id="error-msg" class="hide"></span>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('ceo', __('messages.company.ceo_name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('ceo', null, ['class' => 'form-control form-control-solid','required', 'placeholder' => __('messages.company.ceo_name')]) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('password', __('messages.company.password').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        <input name="password" type="password" id="password"
               class="form-control form-control-solid"  {{ (isset($company)) ? '' : 'required' }} placeholder="{{__('messages.company.password')}}">
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('password_confirmation', __('messages.company.confirm_password').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        <input name="password_confirmation" type="password" id="confirmPassword"
               class="form-control form-control-solid" {{ (isset($company)) ? '' : 'required' }} placeholder="{{__('messages.company.confirm_password')}}">
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('industry_id', __('messages.company.industry').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            {{ Form::select('industry_id', $data['industries'],null, ['id'=>'industryId','class' => 'form-select form-select-solid','data-control'=>'select2','placeholder' => 'Select Industry','required']) }}
            <div class="input-group-text border-0">
                <a href="javascript:void(0)" class="fw-bolder text-gray-500 addIndustryModal"><i class="fa fa-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('ownership_type_id', __('messages.company.ownership_type').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            {{ Form::select('ownership_type_id', $data['ownerShipTypes'], null, ['id'=>'ownershipTypeId','class' => 'form-select form-select-solid','placeholder' => 'Select OwnerShip Type','required']) }}
            <div class="input-group-text border-0">
                <a href="javascript:void(0)" class="fw-bolder text-gray-500 addOwnerShipTypeModal"><i
                        class="fa fa-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('country', __('messages.company.country').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            {{ Form::select('country_id', $data['countries'], null, ['id'=>'countryId','class' => 'form-select form-select-solid','placeholder' => 'Select Country']) }}
            <div class="input-group-text border-0">
                <a href="javascript:void(0)" class="fw-bolder text-gray-500 addCountryModal"><i class="fa fa-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('state', __('messages.company.state').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            {{ Form::select('state_id', [], null, ['id'=>'stateId','class' => 'form-select form-select-solid','placeholder' => 'Select State']) }}
            <div class="input-group-text border-0">
                <a href="javascript:void(0)" class="fw-bolder text-gray-500 addStateModal"><i
                        class="fa fa-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('city', __('messages.company.city').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            {{ Form::select('city_id', [], null, ['id'=>'cityId','class' => 'form-select form-select-solid','placeholder' => 'Select City']) }}
            <div class="input-group-text border-0">
                <a href="javascript:void(0)" class="fw-bolder text-gray-500 addCityModal"><i class="fa fa-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('company_size_id', __('messages.company.company_size').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            {{ Form::select('company_size_id', $data['companySize'], null, ['id'=>'companySizeId','class' => 'form-select form-select-solid','placeholder' => 'Select Employer Size','required']) }}
            <div class="input-group-text border-0">
                <a href="javascript:void(0)" class="fw-bolder text-gray-500 addCompanySizeModal"><i
                        class="fa fa-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('established_in', __('messages.company.established_year').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::selectYear('established_in', date('Y'), 2000, (isset($company->established_in)) ? $company->established_in : '', ['class' => 'form-select form-select-solid', 'id' => 'establishedIn','placeholder'=>'Select Established Year','required']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('location', __('messages.company.location').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('location', null, ['class' => 'form-control form-control-solid','required','placeholder' => __('messages.company.location')]) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('location2', __('messages.company.location2').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('location2', null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.company.location2')]) }}
    </div>
    <div class="form-group col-xl-12 col-md-12 col-sm-12 mb-5">
        {{ Form::label('details', __('messages.company.employer_details').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div id="details"></div>
        {{ Form::hidden('details', null, ['id' => 'company_desc']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('no_of_offices', __('messages.company.no_of_offices').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::number('no_of_offices', null, ['class' => 'form-control form-control-solid', 'required', 'placeholder' => __('messages.company.no_of_offices')]) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('website', __('messages.company.website').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('website', null, ['class' => 'form-control form-control-solid','placeholder' => __('messages.company.website')]) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('fax', __('messages.company.fax').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('fax',null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.company.fax')]) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('facebook_url', __('messages.company.facebook_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            <div class="input-group-text border-0">
                <i class="fab fa-facebook-f facebook-fa-icon text-primary"></i>
            </div>
            {{ Form::text('facebook_url',null, ['class' => 'form-control form-control-solid','id'=>'facebookUrl','placeholder'=>'https://www.facebook.com']) }}
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('twitter_url', __('messages.company.twitter_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            <div class="input-group-text border-0">
                <i class="fab fa-twitter twitter-fa-icon text-primary"></i>
            </div>
            {{ Form::text('twitter_url', null, ['class' => 'form-control form-control-solid','id'=>'twitterUrl','placeholder'=>'https://www.twitter.com']) }}
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('linkedin_url', __('messages.company.linkedin_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            <div class="input-group-text border-0">
                <i class="fab fa-linkedin-in linkedin-fa-icon text-primary"></i>
            </div>
            {{ Form::text('linkedin_url', null, ['class' => 'form-control form-control-solid','id'=>'linkedInUrl','placeholder'=>'https://www.linkedin.com']) }}
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('google_plus_url', __('messages.company.google_plus_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            <div class="input-group-text border-0">
                <i class="fab fa-google-plus-g google-plus-fa-icon text-danger"></i>
            </div>
            {{ Form::text('google_plus_url', null, ['class' => 'form-control form-control-solid','id'=>'googlePlusUrl','placeholder'=>'https://www.plus.google.com']) }}
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('pinterest_url', __('messages.company.pinterest_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            <div class="input-group-text border-0">
                <i class="fab fa-pinterest-p pinterest-fa-icon text-danger"></i>
            </div>
            {{ Form::text('pinterest_url', null, ['class' => 'form-control form-control-solid','id'=>'pinterestUrl','placeholder'=>'https://www.pinterest.com']) }}
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        <span id="validationErrorsBox" class="text-danger"></span>
        <div class="row2">
            <div class="d-block">
                {{ Form::label('company_logo', __('messages.company.company_logo').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"
                   data-bs-toggle="tooltip"
                   data-placement="top"
                   title="{{  __('messages.setting.image_validation') }}"></i>
            </div>
            <div class="image-input image-input-outline" data-kt-image-input="true">
                <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                     id="logoPreview"
                     style="background-image: url({{ asset('assets/img/infyom-logo.png') }})">
                </div>
                <label
                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                    data-bs-original-title="Change app logo">
                    <i class="fas fa-pencil-alt fs-7"></i>
                    {{ Form::file('image',['id'=>'logo','class' => 'd-none', 'accept' => '.png, .jpg, .jpeg']) }}
                    <input type="hidden" name="avatar_remove">
                </label>
                <span
                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                        data-bs-original-title="Cancel app logo">
                    <i class="fas fa-times"></i></span>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-2 col-md-2 col-sm-12 mb-5">
        <label class='form-label fs-6 fw-bolder text-gray-700 mb-3'>{{ __('messages.common.status').':' }}</label><br>
        <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm">
            <input type="checkbox" name="is_active" class="form-check-input isActive"
                   value="1" id="active" {{  isset($company)?($company->is_active == 1 ?'checked':''):'checked' }}>
            <span class="custom-switch-indicator"></span>
        </label>
    </div>


    <!-- Submit Field -->
    <div class="d-flex">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3', 'id' => 'btnSave']) }}
        <a href="{{ route('company.index') }}"
           class="btn btn-light btn-active-light-primary me-2">{{__('messages.common.cancel')}}</a>
    </div>
</div>
