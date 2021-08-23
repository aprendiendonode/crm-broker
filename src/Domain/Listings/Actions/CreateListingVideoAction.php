<?php

namespace Domain\Listings\Actions;


use Modules\Listing\Entities\Listing;
use Modules\Listing\Entities\ListingVideo;


class CreateListingVideoAction
{



    public function __invoke(Listing $listing, array $video_title, array $video_host, array $video_link)
    {

        foreach ($video_title as $key => $title) {
            ListingVideo::create([
                'listing_id' => $listing->id,
                'title' => $title,
                'host' => $video_host[$key],
                'link' => $video_link[$key],
            ]);
        }
    }
}