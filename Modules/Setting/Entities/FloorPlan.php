<?php

namespace Modules\Setting\Entities;

use App\Models\Agency;
use App\Models\Business;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modules\Setting\Entities\FloorPlan
 *
 * @property int $id
 * @property string|null $image
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Agency|null $agency
 * @property-read \App\Models\Business|null $business
 * @property-read \App\Models\User|null $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\FloorPlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\FloorPlan newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Setting\Entities\FloorPlan onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\FloorPlan query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\FloorPlan whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\FloorPlan whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\FloorPlan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\FloorPlan whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\FloorPlan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\FloorPlan whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\FloorPlan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Setting\Entities\FloorPlan whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Setting\Entities\FloorPlan withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Setting\Entities\FloorPlan withoutTrashed()
 * @mixin \Eloquent
 */
class FloorPlan extends Model
{
    use softDeletes;

    protected $fillable = [
        'image',
        'agency_id',
        'business_id',
        'user_id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];


    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
