<?php

namespace Modules\Listing\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Listing\Entities\PortalListing
 *
 * @property int $id
 * @property int|null $listing_id
 * @property int|null $portal_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\PortalListing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\PortalListing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\PortalListing query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\PortalListing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\PortalListing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\PortalListing whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\PortalListing wherePortalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\PortalListing whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PortalListing extends Model
{

    protected $table = 'portal_listings';
    protected $guarded = [];
    
   
}
