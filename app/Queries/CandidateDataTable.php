<?php

namespace App\Queries;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class CandidateDataTable
 */
class CandidateDataTable
{
    /**
     * @param $input
     *
     * @return Builder
     */
    public function get($input = [])
    {
        $query = Candidate::with('user')->select('candidates.*');

        $query->when(isset($input['immediate_available']),
            function (Builder $q) use ($input) {
                $q->where('immediate_available', '=', $input['immediate_available']);
            });

        $query->when(isset($input['is_active']),
            function (Builder $q) use ($input) {
                $q->whereHas('user', function (Builder $user) use ($input) {
                    return $user->where('is_active', '=', $input['is_active']);
                });
            });

        $query->when(isset($input['job_skill']),
            function (Builder $q) use ($input) {
                $q->whereHas('user', function (Builder $user) use ($input) {
                    return $user->whereHas('candidateSkill', function (Builder $candidate) use ($input) {
                        $candidate->where('skill_id', '=', $input['job_skill']);
                    });
                });
            });

        return $query;
    }
}
