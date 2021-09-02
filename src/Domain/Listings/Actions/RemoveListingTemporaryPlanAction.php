<?php

namespace Domain\Listings\Actions;

use Modules\Listing\Entities\TemporaryPlan;
use Modules\Listing\Entities\TemporaryListing;


class RemoveListingTemporaryPlanAction
{

    public function __invoke($id)
    {
        $plan = TemporaryPlan::findOrFail($id);
        deleteDirectory(public_path("temporary/plans/" . $plan->folder));
        $plan->delete();
    }
}