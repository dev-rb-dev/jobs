<div class="row resumes" >
    <div class="profile-deetails">
        <div class="row">
    <div class="col-md-8 mb-8">
        <h1 class="fs-2hx  text-primary">{{ $user->full_name }}</h1>
        <div class="mt-3 d-flex flex-column">
            @isset($user->candidate->full_location)
                <div class="mb-1 d-flex align-items-center">
                    <i class="fas fa-map-marker-alt icon-profile  fs-2 me-2 text-danger"></i>
                    <span class="fw-bold text-muted fs-3">{{ $user->candidate->full_location}}</span>
                </div>
            @endisset
            <div class="mb-1 d-flex align-items-center">
                <i class="fas fa-envelope fs-2 icon-profile me-2 text-warning"></i>
                <span class="fw-bold text-muted fs-3">{{ $user->email}}</span>
            </div>
            <div class="d-flex align-items-center">
                <i class="fas fa-phone-alt fs-2  icon-profile me-2 text-success"></i>
                <span class="fw-bold text-muted fs-3">{{ $user->phone}}</span>
            </div>
            <div class="d-flex align-items-center">
                <i class="fas fa-user-alt fs-2  icon-profile me-2 text-success"></i>
                <span class="fw-bold text-muted fs-3">{{$user->dob}}</span>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mt-3 d-flex flex-column">
           <img src="./assets/img/profile.jpg" class="profile_img"/>
            </div>
    </div>
 </div>
</div>
    <div class="col-md-12 mb-8 ps-7">
        @if($user->candidateSkill->count())
            <h2 class="border-bottom border-2 border-danger pb-3 text-info fs-2x mb-5"><i
                    class="fas fa-list-ul text-info p-3 border rounded-circle border-info me-3 icon-cv"></i>{{ __('messages.candidate.candidate_skill') }}
            </h2>
                @foreach($user->candidateSkill as $skill)
                    <p class="fw-bold text-muted fs-3 custom-bullet">{{ $skill->name }}</p>
                @endforeach
        @endif
    </div>
    <div class="col-md-12 mb-8 ps-7">
        @if($user->candidateLanguage->count())
            <h2 class="border-bottom border-2 border-danger pb-3 text-info fs-2x mb-5"><i
                    class="fas fa-list-ul text-info p-3 border rounded-circle border-info me-3 icon-cv"></i>{{ __('messages.candidate.candidate_language') }}
            </h2>
                @foreach($user->candidateLanguage as $language)
                    <p class="fw-bold text-muted fs-3 custom-bullet">{{ $language->language }}</p>
                @endforeach
        @endif
    </div>
    <div class="col-md-12 mb-8 ps-7">
        @if($candidateEducations->count())
            <h2 class="border-bottom border-2 border-danger pb-3 text-info fs-2x mb-5"><i
                    class="fas fa-user-graduate text-info p-3 border rounded-circle border-info me-3 icon-cv"></i>{{ __('messages.candidate_profile.education') }}
            </h2>
        @endif
        <div class="row">
            @foreach($candidateEducations as $candidateEducation)
                <div class="col-6 mt-5">
                    <h5 class="fs-3 fw-bold text-primary">{{ $candidateEducation->degreeLevel->name }}</h5>
                    <h6 class="text-muted fs-5">{{ $candidateEducation->degree_title }}</h6>
                    <span
                        class="text-muted fs-4">{{ $candidateEducation->year }} | {{ $candidateEducation->country }}</span>
                    <p class="mb-0 fs-4">{{ $candidateEducation->institute }}</p>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-12 mb-8 ps-7">
        @if($candidateExperiences->count())
            <h2 class="border-bottom border-2 border-danger pb-3 text-info fs-2x mb-5"><i
                    class="fas fa-briefcase text-info p-3 border rounded-circle border-info me-3 icon-cv"></i>{{ __('messages.candidate_profile.experience') }}
            </h2>
        @endif
        <div class="row">
            @foreach($candidateExperiences as $candidateExperience)
                <div class="col-6 mt-5">
                    <h5 class="fs-3 text-primary">{{ $candidateExperience->company }}</h5>
                    <h6 class="fs-5">{{ $candidateExperience->country }}</h6>
                    <span class="text-muted fs-4">{{ \Carbon\Carbon::parse($candidateExperience->start_date)->format('jS M, Y')}} - </span>
                    @if($candidateExperience->currently_working)
                        <span class="text-muted fs-4">{{ __('messages.candidate_profile.present') }}</span>
                    @else
                        <span
                            class="text-muted fs-4"> {{\Carbon\Carbon::parse($candidateExperience->end_date)->format('jS M, Y')}} </span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-md-12 ps-7">
        @if($user->is_online_profile_availbal)
            <h2 class="border-bottom border-2 border-danger pb-3 text-info fs-2x mb-5"><i
                    class="fas fa-link text-info p-3 border rounded-circle border-info me-3 icon-cv"></i>{{ __('messages.candidate_profile.online_profile') }}
            </h2>
        @endif
        @if(isset($user->facebook_url))
            <a class="mb-2 fs-4 d-block" href="{{ $user->facebook_url }}"
               target="_blank" id="facebook_url">{{ $user->facebook_url }}</a>
        @endif
        @if(isset($user->twitter_url))
            <a class="mb-2 fs-4 d-block" href="{{ $user->twitter_url }}"
               target="_blank" id="twitter_url">{{ $user->twitter_url }}</a>
        @endif
        @if(isset($user->linkedin_url))
            <a class="mb-2 fs-4 d-block" href="{{ $user->linkedin_url }}"
               target="_blank" id="linkedin_url">{{ $user->linkedin_url }}</a>
        @endif
        @if(isset($user->google_plus_url))
            <a class="mb-2 fs-4 d-block" href="{{ $user->google_plus_url }}"
               target="_blank" id="google_plus_url">{{ $user->google_plus_url }}</a>
        @endif
        @if(isset($user->pinterest_url))
            <a class="mb-2 fs-4 d-block" href="{{ $user->pinterest_url }}"
               target="_blank" id="pinterest_url">{{ $user->pinterest_url }}</a>
        @endif
    </div>
</div>
<style>

   .fs-2hx{
     color: #000 !important;
     font-size: 20px  !important;
     font-family: sans-serif  !important;
     font-weight: bold  !important;
    margin:10px!important;
    padding-top: 10px!important;
     text-transform: uppercase;
   }
.profile-deetails{
    border: 1px solid #afd2df;
    margin-bottom: 15px;
    background-color: #ADD8E6!important;
}
.fw-bold{
    font-family: sans-serif, serif!important;
    font-size: 14px!important;
    color: #000!important;
    padding: 3px!important;
}
.fs-2x{
    color: #000!important;
    font-weight: 700!important;
    font-size: 20px!important;
    text-transform: uppercase !important;
    padding-bottom: 5px!important;
    border-bottom: 2px solid #b1eaff!important;
}
.icon-cv {
    color: #fd7e14!important;
    border-radius: 50px!important;
    border:1px solid #fd7e14!important;
}
.fs-4{
    font-size: 14px!important;
    line-height: 22px !important;

}
h5{
    text-transform: uppercase;
}
.icon-profile{
    color: #fd7e14!important;
    height: 40px!important;
    width:40px!important;
    border-radius: 50px!important;
    border:1px solid #fd7e14!important;
    padding: 8px!important;
    background-color: #fff!important;
}
 .profile_img{
    width:150px!important;
    height: 150px!important;
    position: absolute !important;
    right: 30px!important;
    /* padding: 20px!important; */
 }
</style>
