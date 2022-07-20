<?php


namespace App\Queries;

use App\Models\City;
use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;

class CompanyDataTable
{
    /**
     * @return Builder
     */
    public function get($input = [])
    {
        $query = Company::with('user', 'activeFeatured')->select('companies.*');

        $query->when(isset($input['is_featured']) && $input['is_featured'] == 1,
            function (Builder $q) {
                $q->has('activeFeatured');
            });
        $query->when(isset($input['is_featured']) && $input['is_featured'] == 0,
            function (Builder $q) {
                $q->doesnthave('activeFeatured');
            });

        $query->when((isset($input['is_status']) && $input['is_status'] != ''),
            function (Builder $q) use ($input) {
                $q->wherehas('user', function (Builder $q) use ($input) {
                    $q->where('is_active', '=', $input['is_status']);
                });
            });

        return $query;
    }
}
