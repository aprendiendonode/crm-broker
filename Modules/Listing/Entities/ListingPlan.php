<?php

namespace Modules\Listing\Entities;

use Illuminate\Database\Eloquent\Model;

class ListingPlan extends Model
{

    protected $table = 'listing_plans';

    protected $guarded = [];
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}