<?php

namespace App\Queries;


use App\Models\RequiredDegreeLevel;


class RequiredDegreeLevelDataTable
{
    /**
     * @return required_degree_levels
     */
    public function get()
    {
        $query = RequiredDegreeLevel::query()->select('required_degree_levels.*');
        return $query;
    }
}
