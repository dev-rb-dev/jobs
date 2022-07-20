<?php

namespace App\Queries;


use App\Models\State;
use Illuminate\Database\Eloquent\Builder;

class StateDataTable
{
    /**
     * @return Builder
     */
    public function getState($input = [])
    {
        $query = State::with('country')->select('states.*');

        $query->when(isset($input['countryId']),
            function (Builder $q) use ($input) {
                $q->where('country_id', '=', $input['countryId']);
            });

        return $query;
    }
}

