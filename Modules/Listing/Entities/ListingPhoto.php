<?php

namespace Modules\Listing\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ListingPhoto extends Model
{

    protected $guarded = [];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
