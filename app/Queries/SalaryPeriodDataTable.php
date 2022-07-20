<?php
namespace App\Queries;


use App\Models\SalaryPeriod;
use Carbon\Carbon;

class SalaryPeriodDataTable
{
    /**
     * @return mixed
     */
    public function get()
    {
        $query = SalaryPeriod::select('salary_periods.*');

        return $query;
    }
}
