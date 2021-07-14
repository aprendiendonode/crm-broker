<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\SuperAdmin\Entities\City;
use Modules\SuperAdmin\Entities\Country;

class Statistics extends Model
{
    protected $guarded = [];


    public function city(){
        return $this->belongsTo(City::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
}
