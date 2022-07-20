<?php

namespace App\Queries;

use App\ReportedToCandidate;

/**
 * Class ReportedCandidateDataTable
 */
class ReportedCandidateDataTable
{
    public function get()
    {
        /** @var ReportedToCandidate $query */
        $query = ReportedToCandidate::with('user', 'candidate.user')->select('reported_to_candidates.*');

        return $query;
    }
}
