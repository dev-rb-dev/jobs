<?php

namespace App\Queries;

use App\Models\Job;
use Carbon\Carbon;

class JobExpiredDataTable
{
    /**
     * @return Job
     */
    public function getJobs()
    {
        $query = Job::where('job_expiry_date', '<', Carbon::now()->toDateString());

        return $query;
    }
}
