<?php

namespace App\Queries;

use App\Models\JobShift;


class JobShiftDataTable
{
    /**
     * @return JobShift
     */
    public function get()
    {
        $query = jobShift::query()->select('job_shifts.*');
        return $query;
    }
}
