<?php

namespace Domain\Listings\Actions;

use Modules\Listing\Entities\ListingPlan;



class RemoveListingPlanAction
{

    public function __invoke($id)
    {
        $plan = ListingPlan::findOrFail($id);
        deleteDirectory(public_path('listings/plans/agency_' . $plan->listing->agency_id . '/listing_' . $plan->listing->id . '/plan_' . $plan->id));
        $plan->delete();
    }
}