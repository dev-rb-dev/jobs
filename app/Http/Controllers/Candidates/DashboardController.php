<?php

namespace App\Http\Controllers\Candidates;

use App\Http\Controllers\AppBaseController;
use App\Models\Candidate;
use App\Models\EmailTemplate;
use App\Models\User;
use Database\Seeders\EmailTemplateSeeder;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Candidates\CandidateRepository;
use App\Models\AdminNoticeBoard;
use DB;
use Illuminate\View\View;

class DashboardController extends AppBaseController
{
    /**
     * @return Factory|View
     */
     public function __construct(CandidateRepository $candidateRepo)
    {
        $this->candidateRepository = $candidateRepo;
    }


    public function dashboard()
    {
        /** @var User $user */
        $user = Auth::user();
        // $candidates = DB::table('admin_notice_boards')->where('notification_type', 0)->get();
        // $candidates = AdminNoticeBoard::get();
        $data['notices'] = $this->candidateRepository->getNotices();
        //  dd( $data['notices'] );
        $candidate = Candidate::findOrFail($user->owner_id);
        $data['resumes'] = $candidate->getMedia(Candidate::RESUME_PATH)->count();
        $data['candidate'] = $candidate;
        $data['followings'] = $user->followings()->count();
        $data['user'] = $user;

        return view('candidate.dashboard.dashboard')->with($data);
    }
}
