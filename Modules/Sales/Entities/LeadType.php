<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\Sales\Entities\LeadType
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $slug
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\Lead[] $leads
 * @property-read int|null $leads_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadType whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadType whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadType whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadType whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadType whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LeadType extends Model
{

    protected $guarded = [];

    public function leads()
    {
        return $this->hasMany(Lead::class, 'type_id');
    }
}
