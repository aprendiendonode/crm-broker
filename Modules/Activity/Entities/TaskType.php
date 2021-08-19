<?php

namespace Modules\Activity\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modules\Activity\Entities\TaskType
 *
 * @property int $id
 * @property string|null $type_en
 * @property string|null $type_ar
 * @property string|null $address_required
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskType newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\TaskType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskType query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskType whereAddressRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskType whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskType whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskType whereTypeAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskType whereTypeEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\TaskType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\TaskType withoutTrashed()
 * @mixin \Eloquent
 */
class TaskType extends Model
{
    use SoftDeletes;

    protected $table = 'task_types';

    protected $fillable = [
        'type_en',
        'type_ar',
        'address_required',
        'agency_id',
        'business_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

}
