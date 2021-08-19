<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\SuperAdmin\Entities\City;
use Modules\SuperAdmin\Entities\Country;

/**
 * App\Models\Statistics
 *
 * @property int $id
 * @property string|null $data_source
 * @property string|null $transaction_type
 * @property string|null $type
 * @property string|null $day
 * @property string|null $month
 * @property string|null $country_id
 * @property string|null $city_id
 * @property string|null $area_code
 * @property string|null $community_id
 * @property string|null $property_type
 * @property string|null $purpose
 * @property string|null $subcommunity_id
 * @property string|null $property_number
 * @property string|null $additional_details
 * @property string|null $size_sqm
 * @property string|null $price_sqm
 * @property string|null $total_worth
 * @property string|null $size_sqft
 * @property string|null $price_sqft
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\SuperAdmin\Entities\City|null $city
 * @property-read \Modules\SuperAdmin\Entities\Country|null $country
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereAdditionalDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereAreaCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereCommunityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereDataSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics wherePriceSqft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics wherePriceSqm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics wherePropertyNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics wherePropertyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics wherePurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereSizeSqft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereSizeSqm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereSubcommunityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereTotalWorth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereTransactionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statistics whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Statistics extends Model
{
    protected $guarded = [];


    public function city(){
        return $this->belongsTo(City::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
}
