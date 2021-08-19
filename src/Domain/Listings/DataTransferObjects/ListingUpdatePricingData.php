<?php

namespace Domain\Listings\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class ListingUpdatePricingData extends DataTransferObject
{
    public $price;
    public $rent_frequency;
    public $commission_percent;
    public $commission_value;
    public $deposite_percent;
    public $deposite_value;
    public $business;
    public $listing;
    public $agency;
    public $cheque;

    public static function fromRequest(Request $request): self
    {

        return new self([
            'business'               => $request->business,
            'listing'                => $request->listing,
            'agency'                 => $request->agency,
            'price'                  => $request->price,
            'rent_frequency'         => $request->rent_frequency,
            'commission_percent'     => $request->commission_percent,
            'commission_value'       => $request->commission_value,
            'deposite_percent'       => $request->deposite_percent,
            'deposite_value'         => $request->deposite_value,
            'cheque'                 => $request->cheque,
        ]);
    }
}