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
use Modules\Sales\Entities\Lead;
use Modules\Sales\Entities\Opportunity;

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

    public function getlead()
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

    public function getopportunity()
    {
        return $this->where('tasks.module','=','opportunity')->first()->opportunity();
    }

//    public function opportunity()
//    {
//        return $this->belongsTo(Opportunity::class,  'module_id')->where('module','=','opportunity');
//    }

//    public function client()
//    {
//        return $this->belongsTo(Client::class, 'module_id')->where('module','=','lead');
//    }
//
//    public function listing()
//    {
//        return $this->belongsTo(Listing::class, 'module_id')->where('module','=','lead');
//    }
}