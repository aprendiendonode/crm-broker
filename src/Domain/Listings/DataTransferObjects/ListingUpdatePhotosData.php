<?php

namespace Domain\Listings\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class ListingUpdatePhotosData extends DataTransferObject
{

    public   $listing;
    public   $business;
    public   $agency;
    public   $photos;
    public   $checked_main_hidden;
    public static function fromRequest(Request $request): self
    {
        return new self([
            'listing'                  =>  $request->listing,
            'business'                 =>  $request->business,
            'agency'                   =>  $request->agency,
            'photos'                   =>  $request->photos,
            'checked_main_hidden'      =>  $request->checked_main_hidden
        ]);
    }
}