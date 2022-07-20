<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateSubAdminRequest;
use App\Http\Requests\UpdateSubAdminRequest;
use App\Queries\AllResumeDataTable;
use App\Queries\SubAdminDataTable;
use App\Queries\ReportedCandidateDataTable;
use App\Queries\ResumesDataTable;
use Carbon\Carbon;
use Exception;
use App\Models\User;
use App\Models\SubAdmin;
use Flash;
use Auth;
use Hash;
use DB;
use Arr;
use Spatie\Permission\Models\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Yajra\DataTables\DataTables;

class SubAdminController extends AppBaseController
{
    /** @var SubAdminRepository */
    // private $SubAdminRepository;

    // public function __construct(SubAdminRepository $SubAdminRepo)
    // {
    //     $this->SubAdminRepository = $SubAdminRepo;
    // }

    /**
     * Display a listing of the SubAdmin.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {

    if ($request->ajax()) {
        return Datatables::of((new SubAdminDataTable())->get($request->only([
                'is_active',
            ])))->make(true);

        }
        // $data = DB::table('users')->where('owner_type', 'App\Models\SubAdmin')->get();

        // $immediateAvailable = SubAdmin::IMMEDIATE_AVAILABLE;
        // $jobsSkills = Skill::toBase()->pluck('name', 'id')->toArray();


        return view('subadmins.index' );
    }

    /**
     * Show the form for creating a new SubAdmin.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
    //   $data = $this->SubAdminRepository->prepareData();
        // $countries = Country::pluck('name', 'id');
        // $states = State::toBase()->pluck('name', 'id');

        return view('subadmins.create');
    }

    /**
     * Store a newly created SubAdmin in storage.
     *
     * @param  CreateSubAdminRequest  $request
     *
     * @return Application|RedirectResponse|Redirector
     */
     public function store(CreateSubAdminRequest $request)
    {
        $input = $request->all();
            $input['is_active'] = 1;
            $input['is_verified'] = 1;
            $input['password'] = Hash::make($input['password']);


            $subadminRole = Role::whereName('SubAdmin')->first();
            $subadmin = User::create($input);
            $ownerId = $subadmin->id;
            $ownerType = SubAdmin::class;

            $subadmin->update(['owner_id' => $ownerId, 'owner_type' => $ownerType]);
            $subadmin->assignRole($subadminRole);
    //    $subadmin = $this->SubAdminRepository->store($input);
    //    dd($subadmin);
    if($subadmin){
        Flash::success('Sub Admin saved successfully.');
    }else {
        Flash::error('Sub Admin saved failed.');
    }
        return redirect(route('subadmins.index'));
    }


    /**
     * Display the specified SubAdmin.
     *
     * @param  SubAdmin  $subadmin
     *
     * @return Application|Factory|View
     */
    public function show(SubAdmin $subadmin)
    {


        return view('subadmins.show')->with('subadmin', $subadmin);
    }

    // /**
    //  * Show the form for editing the specified SubAdmin.
    //  *
    //  * @param  SubAdmin  $subadmin
    //  *
    //  * @return Application|RedirectResponse|Redirector
    //  */
    public function edit(SubAdmin $subadmin)
    {
        $user = $subadmin->user;


        return view('subadmins.edit', compact('subadmin'));
    }

    // /**
    //  * Update the specified SubAdmin in storage.
    //  *
    //  * @param  SubAdmin  $candidate
    //  * @param  UpdateCandidateRequest  $request
    //  *
    //  * @return Application|RedirectResponse|Redirector
    //  */
    public function update(Subadmin $subadmin, UpdateSubadminRequest $request )
    {
        $input = $request->all();
        $user = Auth::user();

        $userInput = Arr::only($input,
         [
        'first_name', 'last_name', 'email',
           ]);

          $user->update($userInput);

        // $candidate = $this->candidateRepository->updateCandidate($candidate, $input);

        Flash::success('Subadmin updated successfully.');

        return redirect(route('subadmins.index'));
    }

    // /**
    //  * Remove the specified SubAdmin from storage.
    //  *
    //  * @param  SubAdmin  $candidate
    //  *
    //  * @throws Exception
    //  *
    //  * @return JsonResponse
    //  */
    public function destroy($id)
    {

        $subadmin = User::find($id);
        $subadmin->delete();
        return $this->sendSuccess('Sub Admin deleted successfully.');
    }

    // /**
    //  * @param $id
    //  *
    //  * @return mixed
    //  */
    // public function changeStatus($id)
    // {
    //     $candidate = Candidate::findOrFail($id);
    //     $status = ! $candidate->user->is_active;
    //     $candidate->user->update(['is_active' => $status]);

    //     return $this->sendSuccess('Status updated successfully.');
    // }

    // /**
    //  * @param  Request  $request
    //  *
    //  * @return JsonResource
    //  */

    // public function changeIsEmailVerified(Candidate $candidate)
    // {
    //     if (empty($candidate->user->email_verified_at)) {
    //         $candidate->user->update([
    //             'email_verified_at' => Carbon::now(),
    //             'is_verified' => 1,
    //         ]);
    //     } else {
    //         $candidate->user->update(['email_verified_at' => null]);
    //     }


    //     return $this->sendSuccess('Email verified successfully.');
    // }

    // /**
    //  * @param  Candidate  $candidate
    //  *
    //  * @return mixed
    //  */
    // public function resendEmailVerification(Candidate $candidate)
    // {
    //     $candidate->user->sendEmailVerificationNotification();

    //     return $this->sendSuccess('Verification mail resent successfully.');
    // }

    // /**
    //  * @return BinaryFileResponse
    //  */

}
