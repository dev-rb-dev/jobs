<?php

namespace App\Queries;

use App\Models\Country;


class CountryDataTable
{
    /**
     * @return Country
     */
    public function get()
    {
        $query = Country::query()->select('countries.*');
        return $query;
    }
}
