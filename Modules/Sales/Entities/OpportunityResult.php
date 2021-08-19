<?php

namespace Modules\Sales\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Sales\Entities\OpportunityResult
 *
 * @property int $id
 * @property int|null $opportunity_id
 * @property int|null $added_by
 * @property string|null $status
 * @property string|null $stage
 * @property string|null $note
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $addedBy
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityResult newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityResult newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityResult query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityResult whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityResult whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityResult whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityResult whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityResult whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityResult whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityResult whereOpportunityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityResult whereStage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityResult whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityResult whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OpportunityResult extends Model
{
    protected $table = 'opportunity_results';
    protected $guarded = [];


    public function addedBy()
    {
        return $this->belongsTo(User::class,  'added_by', 'id');
    }
}