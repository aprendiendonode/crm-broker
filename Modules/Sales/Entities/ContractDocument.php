<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\Sales\Entities\ContractDocument
 *
 * @property int $id
 * @property int|null $contract_id
 * @property int|null $client_id
 * @property string|null $document
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $name
 * @property string|null $extension
 * @property string|null $size
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractDocument whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractDocument whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractDocument whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractDocument whereContractId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractDocument whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractDocument whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractDocument whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractDocument whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ContractDocument whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ContractDocument extends Model
{
    protected $table = 'contract_document';
    protected $guarded = [];
}
