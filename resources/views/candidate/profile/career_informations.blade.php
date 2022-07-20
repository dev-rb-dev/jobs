@extends('candidate.profile.index')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
@endpush
@section('section')
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-6">
            <h1>{{ __('messages.candidate_profile.experience') }}</h1>
            <div class="card-toolbar mt-0">
                <div class="d-flex align-items-center py-1">
                    <a
                        class="btn btn-primary form-btn addExperienceModal" data-bs-toggle="modal"
                        data-bs-target="#addExperienceModal"><i
                            class="fas fa-plus"></i>{{ __('messages.candidate_profile.add_experience') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
            <div class="row candidate-experience-container">
                <div class="col-12 {{ ($data['candidateExperiences']->count()) ? 'd-none' : '' }}"
                     id="notfoundExperience">
                    <h4 class="product-item pb-5 d-flex justify-content-center">
                        {{ __('messages.candidate.experience_not_found') }}
                    </h4>
                </div>
                @php
                    /** @var \App\Models\CandidateExperience $candidateExperience */
                @endphp
                @foreach($data['candidateExperiences'] as $candidateExperience)
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 candidate-experience rounded shadow p-5 mb-5"
                         data-experience-id="{{ $loop->index }}" data-id="{{ $candidateExperience->id }}">
                        <article class="article article-style-b">
                            <div class="article-details">
                                <div class="d-flex justify-content-between">
                                    <div class="article-title">
                                        <h4 class="text-primary">{{ $candidateExperience->experience_title }}</h4>
                                        <h6 class="text-muted">{{ $candidateExperience->company }}</h6>
                                    </div>
                                    <div class="article-cta candidate-experience-edit-delete">
                                        <a href="javascript:void(0)"
                                           class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm edit-experience"
                                           title="Edit"
                                           data-id="{{ $candidateExperience->id }}"><span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <path
                d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                fill="#000000" fill-rule="nonzero"
                transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"/>
            <path
                d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                fill="#000000" fill-rule="nonzero" opacity="0.3"/>
            </svg>
        </span></a>
                                        <a href="javascript:void(0)"
                                           class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm delete-experience"
                                           title="Delete"
                                           data-id="{{ $candidateExperience->id }}"><span class="svg-icon svg-icon-3">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
             viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
            fill="#000000" fill-rule="nonzero"/>
        <path
            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
            fill="#000000" opacity="0.3"/></g></svg></span></a>
                                    </div>
                                </div>
                                <span class="text-muted">{{ \Carbon\Carbon::parse($candidateExperience->start_date)->format('jS M, Y')}} - </span>

                                @if($candidateExperience->currently_working)
                                    <span class="text-muted">{{ __('messages.candidate_profile.present') }}</span>
                                @else
                                    <span
                                        class="text-muted"> {{\Carbon\Carbon::parse($candidateExperience->end_date)->format('jS M, Y')}} </span>
                                @endif
                                <span class="text-muted"> | {{ $candidateExperience->country }}</span>
                                @if(!empty($candidateExperience->description))
                                    <p class="mb-0 pb-md-0 pb-4">{{ Str::limit($candidateExperience->description,225,'...') }}</p>
                                @endif
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card-header border-0 pt-6">
            <h1>{{ __('messages.candidate_profile.education') }}</h1>
            <div class="card-toolbar mt-0">
                <div class="d-flex align-items-center py-1">
                    <a
                        class="btn btn-primary form-btn addEducationModal" data-bs-toggle="modal"
                        data-bs-target="#addEducationModal"><i
                            class="fas fa-plus"></i>{{ __('messages.candidate_profile.add_education') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body pt-0 fs-6 py-8 px-8 px-lg-10 text-gray-700">
            <div class="row candidate-education-container">
                <div class="col-12 {{ ($data['candidateEducations']->count()) ? 'd-none' : '' }}"
                     id="notfoundEducation">
                    <h4 class="product-item pb-5 d-flex justify-content-center">
                        {{ __('messages.candidate.education_not_found') }}
                    </h4>
                </div>
                @php
                    /** @var \App\Models\CandidateEducation $candidateEducation */
                @endphp
                @foreach($data['candidateEducations'] as $candidateEducation)
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 candidate-education shadow rounded p-5 mb-5"
                         data-education-id="{{ $loop->index }}" data-id="{{ $candidateEducation->id }}">
                        <article class="article article-style-b">
                            <div class="article-details">
                                <div class="d-flex justify-content-between">
                                    <div class="article-title">
                                        <h4 class="text-primary education-degree-level">{{ $candidateEducation->degreeLevel->name }}</h4>
                                        <h6 class="text-muted">{{ $candidateEducation->degree_title }}</h6>
                                    </div>
                                    <div class="article-cta candidate-education-edit-delete">
                                        <a href="javascript:void(0)"
                                           class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm edit-education"
                                           title="Edit"
                                           data-id="{{ $candidateEducation->id }}"><span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <path
                d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                fill="#000000" fill-rule="nonzero"
                transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"/>
            <path
                d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                fill="#000000" fill-rule="nonzero" opacity="0.3"/>
            </svg>
        </span></a>
                                        <a href="javascript:void(0)"
                                           class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm delete-education"
                                           title="Delete"
                                           data-id="{{ $candidateEducation->id }}"><span class="svg-icon svg-icon-3">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
             viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
            fill="#000000" fill-rule="nonzero"/>
        <path
            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
            fill="#000000" opacity="0.3"/></g></svg></span></a>
                                    </div>
                                </div>
                                <span
                                    class="text-muted">{{ $candidateEducation->year }} | {{ $candidateEducation->country }}</span>
                                <p class="mb-0 pb-md-0 pb-4">{{ $candidateEducation->institute }}</p>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    {{--    <section class="section">--}}
    {{--        <div class="section-header candidate-experience-header">--}}
    {{--            <h1>{{ __('messages.candidate_profile.experience') }}</h1>--}}
    {{--            <div class="section-header-breadcrumb justify-content-end">--}}
    {{--                <a--}}
    {{--                   class="btn btn-primary form-btn addExperienceModal" data-bs-toggle="modal"--}}
    {{--                   data-bs-target="#addExperienceModal">{{ __('messages.candidate_profile.add_experience') }}--}}
    {{--                    <i class="fas fa-plus"></i></a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="section-body">--}}
    {{--            <div class="row candidate-experience-container">--}}
    {{--                <div class="col-12 {{ ($data['candidateExperiences']->count()) ? 'd-none' : '' }}" id="notfoundExperience">--}}
    {{--                    <h4 class="product-item pb-5 d-flex justify-content-center">--}}
    {{--                        {{ __('messages.candidate.experience_not_found') }}--}}
    {{--                    </h4>--}}
    {{--                </div>--}}
    {{--                @php--}}
    {{--                /** @var \App\Models\CandidateExperience $candidateExperience */--}}
    {{--                @endphp--}}
    {{--                @foreach($data['candidateExperiences'] as $candidateExperience)--}}
    {{--                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 candidate-experience"--}}
    {{--                         data-experience-id="{{ $loop->index }}" data-id="{{ $candidateExperience->id }}">--}}
    {{--                        <article class="article article-style-b">--}}
    {{--                            <div class="article-details">--}}
    {{--                                <div class="article-title">--}}
    {{--                                    <h4 class="text-primary">{{ $candidateExperience->experience_title }}</h4>--}}
    {{--                                    <h6 class="text-muted">{{ $candidateExperience->company }}</h6>--}}
    {{--                                </div>--}}
    {{--                                <span class="text-muted">{{ \Carbon\Carbon::parse($candidateExperience->start_date)->format('jS M, Y')}} - </span>--}}

    {{--                                @if($candidateExperience->currently_working)--}}
    {{--                                    <span class="text-muted">{{ __('messages.candidate_profile.present') }}</span>--}}
    {{--                                @else--}}
    {{--                                    <span class="text-muted"> {{\Carbon\Carbon::parse($candidateExperience->end_date)->format('jS M, Y')}} </span>--}}
    {{--                                @endif--}}
    {{--                                <span> | {{ $candidateExperience->country }}</span>--}}
    {{--                                @if(!empty($candidateExperience->description))--}}
    {{--                                    <p class="mb-0 pb-md-0 pb-4">{{ Str::limit($candidateExperience->description,225,'...') }}</p>--}}
    {{--                                @endif--}}

    {{--                                <div class="article-cta candidate-experience-edit-delete">--}}
    {{--                                    <a href="javascript:void(0)" class="btn btn-warning action-btn edit-experience" title="Edit"--}}
    {{--                                       data-id="{{ $candidateExperience->id }}"><i class="fa fa-edit p-1"></i></a>--}}
    {{--                                    <a href="javascript:void(0)" class="btn btn-danger action-btn delete-experience" title="Delete"--}}
    {{--                                       data-id="{{ $candidateExperience->id }}"><i class="fa fa-trash p-1"></i></a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </article>--}}
    {{--                    </div>--}}
    {{--                @endforeach--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <br>--}}
    {{--    <section class="section">--}}
    {{--        <div class="section-header candidate-experience-header">--}}
    {{--            <h1>{{ __('messages.candidate_profile.education') }}</h1>--}}
    {{--            <div class="section-header-breadcrumb justify-content-end">--}}
    {{--                <a--}}
    {{--                   class="btn btn-primary form-btn addEducationModal" data-bs-toggle="modal"--}}
    {{--                   data-bs-target="#addEducationModal">{{ __('messages.candidate_profile.add_education') }}--}}
    {{--                    <i class="fas fa-plus"></i></a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="section-body">--}}
    {{--            <div class="row candidate-education-container">--}}
    {{--                <div class="col-12 {{ ($data['candidateEducations']->count()) ? 'd-none' : '' }}" id="notfoundEducation">--}}
    {{--                    <h4 class="product-item pb-5 d-flex justify-content-center">--}}
    {{--                        {{ __('messages.candidate.education_not_found') }}--}}
    {{--                    </h4>--}}
    {{--                </div>--}}
    {{--                @php--}}
    {{--                    /** @var \App\Models\CandidateEducation $candidateEducation */--}}
    {{--                @endphp--}}
    {{--                @foreach($data['candidateEducations'] as $candidateEducation)--}}
    {{--                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 candidate-education"--}}
    {{--                         data-education-id="{{ $loop->index }}" data-id="{{ $candidateEducation->id }}">--}}
    {{--                        <article class="article article-style-b">--}}
    {{--                            <div class="article-details">--}}
    {{--                                <div class="article-title">--}}
    {{--                                    <h4 class="text-primary education-degree-level">{{ $candidateEducation->degreeLevel->name }}</h4>--}}
    {{--                                    <h6 class="text-muted">{{ $candidateEducation->degree_title }}</h6>--}}
    {{--                                </div>--}}
    {{--                                <span class="text-muted">{{ $candidateEducation->year }} | {{ $candidateEducation->country }}</span>--}}
    {{--                                <p class="mb-0 pb-md-0 pb-4">{{ $candidateEducation->institute }}</p>--}}
    {{--                                <div class="article-cta candidate-education-edit-delete">--}}
    {{--                                    <a href="javascript:void(0)" class="btn btn-warning action-btn edit-education" title="Edit"--}}
    {{--                                       data-id="{{ $candidateEducation->id }}"><i class="fa fa-edit p-1"></i></a>--}}
    {{--                                    <a href="javascript:void(0)" class="btn btn-danger action-btn delete-education" title="Delete"--}}
    {{--                                       data-id="{{ $candidateEducation->id }}"><i class="fa fa-trash p-1"></i></a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </article>--}}
    {{--                    </div>--}}
    {{--                @endforeach--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    @include('candidate.profile.modals.add_experience_modal')
    @include('candidate.profile.modals.add_education_modal')
    @include('candidate.profile.modals.edit_experience_modal')
    @include('candidate.profile.modals.edit_education_modal')
    @include('candidate.profile.templates.templates')
@endsection
@push('scripts')
    <script>
        let addExperienceUrl = "{{ route('candidate.create-experience') }}";
        let experienceUrl = "{{ url('candidate/candidate-experience') }}/";
        let addEducationUrl = "{{ route('candidate.create-education') }}";
        let candidateUrl = "{{ url('candidate') }}/";
        let educationUrl = "{{ url('candidate/candidate-education') }}/";
        let present = "{{ __('messages.candidate_profile.present') }}";
        let isEdit = false;
    </script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
{{--    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>--}}
    <script src="{{mix('assets/js/candidate-profile/candidate_career_informations.js')}}"></script>
@endpush
