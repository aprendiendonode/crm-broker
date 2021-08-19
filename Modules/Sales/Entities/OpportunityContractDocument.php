<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\Sales\Entities\OpportunityContractDocument
 *
 * @property int $id
 * @property int|null $opportunity_contract_id
 * @property int|null $opportunity_id
 * @property string|null $document
 * @property string|null $name
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractDocument whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractDocument whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractDocument whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractDocument whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractDocument whereOpportunityContractId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractDocument whereOpportunityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityContractDocument whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OpportunityContractDocument extends Model
{


    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Sales\Database\factories\OpportunityContractDocumentFactory::new();
    }
}