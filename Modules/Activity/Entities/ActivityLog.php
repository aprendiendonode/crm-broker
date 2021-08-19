<?php

namespace Modules\Activity\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Activity\Entities\ActivityLog
 *
 * @property int $id
 * @property string|null $log_en
 * @property string|null $log_ar
 * @property string|null $group
 * @property string|null $group_id
 * @property int|null $add_by
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $addBy
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ActivityLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ActivityLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ActivityLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ActivityLog whereAddBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ActivityLog whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ActivityLog whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ActivityLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ActivityLog whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ActivityLog whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ActivityLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ActivityLog whereLogAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ActivityLog whereLogEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ActivityLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ActivityLog extends Model
{
    protected $table = "activity_logs";
    protected $fillable = ['log_en','log_ar','group','group_id','add_by','agency_id','business_id','created_at','updated_at'];

    public function addBy(){

        return $this->belongsTo(User::class,'add_by');
    }
}
