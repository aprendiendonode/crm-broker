<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\Sales\Entities\OpportunityContractRecurring
 *
 * @property int $id
 * @property int|null $opportunity_contract_id
 * @property int|null $opportunity_id
 * @property string|null $amount
 * @property string|null $date
 * @property string|null $payed
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractRecurring newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractRecurring newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractRecurring query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractRecurring whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractRecurring whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractRecurring whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractRecurring whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractRecurring whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractRecurring whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractRecurring whereOpportunityContractId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractRecurring whereOpportunityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractRecurring wherePayed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractRecurring whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OpportunityContractRecurring extends Model
{


    protected $fillable = [];
}