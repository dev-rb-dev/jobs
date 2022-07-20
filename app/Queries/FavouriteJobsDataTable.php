<?php


namespace App\Queries;


use App\Models\FavouriteJob;
use Illuminate\Database\Eloquent\Builder;

class FavouriteJobsDataTable
{
    /**
     * @return Builder
     */
    public function get()
    {
        $query = FavouriteJob::with(['job.company.user', 'job','user'])
            ->where('user_id', getLoggedInUserId())->select('favourite_jobs.*');

        return $query;
    }
}
