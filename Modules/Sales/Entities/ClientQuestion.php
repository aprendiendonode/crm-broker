<?php

namespace Modules\Sales\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Sales\Entities\ClientQuestion
 *
 * @property int $id
 * @property string|null $question
 * @property string|null $answer
 * @property string $answered
 * @property int|null $agency_id
 * @property int|null $added_by
 * @property int|null $answered_by
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $client_id
 * @property-read \App\Models\User|null $addedBy
 * @property-read \App\Models\User|null $answeredBy
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientQuestion whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientQuestion whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientQuestion whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientQuestion whereAnswered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientQuestion whereAnsweredBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientQuestion whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientQuestion whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientQuestion whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\ClientQuestion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ClientQuestion extends Model
{
    protected $table = 'client_questions';
    protected $guarded = [];


    public function addedBy()
    {
        return $this->belongsTo(User::class,  'added_by', 'id');
    }

    public function answeredBy()
    {
        return $this->belongsTo(User::class,  'answered_by', 'id');
    }
}