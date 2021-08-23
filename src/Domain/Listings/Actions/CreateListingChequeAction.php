<?php

namespace Domain\Listings\Actions;

use Modules\Listing\Entities\Listing;
use Modules\Listing\Entities\ListingChequeCalculator;

class CreateListingChequeAction
{



    public function __invoke(Listing $listing, array $cheque_date, array $cheque_amount, array $cheque_percentage)
    {

        foreach ($cheque_date as $key => $date) {
            ListingChequeCalculator::create([
                'listing_id' => $listing->id,
                'date' => $date,
                'value' => $cheque_amount[$key],
                'percent' => $cheque_percentage[$key],
            ]);
        }
    }
}