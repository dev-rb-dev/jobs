<?php


namespace App\Queries;

use App\Models\JobStage;

/**
 * Class JobStageDataTable
 */
class JobStageDataTable
{
    /**
     * @return JobStage
     */
    public function get()
    {
        /** @var JobStage $query */
        $query = JobStage::query()->where('company_id',getLoggedInUser()->company->id)->select('job_stages.*');

        return $query;
    }
}
