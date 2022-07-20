<?php

namespace App\Queries;

use App\Models\Job;
use App\Models\MaritalStatus;
use Carbon\Carbon;

class MaritalStatusDataTable
{
    /**
     * @return mixed
     */
    public function get()
    {
        $query = MaritalStatus::select('marital_status.*');

        return $query;
    }
}
