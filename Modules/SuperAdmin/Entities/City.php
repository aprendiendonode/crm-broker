<?php

namespace Modules\SuperAdmin\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\SuperAdmin\Entities\Country;


class City extends Model
{


    public $table = 'cities';



    protected $guarded = [];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function communities()
    {
        return $this->hasMany(Community::class, 'city_id');
    }
}
