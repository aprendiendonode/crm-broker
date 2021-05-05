<?php

namespace Modules\Activity\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
