<?php

namespace Modules\SuperAdmin\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\SuperAdmin\Entities\Country;


/**
 * Modules\SuperAdmin\Entities\City
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $code
 * @property int|null $country_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\SuperAdmin\Entities\Community[] $communities
 * @property-read int|null $communities_count
 * @property-read \Modules\SuperAdmin\Entities\Country|null $country
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\City query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\City whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\City whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\City whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\City whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\City whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\City whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class City extends Model
{


    public $table = 'cities';



    protected $guarded = [];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function communities()
    {
        return $this->hasMany(Community::class, 'city_id');
    }
}
