<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Request
 *
 * @property int $id
 * @property string|null $response
 * @property int|null $sender_id
 * @property int|null $receiver_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Agency|null $receiver
 * @property-read \App\Models\Agency|null $sender
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereReceiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Request extends Model
{
    protected $guarded = [];

    public function sender(){
        return $this->belongsTo(Agency::class,'sender_id');
    }

    public function receiver(){
        return $this->belongsTo(Agency::class,'receiver_id');
    }
}
