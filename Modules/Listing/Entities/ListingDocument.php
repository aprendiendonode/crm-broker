<?php

namespace Modules\Listing\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Listing\Entities\ListingDocument
 *
 * @property int $id
 * @property int|null $listing_id
 * @property string|null $document
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Listing\Entities\Listing|null $listing
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingDocument whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingDocument whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingDocument whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingDocument whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ListingDocument extends Model
{

    protected $guarded = [];
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}