<?php

namespace Domain\Listings\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class ListingUpdateExtraInfoData extends DataTransferObject
{
    public $business;
    public $listing;
    public $agency;

    public $key_location;
    public $govfield1;
    public $govfield2;
    public $yearly_service_charges;
    public $monthly_cooling_charges;
    public $monthly_cooling_provider;


    public static function fromRequest(Request $request): self
    {

        return new self([
            'business'                    => $request->business,
            'listing'                     => $request->listing,
            'agency'                      => $request->agency,

            "key_location"                => $request->key_location,
            "govfield1"                   => $request->govfield1,
            "govfield2"                   => $request->govfield2,
            "yearly_service_charges"      => $request->yearly_service_charges,
            "monthly_cooling_charges"     => $request->monthly_cooling_charges,
            "monthly_cooling_provider"    => $request->monthly_cooling_provider,
        ]);
    }
}