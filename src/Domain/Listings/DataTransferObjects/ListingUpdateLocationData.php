<?php

namespace Domain\Listings\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class ListingUpdateLocationData extends DataTransferObject
{




    public $business;
    public $listing;
    public $agency;

    public $location;
    public $loc_lat;
    public $loc_lng;
    public $city;
    public $community;
    public $sub_community;
    public $unit;
    public $plot;
    public $street;

    public $cheque;

    public static function fromRequest(Request $request): self
    {

        return new self([
            'business'               => $request->business,
            'listing'                => $request->listing,
            'agency'                 => $request->agency,
            'location'               => $request->location,
            'loc_lat'                => $request->loc_lat,
            'loc_lng'                => $request->loc_lng,
            'city'                   => $request->city,
            'community'              => $request->community,
            'sub_community'          => $request->sub_community,
            'unit'                   => $request->unit,
            'plot'                   => $request->plot,
            'street'                 => $request->street,
        ]);
    }
}