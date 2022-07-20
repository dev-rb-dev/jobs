<?php

namespace App\Queries;

use App\Models\JobType;

/**
 * Class InquiryDataTable
 */
class JobTypeDataTable
{
    /**
     * @return JobType
     */
    public function get()
    {
        /** @var Inquiry $query */
        return JobType::query()->select('job_types.*');
    }
}
