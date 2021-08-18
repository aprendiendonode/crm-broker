<?php

namespace App\Models;

use App\Models\Agency;
use App\Models\Business;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Contact
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Agency|null $agency
 * @property-read \App\Models\Business|null $business
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contact onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contact withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contact withoutTrashed()
 * @mixin \Eloquent
 */
class Contact extends Model
{
    use softDeletes;

    protected $fillable = [
        'name_en',
        'name_ar',
        'agency_id',
        'business_id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];


    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

}
