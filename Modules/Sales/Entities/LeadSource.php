<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\Sales\Entities\LeadSource
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $slug
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadSource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadSource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadSource query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadSource whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadSource whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadSource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadSource whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadSource whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadSource whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadSource whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LeadSource extends Model
{

    protected $guarded = [];
}
