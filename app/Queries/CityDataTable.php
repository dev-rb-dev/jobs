<?php


namespace App\Queries;

use App\Models\City;
use Illuminate\Database\Eloquent\Builder;

class CityDataTable
{
    /**
     * @return Builder
     */
    public function getCity($input = [])
    {
        $query = City::with('state')->select('cities.*');

        $query->when(isset($input['stateId']),
            function (Builder $q) use ($input) {
                $q->where('state_id', '=', $input['stateId']);
            });

        return $query;
    }
}
