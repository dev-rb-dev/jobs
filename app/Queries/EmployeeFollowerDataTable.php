<?php

namespace App\Queries;

use App\Models\FavouriteCompany;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class EmployeeFollowerDataTable
 */
class EmployeeFollowerDataTable
{
    /**
     * @return Builder
     */
    public function get()
    {
        $query = FavouriteCompany::with(['user','user.candidate'])->where('company_id',
            getLoggedInUser()->owner_id);
        
        return $query;
    }
}
