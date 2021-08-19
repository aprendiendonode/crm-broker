<?php

namespace Domain\Listings\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class ListingUpdateAgentData extends DataTransferObject
{
    public $listing;
    public $business;
    public $agency;
    public $agent;

    public static function fromRequest(Request $request): self
    {
        return new self([
            "listing"      => $request->listing,
            "business"     => $request->business,
            "agency"       => $request->agency,
            "agent"        => $request->agent
        ]);
    }
}