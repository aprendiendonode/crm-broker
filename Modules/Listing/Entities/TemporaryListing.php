<?php

namespace Modules\Listing\Entities;

use Illuminate\Database\Eloquent\Model;

class TemporaryListing extends Model
{
    protected $table = 'temporary_listings_photos';
    protected $guarded = [];
}