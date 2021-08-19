<?php

namespace Modules\Sales\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Sales\Entities\OpportunityQuestion
 *
 * @property int $id
 * @property int|null $opportunity_id
 * @property string|null $question
 * @property string|null $answer
 * @property string $answered
 * @property int|null $agency_id
 * @property int|null $added_by
 * @property int|null $answered_by
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $addedBy
 * @property-read \App\Models\User|null $answeredBy
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityQuestion whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityQuestion whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityQuestion whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityQuestion whereAnswered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityQuestion whereAnsweredBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityQuestion whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityQuestion whereOpportunityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityQuestion whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityQuestion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OpportunityQuestion extends Model
{
    protected $table = 'opportunity_questions';
    protected $guarded = [];


    public function addedBy()
    {
        return $this->belongsTo(User::class,  'added_by', 'id');
    }

    public function answeredBy()
    {
        return $this->belongsTo(User::class,  'answered_by', 'id');
    }
}