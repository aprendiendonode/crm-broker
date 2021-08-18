<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\Sales\Entities\OpportunityStage
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $slug
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityStage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityStage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityStage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityStage whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityStage whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityStage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityStage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityStage whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityStage whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityStage whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityStage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OpportunityStage extends Model
{
    protected $table = 'opportunity_stages';
    protected $guarded = [];
}