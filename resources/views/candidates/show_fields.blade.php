<div class="row details-page">
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('name', __('messages.common.name').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ html_entity_decode($candidate->user->full_name) }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('email',__('messages.candidate.email').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ $candidate->user->email }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('father_name',__('messages.candidate.father_name').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($candidate->father_name)?$candidate->father_name : __('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('dob', __('messages.candidate.birth_date').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($candidate->user->dob)?$candidate->user->dob:__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('gender', __('messages.candidate.gender').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ $candidate->user->gender == 0 ? __('messages.common.male') : __('messages.common.female') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('marital_status', __('messages.candidate.marital_status').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($candidate->maritalStatus->marital_status)?html_entity_decode($candidate->maritalStatus->marital_status): __('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-3">
        {{ Form::label('skill', __('messages.candidate.candidate_skill').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <br>
        @if($candidate->user->candidateSkill->count())
            @foreach($candidate->user->candidateSkill as $candidateSkill)
                <span class="fw-bolder fs-6 text-gray-800">{{ $candidateSkill->name }}</span>{{ ($loop->last) ? '' : ',' }}
            @endforeach
        @else
            <p class="fw-bolder fs-6 text-gray-800 mb-3">No skills.</p>
        @endif
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-3">
        {{ Form::label('skill', __('messages.candidate.candidate_language').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <br>
        @if($candidate->user->candidateLanguage->count())
            @foreach($candidate->user->candidateLanguage as $candidateLanguage)
                <span class="fw-bolder fs-6 text-gray-800">{{ $candidateLanguage->language }}</span>{{ ($loop->last) ? '' : ',' }}
            @endforeach
        @else
            <p class="fw-bolder fs-6 text-gray-800 mb-3">No skills.</p>
        @endif
    </div>

    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('nationality', __('messages.candidate.nationality').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($candidate->nationality)?$candidate->nationality:__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('national_id_card', __('messages.candidate.national_id_card').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($candidate->national_id_card)?$candidate->national_id_card:__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('country', __('messages.company.country').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($candidate->user->country_id) ?$candidate->user->country_name:__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('state', __('messages.company.state').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($candidate->user->state_id)?$candidate->user->state_name:__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('city', __('messages.company.city').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($candidate->user->city_id)?$candidate->user->city_name:__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('phone', __('messages.candidate.phone').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($candidate->user->phone)?$candidate->user->phone:__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('experience', __('messages.candidate.experience').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($candidate->experience)?$candidate->experience.'  Year':__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('career_level', __('messages.candidate.career_level').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($candidate->career_level_id)?html_entity_decode($candidate->careerLevel->level_name):__('messages.common.n/a')}}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('industry', __('messages.candidate.industry').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($candidate->industry_id)?html_entity_decode($candidate->industry->name):__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('functional_area', __('messages.candidate.functional_area').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($candidate->functional_area_id)?html_entity_decode($candidate->functionalArea->name):__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('current_salary', __('messages.candidate.current_salary').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($candidate->current_salary)?number_format($candidate->current_salary):__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('expected_salary', __('messages.candidate.expected_salary').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($candidate->expected_salary)?number_format($candidate->expected_salary):__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('salary_currency', __('messages.candidate.salary_currency').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($candidate->salary_currency)?$currency[$candidate->salary_currency]:__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('immediate_available', __('messages.candidate.immediate_available').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ $candidate->immediate_available == 1 ? __('messages.candidate.immediate_available'):__('messages.candidate.not_immediate_available') }}</p>
    </div>
    @if($candidate->immediate_available == 0)
        <div class="form-group col-xl-6 col-md-6 col-sm-12">
            {{ Form::label('available_at', __('messages.candidate.available_at').':', ['class' => 'fw-bolder text-muted mb-3']) }}
            <p class="fw-bolder fs-6 text-gray-800">{{ isset($candidate->available_at) ? $candidate->available_at : __('messages.common.n/a') }}</p>
        </div>
    @endif
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('is_active', __('messages.common.status').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ $candidate->user->is_active == 1 ? __('messages.common.active') : __('messages.common.de_active') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('is_verified', __('messages.candidate.is_verified').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ $candidate->user->is_verified == 1 ? __('messages.common.verified') : __('messages.common.not_verified') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('address', __('messages.candidate.address').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{!! ($candidate->address!="")?nl2br(e($candidate->address)):__('messages.common.n/a') !!}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('facebook_url', __('messages.company.facebook_url').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ $candidate->user->facebook_url!=null?$candidate->user->facebook_url:__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('twitter_url', __('messages.company.twitter_url').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ $candidate->user->twitter_url!=null ?$candidate->user->twitter_url:__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('linkedin_url', __('messages.company.linkedin_url').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ $candidate->user->linkedin_url!=null ?$candidate->user->linkedin_url:__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('google_plus_url', __('messages.company.google_plus_url').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ $candidate->user->google_plus_url!=null ?$candidate->user->google_plus_url:__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('pinterest_url', __('messages.company.pinterest_url').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ $candidate->user->pinterest_url!=null ? $candidate->user->pinterest_url:__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ $candidate->created_at->diffForHumans() }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ $candidate->updated_at->diffForHumans() }}</p>
    </div>
</div>

