<?php

namespace App\Observers;

use Modules\Listing\Entities\Listing;
use Modules\SuperAdmin\Entities\ListingType;



class ListingObserver
{
    /**
     * Handle the listing "created" event.
     *
     * @param  \App\Listing  $listing
     * @return void
     */
    public function creating(Listing $listing)
    {
        $last_listing      = Listing::where('agency_id', $listing->agency_id)->latest()->first();
        $listing_last_ref  = $last_listing  ? $last_listing->ref_id + 1 :  1;
        $listing->ref_id   = $listing_last_ref;
        $type_reference    = ListingType::where('id', $listing->type_id)->firstOrFail();
        $rent_or_sale      = $listing->purpose == 'sale' ? 'S' : 'R';
        $listing_reference = $listing->agency_id . '-' . $type_reference->reference . '-' . $rent_or_sale . '-' . $listing->ref_id;
        $listing->listing_ref = $listing_reference;
    }

    /**
     * Handle the listing "updated" event.
     *
     * @param  \App\Listing  $listing
     * @return void
     */
    public function updated(Listing $listing)
    {
        //
    }

    /**
     * Handle the listing "deleted" event.
     *
     * @param  \App\Listing  $listing
     * @return void
     */
    public function deleted(Listing $listing)
    {
        //
    }

    /**
     * Handle the listing "restored" event.
     *
     * @param  \App\Listing  $listing
     * @return void
     */
    public function restored(Listing $listing)
    {
        //
    }

    /**
     * Handle the listing "force deleted" event.
     *
     * @param  \App\Listing  $listing
     * @return void
     */
    public function forceDeleted(Listing $listing)
    {
        //
    }
}