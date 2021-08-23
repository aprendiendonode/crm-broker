<?php

namespace Domain\Listings\Actions;


use Modules\Listing\Entities\Listing;
use Modules\Listing\Entities\ListingVideo;
use Domain\Listings\DataTransferObjects\ListingCreateVideoData;


class CreateListingVideoAction
{



    public function __invoke(Listing $listing,  $listingCreateVideoData)
    {


        $listing->videos->each(function ($q) {
            $q->delete();
        });
        foreach ($listingCreateVideoData->video_title as $key => $title) {
            ListingVideo::create([
                'listing_id' => $listing->id,
                'title'      => $title,
                'host'       => $listingCreateVideoData->video_host[$key],
                'link'       => $listingCreateVideoData->video_link[$key],
            ]);
        }
    }
}