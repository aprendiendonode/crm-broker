<?php

namespace Modules\Activity\Entities;

use App\Models\Agency;
use App\Models\Business;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Activity\Entities\TaskNote;
use Modules\Activity\Entities\TaskStatus;
use Modules\Activity\Entities\TaskType;
use Illuminate\Database\Eloquent\Model;
use Modules\Listing\Entities\Listing;
use Modules\Sales\Entities\Client;
use Modules\Sales\Entities\Lead;
use Modules\Sales\Entities\Opportunity;

/**
 * Modules\Activity\Entities\Task
 *
 * @property int $id
 * @property string|null $deadline
 * @property string|null $time
 * @property int|null $task_type_id
 * @property int|null $task_status_id
 * @property int|null $contact_id
 * @property int|null $staff_id
 * @property int|null $add_by
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property string|null $custom_reminder
 * @property string|null $period_reminder
 * @property string|null $type_reminder
 * @property string|null $type_reminder_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $reference
 * @property string|null $status
 * @property string|null $type
 * @property string|null $module
 * @property int|null $module_id
 * @property-read \App\Models\User|null $addBy
 * @property-read \App\Models\Agency|null $agency
 * @property-read \App\Models\Business|null $business
 * @property-read \Modules\Sales\Entities\Client|null $client
 * @property-read \Modules\Sales\Entities\Lead|null $lead
 * @property-read \Modules\Listing\Entities\Listing|null $listing
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Activity\Entities\TaskNote[] $notes
 * @property-read int|null $notes_count
 * @property-read \Modules\Sales\Entities\Opportunity|null $opportunity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $staff
 * @property-read int|null $staff_count
 * @property-read \Modules\Activity\Entities\TaskStatus|null $task_status
 * @property-read \Modules\Activity\Entities\TaskType|null $task_type
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\Task onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereAddBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereCustomReminder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task wherePeriodReminder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereStaffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereTaskStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereTaskTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereTypeReminder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereTypeReminderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\Task whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\Task withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\Task withoutTrashed()
 * @mixin \Eloquent
 */
class Task extends Model
{
    use SoftDeletes;

    protected $table = 'tasks';
    protected $fillable = [
        'deadline',
        'reference',
        'time',
        'task_type_id',
        'task_status_id',
        'type',
        'status',
        'contact_id',
        'staff_id',
        'add_by',
        'agency_id',
        'business_id',
        'custom_reminder',
        'period_reminder',
        'type_reminder',
        'type_reminder_number',
        'created_at',
        'updated_at',
        'deleted_at',
        'module',
        'module_id'
    ];

    public function task_type()
    {
        return $this->belongsTo(TaskType::class, 'task_type_id');
    }

    public function task_status()
    {
        return $this->belongsTo(TaskStatus::class, 'task_status_id');
    }

    // public function staff()
    // {
    //     return $this->belongsTo(User::class, 'staff_id');
    // }

    //    public function contact()
    //    {
    //        return $this->hasOne(,'contact_id');
    //    }

    public function addBy()
    {
        return $this->belongsTo(User::class, 'add_by');
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id');
    }

    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }

    public function notes()
    {
        return $this->hasMany(TaskNote::class, 'task_id');
    }


    public function staff()
    {
        return $this->belongsToMany(User::class, 'task_user', 'task_id', 'staff_id');
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'module_id');
    }

    public function getLead()
    {
        return $this->where('tasks.module','=','lead')->first()->lead();
    }

//    public function lead()
//    {
//        return $this->belongsTo(Lead::class, 'module_id')->where('module','=','lead');
//    }

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class, 'module_id');
    }

    public function getOpportunity()
    {
        return $this->where('tasks.module','=','opportunity')->first()->opportunity();
    }

//    public function opportunity()
//    {
//        return $this->belongsTo(Opportunity::class,  'module_id')->where('module','=','opportunity');
//    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'module_id');
    }

    public function getClient()
    {
        return $this->where('tasks.module','=','client')->first()->client();
    }
//    public function client()
//    {
//        return $this->belongsTo(Client::class, 'module_id')->where('module','=','lead');
//    }

    public function listing()
    {
        return $this->belongsTo(Listing::class, 'module_id');
    }

    public function getListing()
    {
        return $this->where('tasks.module','=','listing')->first()->listing();
    }
//    public function listing()
//    {
//        return $this->belongsTo(Listing::class, 'module_id')->where('module','=','lead');
//    }
}