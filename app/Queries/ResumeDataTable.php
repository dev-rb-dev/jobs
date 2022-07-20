<?php

namespace App\Queries;

use App\Models\Candidate;
use Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;


/**
 * Class FAQDataTable
 */
class ResumeDataTable
{
    public function get($candidate_id)
    {
        $query = Candidate::findOrFail($candidate_id)->getMedia('resumes');

        return $query;
    }
}
