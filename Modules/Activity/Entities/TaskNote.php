<?php

namespace Modules\Activity\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modules\Activity\Entities\TaskNote
 *
 * @property int $id
 * @property int|null $task_id
 * @property int|null $add_by
 * @property string|null $notes_en
 * @property string|null $notes_ar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $addBy
 * @property-read \Modules\Activity\Entities\Task|null $task
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskNote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskNote newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\TaskNote onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskNote query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskNote whereAddBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskNote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskNote whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskNote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskNote whereNotesAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskNote whereNotesEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskNote whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\TaskNote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\TaskNote withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\TaskNote withoutTrashed()
 * @mixin \Eloquent
 */
class TaskNote extends Model
{
    use SoftDeletes;

    protected $table = 'task_notes';

    protected $fillable = [
        'notes_en',
        'notes_ar',
        'task_id',
        'add_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function addBy()
    {
        return $this->belongsTo(User::class,'add_by');
    }

    public function task()
    {
        return $this->belongsTo(Task::class,'task_id');
    }
}
