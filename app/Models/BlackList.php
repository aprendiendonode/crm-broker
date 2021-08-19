<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BlackList
 *
 * @property int $id
 * @property string|null $reason
 * @property int|null $agency_id
 * @property int|null $black_listed_agency_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Agency|null $agency
 * @property-read \App\Models\Agency|null $blacklist
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlackList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlackList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlackList query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlackList whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlackList whereBlackListedAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlackList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlackList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlackList whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlackList whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BlackList extends Model
{
    protected $guarded = [];

    public function agency(){
        return $this->belongsTo(Agency::class,'agency_id');
    }

    public function blacklist(){
        return $this->belongsTo(Agency::class,'black_listed_agency_id');
    }
}
