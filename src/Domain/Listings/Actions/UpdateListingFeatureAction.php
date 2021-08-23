<?php

namespace Domain\Listings\Actions;

use App\Models\User;
use Modules\Listing\Entities\Listing;
use Illuminate\Support\Facades\Validator;
use Modules\Listing\Entities\ListingCheque;
use Domain\Listings\DataTransferObjects\ListingUpdateFeatureData;
use Domain\Listings\DataTransferObjects\ListingUpdatePricingData;

class UpdateListingFeatureAction
{


    public function __invoke(ListingUpdateFeatureData $listingUpdateFeatureData)
    {
        $listing     = Listing::where('business_id', $listingUpdateFeatureData->business)->where('id', $listingUpdateFeatureData->listing)->firstOrFail();
        $checkboxesFeatureName   =  $listingUpdateFeatureData->checkboxesFeatureName;
        $checkboxesFeatureValue  =  $listingUpdateFeatureData->checkboxesFeatureValue;
        $checkboxes = [];
        foreach ($checkboxesFeatureName as $key =>  $name) {
            $checkboxes[$name] =
                $checkboxesFeatureValue[$key];
        }


        $inputsFeatureName   =  $listingUpdateFeatureData->inputsFeatureName;
        $inputsFeatureValue  =  $listingUpdateFeatureData->inputsFeatureValue;
        $inputs = [];
        foreach ($inputsFeatureName as $key =>  $name) {
            $inputs[$name] =
                $inputsFeatureValue[$key];
        }

        $selectsFeatureName   =  $listingUpdateFeatureData->selectsFeatureName;
        $selectsFeatureValue  =  $listingUpdateFeatureData->selectsFeatureValue;
        $selects = [];
        foreach ($selectsFeatureName as $key =>  $name) {
            $selects[$name] =
                $selectsFeatureValue[$key];
        }

        $merged = array_merge($checkboxes, $inputs);
        $all = array_merge($merged, $selects);

        $listing->update(['features' => $all]);
    }
}