<?php

namespace App\Queries;

use App\Models\ReportedToCompany;

/**
 * Class ReportedEmployeeDataTable
 */
class ReportedEmployeeDataTable
{
    public function get()
    {
        /** @var ReportedToCompany $query */
        $query = ReportedToCompany::with('user', 'company.user')->select('reported_to_companies.*');

        return $query;
    }
}
