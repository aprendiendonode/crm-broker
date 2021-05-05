<?php

namespace Modules\Listing\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ListingCheque extends Model
{
    protected $table = 'listing_rent_cheques';
    protected $guarded = [];
}