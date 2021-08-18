<?php

namespace Modules\Sales\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\Sales\Entities\ClientContract
 *
 * @property int $id
 * @property int|null $client_id
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
 * @property-read \App\Models\User|null $convertedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\ContractDocument[] $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\ContractRecurring[] $recurrings
 * @property-read int|null $recurrings_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereContractType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereConvertedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereCustomerAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereCustomerNationalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereHasRecurring($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereLandlordAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereLandlordName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereLandlordNationalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereRecurringNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientContract whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ClientContract extends Model
{
    protected $table = 'client_contracts';
    protected $guarded = [];


    public function documents()
    {
        return $this->hasMany(ContractDocument::class, 'contract_id');
    }
    public function recurrings()
    {
        return $this->hasMany(ContractRecurring::class, 'contract_id');
    }

    public function convertedBy()
    {
        return $this->belongsTo(User::class, 'converted_by');
    }
}