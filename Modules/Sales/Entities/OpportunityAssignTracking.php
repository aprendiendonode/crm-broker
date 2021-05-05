<?php

namespace Modules\Sales\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class OpportunityAssignTracking extends Model
{
    protected $table = 'opportunity_assign_tracking';
    protected $guarded = [];

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
}
