<div class="row">
    {{ Form::hidden('user_id',$user->id) }}
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('name', __('messages.company.name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('name', isset($user)?$user->full_name:null, ['class' => 'form-control form-control-solid','required', 'placeholder' => __('messages.company.name')]) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('email', __('messages.company.email').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::email('email', null, ['class' => 'form-control form-control-solid', 'required', 'placeholder' => __('messages.company.email')]) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mobile-itel-width mb-5">
        {{ Form::label('phone', __('messages.user.phone').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::tel('phone', null, ['class' => 'form-control form-control-solid','onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','id'=>'phoneNumber']) }}
        {{ Form::hidden('region_code',null,['id'=>'prefix_code']) }}
        <br>
        <span id="valid-msg" class="hide">✓ &nbsp; Valid</span>
        <span id="error-msg" class="hide"></span>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('ceo', __('messages.company.ceo_name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('ceo', (isset($company) ? $company->ceo: null), ['class' => 'form-control form-control-solid','required', 'placeholder' => __('messages.company.ceo_name')]) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('industry_id', __('messages.company.industry').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('industry_id', $data['industries'],isset($company)?$company->industry_id:null, ['id'=>'industryId','class' => 'form-select form-select-solid','placeholder' => 'Select Industry','required']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('ownership_type_id', __('messages.company.ownership_type').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('ownership_type_id', $data['ownerShipTypes'], isset($company)?$company->ownership_type_id:null, ['id'=>'ownershipTypeId','class' => 'form-select form-select-solid','placeholder' => 'Select OwnerShip Type','required']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('company_size_id', __('messages.company.company_size').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('company_size_id', $data['companySize'], isset($company)?$company->company_size_id:null, ['id'=>'companySizeId','class' => 'form-select form-select-solid','placeholder' => 'Select Company Size','required']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('country', __('messages.company.country').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('country_id', $data['countries'], null, ['id'=>'countryId','class' => 'form-select form-select-solid','placeholder' => 'Select Country']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('state', __('messages.company.state').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('state_id', (isset($states) && $states!=null?$states:[]), null, ['id'=>'stateId','class' => 'form-select form-select-solid','placeholder' => 'Select State']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('city', __('messages.company.city').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('city_id', (isset($cities) && $cities!=null?$cities:[]), null, ['id'=>'cityId','class' => 'form-select form-select-solid','placeholder' => 'Select City']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('established_in', __('messages.company.established_in').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::selectYear('established_in', date('Y'), 2000, (isset($company->established_in)) ? $company->established_in : '', ['class' => 'form-select form-select-solid', 'id' => 'establishedIn']) }}
    </div>

    <div class="form-group col-xl-12 col-md-12 col-sm-12 mb-5">
        {{ Form::label('details', __('messages.company.employer_details').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div id="editEmployeeDetails"></div>
        {{ Form::hidden('details', $company->details, ['id' => 'editEmployerDetail']) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('location', __('messages.company.location').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('location', (isset($company) ? $company->location: null), ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.company.location')]) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('location2', __('messages.company.location2').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('location2', (isset($company) ? $company->location2: null), ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.company.location2')]) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('no_of_offices', __('messages.company.no_of_offices').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::number('no_of_offices', (isset($company) ? $company->no_of_offices: null), ['class' => 'form-control form-control-solid', 'required', 'placeholder' => __('messages.company.no_of_offices')]) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('website', __('messages.company.website').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('website', (isset($company) ? $company->website: null), ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.company.website')]) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('fax', __('messages.company.fax').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('fax',(isset($company) ? $company->fax: null), ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.company.fax')]) }}
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('facebook_url', __('messages.company.facebook_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            <div class="input-group-text border-0">
                <i class="fab fa-facebook-f facebook-fa-icon text-primary"></i>
            </div>
            {{ Form::text('facebook_url', isset($company->user->facebook_url)?$company->user->facebook_url:null, ['class' => 'form-control form-control-solid','id'=>'facebookUrl','placeholder'=>'https://www.facebook.com']) }}
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('twitter_url', __('messages.company.twitter_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            <div class="input-group-text border-0">
                <i class="fab fa-twitter twitter-fa-icon text-primary"></i>
            </div>
            {{ Form::text('twitter_url', isset($company->user->twitter_url)?$company->user->twitter_url:null, ['class' => 'form-control form-control-solid','id'=>'twitterUrl','placeholder'=>'https://www.twitter.com']) }}
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('linkedin_url', __('messages.company.linkedin_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            <div class="input-group-text border-0">
                <i class="fab fa-linkedin-in linkedin-fa-icon text-primary"></i>
            </div>
            {{ Form::text('linkedin_url', isset($company->user->linkedin_url)?$company->user->linkedin_url:null, ['class' => 'form-control form-control-solid','id'=>'linkedInUrl','placeholder'=>'https://www.linkedin.com']) }}
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('google_plus_url', __('messages.company.google_plus_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            <div class="input-group-text border-0">
                <i class="fab fa-google-plus-g google-plus-fa-icon text-danger"></i>
            </div>
            {{ Form::text('google_plus_url', isset($company->user->google_plus_url)?$company->user->google_plus_url:null, ['class' => 'form-control form-control-solid','id'=>'googlePlusUrl','placeholder'=>'https://www.plus.google.com']) }}
        </div>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-5">
        {{ Form::label('pinterest_url', __('messages.company.pinterest_url').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
        <div class="input-group">
            <div class="input-group-text border-0">
                <i class="fab fa-pinterest-p pinterest-fa-icon text-danger"></i>
            </div>
            {{ Form::text('pinterest_url', isset($company->user->pinterest_url)?$company->user->pinterest_url:null, ['class' => 'form-control form-control-solid','id'=>'pinterestUrl','placeholder'=>'https://www.pinterest.com']) }}
        </div>
    </div>

    <!-- Submit Field -->
    <div class="d-flex">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3']) }}
        <a href="{{ route('company.edit.form', \Illuminate\Support\Facades\Auth::user()->owner_id) }}"
           class="btn btn-light btn-active-light-primary me-2">{{__('messages.common.cancel')}}</a>
    </div>

</div>
