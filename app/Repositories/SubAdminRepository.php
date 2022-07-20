<?php

namespace App\Repositories;

use App\Models\SubAdmin;
use App\Models\User;
use App\Repositories\BaseRepository;
use Arr;
use Auth;
use Carbon\Carbon;
use DB;
use Exception;
use Hash;
use Illuminate\Validation\ValidationException;
use PragmaRX\Countries\Package\Countries;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Models\Role;
use Str;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Throwable;

/**
 * Class SubAdminRepository
 * @version July 20, 2020, 5:48 am UTC
 */
class SubAdminRepository
{

    public function store($input)
    {
        try {
            DB::beginTransaction();
            $input['is_active'] = isset($input['is_active']) ? 1 : 0;
            $input['is_verified'] = isset($input['is_verified']) ? 1 : 0;
            $input['password'] = Hash::make($input['password']);
            //
            $subadminRole = Role::whereName('SubAdmin')->first();
            /** @var User $user */
            $user = User::create(Arr::only($input, (new User())->getFillableSubadmin()));
            $ownerId = $subadmin->id;
            $ownerType = SubAdmin::class;
             $user->update(['owner_id' => $ownerId, 'owner_type' => $ownerType]);
            $user->assignRole($subadminRole);
             if ($user->is_verified) {
                $user->update(['email_verified_at' => Carbon::now()]);
            } else {
                $user->sendEmailVerificationNotification();
            }

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            echo 'Message: ' .$e->getMessage();
        }

        return true;
    }
}

