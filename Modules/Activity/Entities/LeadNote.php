<?php

namespace Modules\Activity\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Sales\Entities\Lead;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Modules\Activity\Entities\LeadNote
 *
 * @property int $id
 * @property int|null $lead_id
 * @property int|null $add_by
 * @property string|null $notes_en
 * @property string|null $notes_ar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $addBy
 * @property-read \Modules\Sales\Entities\Lead|null $lead
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\LeadNote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\LeadNote newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\LeadNote onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\LeadNote query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\LeadNote whereAddBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\LeadNote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\LeadNote whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\LeadNote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\LeadNote whereLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\LeadNote whereNotesAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\LeadNote whereNotesEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\LeadNote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\LeadNote withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\LeadNote withoutTrashed()
 * @mixin \Eloquent
 */
class LeadNote extends Model
{
    use SoftDeletes;

    protected $table = 'lead_notes';

    protected $fillable = [
        'notes_en',
        'notes_ar',
        'lead_id',
        'add_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function addBy()
    {
        return $this->belongsTo(User::class,'add_by');
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class,'lead_id');
    }
}
