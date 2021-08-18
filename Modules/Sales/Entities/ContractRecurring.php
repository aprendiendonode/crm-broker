<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\Sales\Entities\ContractRecurring
 *
 * @property int $id
 * @property int|null $contract_id
 * @property int|null $client_id
 * @property string|null $amount
 * @property string|null $date
 * @property string|null $payed
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractRecurring newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractRecurring newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractRecurring query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractRecurring whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractRecurring whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractRecurring whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractRecurring whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractRecurring whereContractId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractRecurring whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractRecurring whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractRecurring whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractRecurring wherePayed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractRecurring whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ContractRecurring extends Model
{
    protected $table = 'contract_recurring';
    protected $guarded = [];
}
