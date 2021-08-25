<?php

namespace Domain\Listings\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class ListingCreateVideoData extends DataTransferObject
{

    public $business;
    public $listing;
    public $agency;
    public $video_title;
    public $video_link;
    public $video_host;

    public static function fromRequest(Request $request): self
    {

        return new self([
            'business'                    => $request->business,
            'listing'                     => $request->listing,
            'agency'                      => $request->agency,
            'video_title'                 => $request->video_title,
            'video_link'                  => $request->video_link,
            'video_host'                  => $request->video_host,
        ]);
    }
}