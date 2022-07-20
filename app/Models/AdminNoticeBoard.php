<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\AdminNoticeBoard
 *
 * @mixin \Eloquen
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminNoticeBoard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminNoticeBoard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminNoticeBoard query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminNoticeBoard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminNoticeBoard whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminNoticeBoard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminNoticeBoard whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminNoticeBoard whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $postAssignCategories
 * @property-read int|null $post_assign_categories_count
 */
class AdminNoticeBoard extends Model
{
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:180|unique:post_categories,name',
    ];
    public $table = 'admin_notice_boards';

    /**
     * @var string[]
     */
     const NOTIFICATION_TYPE= [
        0 => 'Candidate',
        1 => 'Employer',
    ];
    public $fillable = [
        'name',
        'notification_type',
        'description',

    ];
    /**
      * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'          => 'integer',
        'name'        => 'string',
        'notification_type' => 'string',
        'description' => 'string',
    ];

    /**
     * @return BelongsToMany
     */

}
