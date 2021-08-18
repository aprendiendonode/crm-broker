<?php

namespace Modules\Activity\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modules\Activity\Entities\TaskStatus
 *
 * @property int $id
 * @property string|null $status_en
 * @property string|null $status_ar
 * @property string|null $type_complete
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskStatus newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\TaskStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskStatus query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskStatus whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskStatus whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskStatus whereStatusAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskStatus whereStatusEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskStatus whereTypeComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\TaskStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\TaskStatus withoutTrashed()
 * @mixin \Eloquent
 */
class TaskStatus extends Model
{
    use SoftDeletes;

    protected $table = 'task_statuses';

    protected $fillable = [
        'status_en',
        'status_ar',
        'type_complete',
        'agency_id',
        'business_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
