<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Sales\Entities\CallStatus
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $slug
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\CallStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\CallStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\CallStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\CallStatus whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\CallStatus whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\CallStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\CallStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\CallStatus whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\CallStatus whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\CallStatus whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\CallStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CallStatus extends Model
{
    protected $table = 'call_status';
    protected $guarded = [];
}