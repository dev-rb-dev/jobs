<?php

namespace App\Queries;

use App\Models\NewsLetter;


class SubscriberDataTable
{
    /**
     * @return NewsLetter
     */
    public function get()
    {
        $query = NewsLetter::query()->select('news_letters.*');
        return $query;
    }
}




