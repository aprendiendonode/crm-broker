<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\Sales\Entities\LeadQualifications
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $slug
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadQualifications newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadQualifications newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadQualifications query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadQualifications whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadQualifications whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadQualifications whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadQualifications whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadQualifications whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadQualifications whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadQualifications whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadQualifications whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LeadQualifications extends Model
{


    protected $guarded = [];
}
