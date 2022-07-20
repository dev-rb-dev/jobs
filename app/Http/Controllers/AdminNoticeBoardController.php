<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdminNoticeBoardRequest;
use App\Http\Requests\UpdateAdminNoticeBoardRequest;
use App\Models\AdminNoticeBoard;
use App\Queries\AdminNoticeBoardDataTable;
use App\Repositories\AdminNoticeBoardRepository;
use DataTables;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\View\View;

class AdminNoticeBoardController extends AppBaseController
{
    /** @var AdminNoticeBoardRepository */
    private $AdminNoticeBoardRepository;

    public function __construct(AdminNoticeBoardRepository $AdminNoticeBoardRepository)
    {
        $this->AdminNoticeBoardRepository = $AdminNoticeBoardRepository;
    }

    /**
     * Display a listing of the Notice Board Admin.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new AdminNoticeBoardDataTable())->get())->make(true);
        }

        return view('admin_notice_boards.index');
    }

    /**
     * Store a newly created BlogCategory in storage.
     *
     * @param  CreateAdminNoticeBoardRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateAdminNoticeBoardRequest $request)
    {
        $input = $request->all();
        // dd($input);
        $this->AdminNoticeBoardRepository->create($input);

        return $this->sendSuccess('Notice saved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  AdminNoticeBoard  $AdminNoticeBoard
     *
     * @return JsonResponse
     */
    public function edit(AdminNoticeBoard $AdminNoticeBoard)
    {

        return $this->sendResponse($AdminNoticeBoard, 'Notice Retrieved Successfully.');
    }

    /**
     * Show the form for editing the specified BlogCategory.
     *
     * @param  AdminNoticeBoard  $AdminNoticeBoard
     *
     * @return JsonResource
     */
    public function show(AdminNoticeBoard $AdminNoticeBoard)
    {

        return $this->sendResponse($AdminNoticeBoard, 'Notice Retrieved Successfully.');
    }

    /**
     * Update the specified BlogCategory in storage.
     *
     * @param  UpdateAdminNoticeBoardRequest  $request
     *
     * @param  AdminNoticeBoard  $AdminNoticeBoard
     *
     * @return JsonResource
     */
    public function update(UpdateAdminNoticeBoardRequest $request, AdminNoticeBoard $AdminNoticeBoard)
    {
        $input = $request->all();
        $this->AdminNoticeBoardRepository->update($input, $AdminNoticeBoard->id);

        return $this->sendSuccess('Notice updated successfully.');
    }

    /**
     * Remove the specified AdminNoticeBoard from storage.
     *
     * @param  AdminNoticeBoard  $AdminNoticeBoard
     *
     * @throws Exception
     *
     * @return JsonResource
     */
    public function destroy(AdminNoticeBoard $AdminNoticeBoard)
    {
        $AdminNoticeBoard->delete();

        return $this->sendSuccess('Notice deleted successfully.');
    }
}
