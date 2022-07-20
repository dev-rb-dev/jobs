<?php

namespace App\Queries;

use App\Models\Job;
use Carbon\Carbon;

class JobPublishedDataTable
{
    /**
     * @return Job
     */
    public function getJobs()
    {
        $query = Job::where('admin_approved', '=', 0);

        return $query;
    }
}
