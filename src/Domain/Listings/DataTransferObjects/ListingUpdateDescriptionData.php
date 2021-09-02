<?php

namespace Domain\Listings\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class ListingUpdateDescriptionData extends DataTransferObject
{
    public $business;
    public $listing;
    public $agency;
    public $description_en;
    public $description_ar;




    public static function fromRequest(Request $request): self
    {

        return new self([
            'business'                       => $request->business,
            'listing'                        => $request->listing_id,
            'agency'                         => $request->agency,
            "description_en"                 => $request->{'edit_description_en_' . $request->listing_id},
            "description_ar"                 => $request->{'edit_description_ar_' . $request->listing_id},

        ]);
    }
}