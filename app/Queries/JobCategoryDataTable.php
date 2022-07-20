<?php

namespace App\Queries;

use App\Models\JobCategory;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class JobDataTable
 */
class JobCategoryDataTable
{
    /**
     * @return JobCategory
     */
    public function getJobCategory($input = [])
    {
        /** @var JobCategory $query */
        $query = JobCategory::query()->select('job_categories.*');
        $query->when(isset($input['is_featured']),
            function (Builder $q) use ($input) {
                $q->where('is_featured', '=', $input['is_featured']);
            });

        return $query;
    }
}
