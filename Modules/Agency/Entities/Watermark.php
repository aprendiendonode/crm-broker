<?php

namespace Modules\Agency\Entities;

use App\Models\Agency;
use App\Models\Business;
use Illuminate\Database\Eloquent\Model;

class Watermark extends Model
{
    protected $guarded = [];


    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }


}
