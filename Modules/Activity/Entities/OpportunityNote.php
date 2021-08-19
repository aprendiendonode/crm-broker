<?php

namespace Modules\Activity\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Sales\Entities\Opportunity;

/**
 * Modules\Activity\Entities\OpportunityNote
 *
 * @property int $id
 * @property int|null $opportunity_id
 * @property int|null $add_by
 * @property string|null $notes_en
 * @property string|null $notes_ar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $addBy
 * @property-read \Modules\Sales\Entities\Opportunity|null $opportunity
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\OpportunityNote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\OpportunityNote newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\OpportunityNote onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\OpportunityNote query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\OpportunityNote whereAddBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\OpportunityNote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\OpportunityNote whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\OpportunityNote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\OpportunityNote whereNotesAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\OpportunityNote whereNotesEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\OpportunityNote whereOpportunityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\OpportunityNote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\OpportunityNote withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\OpportunityNote withoutTrashed()
 * @mixin \Eloquent
 */
class OpportunityNote extends Model
{
    use SoftDeletes;

    protected $table = 'opportunity_notes';

    protected $fillable = [
        'notes_en',
        'notes_ar',
        'opportunity_id',
        'add_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function addBy()
    {
        return $this->belongsTo(User::class,'add_by');
    }

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class,'opportunity_id');
    }
}
