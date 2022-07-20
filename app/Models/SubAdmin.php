<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class Candidate
 *
 * @version July 20, 2020, 5:48 am UTC
 * @property int $id
 * @property int $user_id
 * @property string $unique_id
 * @property string|null $father_name
 * @property int $marital_status_id
 * @property string|null $nationality
 * @property string|null $national_id_card
 * @property int|null $experience
 * @property int|null $career_level_id
 * @property int|null $industry_id
 * @property int|null $functional_area_id
 * @property float|null $current_salary
 * @property float|null $expected_salary
 * @property string|null $salary_currency
 * @property string|null $address
 * @property int $immediate_available
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read CareerLevel|null $careerLevel
 * @property-read FunctionalArea|null $functionalArea
 * @property-read Industry|null $industry
 * @property-read MaritalStatus $maritalStatus
 * @property-read Collection|Media[] $media
 * @property-read int|null $media_count
 * @property-read User $user
 * @property-read mixed $subadmin_url
 * @method static Builder|SubAdmin newModelQuery()
 * @method static Builder|SubAdmin newQuery()
 * @method static Builder|SubAdmin query()
 * @method static Builder|SubAdmin whereAddress($value)
 * @method static Builder|SubAdmin whereCareerLevelId($value)
 * @method static Builder|SubAdmin whereCreatedAt($value)
 * @method static Builder|SubAdmin whereCurrentSalary($value)
 * @method static Builder|SubAdmin whereExpectedSalary($value)
 * @method static Builder|SubAdmin whereExperience($value)
 * @method static Builder|SubAdmin whereFatherName($value)
 * @method static Builder|SubAdmin whereFunctionalAreaId($value)
 * @method static Builder|SubAdmin whereId($value)
 * @method static Builder|SubAdmin whereImmediateAvailable($value)
 * @method static Builder|SubAdmin whereIndustryId($value)
 * @method static Builder|SubAdmin whereMaritalStatusId($value)
 * @method static Builder|SubAdmin whereNationalIdCard($value)
 * @method static Builder|SubAdmin whereNationality($value)
 * @method static Builder|SubAdmin whereSalaryCurrency($value)
 * @method static Builder|SubAdmin whereUpdatedAt($value)
 * @method static Builder|SubAdmin whereUserId($value)
 * @method static Builder|SubAdmin whereUniqueId($value)
 * @mixin Eloquent
 * @property int $job_alert
 * @property-read mixed $city_name
 * @property-read mixed $country_name
 * @property-read string $full_location
 * @property-read mixed $state_name
 * @property-read Collection|\App\Models\JobType[] $jobAlerts
 * @property-read int|null $job_alerts_count
 * @property-read Collection|\App\Models\JobApplication[] $jobApplications
 * @property-read int|null $job_applications_count
 * @property-read Collection|\App\Models\JobApplication[] $penddingJobApplications
 * @property-read int|null $pendding_job_applications_count
 * @method static Builder|SubAdmin whereJobAlert($value)
 * @property string|null $available_at
 * @method static Builder|SubAdmin whereAvailableAt($value)
 */
class SubAdmin extends Model implements HasMedia
{
    use InteractsWithMedia;

   protected $table='users';

    public const SUBADMIN_LOGIN_TYPE = 2;

    const STATUS = [
        1 => 'Active',
        0 => 'Deactive',
    ];



    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name'        => 'required|max:180',
        'last_name'         => 'required|max:180',
        'email'             => 'required|email:filter|unique:users,email',
        'password'          => 'nullable|same:password_confirmation|min:6',
        // 'gender'            => 'required',
        // 'dob'               => 'nullable|date',
        // 'current_salary'    => 'nullable|numeric|min:0|max:999999999',
        // 'expected_salary'   => 'nullable|numeric|min:0|max:999999999',
        'phone'             => 'nullable',
        // 'marital_status_id' => 'required',
    ];

    // protected $appends = ['country_name', 'state_name', 'city_name', 'full_location', 'subadmin_url'];
    protected $with = ['user'];

    // public function getCountryNameAttribute()
    // {
    //     if (! empty($this->user->country)) {
    //         return $this->user->country->name;
    //     }
    // }

    // public function getStateNameAttribute()
    // {
    //     if (! empty($this->user->state)) {
    //         return $this->user->state->name;
    //     }
    // }

    // public function getCityNameAttribute()
    // {
    //     if (! empty($this->user->city)) {
    //         return $this->user->city->name;
    //     }
    // }

    // /**
    //  * @return string
    //  */
    // public function getFullLocationAttribute()
    // {
    //     $location = '';
    //     if (! empty($this->user->country)) {
    //         $location = $this->user->country->name;
    //     }
    //     if (! empty($this->user->state)) {
    //         $location = $location.','.$this->user->state->name;
    //     }
    //     if (! empty($this->user->city)) {
    //         $location = $location.','.$this->user->city->name;
    //     }
    //     return (!empty($location)) ? $location : null;
    // }

    // /**
    //  * @return mixed
    //  */
    // public function getCandidateUrlAttribute()
    // {
    //     /** @var Media $media */
    //     $media = $this->user->getMedia(User::PROFILE)->first();
    //     if (! empty($media)) {
    //         return $media->getFullUrl();
    //     }

    //     return asset('assets/img/employer-image.png');
    // }

    // /**
    //  * @return BelongsTo
    //  */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsTo
     */
    // public function industry()
    // {
    //     return $this->belongsTo(Industry::class, 'industry_id');
    // }

    // /**
    //  * @return BelongsTo
    //  */
    // public function maritalStatus()
    // {
    //     return $this->belongsTo(MaritalStatus::class, 'marital_status_id');
    // }

    // /**
    //  * @return BelongsTo
    //  */
    // public function careerLevel()
    // {
    //     return $this->belongsTo(CareerLevel::class, 'career_level_id');
    // }

    // /**
    //  * @return BelongsTo
    //  */
    // public function functionalArea()
    // {
    //     return $this->belongsTo(FunctionalArea::class, 'functional_area_id');
    // }

    // /**
    //  * @return BelongsToMany
    //  */
    // public function jobAlerts()
    // {
    //     return $this->belongsToMany(JobType::class, 'jobs_alerts', 'candidate_id', 'job_type_id');
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function jobApplications()
    // {
    //     return $this->hasMany(JobApplication::class, 'candidate_id');
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function penddingJobApplications()
    // {
    //     return $this->hasMany(JobApplication::class, 'candidate_id')->where('status', JobApplication::STATUS_APPLIED);
    // }
}
