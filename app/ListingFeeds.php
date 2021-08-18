<?php

namespace App;


use Modules\Listing\Entities\Listing;

class ListingFeeds
{
    public static function getFeedItems()
    {
        return Listing::all();
    }
}