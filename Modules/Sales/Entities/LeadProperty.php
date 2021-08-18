<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\Sales\Entities\LeadProperty
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $slug
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadProperty whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadProperty whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadProperty whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadProperty whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadProperty whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\LeadProperty whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LeadProperty extends Model
{
    protected $table = 'lead_property';
    protected $guarded = [];
}