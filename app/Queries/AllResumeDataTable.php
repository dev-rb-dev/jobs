<?php

namespace App\Queries;

use App\Models\Candidate;
use App\Models\CustomMedia;

/**
 * Class AllResumeDataTable
 */
class AllResumeDataTable
{
    public function get()
    {
        /** @var Candidate $query */
        $query = CustomMedia::query()->where('model_type', Candidate::class)->where('collection_name',
            Candidate::RESUME_PATH)->select('media.*')
            ->join('candidates', 'media.model_id', '=', 'candidates.id')
            ->join('users', 'candidates.user_id', '=', 'users.id')->with('candidate.user');

        return $query;
    }
}
