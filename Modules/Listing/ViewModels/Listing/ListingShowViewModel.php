<?php

namespace Modules\Listing\ViewModels\Listing;

use Spatie\ViewModels\ViewModel;
use Modules\Listing\Entities\Listing;

class ListingShowViewModel  extends ViewModel
{

    public $listing;

    public function __construct($listing)
    {
        $this->listing  = Listing::with(['agency', 'agent'])->where('id', $listing)->firstOrFail();
    }


    public function listing(): Listing
    {
        return $this->listing;
    }
}