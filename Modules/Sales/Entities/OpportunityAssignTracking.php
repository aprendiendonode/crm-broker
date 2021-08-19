<?php

namespace Modules\Sales\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Sales\Entities\OpportunityAssignTracking
 *
 * @property int $id
 * @property int|null $opportunity_id
 * @property string|null $reason_change_assign
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property int|null $assigned_by
 * @property string|null $assigned_to
 * @property string|null $start_assign
 * @property string|null $end_assign
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $assignedBy
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityAssignTracking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityAssignTracking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityAssignTracking query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityAssignTracking whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityAssignTracking whereAssignedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityAssignTracking whereAssignedTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityAssignTracking whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityAssignTracking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityAssignTracking whereEndAssign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityAssignTracking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityAssignTracking whereOpportunityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityAssignTracking whereReasonChangeAssign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityAssignTracking whereStartAssign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityAssignTracking whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityAssignTracking whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OpportunityAssignTracking extends Model
{
    protected $table = 'opportunity_assign_tracking';
    protected $guarded = [];

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
}
