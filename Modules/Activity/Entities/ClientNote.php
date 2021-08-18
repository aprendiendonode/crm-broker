<?php

namespace Modules\Activity\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Sales\Entities\Client;


/**
 * Modules\Activity\Entities\ClientNote
 *
 * @property int $id
 * @property int|null $client_id
 * @property int|null $add_by
 * @property string|null $notes_en
 * @property string|null $notes_ar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $addBy
 * @property-read \Modules\Sales\Entities\Client|null $client
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ClientNote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ClientNote newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\ClientNote onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ClientNote query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ClientNote whereAddBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ClientNote whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ClientNote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ClientNote whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ClientNote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ClientNote whereNotesAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ClientNote whereNotesEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ClientNote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\ClientNote withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Activity\Entities\ClientNote withoutTrashed()
 * @mixin \Eloquent
 */
class ClientNote extends Model
{
    use SoftDeletes;

    protected $table = 'client_notes';

    protected $fillable = [
        'notes_en',
        'notes_ar',
        'client_id',
        'add_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function addBy()
    {
        return $this->belongsTo(User::class,'add_by');
    }

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
}
