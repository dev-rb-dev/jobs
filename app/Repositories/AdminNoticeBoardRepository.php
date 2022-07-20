<?php

namespace App\Repositories;

use App\Models\AdminNoticeBoard;

/**
 * Class AdminNoticeBoardRepository
 */
class AdminNoticeBoardRepository extends BaseRepository
{
    /**
     * @var array
     */
     protected $fieldSearchable = [
        'name',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }



    /**
     * Configure the Model
     **/
    public function model()
    {
        return AdminNoticeBoard::class;
    }
}
