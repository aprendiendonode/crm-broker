<?php

namespace Modules\Listing\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\Listing\Entities\ListingFeature
 *
 * @property int $id
 * @property string|null $key
 * @property string|null $value
 * @property string|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingFeature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingFeature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingFeature query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingFeature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingFeature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingFeature whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingFeature whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingFeature whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingFeature whereValue($value)
 * @mixin \Eloquent
 */
class ListingFeature extends Model
{


    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Listing\Database\factories\ListingFeatureFactory::new();
    }
}