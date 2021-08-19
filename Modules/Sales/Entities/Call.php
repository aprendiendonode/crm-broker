<?php

namespace Modules\Sales\Entities;

use App\Models\Agency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\Sales\Entities\Call
 *
 * @property int $id
 * @property string|null $contact_date
 * @property string|null $contact_time
 * @property string|null $next_action_date
 * @property string|null $next_action_time
 * @property string|null $note
 * @property int|null $made_by
 * @property string|null $module
 * @property int|null $module_id
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $status_id
 * @property-read \App\Models\Agency|null $agency
 * @property-read \Modules\Sales\Entities\Lead $lead
 * @property-read \App\Models\User|null $madeBy
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Call newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Call newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Call query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Call whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Call whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Call whereContactDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Call whereContactTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Call whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Call whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Call whereMadeBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Call whereModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Call whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Call whereNextActionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Call whereNextActionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Call whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Call whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Call whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Call extends Model
{

    protected $guarded = [];



    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function madeBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'made_by');
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id');
    }
}