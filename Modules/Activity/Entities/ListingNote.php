<?php

namespace Modules\Activity\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

use Modules\Listing\Entities\Listing;

class ListingNote extends Model
{


    protected $table = 'listing_notes';

    protected $guarded = [];

    public function addBy()
    {
        return $this->belongsTo(User::class, 'add_by');
    }

    public function listing()
    {
        return $this->belongsTo(Listing::class, 'listing_id');
    }
}