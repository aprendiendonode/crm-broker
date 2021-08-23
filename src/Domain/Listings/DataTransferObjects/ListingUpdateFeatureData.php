<?php

namespace Domain\Listings\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class ListingUpdateFeatureData extends DataTransferObject
{
    public $listing;
    public $business;
    public $agency;
    public $checkboxesFeatureName;
    public $checkboxesFeatureValue;
    public $inputsFeatureName;
    public $inputsFeatureValue;
    public $selectsFeatureName;
    public $selectsFeatureValue;

    public static function fromRequest(Request $request): self
    {
        return new self([
            "listing"                     => $request->listing,
            "business"                    => $request->business,
            "agency"                      => $request->agency,
            'checkboxesFeatureName'       => $request->checkboxesFeatureName,
            'checkboxesFeatureValue'      => $request->checkboxesFeatureValue,
            'inputsFeatureName'           => $request->inputsFeatureName,
            'inputsFeatureValue'          => $request->inputsFeatureValue,
            'selectsFeatureName'          => $request->selectsFeatureName,
            'selectsFeatureValue'         => $request->selectsFeatureValue,






        ]);
    }
}