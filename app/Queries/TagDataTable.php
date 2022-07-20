<?php

namespace App\Queries;

use App\Models\Tag;


class TagDataTable
{
    /**
     * @return Tag
     */
    public function get()
    {
        $query = Tag::query()->select('tags.*');
        return $query;
    }
}
