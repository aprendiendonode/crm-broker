<?php

namespace Modules\SuperAdmin\Entities;

use Illuminate\Database\Eloquent\Model;


/**
 * Modules\SuperAdmin\Entities\Community
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property int|null $city_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $country_id
 * @property-read \Modules\SuperAdmin\Entities\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\SuperAdmin\Entities\SubCommunity[] $sub_communities
 * @property-read int|null $sub_communities_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Community newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Community newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Community query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Community whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Community whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Community whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Community whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Community whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Community whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SuperAdmin\Entities\Community whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Community extends Model
{


    protected $guarded = [];
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function sub_communities()
    {
        return $this->hasMany(SubCommunity::class);
    }
}
