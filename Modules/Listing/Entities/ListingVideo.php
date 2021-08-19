<?php

namespace Modules\Listing\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Listing\Entities\ListingVideo
 *
 * @property int $id
 * @property int|null $listing_id
 * @property string|null $title
 * @property string|null $link
 * @property string|null $host
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingVideo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingVideo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingVideo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingVideo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingVideo whereHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingVideo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingVideo whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingVideo whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingVideo whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingVideo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ListingVideo extends Model
{

    protected $guarded = [];
}