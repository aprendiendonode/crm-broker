<?php

namespace Modules\Activity\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
