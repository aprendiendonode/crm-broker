<?php

namespace App\Models;

use App\Models\PermissionGroup;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo(PermissionGroup::class, 'permission_group_id', 'id');
    }
}
