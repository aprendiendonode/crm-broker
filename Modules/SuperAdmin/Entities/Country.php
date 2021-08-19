<?php

namespace Modules\SuperAdmin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\SuperAdmin\Entities\Country
 *
 * @property int $id
 * @property string|null $iso2
 * @property string|null $value
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $iso3
 * @property string|null $numcode
 * @property string|null $un_member
 * @property string|null $calling_code
 * @property string|null $cctld
 * @property string|null $nationality
 * @property string|null $flag
 * @property string|null $phone_code
 * @property string|null $time_zone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $slug
 * @property string|null $lat
 * @property string|null $lng
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country whereCallingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country whereCctld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country whereFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country whereIso2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country whereIso3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country whereNumcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country wherePhoneCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country whereTimeZone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country whereUnMember($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Country whereValue($value)
 * @mixin \Eloquent
 */
class Country extends Model
{


    public $table = 'countries';



    protected $fillable = [
        'iso2',
        'value',
        'name_en',
        'name_ar',
        'iso3',
        'numcode',
        'un_member',
        'calling_code',
        'cctld',
        'nationality',
        'flag',
        'phone_code',
        'time_zone',
        'created_at',
        'updated_at',
    ];
}
