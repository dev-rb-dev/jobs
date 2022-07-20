<?php


namespace App\Queries;


use App\Models\FavouriteCompany;
use Illuminate\Database\Eloquent\Builder;

class FavouriteCompanyDataTable
{
    /**
     * @return Builder
     */
    public function get()
    {
        $query = FavouriteCompany::with(['company.user', 'company.industry'])->where('favourite_companies.user_id',
            getLoggedInUserId())->select('favourite_companies.*');

        return $query;
    }
}
