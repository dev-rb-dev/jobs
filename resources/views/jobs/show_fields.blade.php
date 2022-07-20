{{--<div class="row details-page">--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('company', __('messages.company.company_name').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{  html_entity_decode($job->company->user->full_name) }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('job_title', __('messages.job.job_title').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ html_entity_decode($job->job_title) }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('job_title', __('messages.job.job_skill').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        @if($job->jobsSkill->isNotEmpty())--}}
{{--            <p>{{ html_entity_decode($job->jobsSkill->pluck('name')->implode(', ')) }}</p>--}}
{{--        @else--}}
{{--            <p>{{ __('messages.common.n/a') }}</p>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('job_title', __('messages.job_tag.show_job_tag').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        @if($job->jobsTag->isNotEmpty())--}}
{{--            <p>{{ html_entity_decode($job->jobsTag->pluck('name')->implode(', ')) }}</p>--}}
{{--        @else--}}
{{--            <p>{{ __('messages.common.n/a') }}</p>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('job_type_id', __('messages.job.job_type').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ html_entity_decode($job->jobType->name) }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('job_category_id', __('messages.job_category.job_category').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ html_entity_decode($job->jobCategory->name) }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('career_level_id', __('messages.job.career_level').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ (!empty($job->careerLevel)) ? html_entity_decode($job->careerLevel->level_name) : __('messages.common.n/a') }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('job_shift_id', __('messages.job.job_shift').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ (!empty($job->jobShift)) ? html_entity_decode($job->jobShift->shift) : __('messages.common.n/a') }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('currency_id', __('messages.job.currency').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ $job->currency->currency_name }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('salary_period_id', __('messages.job.salary_period').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ html_entity_decode($job->salaryPeriod->period) }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('functional_area_id', __('messages.job.functional_area').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ html_entity_decode($job->functionalArea->name) }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('degree_level_id', __('messages.job.degree_level').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ (!empty($job->degreeLevel)) ? html_entity_decode($job->degreeLevel->name) : __('messages.common.n/a') }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('position', __('messages.job.position').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ $job->position }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('position', __('messages.job_experience.job_experience').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ $job->experience .' '. __('messages.candidate_profile.year') }} </p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('country', __('messages.job.country').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ !empty($job->country_id) ?$job->country_name:__('messages.common.n/a') }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('state', __('messages.job.state').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ !empty($job->state_id)? $job->state_name:__('messages.common.n/a') }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('city', __('messages.job.city').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ !empty($job->city_id) ?$job->city_name:__('messages.common.n/a') }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('salary_from', __('messages.job.salary_from').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ formatCurrency($job->salary_from) }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('salary_to', __('messages.job.salary_to').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ formatCurrency($job->salary_to) }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('is_freelance', __('messages.job.is_freelance').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ $job->is_freelance == 1 ? __('messages.common.yes') : __('messages.common.no') }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('hide_salary', __('messages.job.hide_salary').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ $job->hide_salary == 1 ? __('messages.common.yes') : __('messages.common.no') }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('job_expiry_date', __('messages.job.job_expiry_date').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p>{{ Carbon\Carbon::parse($job->job_expiry_date)->format('jS M, Y') }}</p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p><span data-toggle="tooltip" data-placement="right"--}}
{{--                 title="{{ date('jS M, Y', strtotime($job->created_at)) }}">{{ $job->created_at->diffForHumans() }}</span>--}}
{{--        </p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-6 col-md-6 col-sm-12">--}}
{{--        {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        <p><span data-toggle="tooltip" data-placement="right"--}}
{{--                 title="{{ date('jS M, Y', strtotime($job->updated_at)) }}">{{ $job->updated_at->diffForHumans() }}</span>--}}
{{--        </p>--}}
{{--    </div>--}}
{{--    <div class="form-group col-xl-12 col-md-12 col-sm-12">--}}
{{--        {{ Form::label('description', __('messages.job.description').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--        @if($job->description)--}}
{{--            {!! nl2br($job->description) !!}--}}
{{--        @else--}}
{{--            <p>{{ __('messages.common.n/a') }}</p>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--</div>--}}




<div class="row details-page">
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('company', __('messages.company.company_name').(':'), ['class' => 'fw-bolder text-muted mb-3']) }}
        <p  class="fw-bolder fs-6 text-gray-800">{{  html_entity_decode($job->company->user->full_name) }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('job_title', __('messages.job.job_title').':',['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ html_entity_decode($job->job_title) }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('job_title', __('messages.job.job_skill').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        @if($job->jobsSkill->isNotEmpty())
            <p class="fw-bolder fs-6 text-gray-800">{{ html_entity_decode($job->jobsSkill->pluck('name')->implode(', ')) }}</p>
        @else
            <p class="fw-bolder fs-6 text-gray-800">{{ __('messages.common.n/a') }}</p>
        @endif
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('job_title', __('messages.job_tag.show_job_tag').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        @if($job->jobsTag->isNotEmpty())
            <p class="fw-bolder fs-6 text-gray-800">{{ html_entity_decode($job->jobsTag->pluck('name')->implode(', ')) }}</p>
        @else
            <p class="fw-bolder fs-6 text-gray-800">{{ __('messages.common.n/a') }}</p>
        @endif
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('job_type_id', __('messages.job.job_type').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ html_entity_decode($job->jobType->name) }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('job_category_id', __('messages.job_category.job_category').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ html_entity_decode($job->jobCategory->name) }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('career_level_id', __('messages.job.career_level').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ (!empty($job->careerLevel)) ? html_entity_decode($job->careerLevel->level_name) : __('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('job_shift_id', __('messages.job.job_shift').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ (!empty($job->jobShift)) ? html_entity_decode($job->jobShift->shift) : __('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('currency_id', __('messages.job.currency').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ $job->currency->currency_name }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('salary_period_id', __('messages.job.salary_period').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ html_entity_decode($job->salaryPeriod->period) }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('functional_area_id', __('messages.job.functional_area').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ html_entity_decode($job->functionalArea->name) }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('degree_level_id', __('messages.job.degree_level').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ (!empty($job->degreeLevel)) ? html_entity_decode($job->degreeLevel->name) : __('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('position', __('messages.job.position').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ $job->position }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('position', __('messages.job_experience.job_experience').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ $job->experience .' '. __('messages.candidate_profile.year') }} </p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('country', __('messages.job.country').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($job->country_id) ?$job->country_name:__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('state', __('messages.job.state').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($job->state_id)? $job->state_name:__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('city', __('messages.job.city').':',['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ !empty($job->city_id) ?$job->city_name:__('messages.common.n/a') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('salary_from', __('messages.job.salary_from').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ formatCurrency($job->salary_from) }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('salary_to', __('messages.job.salary_to').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ formatCurrency($job->salary_to) }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('is_freelance', __('messages.job.is_freelance').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ $job->is_freelance == 1 ? __('messages.common.yes') : __('messages.common.no') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('hide_salary', __('messages.job.hide_salary').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ $job->hide_salary == 1 ? __('messages.common.yes') : __('messages.common.no') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('job_expiry_date', __('messages.job.job_expiry_date').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800">{{ Carbon\Carbon::parse($job->job_expiry_date)->format('jS M, Y') }}</p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800"><span data-toggle="tooltip" data-placement="right"
                 title="{{ date('jS M, Y', strtotime($job->created_at)) }}">{{ $job->created_at->diffForHumans() }}</span>
        </p>
    </div>
    <div class="form-group col-xl-6 col-md-6 col-sm-12">
        {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        <p class="fw-bolder fs-6 text-gray-800"><span data-toggle="tooltip" data-placement="right"
                                                      title="{{ date('jS M, Y', strtotime($job->updated_at)) }}">{{ $job->updated_at->diffForHumans() }}</span>
        </p>
    </div>
    <div class="form-group col-xl-12 col-md-12 col-sm-12">
        {{ Form::label('description', __('messages.job.description').':', ['class' => 'fw-bolder text-muted mb-3']) }}
        @if($job->description)
            <b> {!! nl2br($job->description) !!}</b>
        @else
            <p class="fw-bolder fs-6 text-gray-800">{{ __('messages.common.n/a') }}</>
        @endif
    </div>
    <div class="d-flex">

        @unless($job->admin_approved)
         {!! Form::hidden('job_id', $job->id) !!}
       {{-- {{ Form::submit(__('messages.common.decline'), ['type' => 'submit','name' => 'decline','class' => 'btn btn-danger me-3','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
       --}}

        {{ Form::button(__('messages.common.decline'), ['type' => 'button','name' => 'button','class' => 'openremarks btn btn-danger me-3','id'=>'remarksmodal']) }}
        {{ Form::submit(__('messages.common.approve'), ['type' => 'submit','name' => 'approve','class' => 'btn btn-primary me-3','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
       @endunless
         {{-- <a href="{{route('admin.job.approved', $job->id)}}" name="" class="btn btn-success me-3">Approve</a>
              <a href="{{route('admin.job.decline', $job->id)}}" class="btn btn-danger me-3">Decline</a> --}}
         </div>
</div>



 <!-- The Modal -->
 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">{{ __('messages.common.remarks')}}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <div class="row">  <div class="form-group col-xl-12 col-md-12 col-sm-12 mb-5">
            {{ Form::label('remarks', __('messages.common.remarks').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}<span class="text-danger">*</span>
            <div id="details"></div>
            @unless($job->admin_approved)
            {{ Form::textarea('remarks', null, ['class' => 'form-control','id' => 'remarks', 'rows' => '5']) }}
            @endunless
        </div></div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            {{ Form::submit(__('messages.common.decline'), ['type' => 'submit','name' => 'decline','class' => 'btn btn-danger me-3','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}</div>

      </div>
    </div>
  </div>
   <!-- The Modal End -->
  @push('scripts')
  <script>
     $(document).on('click', '.openremarks', function() {
        $('#myModal').modal('show');
        });

//  $(document).on('click', '.openremarks', function (event) {
//   if(ajaxCallIsRunning) {
//     return;
//   }

//   ajaxCallInProgress();
//   var jobCategoryId = $(event.currentTarget).attr('data-id');
//   $.ajax({
//     url: jobCategoryUrl + jobCategoryId,
//     type: 'GET',
//     success: function success(result) {
//       if (result.success) {
//         $('#showRemarks').html('');
//        $('#myModal').modal('show');
//         ajaxCallCompleted();
//       }
//     },
//     error: function error(result) {
//       displayErrorMessage(result.responseJSON.message);
//     }
//   });
// });
  </script>
@endpush

