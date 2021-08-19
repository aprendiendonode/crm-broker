<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\Sales\Entities\OpportunityTempContract
 *
 * @property int $id
 * @property int|null $opportunity_id
 * @property int|null $converted_by
 * @property string|null $status
 * @property string|null $contract_type
 * @property string|null $customer_name
 * @property string|null $customer_national_id
 * @property string|null $customer_address
 * @property string|null $landlord_name
 * @property string|null $landlord_national_id
 * @property string|null $landlord_address
 * @property string|null $address
 * @property string|null $notes
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $amount
 * @property string|null $has_recurring
 * @property string|null $recurring_number
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereContractType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereConvertedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereCustomerAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereCustomerNationalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereHasRecurring($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereLandlordAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereLandlordName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereLandlordNationalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereOpportunityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereRecurringNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\OpportunityTempContract whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OpportunityTempContract extends Model
{


    protected $guarded = [];
}
