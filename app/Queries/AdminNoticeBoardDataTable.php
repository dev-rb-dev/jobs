<?php

namespace App\Queries;

use App\Models\AdminNoticeBoard;

/**
 * Class AdminNoticeBoardDataTable
 */
class AdminNoticeBoardDataTable
{
    /**
     * @return AdminNoticeBoard
     */
    public function get()
    {
        /** @var AdminNoticeBoard $query */
        $query = AdminNoticeBoard::query()->select('admin_notice_boards.*');

        return $query;
    }
}
