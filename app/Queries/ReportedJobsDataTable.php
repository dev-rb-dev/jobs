<?php


namespace App\Queries;

use App\Models\ReportedJob;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ReportedJobsDataTable
 */
class ReportedJobsDataTable
{
    /**
     *
     * @return Builder[]|Collection
     */
    public function getReportedJob($input = [])
    {
        $query = ReportedJob::with(['user.candidate', 'job.company', 'user' => function ($query) {
            $query->without(['media', 'country', 'state', 'city']);
        }])->select('reported_jobs.*');

//        $query->when(isset($input['created_at_date']) , function (Builder $q) use($input) {
//            dump($input['created_at_date']);
//            $q->whereMonth('reported_jobs.created_at', $input['created_at']);
//        });

        $query->when(isset($input['created_at']) && $input['created_at'] != '', function (Builder $q) use ($input) {
            $q->whereMonth('reported_jobs.created_at', '=', $input['created_at']);
        });

        return $query;
    }
}
