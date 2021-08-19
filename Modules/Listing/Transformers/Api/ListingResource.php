<?php

namespace Modules\Listing\Transformers\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ListingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
       
        return [
            'id' => $this->id,
            'purpose' => $this->purpose ?? '',
            'beds' => $this->beds ?? 0,
            'parkings' => $this->parkings ?? 0,
            'baths' => $this->baths ?? 0,
            'area' => $this->area ?? '',
            'furnished' => $this->furnished ?? 'no',
            'title' => $this->title ?? '',
            'location' => $this->location ?? '',
            'price' => $this->price ?? '',
            'rent_frequency' => $this->rent_frequency ?? '',
            'image' => $this->photo_main->isEmpty() != true ? ($this->photo_main->first()->active == 'main' ? asset('listings/photos/agency_' . $this->agency_id . '/listing_' . $this->id . '/photo_' . $this->photo_main->first()->id . '/' . $this->photo_main->first()->main) : asset('listings/photos/agency_' . $this->agency_id . '/listing_' . $this->id . '/photo_' . $this->photo_main->first()->id . '/' . $this->photo_main->first()->watermark)) :null,
            'shorttime_from' => $this->shorttime_from ?? '',
            'shorttime_to' => $this->shorttime_to ?? '',
            'location' => $this->location ?? '',
            'distance' => $this->distance ?? '',
            
            ];
    }
}
