<div>
    @forelse($jobs as $job)
        <div class="job-block">
            <div class="inner-box">
                <div class="content">
                    <span class="company-logo"><img src="{{ $job->company->company_url }}" alt="" class="company-img"></span>
                    <h4>
                        <a href="{{route('front.job.details',$job['job_id']) }}">{{ html_entity_decode($job['job_title']) }}</a>
                    </h4>
                    <ul class="job-info">
                        <li><span class="icon flaticon-briefcase"></span> {{$job->jobCategory->name}}</li>
                        <li>
                            <span class="icon flaticon-map-locator"></span> {{ (!empty($job->full_location)) ? $job->full_location : 'Location Info. not available.'}}
                        </li>
                        <li><span class="icon flaticon-clock-3"></span> {{$job->created_at->diffForHumans()}}
                        </li>
                        @if($job->hide_salary=='0')
                            <li><span class="">{{$job->currency->currency_icon}}</span> {{$job->salary_from}}
                                - {{$job->salary_to}}</li>
                        @endif
                    </ul>
                    <ul class="job-other-info job-badge">
                        @foreach($job->jobsSkill->take(1) as $jobSkill)
                            <li class="time">{{$jobSkill->name}}</li>
                            @if(count($job->jobsSkill) -1 > 0)
                                <li class="green">{{'+'.(count($job->jobsSkill) - 1)}}</li>
                            @endif
                        @endforeach
                    </ul>
                    @if($job->activeFeatured)
                        <button class="bookmark-btn"><i class="fas fa-bookmark featured"></i></button>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="col-md-12 text-center">{{ __('web.job_menu.no_results_found') }}</div>
    @endforelse

    @if($jobs->count() > 0)
        {{$jobs->links() }}
    @endif
</div>
