<?php

namespace Modules\Listing\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Listing\Entities\ListingPlan
 *
 * @property int $id
 * @property int|null $listing_id
 * @property string|null $main
 * @property string|null $watermark
 * @property string|null $title
 * @property string|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Listing\Entities\Listing|null $listing
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPlan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPlan query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPlan whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPlan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPlan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPlan whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPlan whereMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPlan whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPlan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingPlan whereWatermark($value)
 * @mixin \Eloquent
 */
class ListingPlan extends Model
{

    protected $table = 'listing_plans';

    protected $guarded = [];
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}